<?php
    session_start();
    require 'dbcon.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['sitter_delete']) && !empty($_POST['sitter_delete'])) {
            $sitterId = $_POST['sitter_delete'];

            $deleteQuery = "DELETE FROM petsitters WHERE Sitter_id = '$sitterId'";
            $deleteQuery_run = mysqli_query($con, $deleteQuery);

            if ($deleteQuery_run) {
                header('Location: sittercrud.php');
                exit();
            } else {
                echo "Error deleting sitter.";
            }
        } else {
            header('Location: sittercrud.php'); 
            exit();
        }
    }
?>
