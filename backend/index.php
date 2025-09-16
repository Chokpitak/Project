<?php
$page = 'index';
session_start();
if (!isset($_SESSION['user_id'])) {
     header("Location: index.php");
     exit();
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลัก(หลังบ้าน) | Big Boss Barber</title>
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
            background-image: url('https://cdn.pixabay.com/photo/2019/02/25/13/38/haircut-4019676_1280.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.3;
            z-index: -1;
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
        .custom-back-btn {
            color: white;
            border: 2px solid white;
            background-color: transparent;
            transition: 0.3s ease;
        }

        .custom-back-btn:hover,
        .custom-back-btn:focus {
            color: #000;
            background-color: #e63946;
            border-color: #e63946;
        }

    </style>
</head>
<body>
    <?php include '../backend/components/header.php'; ?>

    <div class="d-flex flex-column justify-content-center align-items-center min-vh-100 text-center">
    <a href="../index.php" class="btn custom-back-btn position-absolute top-0 end-0 m-3">
        <i class="bi bi-backspace-fill"></i>
    </a>
    <section class="hero text-white text-center py-4 w-100">
        <div class="container d-flex flex-column align-items-center justify-content-center">
            <h1>Admin Panal</h1>
            <p>Big Boss Barber</p>
        </div>
    </section>
    </div>