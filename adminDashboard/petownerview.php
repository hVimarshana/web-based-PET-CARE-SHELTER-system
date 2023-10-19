<?php
    session_start();
    require 'dbcon.php';

    if (isset($_GET['id'])) {
        $ownerId = $_GET['id'];
        $query = "SELECT * FROM petowner WHERE petOwnerid = $ownerId";
        $result = mysqli_query($con, $query);
        $owner = mysqli_fetch_assoc($result);
    } else {
        header('Location: admincrud.php');
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

    <title>View PetOwner</title>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>View PetOwner Details</h4>
                    </div>
                    <div class="card-body">
                        <h5>ID: <?= $owner['petOwnerid']; ?></h5>
                        <p><strong>First Name: </strong><?= $owner['FirstName']; ?></p>
                        <p><strong>Last Name: </strong><?= $owner['LastName']; ?></p>
                        <p><strong>Address: </strong><?= $owner['Address']; ?></p>
                        <p><strong>Phone Number: </strong><?= $owner['PhoneNb']; ?></p>
                        <p><strong>Email: </strong><?= $owner['Email']; ?></p>
                        <a href="adminindex.php" class="btn btn-primary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
