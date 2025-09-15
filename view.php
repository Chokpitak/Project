<?php
$page = 'reservation';
session_start();

// เชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname   = "barber_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . $conn->connect_error);
}

// อัปเดตสถานะเป็น 'ยกเลิกแล้ว' ถ้าเลยเวลานัดหมายไปมากกว่า 45 นาที และยังเป็น 'รอดำเนินการ'
$update_sql = "
    UPDATE reservations
    SET status = 'ยกเลิกแล้ว'
    WHERE 
        status = 'รอดำเนินการ'
        AND TIMESTAMP(date, time) < NOW() - INTERVAL 45 MINUTE
";
$conn->query($update_sql);

// ดึงข้อมูลรายการจอง
$sql = "
    SELECT * FROM reservations 
    WHERE 
        status = 'รอดำเนินการ' 
        OR (
            (status = 'สำเร็จแล้ว' OR status = 'ยกเลิกแล้ว') 
            AND DATE_ADD(date, INTERVAL 1 DAY) >= CURDATE()
        )
    ORDER BY created_at DESC
";

$result = $conn->query($sql);

function getStatusClass($status) {
    switch ($status) {
        case 'สำเร็จแล้ว': return 'status-done';
        case 'รอดำเนินการ': return 'status-wait';
        case 'ยกเลิกแล้ว': return 'status-cancle';
        default: return '';
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>รายการคิว | Big Boss Barber</title>
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
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            font-family: 'Kanit', sans-serif;
            color: white;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: url('https://i.pinimg.com/736x/71/2e/f6/712ef6b087f64f3d7f7ea8d5735b6795.jpg');
            background-size: cover;
            background-position: center;
            opacity: 0.3;
            z-index: -1;
        }

        main {
            flex: 1;
            padding: 80px 16px 40px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        .card-list {
            width: 100%;
            max-width: 1000px;
            background: rgba(33, 37, 41, 0.95);
            border-radius: 1.5rem;
            padding: 24px;
            box-shadow: 0 4px 32px 0 rgba(0, 0, 0, 1);
        }

        h1 {
            font-size: 2rem;
            font-weight: 900;
            margin-bottom: 32px;
            text-align: center;
        }

        .header-row {
            display: flex;
            justify-content: space-between;
            font-size: 1.1rem;
            padding: 10px;
            margin-bottom: 12px;
            border-bottom: 3px solid #ffffff;
        }

        .header-row > div,
        .card-item > div {
            flex: 1;
            text-align: center;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .header-row > div:first-child,
        .card-item > div:first-child {
            flex: 2;
            text-align: left;
        }

        .header-row > div:last-child,
        .card-item > div:last-child {
            flex: 1.5;
        }

        .card-item {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            border-bottom: 1px solid #ffffff;
            font-size: 0.95rem;
            align-items: center;
        }

        .card-item > div:nth-child(6) {
            white-space: normal;
            overflow: visible;
        }

        .card-item.last-item {
            border-bottom: none;
        }

        .status-done,
        .status-wait,
        .status-cancle {
            font-weight: 700;
            padding: 6px 16px;
            border-radius: 25px;
            display: inline-block;
            user-select: none;
        }

        .status-done {
            background-color: #28a745;
            color: white;
        }

        .status-wait {
            background-color: #ffc107;
            color: #222;
        }

        .status-cancle {
            background-color: #dc3545;
            color: white;
        }

        .btn-back {
            position: absolute;
            top: 20px;
            right: 20px;
            border: 2px solid white;
            color: white;
            background-color: transparent;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            background-color: #ffc107;
            color: black;
            border-color: #ffc107;
        }

        @media (max-width: 768px) {
            .header-row, .card-item {
                font-size: 0.9rem;
            }

            .card-item > div:nth-child(6) {
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body class="bg-dark">
    <?php include './components/header.php'; ?>

    <main>
        <div class="card-list">
            <h1>รายการจองคิวทั้งหมด</h1>
            <div class="header-row">
                <div>สาขา</div>
                <div>ชื่อ-นามสกุล</div>
                <div>เบอร์โทร</div>
                <div>วันที่</div>
                <div>เวลา</div>
                <div>เวลาที่จอง</div>
                <div>สถานะ</div>
            </div>

            <?php if ($result && $result->num_rows > 0): ?>
                <?php
                    $rows = $result->fetch_all(MYSQLI_ASSOC);
                    $totalRows = count($rows);
                    foreach ($rows as $index => $row):
                        $isLast = ($index === $totalRows - 1);
                        $statusClass = getStatusClass($row['status']);
                ?>
                    <div class="card-item <?= $isLast ? 'last-item' : '' ?>">
                        <div><?= htmlspecialchars($row['branch']) ?></div>
                        <div><?= htmlspecialchars($row['fullname']) ?></div>
                        <div><?= htmlspecialchars($row['phone']) ?></div>
                        <div><?= htmlspecialchars($row['date']) ?></div>
                        <div><?= htmlspecialchars(date("H:i", strtotime($row['time']))) ?></div>
                        <div><?= htmlspecialchars($row['created_at']) ?></div>
                        <div><span class="<?= $statusClass ?>"><?= htmlspecialchars($row['status']) ?></span></div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="card-item" style="justify-content:center; font-weight: 600; color:#fff;">
                    ยังไม่มีการจองคิว
                </div>
            <?php endif; ?>
        </div>
    </main>
    <?php include './components/footer.php'; ?>
</body>
</html>
<?php $conn->close(); ?>