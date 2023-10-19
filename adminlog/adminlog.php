<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $adminUsername = "admin";
        $adminPassword = "1234";

        $inputUsername = $_POST["username"];
        $inputPassword = $_POST["password"];

        if ($inputUsername === $adminUsername && $inputPassword === $adminPassword) {
            $_SESSION["admin_logged_in"] = true;
            
            header("Location: ../adminDashboard/adminindex.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Invalid username or password!";
            header("Location: adminlogin.php");
            exit();
        }
    }
?>
