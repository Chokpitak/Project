<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}
?>
<?php
// เริ่ม session ถ้าจะใช้เก็บค่าชั่วคราว
session_start();

// ตรวจสอบว่าฟอร์มถูกส่งมาหรือไม่
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "<script>
        window.location.href = 'index.php';
    </script>";
    exit;
}

// รับค่าจากฟอร์ม
$branch   = $_POST['branch'] ?? '';
$fullname = trim($_POST['fullname'] ?? '');
$phone    = trim($_POST['phone'] ?? '');
$date     = $_POST['date'] ?? '';
$time     = $_POST['time'] ?? '';

// ตรวจสอบว่าสาขาอยู่ในรายการที่อนุญาต
$allowedBranches = ['หัวกรวยสาขาสามแยกกระจับ', 'หัวกรวยสาขามาลัยแมน', 'หัวกรวยสาขาต้นสน'];

if (!in_array($branch, $allowedBranches)) {
    showAlertAndRedirect("ไม่พบสาขาที่เลือก", "error");
    exit;
}

// ตรวจสอบว่ากรอกครบทุกช่อง
if (empty($fullname) || empty($phone) || empty($date) || empty($time)) {
    showAlertAndRedirect("กรุณากรอกข้อมูลให้ครบถ้วน", "warning");
    exit;
}

// ตรวจสอบว่าเป็นวันที่ปัจจุบันหรืออนาคต
$currentDate = date('Y-m-d');
if ($date < $currentDate) {
    showAlertAndRedirect("วันที่จองต้องเป็นวันนี้หรืออนาคตเท่านั้น", "warning");
    exit;
}

// ถ้าเลือกวันที่วันนี้ → ตรวจสอบว่าเวลาจองอยู่ในอนาคต (เทียบกับเวลาปัจจุบัน)
if ($date === $currentDate) {
    $currentTime = date('H:i');
    if ($time <= $currentTime) {
        showAlertAndRedirect("เวลาที่เลือกต้องอยู่หลังเวลาปัจจุบัน", "warning");
        exit;
    }
}

// ตรวจสอบรูปแบบเบอร์โทร (ไทย 10 หลัก)
if (!preg_match('/^[0-9]{10}$/', $phone)) {
    showAlertAndRedirect("กรุณากรอกเบอร์โทรให้ถูกต้อง (10 หลัก)", "warning");
    exit;
}

// เชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";          // แก้ตามของคุณ
$password = "";              // แก้ตามของคุณ
$dbname   = "barber_db";     // แก้ตามของคุณ

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    showAlertAndRedirect("เชื่อมต่อฐานข้อมูลล้มเหลว", "error");
    exit;
}

// เตรียมคำสั่ง SQL แบบ prepared statement เพื่อป้องกัน SQL injection
$stmt = $conn->prepare("INSERT INTO reservations (branch, fullname, phone, date, time) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $branch, $fullname, $phone, $date, $time);

if (!$stmt->execute()) {
    showAlertAndRedirect("เกิดข้อผิดพลาดในการบันทึกข้อมูล", "error");
    exit;
}

$stmt->close();
$conn->close();


// ✅ ถ้าทุกอย่างถูกต้อง —> แสดงแจ้งเตือนสำเร็จ
showAlertAndRedirect("จองคิวสำเร็จ", "success", "index.php");

// หรือถ้ามีฐานข้อมูล → ใส่โค้ด INSERT ที่นี่

// ---------- ฟังก์ชันช่วยแสดง Alert ----------
function showAlertAndRedirect($message, $icon = "success", $redirect = "reservation2.php") {
    echo <<<HTML
    <!DOCTYPE html>
    <html lang="th">
    <head>
        <meta charset="UTF-8">
        <title>ผลการจอง</title>
        <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        h1 {
            font-size: 85px;
        }

        p {
            font-size: 40px;
        }

        .logo {
            width: 150px;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: "Mitr", sans-serif;
            position: relative;
            min-height: 100vh;
            overflow: hidden;
        }

        /* พื้นหลังเป็นรูปภาพ */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://cdn.pixabay.com/photo/2020/05/24/02/00/barber-shop-5212059_1280.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.3;
            /* 👈 ปรับค่าตามความจางที่ต้องการ */
            z-index: -1;
        }
    </style>
    </head>
    <body class="d-flex flex-column justify-content-center align-items-center min-vh-100 text-center bg-dark">
    <!-- โลโก้ -->
    <img src="https://cdn.pixabay.com/photo/2018/01/09/14/24/head-3071690_1280.png"
        alt="Logo"
        class="logo mb-3">

    <section class="hero text-white text-center py-5 ">
        <div class="container h-100 d-flex flex-column  ">
            <h1>ยินดีตอนรับสู่เว็บไซต์ของเรา</h1>
            <p>โชคพิทักษ์ Big boss Barber</p>
        </div>
    </section>
        <?php include './components/header.php'; ?>
    <script>
            Swal.fire({
                title: '{$message}',
                icon: '{$icon}',
                confirmButtonText: 'ตกลง',
                allowOutsideClick: false
            }).then(() => {
                window.location.href = '{$redirect}';
            });
        </script>
    </body>
    </html>
HTML;
}
?>
