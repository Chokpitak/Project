<?php
    session_start();
    include 'db1.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $stmt = $pdo->prepare("DELETE FROM reservations WHERE id = ?");
        $result = $stmt->execute([$id]);

        if ($result) {
            $_SESSION['message'] = "Information deleted successfully!";
            header("Location: ../view.php");
        } else {
            $_SESSION['error'] = "Failed to delete Information.";
            header("Location: ../view.php");
    }
        exit;
    }
?>