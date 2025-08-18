<?php
include 'db1.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $address = trim($_POST['address'] ?? '');
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $checkEmail = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $checkEmail->execute([$email]);

    if ($checkEmail->rowCount() > 0) {
        echo "<script>
            alert('อีเมลนี้ถูกใช้งานแล้ว');
            window.history.back();
        </script>";
        exit;
    }

    try {
        $sql = "INSERT INTO users (first_name, last_name, address, phone, email, password) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$first_name, $last_name, $address, $phone, $email, $pass]);

        $_SESSION['success'] = "สมัครสมาชิกสำเร็จ";
        header("Location: ../index.php");
        exit;
    } catch (PDOException $e) {
        echo "เกิดข้อผิดพลาด: " . $e->getMessage();
    }
}
?>
