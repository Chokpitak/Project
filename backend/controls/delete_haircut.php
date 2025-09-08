<?php
    session_start();
    include 'db3.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $stmt = $pdo->prepare("DELETE FROM haircuts WHERE id = ?");
        $result = $stmt->execute([$id]);

        if ($result) {
            $_SESSION['message'] = "Information deleted successfully!";
            header("Location: ../haircut.php");
        } else {
            $_SESSION['error'] = "Failed to delete Information.";
            header("Location: ../haircut.php");
    }
        exit;
    }
?>