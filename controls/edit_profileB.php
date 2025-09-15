<?php
session_start();
include 'db1.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id         = $_POST['id'] ?? null;
    $first_name = $_POST['first_name'] ?? '';
    $last_name  = $_POST['last_name'] ?? '';
    $phone      = $_POST['phone'] ?? '';
    $email      = $_POST['email'] ?? '';
    $profile_image = null;

    // ตรวจสอบและอัปโหลดรูปภาพ
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === 0) {
        $target_dir = "../assets/imgs/";
        $imagefileType = strtolower(pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION));

        if (in_array($imagefileType, ['jpg', 'jpeg', 'png', 'gif'])) {

            if ($_FILES['profile_image']['size'] <= 2 * 1024 * 1024) {
                $newFileName = uniqid('profile_', true) . '.' . $imagefileType;
                $target_file = $target_dir . $newFileName;

                if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file)) {
                    $profile_image = $newFileName;
                    $_SESSION['success'] = "อัปโหลดรูปภาพสำเร็จ";
                } else {
                    $_SESSION['error'] = "อัปโหลดรูปภาพไม่สำเร็จ";
                    header("Location: ../edit_profile.php?id=" . $id);
                    exit;
                }
            } else {
                $_SESSION['error'] = "ไฟล์รูปภาพใหญ่เกินไป (ไม่เกิน 2MB)";
                header("Location: ../edit_profile.php?id=" . $id);
                exit;
            }
        } else {
            $_SESSION['error'] = "รูปภาพต้องเป็นไฟล์ jpg, jpeg, png หรือ gif เท่านั้น";
            header("Location: ../edit_profile.php?id=" . $id);
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
        // อัปเดตข้อมูลใน session ให้ตรงกับฐานข้อมูลใหม่
        $_SESSION['name'] = trim($first_name . ' ' . $last_name);
        $_SESSION['phone'] = $phone;
        $_SESSION['email'] = $email;
        if ($profile_image) {
            $_SESSION['profile_image'] = $profile_image;
        }

        $_SESSION['success'] = "อัปเดตข้อมูลเรียบร้อยแล้ว!";
        header("Location: ../profile.php");
        exit;
    } else {
        $_SESSION['error'] = "อัปเดตข้อมูลไม่สำเร็จ!";
        header("Location: ../edit_profile.php?id=" . $id);
        exit;
    }
}
?>