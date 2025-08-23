<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="assets/css/signin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .card {
            border-radius: 20px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.15);
        }

        .form-label {
            font-weight: 500;
        }

        .bg-secondary {
            background: rgba(60, 60, 60, 0.85) !important;
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

        body {
            font-family: "Mitr", sans-serif;
        }
    </style>
</head>

<body style="background-image: url('https://cdn.pixabay.com/photo/2021/11/15/11/00/barber-shop-6797761_1280.jpg'); background-size: cover; background-position: center;">
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh; max-width: 900px;">
        <div class="card bg-secondary text-white" style="width: 50%;">
            <div class="row g-0">
                <div class="card-body p-4">
                    <h2 class="text-center mb-4">
                        <span class="icon"><i class="bi bi-person-plus-fill"></i></span>
                        เข้าสู่ระบบ
                    </h2>
                    <form method="POST" action="controls/signinUser.php">
                        <form method="POST" action="controls/signinUser.php">
                            <div class="mb-3">
                                <label for="email" class="form-label">อีเมลล์</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">รหัสผ่าน</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    <input type="password" name="pass" class="form-control" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-dark w-100 text-white mt-3">
                                <i class="bi bi-person-plus"></i> เข้าสู่ระบบ
                            </button>
                        </form>
                        <div class="text-center mt-4">
                            <span>ยังไม่มีบัญชี?</span>
                            <a href="signup.php" class="text-warning text-decoration-underline">สมัครสมาชิก</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script>
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'invalid') : ?>
                <
                script >
                Swal.fire({
                    icon: 'error',
                    title: 'เข้าสู่ระบบไม่สำเร็จ',
                    text: 'อีเมลหรือรหัสผ่านไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
                    showConfirmButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'ตกลง',
                    background: '#212529',
                    color: '#fff',
                    footer: '<a href="signin.php" style="color:#ffc107;">กลับไปหน้าเข้าสู่ระบบ</a>',
                    customClass: {
                        popup: 'rounded-4 shadow'
                    }
                });
    </script>
<?php endif; ?>

<?php if (isset($_GET['success']) && $_GET['success'] == 'true') : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'เข้าสู่ระบบสำเร็จ!',
            text: 'ยินดีต้อนรับสู่เว็บไซต์ของเรา',
            showConfirmButton: false,
            timer: 2000,
            background: '#212529',
            color: '#fff',
            footer: '<span style="color:#ffc107;">ขอให้สนุกกับการใช้งาน!</span>',
            customClass: {
                popup: 'rounded-4 shadow'
            }
        });
    </script>
<?php endif; ?>
<script>
    <?php if (isset($_GET['error']) && $_GET['error'] == 'invalid') : ?>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Invalid email or password',
            footer: 'Please ry again.'
        });
    <?php endif; ?>

    <?php if (isset($_GET['Success']) && $_GET['Success'] == 'true') : ?>
        Swal.fire({
            icon: 'success',
            title: 'Success!..',
            text: 'You have signed in successfully!',
            footer: 'Go Away Teen.'
        });
    <?php endif; ?>
</script>
</body>
</html>
