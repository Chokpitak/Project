<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}

// ถ้าเป็นระบบแอดมิน เพิ่มเงื่อนไขสิทธิ์
// if ($_SESSION['role'] !== 'admin') {
//     header("Location: index.php");
//     exit();
// }

// เชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";          // แก้ตามของคุณ
$password = "";              // แก้ตามของคุณ
$dbname   = "barber_db";     // แก้ตามของคุณ

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . $conn->connect_error);
}

// ดึงข้อมูลทั้งหมด
$sql = "SELECT * FROM reservations ORDER BY date ASC, time ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>รายการจองคิว</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            text-align: center;
            padding: 40px;
        }

        h1 {
            font-size: 85px;
            font-weight: bold;
            color: white;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 65px;
            font-weight: bold;
            color: white;
            margin-bottom: 20px;
        }

        p {
            font-size: 40px;
            font-weight: bold;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
            vertical-align: middle;
            color: white;
            font-size: 20px;
        }

        th {
            background-color: #000;
            color: white;
            font-size: 30px;
        }

        td img {
            width: 150px;
            height: auto;
        }

        .logo {
            width: 100px;
            margin-top: 40px;
        }

        .img {
            width: auto;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://i.pinimg.com/736x/71/2e/f6/712ef6b087f64f3d7f7ea8d5735b6795.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.3;
            /* 👈 ปรับค่าตามความจางที่ต้องการ */
            z-index: -1;
        }
    </style>
</head>
<style>
    body {
        font-family: 'Kanit', sans-serif;
    }
</style>

<body class="bg-dark">
    <?php include './components/header.php'; ?>
    <img src="https://cdn.pixabay.com/photo/2018/01/09/14/24/head-3071690_1280.png"
        alt="Logo"
        class="logo mb-3">
    <h1 class="mb-4">รายการจองคิวทั้งหมด</h1>
    <main class="p-4 flex-grow-1">
        <table class="table table-bordered text-center">
            <thead class="bg-dark">
                <tr>
                    <th>สาขา</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>เบอร์โทร</th>
                    <th>วันที่</th>
                    <th>เวลา</th>
                    <th>เวลาที่จอง</th>
                </tr>
            </thead>
            <tbody class="bg-dark">
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['branch']) ?></td>
                            <td><?= htmlspecialchars($row['fullname']) ?></td>
                            <td><?= htmlspecialchars($row['phone']) ?></td>
                            <td><?= htmlspecialchars($row['date']) ?></td>
                            <td><?= htmlspecialchars(date("H:i", strtotime($row['time']))) ?></td>
                            <td><?= htmlspecialchars($row['created_at']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="6" class="text-center">ยังไม่มีการจองคิว</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
    <?php include './components/footer.php'; ?>
</body>
</html>
_
<?php
$conn->close();
?>
