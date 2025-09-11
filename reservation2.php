<?php
$page = 'reservation';
// session_start();
// date_default_timezone_set('Asia/Bangkok');

//  if (!isset($_SESSION['user_id'])) {
//      header("Location: signin.php");
//      exit();
//  }

// if (!isset($_GET['branch'])) {
//     header("Location: reservation1.php");
//     exit();
// }

$branch = $_GET['branch'];

?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จองคิว - <?php echo htmlspecialchars($branch); ?></title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/th.js"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background-color: #212529;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            position: relative;
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
        .logo {
            width: 90px;
            margin: 32px auto 16px auto;
            display: block;
            filter: drop-shadow(0 2px 8px #0008);
        }
        .card {
            background: rgba(33,37,41,0.95);
            border-radius: 1.5rem;
            box-shadow: 0 4px 32px 0 rgba(0,0,0,0.25);
            border: none;
        }
        h1 {
            font-size: 2.2rem;
            font-weight: 600;
            color: #fff;
            margin-bottom: 1.5rem;
        }
        label.form-label {
            color: #ffc107;
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
            color: #fff;
            border-color: #ffc107;
            box-shadow: 0 0 0 0.2rem rgba(255,193,7,.15);
        }
        .btn-light {
            font-weight: 600;
            border-radius: 0.75rem;
            background: linear-gradient(90deg, #ffc107 60%, #fffbe7 100%);
            color: #212529;
            box-shadow: 0 2px 8px 0 rgba(255,193,7,0.15);
            transition: background 0.2s;
        }
        .btn-light:hover {
            background: linear-gradient(90deg, #ffd740 60%, #fffbe7 100%);
            color: #212529;
        }
        .card-body {
            padding: 2.5rem 2rem;
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
<body>
    <?php include './components/header.php'; ?>
    <img src="https://cdn.pixabay.com/photo/2018/01/09/14/24/head-3071690_1280.png" alt="Logo" class="logo">

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
        <div class="card w-100" style="max-width: 430px;">
            <div class="card-body">
                <h1>จองคิวที่ <?php echo htmlspecialchars($branch); ?></h1>
                <form action="reservation3.php" method="post" autocomplete="off">
                    <input type="hidden" name="branch" value="<?php echo htmlspecialchars($branch); ?>">

                    <div class="mb-3 text-start">
                        <label class="form-label">ชื่อ-นามสกุล</label>
                        <input type="text" name="fullname" class="form-control" required>
                    </div>

                    <div class="mb-3 text-start">
                        <label class="form-label">เบอร์โทร</label>
                        <input type="tel" name="phone" class="form-control"
                               pattern="[0-9]{10}" maxlength="10"
                               inputmode="numeric"
                               title="กรุณากรอกเบอร์โทร 10 หลัก"
                               required>
                    </div>

                    <div class="mb-3 text-start">
                        <label class="form-label">วันที่จอง</label>
                        <input type="text" id="datepicker" name="date" class="form-control" required>
                    </div>

                    <div class="mb-3 text-start">
                        <label class="form-label">เวลา</label>
                        <input type="text" id="timepicker" name="time" class="form-control" required>
                        <small class="text-white">*เลือกเวลาระหว่าง 09:00 - 20:00</small>
                    </div>

                    <button type="submit" class="btn btn-light w-100 mt-2">ยืนยันการจอง</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        flatpickr("#datepicker", {
            dateFormat: "Y-m-d",
            locale: "th",
            minDate: "today"
        });

        flatpickr("#timepicker", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            minTime: "09:00",
            maxTime: "20:00",
            locale: "th"
        });
    </script>
    <?php include './components/footer.php'; ?>
</body>
</html>