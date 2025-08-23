<?php
$page = 'about';
session_start();
// if (!isset($_SESSION['user_id'])) {
//     header("Location: signin.php");
//     exit();
// }
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เกี่ยวกับเรา | Big Boss Barber</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background-color: #212529;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            position: relative;
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
            width: 100px;
            margin: 40px auto 24px auto;
            display: block;
            filter: drop-shadow(0 2px 8px #0008);
        }
        .about-section {
            max-width: 900px;
            margin: 0 auto;
            background: rgba(33,37,41,0.92);
            border-radius: 1.5rem;
            box-shadow: 0 4px 32px 0 rgba(0,0,0,0.18);
            padding: 2.5rem 2rem 2rem 2rem;
        }
        h1 {
            font-size: 3rem;
            font-weight: bold;
            color: #ffc107;
            margin-bottom: 1.5rem;
            text-shadow: 0 2px 8px #0008;
        }
        h2 {
            font-size: 1.5rem;
            color: #fff;
            margin-bottom: 2rem;
            font-weight: 400;
            line-height: 1.7;
        }
        h4 {
            font-size: 2rem;
            color: #ffc107;
            margin: 2.5rem 0 1.5rem 0;
            font-weight: 600;
            text-shadow: 0 2px 8px #0008;
        }
        .about-images {
            display: flex;
            width: 100%;
            gap: 0;
            border-radius: 1.2rem;
            overflow: hidden;
            margin-top: 2.5rem;
            box-shadow: 0 4px 32px 0 rgba(0,0,0,0.18);
        }
        .about-images img {
            width: 50%;
            height: 350px;
            object-fit: cover;
        }
        .about-images img:last-child {
            transform: scaleX(-1);
        }
        @media (max-width: 991.98px) {
            .about-section {
                padding: 1.2rem 0.5rem;
            }
            h1 {
                font-size: 2rem;
            }
            h2 {
                font-size: 1.1rem;
            }
            h4 {
                font-size: 1.2rem;
            }
            .about-images img {
                height: 180px;
            }
            .logo {
                width: 60px;
                margin-top: 16px;
            }
        }
        @media (max-width: 576px) {
            .about-section {
                padding: 0.7rem 0.2rem;
            }
            .about-images {
                flex-direction: column;
            }
            .about-images img {
                width: 100%;
                height: 140px;
            }
        }
    </style>
</head>

<body class="bg-dark">
<?php include './components/header.php'; ?>

    <!-- โลโก้ร้าน -->
    <img src="https://cdn.pixabay.com/photo/2018/01/09/14/24/head-3071690_1280.png"
        alt="Logo"
        class="logo mb-3">

    <!-- กล่องเนื้อหาเกี่ยวกับเรา -->
    <section class="about-section text-white text-center">
        <h1>เกี่ยวกับเรา</h1>
        <h2>
            Big Boss ไม่ได้เป็นแค่ร้านตัดผม แต่คือเวทีเล็ก ๆ ที่เราสร้างตัวตนใหม่ให้กับทุกคนที่ก้าวเข้ามา<br>
            ที่นี่ เราเชื่อว่า “ความเท่” ไม่ได้ขึ้นอยู่กับหน้าตา แต่เกิดจากท่าที ความมั่นใจ และสไตล์ที่เป็นคุณจริง ๆ<br><br>
            เราเอาสิ่งธรรมดาที่ใคร ๆ มองข้าม มาตีความใหม่ให้ดูแปลกตา<br>
            เราเชื่อว่าความแตกต่างเล็ก ๆ สามารถเปลี่ยนทั้งภาพลักษณ์และความรู้สึกของคุณได้<br>
            เพราะสำหรับเรา ความเท่ไม่ใช่การเลียนแบบ แต่คือการกล้าเป็นตัวเองอย่างภาคภูมิ
        </h2>
        <h4>Big Boss แหวก แปลก เท่ — เพราะคุณไม่จำเป็นต้องเหมือนใคร</h4>
        <div class="about-images mt-4">
            <img src="https://i.pinimg.com/1200x/58/c2/37/58c2376e92fdf74b3233bf12b3a5aab7.jpg" 
                alt="Barber Shop 1">
            <img src="https://i.pinimg.com/1200x/e5/5c/74/e55c74c8c159c86a825ae94d0d588cf9.jpg" 
                alt="Barber Shop 2">
        </div>
    </section>

    <?php include './components/footer.php'; ?>
</body>
</html>