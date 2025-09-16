<?php
$page = 'reservation';

$branch   = $_POST['branch'] ?? '';
$fullname = trim($_POST['fullname'] ?? '');
$phone    = trim($_POST['phone'] ?? '');
$date     = $_POST['date'] ?? '';
$time     = $_POST['time'] ?? '';

// ฟังก์ชันแสดง alert และ redirect
function showAlertAndRedirect($message, $icon = "success", $redirect = "reservation2.php") {
    $title = '';
    switch ($icon) {
        case 'success':
            $title = 'จองคิวสำเร็จ';
            break;
        case 'warning':
            $title = 'ขออภัย!';
            break;
        case 'error':
        default:
            $title = 'เกิดข้อผิดพลาด';
            break;
    }

    echo <<<HTML
    <!DOCTYPE html>
    <html lang="th">
    <head>
        <meta charset="UTF-8">
        <title>จองคิวตัดผม | Big Boss Barber</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                font-family: 'Kanit', sans-serif;
                margin: 0;
                padding: 0;
                height: 100vh;
                background: url('./assets/images/bg.png') center center no-repeat fixed;
                background-size: cover;
                display: flex;
                align-items: center;
                justify-content: center;
            }
        </style>
    </head>
    <body class="bg-dark">
        <script>
            Swal.fire({
                icon: '{$icon}',
                title: '{$title}',
                text: '{$message}',
                showConfirmButton: false,
                timer: 2500,
                background: '#212529',
                color: '#fff',
                customClass: {
                    popup: 'rounded-4 shadow'
                }
            });

            setTimeout(() => {
                window.location.href = '{$redirect}';
            }, 2600);
        </script>
    </body>
    </html>
HTML;
    exit;
}

// ตรวจสอบข้อมูลเบื้องต้น
$allowedBranches = ['Big Boss สาขาสามแยกกระจับ', 'Big Boss สาขามาลัยแมน', 'Big Boss สาขาต้นสน'];

if (!in_array($branch, $allowedBranches)) {
    showAlertAndRedirect("ไม่พบสาขาที่เลือก", "error");
}

if (empty($fullname) || empty($phone) || empty($date) || empty($time)) {
    showAlertAndRedirect("กรุณากรอกข้อมูลให้ครบถ้วน", "warning");
}

$currentDate = date('Y-m-d');
if ($date < $currentDate) {
    showAlertAndRedirect("วันที่จองต้องเป็นวันนี้หรืออนาคตเท่านั้น", "warning");
}

if ($date === $currentDate) {
    $currentTime = date('H:i');
    if ($time <= $currentTime) {
        showAlertAndRedirect("เวลาที่เลือกต้องอยู่หลังเวลาปัจจุบัน", "warning");
    }
}

if (!preg_match('/^[0-9]{10}$/', $phone)) {
    showAlertAndRedirect("กรุณากรอกเบอร์โทรให้ถูกต้อง (10 หลัก)", "warning");
}

// เชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname   = "it48";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    showAlertAndRedirect("เชื่อมต่อฐานข้อมูลล้มเหลว", "error");
}

// ตรวจสอบว่าผู้ใช้มีการจองที่ "รอดำเนินการ" อยู่หรือไม่
$statusPending = 'รอดำเนินการ';
$stmt_pending = $conn->prepare("SELECT id FROM reservations WHERE phone = ? AND status = ?");
if (!$stmt_pending) {
    showAlertAndRedirect("เกิดข้อผิดพลาดในการเตรียมคำสั่ง SQL", "error");
}
$stmt_pending->bind_param("ss", $phone, $statusPending);
$stmt_pending->execute();
$stmt_pending->store_result();

if ($stmt_pending->num_rows > 0) {
    $stmt_pending->close();
    $conn->close();
    $redirect_url = "reservation2.php?branch=" . urlencode($branch);
    showAlertAndRedirect("คุณมีการจองที่กำลังรอดำเนินการอยู่ กรุณารอให้ดำเนินการเสร็จสิ้นก่อนทำการจองใหม่", "warning", $redirect_url);
}
$stmt_pending->close();

// ตรวจสอบเวลาซ้ำในสาขาเดียวกัน วันที่และเวลาเดียวกัน เฉพาะสถานะ "รอดำเนินการ"
$stmt_check = $conn->prepare("SELECT id FROM reservations WHERE branch = ? AND date = ? AND time = ? AND status = ?");
if (!$stmt_check) {
    showAlertAndRedirect("เกิดข้อผิดพลาดในการเตรียมคำสั่ง SQL", "error");
}
$stmt_check->bind_param("ssss", $branch, $date, $time, $statusPending);
$stmt_check->execute();
$stmt_check->store_result();

if ($stmt_check->num_rows > 0) {
    $stmt_check->close();
    $conn->close();
    $redirect_url = "reservation2.php?branch=" . urlencode($branch);
    showAlertAndRedirect("ขออภัย! เวลานี้ถูกจองไปแล้ว กรุณาเลือกเวลาอื่น", "warning", $redirect_url);
}
$stmt_check->close();

// บันทึกการจองใหม่ พร้อมสถานะเริ่มต้น "รอดำเนินการ"
$statusNew = 'รอดำเนินการ';
$stmt = $conn->prepare("INSERT INTO reservations (branch, fullname, phone, date, time, status) VALUES (?, ?, ?, ?, ?, ?)");
if (!$stmt) {
    showAlertAndRedirect("เกิดข้อผิดพลาดในการเตรียมคำสั่ง SQL", "error");
}
$stmt->bind_param("ssssss", $branch, $fullname, $phone, $date, $time, $statusNew);

if (!$stmt->execute()) {
    showAlertAndRedirect("เกิดข้อผิดพลาดในการบันทึกข้อมูล", "error");
}

$stmt->close();
$conn->close();

showAlertAndRedirect("ระบบได้บันทึกการจองของคุณแล้ว", "success", "index.php");
?>