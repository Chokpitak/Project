<?php
session_start();
date_default_timezone_set('Asia/Bangkok');

if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}

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
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Kanit', sans-serif;
            text-align: center;
            padding: 40px;
            background-color: #212529;
        }

        h1 {
            font-size: 50px;
            font-weight: bold;
            color: white;
            margin-bottom: 20px;
        }

        .logo {
            width: 100px;
            margin-top: 40px;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://uploads-ssl.webflow.com/5cac67740ca8b550d4e98db6/5cd8d2041cfc8a0e6eaf5217_Barber-Industries-Parramatta-05-p-1080.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.3;
            z-index: -1;
        }
    </style>
</head>

<body>
    <?php include './components/header.php'; ?>
    <img src="https://cdn.pixabay.com/photo/2018/01/09/14/24/head-3071690_1280.png"
        alt="Logo"
        class="logo mb-3">

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh; max-width: 900px;">
        <div class="card bg-secondary w-100" style="max-width: 500px;">
            <div class="card-body p-4">
                <h1>จองคิวที่ <?php echo htmlspecialchars($branch); ?></h1>
                <form action="reservation3.php" method="post">
                    <input type="hidden" name="branch" value="<?php echo htmlspecialchars($branch); ?>">

                    <div class="mb-3 text-start">
                        <label class="form-label text-white">ชื่อ-นามสกุล</label>
                        <input type="text" name="fullname" class="form-control" required>
                    </div>

                    <div class="mb-3 text-start">
                        <label class="form-label text-white">เบอร์โทร</label>
                        <input type="tel" name="phone" class="form-control"
                               pattern="[0-9]{10}" maxlength="10"
                               inputmode="numeric"
                               title="กรุณากรอกเบอร์โทร 10 หลัก"
                               required>
                    </div>

                    <div class="mb-3 text-start">
                        <label class="form-label text-white">วันที่จอง</label>
                        <input type="text" id="datepicker" name="date" class="form-control" required>
                    </div>

                    <div class="mb-3 text-start">
                        <label class="form-label text-white">เวลา</label>
                        <input type="text" id="timepicker" name="time" class="form-control" required>
                        <small class="text-white">*เลือกเวลาระหว่าง 09:00 - 20:00</small>
                    </div>

                    <button type="submit" class="btn btn-light w-100">ยืนยันการจอง</button>
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
