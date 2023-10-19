<?php
// Assuming you have set up the database connection
$conn = mysqli_connect("localhost", "root", "", "petcaretestv1");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Function to sanitize the input data
function sanitizeData($data)
{
  return htmlspecialchars(trim($data));
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
  // Retrieve the form data and sanitize it
  $userFullName = sanitizeData($_POST['userFullName']);
  $userEmail = sanitizeData($_POST['userEmail']);
  $userPhone = sanitizeData($_POST['userPhone']);
  $userNIC = sanitizeData($_POST['userNIC']);
  $userAddress = sanitizeData($_POST['userAddress']);
  $userPassword = sanitizeData($_POST['userPassword']);
  $userRePassword = sanitizeData($_POST['userRePassword']);
  $petType = sanitizeData($_POST['petType']);
  $petName = sanitizeData($_POST['petName']);
  $Breed = sanitizeData($_POST['Breed']);
  $Weight = sanitizeData($_POST['Weight']);
  $gender = sanitizeData($_POST['Gender']);

  // Check if the passwords match
  if ($userPassword !== $userRePassword) {
    echo "Passwords do not match.";
    exit;
  }
  // Hash the password for security before storing in the database
  $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);

  // Prepare and execute the SQL query to insert the data into the database table
  $sql = "INSERT INTO users (userFullName, userEmail, userPhone, userNIC, userAddress, userPassword, petType, petName, Breed, Weight, Gender) 
          VALUES ('$userFullName', '$userEmail', '$userPhone', '$userNIC', '$userAddress', '$hashedPassword', '$petType', '$petName', '$Breed', '$Weight', '$gender')";

  if (mysqli_query($conn, $sql)) {
    echo "Registration successful!";
  } else {
    // Error occurred
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
}
?>
