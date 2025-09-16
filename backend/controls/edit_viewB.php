<?php
session_start();
include 'db2.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $branch = $_POST['branch'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $stmt = $pdo->prepare("UPDATE reservations SET branch = ?, fullname = ?, phone = ?, date = ?, time = ? WHERE id = ?");
    $result = $stmt->execute([$branch, $fullname, $phone, $date, $time, $id]);

    if ($result) {
        $_SESSION['success'] = "อัปเดตข้อมูลเรียบร้อยแล้ว!";
        header("Location: ../view.php");
    } else {
        $_SESSION['error'] = "อัปเดตข้อมูลไม่สำเร็จ!";
        header("Location: ../edit_view.php?id=" . $id);
    }

    exit;
}