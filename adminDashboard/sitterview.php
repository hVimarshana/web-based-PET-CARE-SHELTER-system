<?php
    // sitterview.php

    session_start();
    require 'dbcon.php';

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $sitterId = $_GET['id'];
        $query = "SELECT * FROM petsitters WHERE Sitter_id = '$sitterId'";
        $query_run = mysqli_query($con, $query);

        if (mysqli_num_rows($query_run) > 0) {
            $sitter = mysqli_fetch_assoc($query_run);
        } else {
            // Handle the case when the sitter with the given ID does not exist
            header('Location: sitterslist.php'); // Redirect to the sitter list page
            exit();
        }
    } else {
        // Handle the case when the ID is not provided or empty
        header('Location: sitterslist.php'); // Redirect to the sitter list page
        exit();
    }
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Sitter Details</title>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Sitter Details</h4>
                    </div>
                    <div class="card-body">
                        <h5>Sitter ID: <?= $sitter['Sitter_id']; ?></h5>
                        <p>First Name: <?= $sitter['FirstName']; ?></p>
                        <p>Last Name: <?= $sitter['LastName']; ?></p>
                        <p>Address: <?= $sitter['Address']; ?></p>
                        <p>Email: <?= $sitter['Email']; ?></p>
                        <p>Phone Number: <?= $sitter['PhoneNb']; ?></p>
                        <p>NIC: <?= $sitter['NIC']; ?></p>
                        <p>Price (LKR): <?= $sitter['Price']; ?></p>
                        <p>Description: <?= $sitter['Description']; ?></p>
						<a href="sittercrud.php" class="btn btn-primary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
