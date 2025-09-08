<?php
session_start();
include 'db2.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id         = $_POST['id'] ?? null;
    $first_name = $_POST['first_name'] ?? '';
    $last_name  = $_POST['last_name'] ?? '';
    $phone      = $_POST['phone'] ?? '';
    $email      = $_POST['email'] ?? '';
    $profile_image = null;

    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === 0) {
        $target_dir  = "../../assets/imgs/";
        $image_name  = basename($_FILES['profile_image']['name']);
        $target_file = $target_dir . $image_name;
        $imagefileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($imagefileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file)) {
                $profile_image = $image_name;
                $_SESSION['success'] = "อัปโหลดรูปภาพสำเร็จ";
            } else {
                $_SESSION['error'] = "อัปโหลดรูปภาพไม่สำเร็จ";
                header("Location: ../edit_user.php?id=" . $id);
                exit;
            }
        } else {
            $_SESSION['error'] = "รูปภาพต้องเป็นไฟล์ jpg, jpeg, png หรือ gif เท่านั้น";
            header("Location: ../edit_user.php?id=" . $id);
            exit;
        }
    }

    $sql = "UPDATE users SET first_name = ?, last_name = ?, phone = ?, email = ?";
    $params = [$first_name, $last_name, $phone, $email];

    if ($profile_image) {
        $sql .= ", profile_image = ?";
        $params[] = $profile_image;
    }

    $sql .= " WHERE id = ?";
    $params[] = $id;

    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute($params);

    if ($result) {
        $_SESSION['success'] = "อัปเดตข้อมูลเรียบร้อยแล้ว!";
        header("Location: ../user.php");
    } else {
        $_SESSION['error'] = "อัปเดตข้อมูลไม่สำเร็จ!";
        header("Location: ../edit_user.php?id=" . $id);
    }

    exit;
}
?>