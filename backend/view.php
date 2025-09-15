<?php
$page = 'view';
session_start();
 if (!isset($_SESSION['user_id'])) {
     header("Location: index.php");
     exit();
}
// เชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";          // แก้ตามของคุณ
$password = "";              // แก้ตามของคุณ
$dbname   = "barber_db";     // แก้ตามของคุณ

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . $conn->connect_error);
}

// ดึงข้อมูลทั้งหมด
$sql = "SELECT * FROM reservations ORDER BY date ASC, time ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>รายการคิว | Big Boss Barber</title>
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
            background-image: url('https://i.pinimg.com/736x/71/2e/f6/712ef6b087f64f3d7f7ea8d5735b6795.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.3;
            z-index: -1;
        }

        .status-done {
            background-color: #28a745 !important;
            color: white;
        }

        .status-wait {
            background-color: #ffc107 !important;
            color: black;
        }

        .status-cancle {
            background-color: #dc3545 !important;
            color: white;
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
    <h1 class="mb-4">รายการจองคิวทั้งหมด</h1>
    <main class="p-4 flex-grow-1">
        <table class="table table-bordered text-center">
            <thead class="bg-dark">
                <tr>
                    <th>สาขา</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>เบอร์โทร</th>
                    <th>วันที่</th>
                    <th>เวลา</th>
                    <th>เวลาที่จอง</th>
                    <th>สถานะ</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody class="bg-dark">
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
    <?php 
    $statusClass = '';
    if ($row['status'] === 'สำเร็จแล้ว') {
        $statusClass = 'status-done';
    } elseif ($row['status'] === 'รอดำเนินการ') {
        $statusClass = 'status-wait';
    } elseif ($row['status'] === 'ยกเลิกแล้ว') {
        $statusClass = 'status-cancle';
    }
?>
<tr>
    <td><?= htmlspecialchars($row['branch']) ?></td>
    <td><?= htmlspecialchars($row['fullname']) ?></td>
    <td><?= htmlspecialchars($row['phone']) ?></td>
    <td><?= htmlspecialchars($row['date']) ?></td>
    <td><?= htmlspecialchars(date("H:i", strtotime($row['time']))) ?></td>
    <td><?= htmlspecialchars($row['created_at']) ?></td>
    <td class="<?= $statusClass ?>">
        <form action="controls/status.php" method="POST" class="d-flex justify-content-center align-items-center gap-1">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <select name="status" class="form-select form-select-sm w-auto">
                <option value="รอดำเนินการ" <?= $row['status'] === 'รอดำเนินการ' ? 'selected' : '' ?>>รอดำเนินการ</option>
                <option value="สำเร็จแล้ว" <?= $row['status'] === 'สำเร็จแล้ว' ? 'selected' : '' ?>>สำเร็จแล้ว</option>
                <option value="ยกเลิกแล้ว" <?= $row['status'] === 'ยกเลิกแล้ว' ? 'selected' : '' ?>>ยกเลิกแล้ว</option>
            </select>
            <button type="submit" class="btn btn-sm btn-success">✔</button>
        </form>
    </td>
    <td class="text-center">
        <a href="edit_view.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">
            <i class="bi bi-pencil-square"></i>
        </a>
        <button class="btn btn-sm btn-danger" onclick="confirmDelete(<?= $row['id'] ?>)">
            <i class="bi bi-trash"></i>
        </button>
    </td>
            <script>
                function confirmDelete(id) {
                    Swal.fire({
                        title: 'คุณแน่ใจหรือไม่?',
                        text: "คุณต้องการลบรายการนี้หรือไม่?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'ใช่',
                        cancelButtonText: 'ยกเลิก'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href =`controls/delete_view.php?id=${id}`;
                        }
                    });
                }
            </script>
        </td>
    </tr>
<?php endwhile; ?>

                <?php else: ?>
                    <tr><td colspan="8" class="text-center">ยังไม่มีการจองคิว</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
<?php if(isset($_SESSION['success'])) : ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'สำเร็จ',
        text: '<?= $_SESSION['success']; ?>',
        confirmButtonText: 'ตกลง'
    });
</script>
<?php unset($_SESSION['success']); endif; ?>
<?php if(isset($_SESSION['error'])) : ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'ผิดพลาด',
        text: '<?= $_SESSION['error']; ?>',
        confirmButtonText: 'ตกลง'
    });
</script>
<?php unset($_SESSION['error']); endif; ?>
</body>
</html>
_
<?php
$conn->close();
?>