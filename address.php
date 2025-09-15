<?php
$page = 'address';
session_start();
?>
<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ที่อยู่ | Big Boss Barber</title>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Kanit', sans-serif;
      background-color: #212529;
      color: white;
      margin: 0;
      padding: 0;
      text-align: center;
    }

    body::before {
      content: "";
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: url('https://i.pinimg.com/1200x/05/33/41/0533412dc9211773e91d283833a252af.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      opacity: 0.3;
      z-index: -1;
    }

    .address-container {
  max-width: 1200px;
  margin: 100px auto 50px;
}

.address-card {
  background: rgba(33, 37, 41, 0.95);
  border-radius: 1.5rem;
  box-shadow: 0 4px 32px 0 rgba(0, 0, 0, 1);
}

.branch {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.branch > div {
  padding: 5px;
}

  </style>
</head>

<body>
  <?php include './components/header.php'; ?>

  <div class="address-container text-white">
  <h1 class="text-center mb-4">Big Boss Barber</h1>
  <h2 class="text-center mb-2">ติดต่อได้ที่</h2>
  <p class="text-center mb-1">สาขาสำนักงานใหญ่ สามแยกกระจับ</p>
  <p class="text-center mb-1">223/2 ม.14 ต.หนองอ้อ อ.บ้านโป่ง จ.ราชบุรี 70110</p>
  <p class="text-center mb-4">โทร 063 867 1888</p>

  <div class="address-card bg-dark p-4 rounded">
    <div class="branch d-flex align-items-center justify-content-between py-3 border-bottom">
      <div class="col-1 fw-bold text-center">1</div>
      <div class="col-2 text-center">
        <img src="https://tse3.mm.bing.net/th/id/OIP.fiNpFCdJGgj7TrwjKeslSQHaFt?rs=1&pid=ImgDetMain&o=7&rm=3" class="img-fluid rounded" width="100">
      </div>
      <div class="col-3">Big Boss สาขาสามแยกกระจับ</div>
      <div class="col-4">223/2 ม.14 ต.หนองอ้อ อ.บ้านโป่ง จ.ราชบุรี 70110</div>
      <div class="col-2">092 343 8810</div>
    </div>

    <div class="branch d-flex align-items-center justify-content-between py-3 border-bottom">
      <div class="col-1 fw-bold text-center">2</div>
      <div class="col-2 text-center">
        <img src="https://tse2.mm.bing.net/th/id/OIP.wXvnTNRyJMispbUN7TWI1QAAAA?w=404&h=316&rs=1&pid=ImgDetMain&o=7&rm=3" class="img-fluid rounded" width="100">
      </div>
      <div class="col-3">Big Boss สาขามาลัยแมน</div>
      <div class="col-4">17/1 ถนนมาลัยแมน ต.ลำพยา อ.เมืองนครปฐม จ.นครปฐม 73000</div>
      <div class="col-2">092 343 9548</div>
    </div>

    <div class="branch d-flex align-items-center justify-content-between py-3">
      <div class="col-1 fw-bold text-center">3</div>
      <div class="col-2 text-center">
        <img src="https://tse2.mm.bing.net/th/id/OIP.FyVXGI_P4VAQhppQzAwnUgHaHa?w=1920&h=1920&rs=1&pid=ImgDetMain&o=7&rm=3" class="img-fluid rounded" width="100">
      </div>
      <div class="col-3">Big Boss สาขาต้นสน</div>
      <div class="col-4">33 ถ.ราชดำเนิน ต.พระปฐมเจดีย์ อ.เมืองนครปฐม จ.นครปฐม 73000</div>
      <div class="col-2">063 887 2719</div>
    </div>
  </div>
</div>


  <?php include './components/footer.php'; ?>
</body>
</html>