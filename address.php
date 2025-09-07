<?php
$page = 'address';
// session_start();
// if (!isset($_SESSION['user_id'])) {
//     header("Location: signin.php");
//     exit();
// }
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
            font-size: 85px;
            font-weight: bold;
            color: white;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 65px;
            font-weight: bold;
            color: white;
            margin-bottom: 20px;
        }

        p {
            font-size: 40px;
            font-weight: bold;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 0px 20px rgba(156, 152, 152, 1);
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
            background-image: url('https://i.pinimg.com/1200x/05/33/41/0533412dc9211773e91d283833a252af.jpg');
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
  <h1>Big Boss Barber</h1>
  <h2>ติดต่อได้ที่</h2>
  <p>สาขาสำนักงานใหญ่ สามแยกกระจับ</p>
  <p>223/2 ม.14 ต.หนองอ้อ อ.บ้านโป่ง จ.ราชบุรี 70110</p>
  <p>โทร   063 867 1888</p>

        <main class="p-4 flex-grow-1">
            <table class="table table-bordered text-center">
                <thead class="bg-dark">
                    <tr>
                        <th>ลำดับ</th>
                        <th>รูปหน้าร้าน</th>
                        <th>ชื่อสาขา</th>
                        <th>ที่อยู่</th>
                        <th>เบอร์ติดต่อ</th>
                    </tr>
                </thead>
                <tbody class="bg-dark">
                    <tr>
                        <td>1</td>
                        <td><img src="https://tse3.mm.bing.net/th/id/OIP.fiNpFCdJGgj7TrwjKeslSQHaFt?rs=1&pid=ImgDetMain&o=7&rm=3" alt="Profile"></td>
                        <td>Big Boss สาขาสามแยกกระจับ</td>
                        <td>223/2 ม.14 ต.หนองอ้อ อ.บ้านโป่ง จ.ราชบุรี 70110</td>
                        <td>092 343 8810</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><img src="https://tse2.mm.bing.net/th/id/OIP.wXvnTNRyJMispbUN7TWI1QAAAA?w=404&h=316&rs=1&pid=ImgDetMain&o=7&rm=3" alt="Profile"></td>
                        <td>Big Boss สาขามาลัยแมน</td>
                        <td>17/1 ถนนมาลัยแมน ต.ลำพยา อ.เมืองนครปฐม จ.นครปฐม 73000</td>
                        <td>092 343 9548</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><img src="https://tse2.mm.bing.net/th/id/OIP.FyVXGI_P4VAQhppQzAwnUgHaHa?w=1920&h=1920&rs=1&pid=ImgDetMain&o=7&rm=3" alt="Profile"></td>
                        <td>Big Boss สาขาต้นสน</td>
                        <td>33 ถ.ราชดำเนิน ต.พระปฐมเจดีย์ อ.เมืองนครปฐม จ.นครปฐม 73000</td>
                        <td>063 887 2719</td>
                    </tr>
                </tbody>
            </table>
        <br><br>
        </main>
    <?php include './components/footer.php'; ?>
</body>
</html>
=======
<?php
$page = 'address';
// session_start();
// if (!isset($_SESSION['user_id'])) {
//     header("Location: signin.php");
//     exit();
// }
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
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            text-align: center;
            padding: 40px;
        }

        h1 {
            font-size: 85px;
            font-weight: bold;
            color: white;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 65px;
            font-weight: bold;
            color: white;
            margin-bottom: 20px;
        }

        p {
            font-size: 40px;
            font-weight: bold;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 0px 20px rgba(156, 152, 152, 1);
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
            background-image: url('https://i.pinimg.com/1200x/05/33/41/0533412dc9211773e91d283833a252af.jpg');
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
  <h1>Big Boss Barber</h1>
  <h2>ติดต่อได้ที่</h2>
  <p>สาขาสำนักงานใหญ่ สามแยกกระจับ</p>
  <p>223/2 ม.14 ต.หนองอ้อ อ.บ้านโป่ง จ.ราชบุรี 70110</p>
  <p>โทร   063 867 1888</p>

        <main class="p-4 flex-grow-1">
            <table class="table table-bordered text-center">
                <thead class="bg-dark">
                    <tr>
                        <th>ลำดับ</th>
                        <th>รูปหน้าร้าน</th>
                        <th>ชื่อสาขา</th>
                        <th>ที่อยู่</th>
                        <th>เบอร์ติดต่อ</th>
                    </tr>
                </thead>
                <tbody class="bg-dark">
                    <tr>
                        <td>1</td>
                        <td><img src="https://tse3.mm.bing.net/th/id/OIP.fiNpFCdJGgj7TrwjKeslSQHaFt?rs=1&pid=ImgDetMain&o=7&rm=3" alt="Profile"></td>
                        <td>Big Boss สาขาสามแยกกระจับ</td>
                        <td>223/2 ม.14 ต.หนองอ้อ อ.บ้านโป่ง จ.ราชบุรี 70110</td>
                        <td>092 343 8810</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><img src="https://tse2.mm.bing.net/th/id/OIP.wXvnTNRyJMispbUN7TWI1QAAAA?w=404&h=316&rs=1&pid=ImgDetMain&o=7&rm=3" alt="Profile"></td>
                        <td>Big Boss สาขามาลัยแมน</td>
                        <td>17/1 ถนนมาลัยแมน ต.ลำพยา อ.เมืองนครปฐม จ.นครปฐม 73000</td>
                        <td>092 343 9548</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><img src="https://tse2.mm.bing.net/th/id/OIP.FyVXGI_P4VAQhppQzAwnUgHaHa?w=1920&h=1920&rs=1&pid=ImgDetMain&o=7&rm=3" alt="Profile"></td>
                        <td>Big Boss สาขาต้นสน</td>
                        <td>33 ถ.ราชดำเนิน ต.พระปฐมเจดีย์ อ.เมืองนครปฐม จ.นครปฐม 73000</td>
                        <td>063 887 2719</td>
                    </tr>
                </tbody>
            </table>
        <br><br>
        </main>
    <?php include './components/footer.php'; ?>
</body>
</html>
>>>>>>> fc641ee (update project)
