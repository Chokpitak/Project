<?php
    include 'db1.php';

    // ดีงข้อมูลผู้ใช้งานตามไอดี
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM reservations WHERE id = ?");
    $stmt->execute([$id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
?>