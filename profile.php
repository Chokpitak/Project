<?php
$page = 'profile';
session_start();
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

if (!$user) {
    header("Location: signin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>โปรไฟล์ของฉัน | Big Boss Barber</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600;700&display=swap" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background-color: #000;
            color: white;
            margin: 0;
            padding: 0;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-image: url('https://cdn.pixabay.com/photo/2020/05/24/02/00/barber-shop-5212059_1280.jpg');
            background-size: cover;
            background-position: center;
            opacity: 0.3;
            z-index: -1;
        }

        .profile-card {
            background: rgba(33, 37, 41, 0.95);
            max-width: 500px;
            margin: 5rem auto;
            border-radius: 1.5rem;
            padding: 2.5rem;
            box-shadow: 0 4px 32px rgba(0, 0, 0, 1);
            text-align: center;
        }

        .profile-image {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #ff3b3b;
            margin-bottom: 1.5rem;
        }

        .profile-name {
            font-size: 2rem;
            font-weight: 700;
            color: #ff3b3b;
            margin-bottom: 0.5rem;
        }

        .profile-detail {
            font-size: 1.1rem;
            margin-bottom: 0.6rem;
        }

        .btn-main {
            background: #e63946;
            color: #fff;
            box-shadow: 0 2px 8px 0 rgba(163, 15, 15, 0.50);
            border-radius: 50px;
            padding: 0.75rem 1.5rem;
            font-size: 1.1rem;
            transition: background 0.3s ease;
        }

        .btn-main:hover {
            background-color: #cf0404ff;
            color: #fff;
        }

        .profile-actions .btn {
            margin: 0.5rem;
        }

        @media (max-width: 576px) {
            .profile-card {
                margin: 2rem 1rem;
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
<?php include './components/header.php'; ?>

<div class="profile-card">
    <img src="<?= !empty($user['profile_image']) ? htmlspecialchars('/Project-master/assets/imgs/' . $user['profile_image']) : 'https://via.placeholder.com/150' ?>" alt="Profile_Image" class="profile-image">
    <div class="profile-name"><?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?></div>
    <div class="profile-detail"><i class="bi bi-envelope"> อีเมล์: </i> <?= htmlspecialchars($user['email']) ?></div>
    <div class="profile-detail"><i class="bi bi-telephone"> เบอร์โทรศัพท์: </i> <?= htmlspecialchars($user['phone']) ?></div>
    <div class="profile-detail"><i class="bi bi-calendar3"> วันที่สมัครบัญชี: </i> <?= htmlspecialchars($user['created_at']) ?></div>

    <div class="profile-actions">
        <a href="edit_profile.php?id=<?= htmlspecialchars($user['id']) ?>" class="btn btn-main btn lg">
            <i class="bi bi-pencil-square"></i> แก้ไขโปรไฟล์
        </a>
    </div>
</div>

<?php include './components/footer.php'; ?>
</body>
</html>