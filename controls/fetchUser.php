<?php
    include './controls/db1.php';
    session_start();

    // ดึงข้อมูลผู้ใช้งานจาก database
    $sql = "SELECT `id`, `first_name`, `last_name`, `address`, `phone`, `email`, `password`, `created_at` FROM `users`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
?>