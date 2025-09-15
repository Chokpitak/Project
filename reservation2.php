<?php
$page = 'reservation';
session_start();
date_default_timezone_set('Asia/Bangkok');

if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}

$host = 'localhost';
$dbname = 'it48';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("การเชื่อมต่อฐานข้อมูลล้มเหลว: " . $e->getMessage());
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// ถ้าไม่เจอผู้ใช้
if (!$user) {
    die("ไม่พบข้อมูลผู้ใช้");
}

// เช็คสาขา
if (!isset($_GET['branch'])) {
    header("Location: reservation.php");
    exit();
}

$branch = htmlspecialchars($_GET['branch']);

// ตรวจสอบว่ามีการจองที่รอดำเนินการอยู่หรือไม่
$sqlCheck = "SELECT * FROM reservations WHERE user_id = :user_id AND status = 'รอดำเนินการ'";
$stmtCheck = $conn->prepare($sqlCheck);
$stmtCheck->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmtCheck->execute();
$pendingReservation = $stmtCheck->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>จองคิวที่ <?= $branch ?> | Big Boss Barber</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/th.js"></script>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap" rel="stylesheet" />

    <style>
        body {
            text-align: center;
            font-family: 'Kanit', sans-serif;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-image: url('https://uploads-ssl.webflow.com/5cac67740ca8b550d4e98db6/5cd8d2041cfc8a0e6eaf5217_Barber-Industries-Parramatta-05-p-1080.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.25;
            z-index: -1;
        }

        .card {
            background: rgba(33, 37, 41, 0.95);
            border-radius: 1.5rem;
            box-shadow: 0 4px 32px 0 rgba(0, 0, 0, 1);
            border: none;
        }

        h1 {
            font-size: 2.2rem;
            font-weight: 600;
            color: #fff;
            margin-bottom: 1.5rem;
        }

        label.form-label {
            color: #fff;
            font-weight: 500;
        }

        .form-control {
            background: #343a40;
            color: #fff;
            border: 1px solid #444;
            border-radius: 0.75rem;
        }

        .form-control:focus {
            background: #23272b;
            border-color: #e63946;
            box-shadow: 0 0 0 0.2rem rgba(163, 15, 15, 0.50);
            color: #fff;
        }

        .btn-light {
            font-weight: 600;
            border-radius: 0.75rem;
            background: #e63946;
            color: #fff;
            box-shadow: 0 2px 8px 0 rgba(163, 15, 15, 0.50);
            transition: background 0.2s;
            border: none;
        }

        .btn-light:hover {
            background: #cf0404ff;
            color: #fff;
        }

        .card-body {
            padding: 2.5rem 2rem;
        }

        .user-container {
            display: flex;
            justify-content: center;
            margin-bottom: 24px;
        }

        .input-group-text {
            background: #e63946;
            color: #fff;
            border: none;
        }

        @media (max-width: 576px) {
            .card-body {
                padding: 1.2rem 0.5rem;
            }

            h1 {
                font-size: 1.3rem;
            }

            .logo {
                width: 60px;
                margin-top: 16px;
            }
        }
    </style>
</head>

<body class="bg-dark">
    <?php include './components/header.php'; ?>
    <br /><br />
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
        <div class="card w-100" style="max-width: 430px;">
            <div class="card-body">
                <h1>จองคิวที่ <?= $branch ?></h1>

                <!-- รูปโปรไฟล์ของผู้ใช้ -->
                <div class="user-container">
                    <?php if (!empty($user['profile_image'])): ?>
                        <img src="<?= htmlspecialchars('./assets/imgs/' . $user['profile_image']); ?>"
                             alt="Profile Image"
                             class="rounded-circle shadow mb-3"
                             style="width: 120px; height: 120px; object-fit: cover; border: 3px solid #e63946;">
                    <?php else: ?>
                        <div class="rounded-circle shadow mb-3 bg-light d-flex align-items-center justify-content-center"
                             style="width: 120px; height: 120px; border: 3px solid #e63946;">
                            <i class="bi bi-person-circle" style="font-size: 3rem; color: #e63946;"></i>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if ($pendingReservation): ?>
                    <div class="alert alert-warning text-start" role="alert">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        คุณมีการจองที่กำลัง <strong>รอดำเนินการ</strong> อยู่ กรุณารอให้ดำเนินการเสร็จสิ้นก่อนทำการจองใหม่
                    </div>
                    <a href="view.php" class="btn btn-light w-100 mt-2">
                        <i class="bi bi-eye"></i> ดูสถานะการจอง
                    </a>
                <?php else: ?>
                    <form action="reservation3.php" method="post" autocomplete="off">
                        <input type="hidden" name="branch" value="<?= $branch ?>" />
                        <input type="hidden" name="user_id" value="<?= htmlspecialchars($user['id']) ?>" />

                        <div class="mb-3 text-start">
                            <label class="form-label">ชื่อ-นามสกุล</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" name="fullname" class="form-control"
                                       value="<?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?>" required readonly />
                            </div>
                        </div>

                        <div class="mb-3 text-start">
                            <label class="form-label">เบอร์โทร</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                <input type="text" name="phone" class="form-control"
                                       value="<?= htmlspecialchars($user['phone']) ?>" required readonly />
                            </div>
                        </div>

                        <div class="mb-3 text-start">
                            <label class="form-label">วันที่จอง</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                                <input type="text" id="datepicker" name="date" class="form-control" required />
                            </div>
                        </div>

                        <div class="mb-3 text-start">
                            <label class="form-label">เวลา</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-alarm"></i></span>
                                <input type="text" id="timepicker" name="time" class="form-control" required />
                            </div>
                            <small class="text-white">*เลือกเวลาระหว่าง 09:00 - 20:00</small>
                        </div>

                        <button type="submit" class="btn btn-light w-100 mt-2">ยืนยันการจอง</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <br>

    <script>
        flatpickr("#datepicker", {
            dateFormat: "Y-m-d",
            locale: "th",
            minDate: "today",
        });

        flatpickr("#timepicker", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            minTime: "09:00",
            maxTime: "20:00",
            locale: "th",
        });
    </script>
    <?php include './components/footer.php'; ?>
</body>
</html>