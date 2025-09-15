<?php
$page = 'about';
session_start();
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เกี่ยวกับเรา | Big Boss Barber</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Kanit', sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
            color: white;
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

        .about-section {
            background: rgba(33, 37, 41, 0.95);
            padding: 2.5rem 2rem;
            max-width: 800px;
            margin: 4rem auto;
            border-radius: 1.5rem;
            box-shadow: 0 4px 32px 0 rgba(0, 0, 0, 1);
        }

        .about-section h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .about-section p {
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 1rem;
        }

        .about-highlight {
            font-size: 2.85rem;
            font-weight: 600;
            color: #ff3b3b;
            margin-top: 2rem;
        }

        .about-images {
            display: flex;
            justify-content: center;
            gap: 0;
            border-radius: 0.8rem;
            overflow: hidden;
            margin-top: 2rem;
            box-shadow: 0 4px 32px rgba(0, 0, 0, 0.25);
        }

        .about-images img {
            width: 50%;
            height: 250px;
            object-fit: cover;
        }

        .about-images img:last-child {
            transform: scaleX(-1);
        }

        @media (max-width: 768px) {
            .about-section {
                padding: 1rem;
                margin: 2rem 1rem;
            }

            .about-images {
                flex-direction: column;
            }

            .about-images img {
                width: 100%;
                height: 180px;
            }
        }
    </style>
</head>

<body class="bg-dark">
<?php include './components/header.php'; ?>

<section class="about-section">
    <h1>เกี่ยวกับเรา</h1>

    <p>Big Boss ไม่ได้เป็นแค่ร้านตัดผม แต่คือเวทีเล็ก ๆ ที่เราสร้างตัวตนใหม่ให้กับทุกคนที่ก้าวเข้ามา</p>
    <p>ที่นี่ เราเชื่อว่า “ความเท่” ไม่ได้ขึ้นอยู่กับหน้าตา แต่เกิดจากท่าที ความมั่นใจ และสไตล์ที่เป็นคุณจริง ๆ</p>
    <p>เราเอาสิ่งธรรมดาที่ใคร ๆ มองข้าม มาตีความใหม่ให้ดูแปลกตา</p>
    <p>เราเชื่อว่าความแตกต่างเล็ก ๆ สามารถเปลี่ยนทั้งภาพลักษณ์และความรู้สึกของคุณได้</p>
    <p>เพราะสำหรับเรา ความเท่ไม่ใช่การเลียนแบบ แต่คือการกล้าเป็นตัวเองอย่างภาคภูมิ</p>

    <div class="about-highlight">Big Boss แหวก แปลก เท่ — เพราะคุณไม่จำเป็นต้องเหมือนใคร</div>

    <div class="about-images">
        <img src="https://i.pinimg.com/1200x/58/c2/37/58c2376e92fdf74b3233bf12b3a5aab7.jpg" alt="Barber Shop 1">
        <img src="https://i.pinimg.com/1200x/e5/5c/74/e55c74c8c159c86a825ae94d0d588cf9.jpg" alt="Barber Shop 2">
    </div>
</section>

<?php include './components/footer.php'; ?>
</body>
</html>