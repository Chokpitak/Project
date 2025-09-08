<?php
session_start();

// เชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";         
$dbname   = "barber_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $status = $_POST['status'] ?? null;

    if ($id && $status) {
        
        $stmt = $conn->prepare("UPDATE reservations SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $status, $id);

        if ($stmt->execute()) {
            $_SESSION['success'] = "เปลี่ยนสถานะสำเร็จ";
        } else {
            $_SESSION['error'] = "เกิดข้อผิดพลาดในการเปลี่ยนสถานะ";
        }
        $stmt->close();
    } else {
        $_SESSION['error'] = "ข้อมูลไม่ครบถ้วน";
    }
} else {
    $_SESSION['error'] = "วิธีการส่งข้อมูลไม่ถูกต้อง";
}

$conn->close();
header("Location: ../view.php");
exit();
?>