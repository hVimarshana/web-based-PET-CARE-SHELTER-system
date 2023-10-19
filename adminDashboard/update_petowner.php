<?php
    session_start();
    require 'dbcon.php';

    if (isset($_POST['owner_id'])) {
        $ownerId = $_POST['owner_id'];
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $address = $_POST['address'];
        $phoneNb = $_POST['phone'];
        $email = $_POST['email'];

        // Update the pet owner details in the database
        $query = "UPDATE petowner SET FirstName = '$firstName', LastName = '$lastName', Address = '$address', PhoneNb = '$phoneNb', Email = '$email' WHERE petOwnerid = $ownerId";
        $result = mysqli_query($con, $query);

        if ($result) {
        $_SESSION['status'] = "Owner details updated successfully.";
        echo '<script>alert("Owner details updated successfully.");</script>';
    } else {
        $_SESSION['status'] = "Error updating owner details: " . mysqli_error($con);
    }
    header('Location: adminindex.php');
    exit();
} else {
    header('Location: adminindex.php');
    exit();
    }
?>
