<?php
    session_start();
    require 'dbcon.php';

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $sitterId = $_GET['id'];
        $query = "SELECT * FROM petsitters WHERE Sitter_id = '$sitterId'";
        $query_run = mysqli_query($con, $query);

        if (mysqli_num_rows($query_run) > 0) {
            $sitter = mysqli_fetch_assoc($query_run);
        } else {
            header('Location: sittercrud.php'); 
            exit();
        }
    } else {
        header('Location: sittercrud.php'); 
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $columnsToUpdate = array(
            'FirstName' => $_POST['first_name'],
            'LastName' => $_POST['last_name'],
            'Address' => $_POST['address'],
            'Email' => $_POST['email'],
            'PhoneNb' => $_POST['phone_nb'],
            'NIC' => $_POST['nic'],
            'Price' => $_POST['price'],
            'Description' => $_POST['description']
        );

        $setPart = '';
        foreach ($columnsToUpdate as $column => $value) {
            $value = mysqli_real_escape_string($con, $value);
            $setPart .= "$column = '$value', ";
        }
        $setPart = rtrim($setPart, ', ');

        $updateQuery = "UPDATE petsitters SET $setPart WHERE Sitter_id = '$sitterId'";
        $updateQuery_run = mysqli_query($con, $updateQuery);

        if ($updateQuery_run) {
            header("Location: sitterview.php?id=$sitterId");
            exit();
        } else {
            echo "Error updating sitter information.";
        }
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

    <title>Edit Sitter</title>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Sitter</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $sitter['FirstName']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $sitter['LastName']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="<?= $sitter['Address']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $sitter['Email']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="phone_nb">Phone Number</label>
                                <input type="text" class="form-control" id="phone_nb" name="phone_nb" value="<?= $sitter['PhoneNb']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="nic">NIC</label>
                                <input type="text" class="form-control" id="nic" name="nic" value="<?= $sitter['NIC']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="price">Price (LKR)</label>
                                <input type="text" class="form-control" id="price" name="price" value="<?= $sitter['Price']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description"><?= $sitter['Description']; ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
