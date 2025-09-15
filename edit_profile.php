<?php
    include 'controls/id_user.php';
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>แก้ไขโปรไฟล์ | Big Boss Barber</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">

    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background-color: #343a40;
            color: #fff;
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

        .btn-main {
            background: rgba(75, 255, 4, 1);
            color: #fff;
            box-shadow: 0 2px 8px 0 rgba(20, 99, 0, 1);
            border-radius: 50px;
            padding: 0.75rem 1.5rem;
            font-size: 1.1rem;
            transition: background 0.3s ease;
        }

        .btn-main:hover {
            background-color: #0dca06ff;
            color: #fff;
        }

        .btn-main2 {
            background: #e63946;
            color: #fff;
            box-shadow: 0 2px 8px 0 rgba(163, 15, 15, 0.50);
            border-radius: 50px;
            padding: 0.75rem 1.5rem;
            font-size: 1.1rem;
            transition: background 0.3s ease;
        }

        .btn-main2:hover {
            background-color: #cf0404ff;
            color: #fff;
        }

        .btn-main3 {
            background: #666666ff;
            color: #fff;
            box-shadow: 0 2px 8px 0 rgba(0, 0, 0, 0.5);
            border-radius: 50px;
            padding: 0.75rem 1.5rem;
            font-size: 1.1rem;
            transition: background 0.3s ease;
        }

        .btn-main3:hover {
            background-color: #202020ff;
            color: #fff;
        }
    </style>
</head>
<body class="bg-dark">

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh; max-width: 900px;">
        <div class="card bg-secondary text-white w-100" style="max-width: 600px;">
            <div class="card-body p-4">
                <h2 class="text-center mb-4">
                    <span class="icon"><i class="bi bi-person-plus-fill"></i></span>
                    แก้ไขข้อมูลผู้ใช้
                </h2>

                <form action="controls/edit_profileB.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $user['id']; ?>">

                    <div class="mb-3">
                        <label for="profile_image">รูปโปรไฟล์</label>
                        <div class="input-group">
                            <label for="profile_image" class="btn btn-dark w-100">
                                <span id="fileLabel">เลือกรูปภาพ</span>
                            </label>
                            <input type="file" name="profile_image" id="profile_image" class="form-control d-none">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="first_name">ชื่อ</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" name="first_name" id="first_name" class="form-control" value="<?= htmlspecialchars($user['first_name']); ?>">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="last_name">นามสกุล</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" name="last_name" id="last_name" class="form-control" value="<?= htmlspecialchars($user['last_name']); ?>">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">อีเมล์</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="text" name="email" id="email" class="form-control" value="<?= htmlspecialchars($user['email']); ?>">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="phone">เบอร์โทรศัพท์</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                            <input type="text" name="phone" id="phone" class="form-control" value="<?= htmlspecialchars($user['phone']); ?>">
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-main btn lg"><i class="bi bi-save-fill"></i> บันทึกการแก้ไข</button>
                        <button type="reset" class="btn btn-main2 btn lg"><i class="bi bi-arrow-clockwise"></i> รีเซ็ต</button>
                        <a href="profile.php" class="btn btn-main3 btn lg"><i class="bi bi-backspace-fill"></i> ย้อนกลับ</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('profile_image').addEventListener('change', function () {
            const fileName = this.files[0]?.name || "ยังไม่ได้เลือกไฟล์";
            document.getElementById('fileLabel').innerText = fileName;
        });
    </script>
</body>
</html>
