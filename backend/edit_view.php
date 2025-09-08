<?php
    include 'controls/id_view.php';
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>รายการจองคิว</title>
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
            /* 👈 ปรับค่าตามความจางที่ต้องการ */
            z-index: -1;
        }

                .card {
            border-radius: 20px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.15);
        }
        .form-label {
            font-weight: 500;
        }
        .bg-secondary {
            background: rgba(60,60,60,0.85) !important;
        }
        .btn-dark {
            font-size: 1.1rem;
            font-weight: 500;
            letter-spacing: 1px;
        }
        .input-group-text {
            background: #212529;
            color: #fff;
            border: none;
        }
        .form-control:focus {
            box-shadow: 0 0 0 0.2rem #21252933;
        }
        .icon {
            margin-right: 8px;
        }

        body{
            font-family: "Mitr", sans-serif;
        }
    </style>
</head>
<style>
    body {
        font-family: 'Kanit', sans-serif;
    }
</style>

<body class="bg-dark">
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh; max-width: 900px;">
        <div class="card bg-secondary text-white" style="width: 50%;">
            <div class="row g-0">
                <div class="card-body p-4">
                    <h2 class="text-center mb-4">
                        <span class="icon"><i class="bi bi-person-plus-fill"></i></span>
                        แก้ไขข้อมูลการจอง
                    </h2>
        <form action="controls/edit_viewB.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $user['id']; ?>">
            <div class="mb-3">
                <label for="">สาขา</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" name="branch" class="form-control" value="<?= htmlspecialchars($user['branch']); ?>">
                </div>
            </div>
            <div class="mb-3">
                <label for="">ชื่อ-นามสกุล</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" name="fullname" class="form-control" value="<?= htmlspecialchars($user['fullname']); ?>">
                </div>
            </div>
            <div class="mb-3">
                <label for="">เบอร์โทร</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($user['phone']); ?>">
                </div>
            </div>
            <div class="mb-3">
                <label for="">วันที่</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" id="datepicker" name="date" class="form-control" value="<?= htmlspecialchars($user['date']); ?>">
                </div>
            </div>
            <div class="mb-3">
                <label for="">เวลา</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" id="timepicker" name="time" class="form-control" value="<?= htmlspecialchars($user['time']); ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
            <button type="reset" class="btn btn-danger">รีเซ็ต</button>
            <a href="view.php" class="btn btn-dark">ย้อนกลับ</a>
        </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>