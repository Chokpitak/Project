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
            font-size: 50px;
            font-weight: bold;
            color: white;
        }

        h1 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
            color: white;
            font-size: 30px;
        }

        th {
            background-color: #000;
            color: white;
        }

        td img {
            width: 200px;
            height: auto;
        }

        .btn-light {
            font-size: 30px;
            padding: 15px 30px;
            font-weight: 600;
            border-radius: 8px;
        }

        .btn-light:hover {
            background-color: #f8f9fa;
            transform: scale(1.05);
            transition: all 0.2s ease-in-out;
        }

        .btn-delete:hover {
            opacity: 0.8;
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
            background-image: url('https://uploads-ssl.webflow.com/5cac67740ca8b550d4e98db6/5cd8d2041cfc8a0e6eaf5217_Barber-Industries-Parramatta-05-p-1080.jpeg');
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
    <section class="hero text-white text-left py-5">
        <h1 class="text-white">บริการของเรา</h1>
    <table>
        <tbody class="bg-dark">
            <tr>
                <td><img src="https://tse3.mm.bing.net/th/id/OIP.fiNpFCdJGgj7TrwjKeslSQHaFt?rs=1&pid=ImgDetMain&o=7&rm=3" alt="Profile"></td>
                <td>หัวกรวยสาขาสามแยกกระจับ</td>
                <td><a href="reservation2.php?branch=หัวกรวยสาขาสามแยกกระจับ"><button class="btn btn-light">จองเลย</button></a></td>
            </tr>
            <tr>
                <td><img src="https://tse2.mm.bing.net/th/id/OIP.wXvnTNRyJMispbUN7TWI1QAAAA?w=404&h=316&rs=1&pid=ImgDetMain&o=7&rm=3" alt="Profile"></td>
                <td>หัวกรวยสาขามาลัยแมน</td>
                <td><a href="reservation2.php?branch=หัวกรวยสาขามาลัยแมน"><button class="btn btn-light">จองเลย</button></a></td>
            </tr>
            <tr>
                <td><img src="https://tse2.mm.bing.net/th/id/OIP.FyVXGI_P4VAQhppQzAwnUgHaHa?w=1920&h=1920&rs=1&pid=ImgDetMain&o=7&rm=3" alt="Profile"></td>
                <td>หัวกรวยสาขาต้นสน</td>
                <td><a href="reservation2.php?branch=หัวกรวยสาขาต้นสน"><button class="btn btn-light">จองเลย</button></a></td>
            </tr>
        </tbody>
    </table>
    </section>
</body>
</html>
