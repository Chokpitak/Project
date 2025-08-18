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
            font-size: 65px;
            font-weight: bold;
            color: white;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 35px;
            color: white;
            margin-bottom: 20px;
        }

        h4 {
            font-size: 64px;
            color: white;
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
    <div>
            <img src="https://cdn.pixabay.com/photo/2018/01/09/14/24/head-3071690_1280.png"
        alt="Logo"
        class="logo mb-3">
    </div>  
        <section class="hero text-white text-left py-5">
            <h1>เกี่ยวกับเรา</h1>
            <h2>Big Boss ไม่ได้เป็นแค่ร้านตัดผม แต่คือเวทีเล็ก ๆ ที่เราสร้างตัวตนใหม่ให้กับทุกคนที่ก้าวเข้ามา
ที่นี่ เราเชื่อว่า “ความเท่” ไม่ได้ขึ้นอยู่กับหน้าตา แต่เกิดจากท่าที ความมั่นใจ และสไตล์ที่เป็นคุณจริง ๆ

เราเอาสิ่งธรรมดาที่ใคร ๆ มองข้าม มาตีความใหม่ให้ดูแปลกตา
เราเชื่อว่าความแตกต่างเล็ก ๆ สามารถเปลี่ยนทั้งภาพลักษณ์และความรู้สึกของคุณได้
เพราะสำหรับเรา ความเท่ไม่ใช่การเลียนแบบ แต่คือการกล้าเป็นตัวเองอย่างภาคภูมิ</h2>
    <br><br>
    <div style="width: 100vw; position: relative; left: 50%; transform: translateX(-50%); overflow: hidden;">
        <img src="https://i.pinimg.com/736x/0b/fd/c3/0bfdc33ce9a6e865c45ebb18d3689449.jpg" 
            alt="Barber Shop" 
            style="width: 100%; height: 800px; object-fit: cover;">
    </div>
    <br><br><br><br><br>
            <h4>Big Boss: แหวก แปลก เท่ — เพราะคุณไม่จำเป็นต้องเหมือนใคร</h4>
    <br><br><br><br><br>
    <div style="width: 100vw; position: relative; left: 50%; transform: translateX(-50%); overflow: hidden;">
        <div style="display: flex; width: 100%;">
            <img src="https://i.pinimg.com/1200x/58/c2/37/58c2376e92fdf74b3233bf12b3a5aab7.jpg" 
                alt="Barber Shop 1" 
                style="width: 50%; height: 800px; object-fit: cover;">
            <img src="https://i.pinimg.com/1200x/e5/5c/74/e55c74c8c159c86a825ae94d0d588cf9.jpg" 
                alt="Barber Shop 2" 
                style="width: 50%; height: 800px; object-fit: cover; transform: scaleX(-1);">
        </div>
    </div>
        </section>
    <?php include './components/footer.php'; ?>
</body>
</html>