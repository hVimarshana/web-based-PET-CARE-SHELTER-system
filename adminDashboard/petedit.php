<?php
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

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $columnsToUpdate = array(
            'pet_type' => $_POST['pet_type'],
            'pet_name' => $_POST['pet_name'],
            'breed' => $_POST['breed'],
            'weight' => $_POST['weight'],
            'gender' => $_POST['gender'],
            'special_req' => $_POST['special_req']
        );

        $setPart = '';
        foreach ($columnsToUpdate as $column => $value) {
            $value = mysqli_real_escape_string($con, $value);
            $setPart .= "$column = '$value', ";
        }
        $setPart = rtrim($setPart, ', ');

        $updateQuery = "UPDATE petsreg SET $setPart WHERE petid = '$petid'";
        $updateQuery_run = mysqli_query($con, $updateQuery);

        if ($updateQuery_run) {
            header("Location: petview.php?id=$petid");
            exit();
        } else {
            echo "Error updating pet information.";
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

    <title>Edit Pet</title>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Pet</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="pet_type">Pet Type</label>
                                <input type="text" class="form-control" id="pet_type" name="pet_type" value="<?= $pet['pet_type']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="pet_name">Pet Name</label>
                                <input type="text" class="form-control" id="pet_name" name="pet_name" value="<?= $pet['pet_name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="breed">Breed</label>
                                <input type="text" class="form-control" id="breed" name="breed" value="<?= $pet['breed']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="weight">Weight</label>
                                <input type="text" class="form-control" id="weight" name="weight" value="<?= $pet['weight']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <input type="text" class="form-control" id="gender" name="gender" value="<?= $pet['gender']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="special_req">Special Requirements</label>
                                <input type="text" class="form-control" id="special_req" name="special_req" value="<?= $pet['special_req']; ?>">
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
