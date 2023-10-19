<?php
    session_start();
    require 'dbcon.php';

    if (isset($_POST['pet_delete'])) {
        $ownerId = $_POST['pet_delete'];
        $query = "DELETE FROM petsreg WHERE petid = $ownerId";
        $result = mysqli_query($con, $query);

        if ($result) {
            $_SESSION['status'] = "Per deleted successfully.";
        } else {
            $_SESSION['status'] = "Error deleting pet: " . mysqli_error($con);
        }
        header('Location: petcrud.php'); 
        exit();
    } else {
        header('Location: petcrud.php');
        exit();
    }
?>
