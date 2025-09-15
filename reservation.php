<?php
$page = 'reservation';
session_start();
// if (!isset($_SESSION['user_id'])) {
//     header("Location: signin.php");
//     exit();
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>จองคิวตัดผม | Big Boss Barber</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Kanit&display=swap"
        rel="stylesheet"
    />
    <!-- Bootstrap Icons -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
        rel="stylesheet"
    />
    <style>
        body {
            font-family: 'Kanit', sans-serif;
            text-align: center;
            padding: 0;
            margin: 0;
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
            z-index: -1;
        }

        .reservation-section {
            max-width: 700px;
            margin: 40px auto 40px;
            margin-top: 60px;
            background: rgba(33, 37, 41, 0.92);
            border-radius: 1.5rem;
            box-shadow: 0 4px 32px 0 rgba(0, 0, 0, 1);
            padding: 2.5rem 2rem;
            color: white;
        }

        .reservation-section h1 {
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .service-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #ffffffff;
            padding: 15px 0;
        }

        .service-item:last-child {
            border-bottom: none;
        }

        .service-item img {
            width: 150px;
            height: auto;
            border-radius: 8px;
            object-fit: cover;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .service-name {
            flex: 1;
            font-size: 1.25rem;
            text-align: left;
            font-weight: 500;
            padding-left: 10px;
        }

        .btn-light {
            background-color: #dc3545;
            border: none;
            color: white;
            font-size: 1.2rem;
            padding: 8px 24px;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
            cursor: pointer;
        }

        .btn-light:hover {
            background-color: #cf0404ff;
            color: white;
            transform: scale(1.05);
        }
    </style>
</head>

<body class="bg-dark">
    <?php include './components/header.php'; ?>

    <section class="reservation-section text-white text-center">
        <h1>บริการของเรา</h1>

        <div class="service-item">
            <img src="https://tse3.mm.bing.net/th/id/OIP.fiNpFCdJGgj7TrwjKeslSQHaFt?rs=1&pid=ImgDetMain&o=7&rm=3" alt="Big Boss สาขาสามแยกกระจับ" />
            <div class="service-name">Big Boss สาขาสามแยกกระจับ</div>
            <a href="reservation2.php?branch=<?php echo urlencode('Big Boss สาขาสามแยกกระจับ'); ?>">
                <button class="btn btn-light">จองเลย</button>
            </a>
        </div>

        <div class="service-item">
            <img src="https://tse2.mm.bing.net/th/id/OIP.wXvnTNRyJMispbUN7TWI1QAAAA?w=404&h=316&rs=1&pid=ImgDetMain&o=7&rm=3" alt="Big Boss สาขามาลัยแมน" />
            <div class="service-name">Big Boss สาขามาลัยแมน</div>
            <a href="reservation2.php?branch=<?php echo urlencode('Big Boss สาขามาลัยแมน'); ?>">
                <button class="btn btn-light">จองเลย</button>
            </a>
        </div>

        <div class="service-item">
            <img src="https://tse2.mm.bing.net/th/id/OIP.FyVXGI_P4VAQhppQzAwnUgHaHa?w=1920&h=1920&rs=1&pid=ImgDetMain&o=7&rm=3" alt="Big Boss สาขาต้นสน" />
            <div class="service-name">Big Boss สาขาต้นสน</div>
            <a href="reservation2.php?branch=<?php echo urlencode('Big Boss สาขาต้นสน'); ?>">
                <button class="btn btn-light">จองเลย</button>
            </a>
        </div>
    </section>

    <?php include './components/footer.php'; ?>
</body>

</html>