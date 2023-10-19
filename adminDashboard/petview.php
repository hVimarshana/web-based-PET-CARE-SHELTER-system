<?php
    // petview.php

    session_start();
    require 'dbcon.php';

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $petid = $_GET['id'];
        $query = "SELECT * FROM petsreg WHERE petid = '$petid'";
        $query_run = mysqli_query($con, $query);

        if (mysqli_num_rows($query_run) > 0) {
            $pet = mysqli_fetch_assoc($query_run);
        } else {
            header('Location: petcrud.php'); 
            exit();
        }
    } else {
        header('Location: petcrud.php'); 
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

    <title>Pet Details</title>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Pet Details</h4>
                    </div>
                    <div class="card-body">
                        <h5>Pet ID: <?= $pet['petid']; ?></h5>
                        <p>Pet Type: <?= $pet['pet_type']; ?></p>
                        <p>Pet Name: <?= $pet['pet_name']; ?></p>
                        <p>Breed: <?= $pet['breed']; ?></p>
                        <p>Weight: <?= $pet['weight']; ?></p>
                        <p>Gender: <?= $pet['gender']; ?></p>
                        <p>Special Requirements: <?= $pet['special_req']; ?></p>
			<a href="petcrud.php" class="btn btn-primary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
