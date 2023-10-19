<?php
	session_start();
    require 'dbcon.php';

    if (isset($_GET['id'])) {
        $userId = $_GET['id'];
        $query = "SELECT * FROM users WHERE userid = $userId";
        $result = mysqli_query($con, $query);
        $users = mysqli_fetch_assoc($result);
    } else {
        header('Location: adminindex.php');
        exit();
    }
	
?>
<!DOCTYPE html>
<html>

<head>
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>User Details</title>
</head>

<body>
<div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User Details</h4>
                    </div>
                    <div class="card-body">
                        <h5>User ID: <?= $users['userid']; ?></h5>
                        <p>Full Name: <?= $users['userFullName']; ?></p>
                        <p>Email: <?= $users['userEmail']; ?></p>
                        <p>Phone: <?= $users['userPhone']; ?></p>
                        <p>NIC: <?= $users['userNIC']; ?></p>
                        <p>Address: <?= $users['userAddress']; ?></p>
                        <p>Pet Type: <?= $users['petType']; ?></p>
                        <p>Pet Name: <?= $users['petName']; ?></p>
                        <p>Breed: <?= $users['Breed']; ?></p>
						<p>Weight: <?= $users['Weight']; ?></p>
						<p>Gender: <?= $users['Gender']; ?></p>
						<a href="adminindex.php" class="btn btn-primary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
