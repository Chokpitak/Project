<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body style="background: linear-gradient(to right,rgb(126, 126, 126),rgb(36, 36, 36));">
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow" style="width: 100%; background: linear-gradient(to right,rgb(194, 194, 194),rgb(63, 63, 63));">
            <div class="row g-0 ">
                <div class="col-md-6">
                    <div class="card-body p-4">
                        <!-- เข้าสู่ระบบ -->
                        <h2>SignIn</h2>
                        <form method="POST" action="./controls/signinUser.php">
                            <div class="mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" name="pass" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-dark w-100">SignIn NOW!!!</button>
                        </form>
                        <!-- สมัครสมาชิก -->
                         <div class="text-center mt-3">
                            <span>Don't have an account</span>
                            <a href="signup.php">SignUp</a>
                         </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="https://i.pinimg.com/736x/9d/04/cd/9d04cdc6c58d167c7f73ba8747db96b2.jpg" class="img-fluid" style="object-fit: cover; width: 100%;" alt="">
                </div>
            </div>
        </div>
    </div>

    <script>
        <?php if (isset($_GET['error']) && $_GET['error'] == 'invalid') : ?>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Invalid email or password',
                footer: 'Please try again.'
            });
        <?php endif; ?>
    </script>
</body>
</html>