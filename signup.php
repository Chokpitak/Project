<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="assets/css/signin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/signup.css">
</head>

<body style="background-image: url('https://cdn.pixabay.com/photo/2021/11/15/11/00/barber-shop-6797761_1280.jpg'); background-size: cover; background-position: center;">
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh; max-width: 900px;">
        <div class="card bg-secondary text-white" style="width: 50%;">
            <div class="row g-0">
                <div class="card-body p-4">
                    <h2 class="text-center mb-4">
                        <span class="icon"><i class="bi bi-person-plus-fill"></i></span>
                        สมัครสมาชิก
                    </h2>
                    <form method="POST" action="controls/createUsers.php">
                        <div class="mb-3">
                            <label for="firstname" class="form-label">ชื่อ</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" name="first_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">นามสกุล</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" name="last_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">เบอร์โทรศัพท์</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                <input type="text" name="phone" class="form-control" required>
                            </div>
                        </div>
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
                                <input type="password" name="password" class="form-control" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark w-100 text-white mt-3">
                            <i class="bi bi-person-plus"></i> สมัครสมาชิก
                        </button>
                    </form>
                    <div class="text-center mt-4">
                        <span>มีบัญชีอยู่แล้ว?</span>
                        <a href="signin.php" class="text-warning text-decoration-underline">เข้าสู่ระบบ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
=======
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="assets/css/signin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/signup.css">
</head>

<body style="background-image: url('https://cdn.pixabay.com/photo/2021/11/15/11/00/barber-shop-6797761_1280.jpg'); background-size: cover; background-position: center;">
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh; max-width: 900px;">
        <div class="card bg-secondary text-white" style="width: 50%;">
            <div class="row g-0">
                <div class="card-body p-4">
                    <h2 class="text-center mb-4">
                        <span class="icon"><i class="bi bi-person-plus-fill"></i></span>
                        สมัครสมาชิก
                    </h2>
                    <form method="POST" action="controls/createUsers.php">
                        <div class="mb-3">
                            <label for="firstname" class="form-label">ชื่อ</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" name="first_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">นามสกุล</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" name="last_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">เบอร์โทรศัพท์</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                <input type="text" name="phone" class="form-control" required>
                            </div>
                        </div>
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
                                <input type="password" name="password" class="form-control" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark w-100 text-white mt-3">
                            <i class="bi bi-person-plus"></i> สมัครสมาชิก
                        </button>
                    </form>
                    <div class="text-center mt-4">
                        <span>มีบัญชีอยู่แล้ว?</span>
                        <a href="signin.php" class="text-warning text-decoration-underline">เข้าสู่ระบบ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
>>>>>>> fc641ee (update project)
