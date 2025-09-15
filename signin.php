<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Google Fonts and Custom CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/signup.css">
</head>
<style>
.custom-back-btn {
    color: white;
    border-color: white;
    font-size: 1.5rem;
    transition: color 0.3s ease;
    text-decoration: none;
}

.custom-back-btn:hover {
    color: #e63946;
    border-color: #e63946;
}
</style>
<body style="background-image: url('https://cdn.pixabay.com/photo/2021/11/15/11/00/barber-shop-6797761_1280.jpg'); background-size: cover; background-position: center;">
    <a href="index.php" class="btn custom-back-btn position-absolute top-0 end-0 m-3">
        <i class="bi bi-backspace-fill"></i>
    </a>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh; max-width: 900px;">
        <div class="card bg-secondary text-white" style="width: 50%;">
            <div class="row g-0">
                <div class="card-body p-4">
                    <h2 class="text-center mb-4">
                        <i class="bi bi-person-plus-fill"></i> เข้าสู่ระบบ
                    </h2>
                    <form method="POST" action="controls/signinUser.php">
                        <div class="mb-3">
                            <label for="email" class="form-label">อีเมลล์</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">รหัสผ่าน</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input type="password" id="password" name="pass" class="form-control" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark w-100 text-white mt-3">
                            <i class="bi bi-box-arrow-in-right"></i> เข้าสู่ระบบ
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <span>ยังไม่มีบัญชี?</span>
                        <a href="signup.php" class="text-danger text-decoration-underline">สมัครสมาชิก</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if (isset($_GET['error']) && $_GET['error'] == 'invalid') : ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'เข้าสู่ระบบไม่สำเร็จ',
                text: 'อีเมลหรือรหัสผ่านไม่ถูกต้อง',
                showConfirmButton: false,
                timer: 2000,
                background: '#212529',
                color: '#fff',
                footer: '<span style="color:#e63946;">กรอกข้อมูลใหม่อีกครั้ง</span>',
                customClass: {
                    popup: 'rounded-4 shadow'
                }
            });
        </script>
    <?php elseif (isset($_GET['error']) && $_GET['error'] == 'notfound') : ?>
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'ไม่พบบัญชีผู้ใช้',
            text: 'อีเมลนี้ยังไม่ได้ลงทะเบียน',
            showConfirmButton: false,
            timer: 2500,
            background: '#212529',
            color: '#fff',
            footer: '<span style="color:#e63946;">กรุณาสมัครสมาชิกก่อน</span>',
            customClass: {
                popup: 'rounded-4 shadow'
            }
        });
    </script>
<?php endif; ?>
</body>
</html>