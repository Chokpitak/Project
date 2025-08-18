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
        }

        .product-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
            margin-top: 30px;
        }

        .product {
            background-color: rgba(37, 37, 37, 1);
            padding: 20px;
            border-radius: 10px;
            width: 200px;
            box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);
        }

        .product img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 10px;
        }

        .product-name {
            margin-top: 15px;
            font-size: 16px;
            color: rgba(255, 255, 255, 1);
            font-weight: 500;
        }

        .product-price {
            font-size: 14px;
            color: rgba(255, 255, 255, 1);
            margin-top: 5px;
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
            background-image: url('https://img.freepik.com/premium-photo/professional-barber-tools-laid-out-dark-wooden-surface_93675-163594.jpg');
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
        <h1>ทรงผมยอดฮิต</h1>
        <div class="product-container">
            <div class="product">
                <img src="https://i.pinimg.com/736x/c0/78/ca/c078ca742def4d8f1581fb6e7e928ae9.jpg" alt="Product 1">
                <div class="product-name">I'm a product</div>
                <div class="product-price">$15.00</div>
            </div>
            <div class="product">
                <img src="https://static.trueplookpanya.com/tppy/member/m_545000_547500/546742/cms/images/1-2018/%E0%B8%97%E0%B8%A3%E0%B8%87%E0%B8%9C%E0%B8%A1%E0%B9%80%E0%B8%97%E0%B9%88%E0%B9%86%20%E0%B8%9C%E0%B8%B9%E0%B9%89%E0%B8%8A%E0%B8%B2%E0%B8%A2-1.jpg" alt="Product 2">
                <div class="product-name">I'm a product</div>
                <div class="product-price">$15.00</div>
            </div>
            <div class="product">
                <img src="https://www.ktc.co.th/pub/media/Article/07/ktc-1-Undercut.webp" alt="Product 3">
                <div class="product-name">I'm a product</div>
                <div class="product-price">$15.00</div>
            </div>
            <div class="product">
                <img src="https://www.ktc.co.th/pub/media/Article/07/ktc-19-Crew-Cut.webp" alt="Product 4">
                <div class="product-name">I'm a product</div>
                <div class="product-price">$15.00</div>
            </div>
        </div>

        <div class="product-container">
            <div class="product">
                <img src="https://www.jeab.com/wp-content/uploads/2014/11/1.jpg" alt="Product 1">
                <div class="product-name">I'm a product</div>
                <div class="product-price">$15.00</div>
            </div>
            <div class="product">
                <img src="https://s.isanook.com/me/0/ud/1/5905/chicministry-s2-tyson-beckford.jpg" alt="Product 2">
                <div class="product-name">I'm a product</div>
                <div class="product-price">$15.00</div>
            </div>
            <div class="product">
                <img src="https://c.files.bbci.co.uk/FAEC/production/_105863246_052682295.jpg" alt="Product 3">
                <div class="product-name">I'm a product</div>
                <div class="product-price">$15.00</div>
            </div>
            <div class="product">
                <img src="https://preview.redd.it/5dw1desyv2841.jpg?width=640&crop=smart&auto=webp&s=657fff9170eb7e89eb896cde3dfb236aa878f349" alt="Product 4">
                <div class="product-name">I'm a product</div>
                <div class="product-price">$15.00</div>
            </div>
        </div>
    </section>
    <?php include './components/footer.php'; ?>
</body>
</html>
