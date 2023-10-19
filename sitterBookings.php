<?php
@include 'config.php';
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $petName = $_POST["petName"];
    $petType = $_POST["petType"];
    $petOwnerName = $_POST["petOwnerName"];
    $specialNeeds = $_POST["specialNeeds"];
    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];
    $feedingSchedule = $_POST["feedingSchedule"];
    $exerciseSchedule = $_POST["exerciseSchedule"];
    $petPhoto = $_FILES['petPhoto']['name'];

    // File Upload
    $targetDir = "uploads/";
    $fileName = basename($_FILES["petPhoto"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["petPhoto"]["tmp_name"], $targetFilePath);

    // Get the selected pet sitter's ID from the form
    $selectedSitterName = $_POST["selectedSitterName"];
    $selectedSitterEmail = $_POST["selectedSitterEmail"];
    $selectedSitterPrice = $_POST["selectedSitterPrice"];
    $sitterPrice = intval($selectedSitterPrice );


    // Calculate the total price based on duration and price per day
    $startDateObj = new DateTime($startDate);
    $endDateObj = new DateTime($endDate);
    $duration = $startDateObj->diff($endDateObj)->days + 1; // Calculate the number of days
    $totalPrice = $duration * $sitterPrice;
    
    // Additional Information
    $additionalInfo = $_POST["additionalInfo"];


    // Create connection
    $conn = mysqli_connect('localhost','root','','petcaretestv1');


    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO sitterbookings (petName, petType, petOwnerName, specialNeeds, startDate, endDate, feedingSchedule,  exerciseSchedule, petPhoto, additionalInfo,sitterName,sitterEmail,sitterPrice,totalAmount)
            VALUES ('$petName', '$petType', '$petOwnerName', '$specialNeeds', '$startDate', '$endDate', '$feedingSchedule',  '$exerciseSchedule', '$fileName', '$additionalInfo','$selectedSitterName','$selectedSitterEmail','$selectedSitterPrice','$totalPrice')";

    if ($conn->query($sql) === TRUE) {
        echo "Form data has been successfully submitted!";
        header("Location: generate_bill.php?booking_id=" . $conn->insert_id);
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>