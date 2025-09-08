<?php
session_start();
include 'db3.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id         = $_POST['id'] ?? null;
    $name = $_POST['name'] ?? '';
    $price      = $_POST['price'] ?? '';
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
                header("Location: ../edit_haircut.php?id=" . $id);
                exit;
            }
        } else {
            $_SESSION['error'] = "รูปภาพต้องเป็นไฟล์ jpg, jpeg, png หรือ gif เท่านั้น";
            header("Location: ../edit_haircut.php?id=" . $id);
            exit;
        }
    }

    $sql = "UPDATE haircuts SET name = ?, price = ?";
    $params = [$name, $price];

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
        header("Location: ../haircut.php");
    } else {
        $_SESSION['error'] = "อัปเดตข้อมูลไม่สำเร็จ!";
        header("Location: ../edit_haircut.php?id=" . $id);
    }

    exit;
}
?>