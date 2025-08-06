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
</head>

<body style="background-image: url('https://cdn.pixabay.com/photo/2021/11/15/11/00/barber-shop-6797761_1280.jpg'); background-size: cover; background-position: center;">
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh; max-width: 900px;">
        <div class="card bg-secondary" style="width: 50%;">
            <div class="row g-0">
                <div class="card-body p-4">
                    <!-- เข้าสู่ระบบ -->
                    <h2 class="text-center">สมัครสมาชิก</h2>
                    <form method="POST" action="controls/createUsers.php">
                        <div class="mb-3">
                            <label for="firstname" class="">ชื่อ</label>
                            <input type="text" name="first_name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="">นามสกุล</label>
                            <input type="text" name="last_name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="">เบอร์โทรศัพท์</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="">อีเมลล์</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="">รหัสผ่าน</label>
                            <input type="text" name="password" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-dark w-100 text-white">สมัครสมาชิก</button>

                    </form>
                    <!-- กลับไปหน้าเข้าสู่ระบบ -->
                    <div class="text-center mt-3">
                        <span>ถ้ายังไม่มีสมาชิก</span>
                        <a href="signin.php" class="text-white">คลิก!!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>