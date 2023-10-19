<?php
    session_start();
    require 'dbcon.php';

    if (isset($_POST['delete_owner'])) {
        $ownerId = $_POST['delete_owner'];
        $query = "DELETE FROM petowner WHERE petOwnerid = $ownerId";
        $result = mysqli_query($con, $query);

        if ($result) {
            $_SESSION['status'] = "Owner deleted successfully.";
        } else {
            $_SESSION['status'] = "Error deleting owner: " . mysqli_error($con);
        }
        header('Location: admincrud.php'); 
        exit();
    } else {
        header('Location: admincrud.php');
        exit();
    }
?>
