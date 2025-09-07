<?php
    session_start();
    include 'db2.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        $result = $stmt->execute([$id]);

        if ($result) {
            $_SESSION['message'] = "Information deleted successfully!";
            header("Location: ../user.php");
        } else {
            $_SESSION['error'] = "Failed to delete Information.";
            header("Location: ../user.php");
    }
        exit;
    }
?>