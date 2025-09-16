<?php
$page = 'index';
session_start();
// if (!isset($_SESSION['user_id'])) {
//     header("Location: signin.php");
//     exit();
// }
$host = 'localhost';
$dbname = 'it48';  // ตรวจสอบว่าถูกต้องหรือไม่
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("การเชื่อมต่อฐานข้อมูลล้มเหลว: " . $e->getMessage());
}

$sql = "SELECT * FROM haircuts ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลัก | Big Boss Barber</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@400;700&display=swap" rel="stylesheet">
    <style>
  body {
      font-family: 'Mitr', sans-serif;
      margin: 0;
      padding: 0;
      min-height: 100vh;
  }

  .hero-bg {
    position: relative;
    width: 100%;
    height: 100vh; 
    background: url('assets/imgs/hero_1.jpg') no-repeat center center fixed;
    background-size: cover;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden; 
}

  .hero-overlay {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(10, 11, 12, 0.26);
      z-index: 1;
  }

  .hero-content {
      position: relative;
      z-index: 2;
      color: #fff;
      text-align: center;
      padding: 0 1rem;
  }

  .hero-content h1 {
      font-size: 2.5rem;
      font-weight: 700;
      margin-bottom: 0.7rem;
      letter-spacing: 1px;
  }

  .hero-content p {
      font-size: 1.2rem;
      margin-bottom: 1.5rem;
  }

  .btn-main {
      background: #e63946;
      color: #fff;
      box-shadow: 0 2px 8px 0 rgba(163, 15, 15, 0.50);
      border-radius: 50px;
      padding: 0.75rem 1.5rem;
      font-size: 1.1rem;
      transition: background 0.3s ease;
  }

  .btn-main:hover {
    background-color: #cf0404ff;
    color: #fff;
    }

  @media (max-width: 600px) {
      .hero-content h1 {
          font-size: 1rem;
      }

      .white-section {
          padding: 1.2rem 0.5rem;
          margin: -30px 0.5rem 1.5rem 0.5rem;
      }
  }

  .product-container {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 32px;
      margin-top: 24px;
  }

  .product {
      background: #333333;
      padding: 18px 16px;
      border-radius: 1.5rem;
      width: 180px;
      box-shadow: 0 4px 24px 0 rgba(0, 0, 0, 0.18);
      transition: transform 0.2s, box-shadow 0.2s;
      border: 2px solid transparent;
  }

  .product:hover {
      transform: translateY(-8px) scale(1.03);
      box-shadow: 0 8px 32px 0 rgba(255, 7, 7, 0.18);
      border-color: #e63946;
  }

  .product img {
      width: 100%;
      height: 160px;
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
      color: #e63946;
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

  @media (max-width: 768px) {
      .hero-bg {
          min-height: 70vh;
      }
  }
    .hello {
        color: #e63946;
        font-weight: 700;
        margin-top: 40px;
    }
    .hello2 {
        color: #ffffffff;
        font-weight: 700;
        margin-top: 40px;
    }
        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 0px 20px rgba(156, 152, 152, 0.2);
            background: rgba(255, 255, 255, 0.96);
            border-radius: 1rem;
            overflow: hidden;
        }

        th,
        td {
            border: 1px solid #ffffff;
            padding: 16px;
            text-align: center;
            color: #232323;
            font-size: 1.2rem;
        }

        th {
            background-color: #232526;
            color: #fff;
            font-size: 1.1rem;
            font-weight: 700;
        }

        td img {
            width: 120px;
            height: 90px;
            object-fit: cover;
            border-radius: 0.7rem;
            box-shadow: 0 2px 8px #0003;
        }

        .btn-light {
            font-size: 1.1rem;
            padding: 10px 28px;
            font-weight: 600;
            border-radius: 2rem;
            background: #e63946;
            color: #fff;
            border: none;
            transition: background 0.2s, color 0.2s, transform 0.15s;
        }

        .btn-light:hover {
            background: #e63946;
            color: #fff;
            transform: scale(1.05);
        }

        .btn-delete:hover {
            opacity: 0.8;
        }

        .table-responsive {
            margin: 0 auto;
            max-width: 900px;
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 1.3rem;
            }

            th,
            td {
                font-size: 0.95rem;
                padding: 8px;
            }

            td img {
                width: 70px;
                height: 50px;
            }
        }
        .service-section {
  background: #000;
  color: #fff;
  padding: 60px 0;
  text-align: center;
}

.service-title {
  font-size: 2rem;
  font-weight: 700;
  margin-bottom: 30px;
}

.slider-container {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 20px;
  position: relative;
}

.slider-wrapper {
  width: 400px;
  height: 500px;
  position: relative;
  overflow: hidden;
}

.service-slide {
  position: absolute;
  top: 0;
  left: 0;
  width: 400px;
  height: 500px;
  opacity: 0;
  transition: opacity 0.5s ease-in-out;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 8px 30px rgba(0, 0, 0, 0.5);
}

.service-slide.active {
  opacity: 1;
  z-index: 1;
}

.service-slide img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

.slide-text {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  padding: 16px 20px;
  background: rgba(0, 0, 0, 0.6);
  color: #fff;
  text-align: left;
  backdrop-filter: blur(4px);
}

.slide-text h3 {
  font-size: 1.3rem;
  margin: 0 0 5px;
}

.slide-text p {
  margin: 0;
  font-size: 1rem;
  color: #ccc;
}

.slider-btn {
  background-color: transparent;
  color: #fff;
  font-size: 2.5rem;
  border: none;
  cursor: pointer;
  transition: transform 0.2s;
}

.slider-btn:hover {
  transform: scale(1.2);
}

.promo-item {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  border: 1px solid #2c2c2c;
}

.promo-item:hover {
  transform: scale(1.01);
  box-shadow: 0 8px 20px rgba(255, 255, 255, 0.1);
}

.promo-img {
  width: 100%;
  max-width: 300px;
  height: auto;
  aspect-ratio: 3 / 2;
  object-fit: cover;
  border-left: 2px solid #333;
}

.promotion-section {
  color: #fff;
}
.promo-item.flex-md-row-reverse .promo-img {
  border-left: none;
  border-right: 2px solid #333;
}

.promo-item .p-4 {
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.promo-item.justify-content-end > .p-4 {
  text-align: right;
}

@media (max-width: 768px) {
  .promo-img {
    width: 100%;
    border: none !important;
    border-bottom: 2px solid #333;
  }
}

.logo {
            width: 90px;
            margin: 32px auto 16px auto;
            display: block;
            filter: drop-shadow(0 2px 8px #0008);
}
    </style>
</head>

<body class="bg-dark">
    <?php include './components/header.php'; ?>
    <div class="hero-bg">
        <div class="hero-overlay"></div>
        <div class="hero-content">
        <img src="https://cdn.pixabay.com/photo/2018/01/09/14/24/head-3071690_1280.png"
        alt="Logo"
        class="logo mb-3">
            <h1>ยินดีต้อนรับสู่ Big Boss Barber</h1>
            <p>ร้านตัดผมชายสไตล์โมเดิร์น บรรยากาศอบอุ่น บริการประทับใจ</p>
            <a href="reservation.php" class="btn btn-main btn-lg"><i class="bi bi-calendar-check me-2"></i>จองคิว</a>
        </div>
    </div>


<section class="service-section text-center" style="background: linear-gradient(to bottom, #E63946, #761B21);">
  <h1 style="font-weight: 700;">บริการของเรา</h1>
  <br>
  <div class="slider-container">
    <button class="slider-btn left" onclick="prevSlide()">&#10094;</button>

    <div class="slider-wrapper">
      <div class="service-slide active">
        <img src="assets/imgs/moderncut.png" alt="ตัดผมชายสไตล์โมเดิร์น">
        <div class="slide-text">
          <h3>ตัดผมชายสไตล์โมเดิร์น</h3>
          <p style="color: #e63946">ราคา: 150.00</p>
        </div>
      </div>
      <div class="service-slide">
        <img src="assets/imgs/geonnuud.png" alt="โกนหนวดแบบคลาสสิก">
        <div class="slide-text">
          <h3>โกนหนวดแบบคลาสสิก</h3>
          <p style="color: #e63946">ราคา: 100.00</p>
        </div>
      </div>
      <div class="service-slide">
        <img src="assets/imgs/sethair.png" alt="เซ็ตผม จัดแต่งทรงผม">
        <div class="slide-text">
          <h3>เซ็ตผม จัดแต่งทรงผม</h3>
          <p style="color: #e63946">ราคา: 80.00</p>
        </div>
      </div>
    </div>

    <button class="slider-btn right" onclick="nextSlide()">&#10095;</button>
  </div>
</section>





<section class="white-section text-center py-5" style="background-color: #151618;">
    <h1 class="hello">ทรงผมยอดฮิต</h1>
    <div class="container py-4">
        <div class="row g-4">
            <?php if ($stmt->rowCount() > 0) : ?>
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                    <div class="col-6 col-md-3">
                        <div class="product">
                            <img src="/Project-main/assets/imgs/<?= htmlspecialchars($row['profile_image']); ?>" 
                                 alt="<?= htmlspecialchars($row['name']); ?>" 
                                 class="rounded-5 mb-3"
                                 style="width: 100%; max-height: 200px; object-fit: cover;">
                            
                            <div class="product-name">
                                <?= htmlspecialchars($row['name']); ?>
                            </div>

                            <div class="product-price">
                                <strong>ราคา:</strong> <?= number_format($row['price'], 2); ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <p class="text-muted">ไม่มีข้อมูลทรงผม</p>
            <?php endif; ?>
        </div>
    </div>
</section>
<section class="promotion-section py-5" style="background: linear-gradient(to bottom, #E63946, #761B21);">
  <h1 style="font-weight: 700;">
  <h1 class="text-center mb-5" style="font-weight: 700;">โปรโมชันพิเศษ</h1>

  <div class="container d-flex flex-column gap-4">

    <div class="promo-item d-flex flex-column flex-md-row-reverse align-items-center bg-dark text-white rounded-4 overflow-hidden shadow">
      <img src="assets/imgs/friends.png" alt="โปรโมชัน 2" class="promo-img">
      <div class="p-4">
        <h3 class="text-danger fw-bold">แพ็กคู่เพื่อนซี้</h3>
        <p>มา 2 คนขึ้นไป ลดทันที 10% ทุกบริการ</p>
        <p class="mb-0"><i class="bi bi-people"></i> ใช้ได้เมื่อมาใช้บริการ 2 คนขึ้นไป</p>
      </div>
    </div>
    <div class="promo-item d-flex flex-column flex-md-row align-items-center bg-dark text-white rounded-4 overflow-hidden shadow justify-content-end">
      <img src="assets/imgs/bday.png" alt="โปรโมชัน 3" class="promo-img">
      <div class="p-4">
        <h3 class="text-danger fw-bold">วันเกิดลดพิเศษ</h3>
        <p>แสดงบัตรประชาชนในวันเกิด ลดทันที 25%</p>
        <p class="mb-0"><i class="bi bi-gift"></i> ใช้ได้เฉพาะวันเกิดของคุณ</p>
      </div>
    </div>
  </div>
</section>

<script>
  const slides = document.querySelectorAll('.service-slide');
  let currentSlide = 0;

  function showSlide(index) {
    slides.forEach((slide, i) => {
      slide.classList.remove('active');
      if (i === index) {
        slide.classList.add('active');
      }
    });
  }

  function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
  }

  function prevSlide() {
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    showSlide(currentSlide);
  }

  setInterval(nextSlide, 10000);
</script>


    <script>
        <?php if (isset($_GET['success']) && $_GET['success'] == 'true') : ?>
            Swal.fire({
                icon: 'success',
                title: 'เข้าสู่ระบบสำเร็จ!',
                text: 'ยินดีต้อนรับสู่เว็บไซต์ของเรา',
                showConfirmButton: false,
                timer: 2000,
                background: '#212529',
                color: '#fff',
                footer: '<span style="color:#00adb5;">ขอให้สนุกกับการใช้งาน!</span>',
                customClass: {
                    popup: 'rounded-4 shadow'
                }
            });
        <?php endif; ?>
    </script>
    <?php include './components/footer.php'; ?>
</body>
</html>