<?php
// useredit.php

// Include your database connection code here
// For example:
// $con = mysqli_connect("localhost", "username", "password", "database_name");

// Check if the user ID is provided in the URL

session_start();
    require 'dbcon.php';
	
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Fetch the user details from the database
    $query = "SELECT * FROM users WHERE userid = $userId";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        // User found, retrieve the data
        $user = mysqli_fetch_assoc($result);

        // Handle the form submission for updating user details
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve the updated form values
            $updatedFullName = $_POST['full_name'];
            $updatedEmail = $_POST['user_email'];
            $updatedPhone = $_POST['user_phone'];
            $updatedNIC = $_POST['user_nic'];
            $updatedAddress = $_POST['user_address'];
            // ... Add more fields as required

            // Update the user details in the database
            $updateQuery = "UPDATE users SET userFullName='$updatedFullName', 
                                              userEmail='$updatedEmail', 
                                              userPhone='$updatedPhone', 
                                              userNIC='$updatedNIC', 
                                              userAddress='$updatedAddress' 
                                              /* Add more fields here if needed */
                           WHERE userid=$userId";

            if (mysqli_query($con, $updateQuery)) {
                // User details updated successfully
                echo "User details updated successfully!";
                // Redirect the user back to the user list page (assuming it's named "userlist.php")
                header("Location: userlist.php");
                exit;
            } else {
                echo "Error updating user details: " . mysqli_error($con);
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
                                <label for="full_name">Full Name:</label>
								<input type="text" id="full_name" name="full_name" value="<?= $user['userFullName']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="user_email">Email:</label>
    <input type="email" id="user_email" name="user_email" value="<?= $user['userEmail']; ?>" required>
                            </div>
                            <div class="form-group">
                                 <label for="user_phone">Phone:</label>
    <input type="tel" id="user_phone" name="user_phone" value="<?= $user['userPhone']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="user_nic">NIC:</label>
    <input type="text" id="user_nic" name="user_nic" value="<?= $user['userNIC']; ?>" required>

                            </div>
                            <div class="form-group">
                                <label for="user_address">Address:</label>
    <input type="text" id="user_address" name="user_address" value="<?= $user['userAddress']; ?>" required>
                            
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






<!-- HTML form to display the user details and allow editing -->
<form action="" method="POST">
    
    

   

    
    

    <!-- Add more input fields for other user details if needed -->

    
</form>

<?php
    } else {
        echo "User not found.";
    }
} else {
    echo "User ID not provided.";
}
?>
