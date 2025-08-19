<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information Website</title>
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
        <?php if (isset($_GET['success']) && $_GET['success'] == 'true') : ?>
            Swal.fire({
                icon: 'success',
                title: 'สำเร็จ!',
                text: 'คุณเข้าสู่ระบบสำเร็จ',
                footer: 'ได้เวลาเริ่มต้นใช้งาน'
            });
        <?php endif; ?>
    </script>
</body>
</html>
