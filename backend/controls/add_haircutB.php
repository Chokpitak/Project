<?php
include 'db3.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $profile_image = null;

    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === 0) {
        $target_dir = "../../assets/imgs/";
        $image_name = basename($_FILES['profile_image']['name']);
        $target_file = $target_dir . $image_name;

        $imagefileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($imagefileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file)) {
                $profile_image = $image_name;
                $_SESSION['success'] = "Image uploaded successfully!";
            } else {
                $_SESSION['error'] = "Failed to upload image.";
                header("Location: ../add_haircut.php");
                exit;
            }
        } else {
            $_SESSION['error'] = "Invalid image format.";
            header("Location: ../add_haircut.php");
            exit;
        }
    }

    $sql = "INSERT INTO haircuts (name, price, profile_image) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $name,
        $price,
        $profile_image
    ]);

    header("Location: ../haircut.php");
    exit;
}
?>
