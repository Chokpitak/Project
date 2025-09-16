<?php
$page = 'view';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname   = "it48";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . $conn->connect_error);
}

$sql = "SELECT * FROM reservations ORDER BY date ASC, time ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>รายการคิว | Big Boss Barber</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
    body {
        font-family: 'Kanit', sans-serif;
        background-color: #1a1a1a;
        margin: 0;
        padding: 0;
    }
    body::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-image: url('https://cdn.pixabay.com/photo/2019/02/25/13/38/haircut-4019676_1280.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        opacity: 0.3;
        z-index: -1;
    }

    h1 {
        font-size: 2.3rem;
        font-weight: bold;
        color: white;
        text-align: center;
        margin: 30px 0 20px;
    }

    .table-wrapper {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        padding: 20px;
    }

    .table-container {
        background: rgba(33,37,41,0.97);
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.6);
        padding: 20px;
        width: 95%;
        max-width: 1100px;
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        font-size: 1.1rem;
        font-weight: bold;
        padding: 12px;
        text-align: center;
        border-bottom: 2px solid rgba(255,255,255,0.2);
        color: #fff;
    }

    td {
        text-align: center;
        padding: 10px;
        font-size: 1rem;
        color: #fff;
        vertical-align: middle;
    }

    tr:nth-child(even) {
        background-color: rgba(255, 255, 255, 0.05);
    }

    /* สีของ select ตามสถานะ */
    .status-done select.form-select, .status-done select.form-select-sm { background-color: #28a745 !important; color: #fff !important; }
    .status-wait select.form-select, .status-wait select.form-select-sm { background-color: #fbf70a !important; color: #000 !important; }
    .status-cancle select.form-select, .status-cancle select.form-select-sm { background-color: #dc3545 !important; color: #fff !important; }

    select.form-select, select.form-select-sm {
        border-radius: 10px;
        font-weight: bold;
        min-width: 140px;
        text-align: center;
        transition: background 0.2s, color 0.2s;
    }

    .btn-warning, .btn-danger, .btn-success {
        border-radius: 10px;
    }
    </style>

</head>

<body>
<?php include './components/header.php'; ?>

<h1>รายการจองคิวทั้งหมด</h1>
<div class="table-wrapper">
<div class="table-container">
    <table>
        <thead>
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
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <?php 
                        $statusClass = '';
                        if ($row['status'] === 'สำเร็จแล้ว') $statusClass = 'status-done';
                        elseif ($row['status'] === 'รอดำเนินการ') $statusClass = 'status-wait';
                        elseif ($row['status'] === 'ยกเลิกแล้ว') $statusClass = 'status-cancle';
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
                                <select name="status" class="form-select form-select-sm">
                                    <option value="รอดำเนินการ" <?= $row['status'] === 'รอดำเนินการ' ? 'selected' : '' ?>>รอดำเนินการ</option>
                                    <option value="สำเร็จแล้ว" <?= $row['status'] === 'สำเร็จแล้ว' ? 'selected' : '' ?>>สำเร็จแล้ว</option>
                                    <option value="ยกเลิกแล้ว" <?= $row['status'] === 'ยกเลิกแล้ว' ? 'selected' : '' ?>>ยกเลิกแล้ว</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-success">✔</button>
                            </form>
                        </td>
                        <td>
                            <a href="edit_view.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <button class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $row['id'] ?>)">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="8">ยังไม่มีการจองคิว</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</div>
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
            window.location.href = `controls/delete_view.php?id=${id}`;
        }
    });
}
</script>

<?php if(isset($_SESSION['success'])) : ?>
<script>
    Swal.fire({ icon: 'success', title: 'สำเร็จ', text: '<?= $_SESSION['success']; ?>', confirmButtonText: 'ตกลง' });
</script>
<?php unset($_SESSION['success']); endif; ?>

<?php if(isset($_SESSION['error'])) : ?>
<script>
    Swal.fire({ icon: 'error', title: 'ผิดพลาด', text: '<?= $_SESSION['error']; ?>', confirmButtonText: 'ตกลง' });
</script>
<?php unset($_SESSION['error']); endif; ?>

</body>
</html>

<?php $conn->close(); ?>