<?php
$page = 'haircut';
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
    <title>ทรงผมยอดฮิต | Big Boss Barber</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            background-image: url('https://img.freepik.com/premium-photo/professional-barber-tools-laid-out-dark-wooden-surface_93675-163594.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.25;
            z-index: -1;
        }
        .logo {
            width: 90px;
            margin: 32px auto 16px auto;
            display: block;
            filter: drop-shadow(0 2px 8px #0008);
        }
        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #ffc107;
            margin-bottom: 2rem;
            letter-spacing: 1px;
            text-shadow: 0 2px 8px #0008;
        }
        .product-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 32px;
            margin-top: 24px;
        }
        .product {
            background: rgba(33,37,41,0.97);
            padding: 18px 16px 16px 16px;
            border-radius: 1.5rem;
            width: 210px;
            box-shadow: 0 4px 24px 0 rgba(0,0,0,0.18);
            transition: transform 0.2s, box-shadow 0.2s;
            border: 2px solid transparent;
        }
        .product:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 8px 32px 0 rgba(255,193,7,0.18);
            border-color: #ffc107;
        }
        .product img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 1rem;
            box-shadow: 0 2px 12px #0004;
        }
        .product-name {
            margin-top: 14px;
            font-size: 1.1rem;
            color: #fff;
            font-weight: 600;
            min-height: 2.5em;
        }
        .product-price {
            font-size: 1rem;
            color: #ffc107;
            margin-top: 4px;
            font-weight: 500;
        }
        @media (max-width: 991.98px) {
            .product-container {
                gap: 20px;
            }
            .product {
                width: 45vw;
                min-width: 170px;
                max-width: 260px;
            }
        }
        @media (max-width: 576px) {
            .logo {
                width: 60px;
                margin-top: 16px;
            }
            h1 {
                font-size: 1.3rem;
            }
            .product-container {
                gap: 12px;
            }
            .product {
                width: 90vw;
                min-width: 140px;
                max-width: 100%;
                padding: 10px 6px 12px 6px;
            }
            .product img {
                height: 140px;
            }
        }
    </style>
</head>

<body class="bg-dark">
    <div>
        <?php include './components/header.php'; ?>
    </div>
    
    <img src="https://cdn.pixabay.com/photo/2018/01/09/14/24/head-3071690_1280.png" alt="Logo" class="logo mb-3">
    <section class="hero text-white text-center py-4">
        <h1>ทรงผมยอดฮิต</h1>
        <div class="container">
            <div class="product-container">
                <div class="product">
                    <img src="https://i.pinimg.com/736x/c0/78/ca/c078ca742def4d8f1581fb6e7e928ae9.jpg" alt="ทรงผม 1">
                    <div class="product-name">Undercut</div>
                    <div class="product-price">150 บาท</div>
                </div>
                <div class="product">
                    <img src="https://static.trueplookpanya.com/tppy/member/m_545000_547500/546742/cms/images/1-2018/%E0%B8%97%E0%B8%A3%E0%B8%87%E0%B8%9C%E0%B8%A1%E0%B9%80%E0%B8%97%E0%B9%88%E0%B9%86%20%E0%B8%9C%E0%B8%B9%E0%B9%89%E0%B8%8A%E0%B8%B2%E0%B8%A2-1.jpg" alt="ทรงผม 2">
                    <div class="product-name">Two Block</div>
                    <div class="product-price">150 บาท</div>
                </div>
                <div class="product">
                    <img src="https://www.ktc.co.th/pub/media/Article/07/ktc-1-Undercut.webp" alt="ทรงผม 3">
                    <div class="product-name">Fade</div>
                    <div class="product-price">150 บาท</div>
                </div>
                <div class="product">
                    <img src="https://www.ktc.co.th/pub/media/Article/07/ktc-19-Crew-Cut.webp" alt="ทรงผม 4">
                    <div class="product-name">Crew Cut</div>
                    <div class="product-price">120 บาท</div>
                </div>
            </div>
            <div class="product-container">
                <div class="product">
                    <img src="https://www.jeab.com/wp-content/uploads/2014/11/1.jpg" alt="ทรงผม 5">
                    <div class="product-name">Buzz Cut</div>
                    <div class="product-price">100 บาท</div>
                </div>
                <div class="product">
                    <img src="https://s.isanook.com/me/0/ud/1/5905/chicministry-s2-tyson-beckford.jpg" alt="ทรงผม 6">
                    <div class="product-name">Pompadour</div>
                    <div class="product-price">180 บาท</div>
                </div>
                <div class="product">
                    <img src="https://c.files.bbci.co.uk/FAEC/production/_105863246_052682295.jpg" alt="ทรงผม 7">
                    <div class="product-name">Side Part</div>
                    <div class="product-price">150 บาท</div>
                </div>
                <div class="product">
                    <img src="https://preview.redd.it/5dw1desyv2841.jpg?width=640&crop=smart&auto=webp&s=657fff9170eb7e89eb896cde3dfb236aa878f349" alt="ทรงผม 8">
                    <div class="product-name">French Crop</div>
                    <div class="product-price">150 บาท</div>
                </div>
            </div>
        </div>
    </section>
    <?php include './components/footer.php'; ?>
</body>
=======
<?php
$page = 'haircut';
session_start();

// if (!isset($_SESSION['user_id'])) {
//     header("Location: signin.php");
//     exit();
// }

$host = 'localhost';
$dbname = 'haircut_db';  // ตรวจสอบว่าถูกต้องหรือไม่
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("การเชื่อมต่อฐานข้อมูลล้มเหลว: " . $e->getMessage());
}

// 🔥 เพิ่มส่วนนี้เพื่อดึงข้อมูลทรงผม
$sql = "SELECT * FROM haircuts ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ทรงผมยอดฮิต | Big Boss Barber</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            text-align: center;
            padding: 40px;
            font-family: 'Kanit', sans-serif;
        }
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-image: url('https://img.freepik.com/premium-photo/professional-barber-tools-laid-out-dark-wooden-surface_93675-163594.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.25;
            z-index: -1;
        }
        .logo {
            width: 90px;
            margin: 32px auto 16px auto;
            display: block;
            filter: drop-shadow(0 2px 8px #0008);
        }
        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #ffc107;
            margin-bottom: 2rem;
            letter-spacing: 1px;
            text-shadow: 0 2px 8px #0008;
        }
        .user-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 32px;
            margin-top: 24px;
        }
        .user {
            background: rgba(33,37,41,0.97);
            padding: 18px 16px 16px 16px;
            border-radius: 1.5rem;
            width: 210px;
            box-shadow: 0 4px 24px 0 rgba(0,0,0,0.18);
            transition: transform 0.2s, box-shadow 0.2s;
            border: 2px solid transparent;
        }
        .user:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 8px 32px 0 rgba(255,193,7,0.18);
            border-color: #ffc107;
        }
        .user img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 1rem;
            box-shadow: 0 2px 12px #0004;
        }
        .user-name {
            margin-top: 14px;
            font-size: 1.1rem;
            color: #fff;
            font-weight: 600;
            min-height: 2.5em;
        }
        .user-price {
            font-size: 1rem;
            color: #ffc107;
            margin-top: 8px;
            font-weight: 500;
            line-height: 1.5;
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }
        .user-price strong {
            white-space: nowrap;
        }
        .user-info {
            color: #fff;
        }
        @media (max-width: 991.98px) {
            .user-container {
                gap: 20px;
            }
            .user {
                width: 45vw;
                min-width: 170px;
                max-width: 260px;
            }
        }
        @media (max-width: 576px) {
            .logo {
                width: 60px;
                margin-top: 16px;
            }
            h1 {
                font-size: 1.3rem;
            }
            .user-container {
                gap: 12px;
            }
            .user {
                width: 90vw;
                min-width: 140px;
                max-width: 100%;
                padding: 10px 6px 12px 6px;
            }
            .user img {
                height: 140px;
            }
        }
    </style>
</head>

<body class="bg-dark">
    <div>
        <?php include './components/header.php'; ?>
    </div>
    
    <img src="https://cdn.pixabay.com/photo/2018/01/09/14/24/head-3071690_1280.png" alt="Logo" class="logo mb-3">
    <section class="hero text-white text-center py-4">
        <h1>ทรงผมยอดฮิต</h1>
        <div class="container">
        <?php if($stmt->rowCount() > 0) : ?>
            <div class="user-container">
                <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="user">
                        <img src="/Project-main/assets/imgs/<?= htmlspecialchars($row['profile_image']); ?>" 
                                         alt="" 
                                         class="rounded-5 mb-3"
                                         style="width: 100%; max-height: 200px; object-fit: cover;">  
                        <div class="user-name">
                            <?php echo htmlspecialchars($row['name']); ?>
                        </div>
                        <div class="user-price"><strong>ราคา:</strong> <div class="user-info"><?php echo htmlspecialchars($row['price']); ?></div></div>
                    </div>
                <?php } ?>
            </div>
        <?php endif ?>
    </div>
    </section>
    <?php include './components/footer.php'; ?>
</body>
>>>>>>> fc641ee (update project)
</html>