<?php
$page = 'index';
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
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Mitr", sans-serif;
            min-height: 100vh;
            position: relative;
            background: #212529;
        }
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-image: url('https://cdn.pixabay.com/photo/2020/05/24/02/00/barber-shop-5212059_1280.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.3;
            z-index: -1;
        }
        .logo {
            width: 150px;
            max-width: 40vw;
        }
        h1 {
            font-size: 4rem;
            font-weight: 600;
        }
        p {
            font-size: 2rem;
        }
        @media (max-width: 768px) {
            .logo {
                width: 90px;
            }
            h1 {
                font-size: 2rem;
            }
            p {
                font-size: 1.1rem;
            }
        }
        @media (max-width: 480px) {
            .logo {
                width: 60px;
            }
            h1 {
                font-size: 1.3rem;
            }
            p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body class="d-flex flex-column justify-content-center align-items-center min-vh-100 text-center">
    <img src="https://cdn.pixabay.com/photo/2018/01/09/14/24/head-3071690_1280.png"
        alt="Logo"
        class="logo mb-3 img-fluid">

    <section class="hero text-white text-center py-4 w-100">
        <div class="container d-flex flex-column align-items-center justify-content-center">
            <h1>ยินดีตอนรับสู่เว็บไซต์ของเรา</h1>
            <p>Big Boss Barber</p>
        </div>
    </section>
    <?php include './components/header.php'; ?>
    <script>
        <?php if (isset($_GET['error']) && $_GET['error'] == 'invalid') : ?>
            Swal.fire({
                icon: 'error',
                title: 'เข้าสู่ระบบไม่สำเร็จ',
                text: 'อีเมลหรือรหัสผ่านไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                showConfirmButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'ตกลง',
                background: '#212529',
                color: '#fff',
                footer: '<a href="signin.php" style="color:#ffc107;">กลับไปหน้าเข้าสู่ระบบ</a>',
                customClass: {
                    popup: 'rounded-4 shadow'
                }
            });
        <?php endif; ?>

        <?php if (isset($_GET['success']) && $_GET['success'] == 'true') : ?>
            Swal.fire({
                icon: 'success',
                title: 'เข้าสู่ระบบสำเร็จ!',
                text: 'ยินดีต้อนรับสู่เว็บไซต์ของเรา',
                showConfirmButton: false,
                timer: 2000,
                background: '#212529',
                color: '#fff',
                footer: '<span style="color:#ffc107;">ขอให้สนุกกับการใช้งาน!</span>',
                customClass: {
                    popup: 'rounded-4 shadow'
                }
            });
        <?php endif; ?>
    </script>
</body>
</html>