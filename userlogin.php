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
if (isset($_POST['username']) && isset($_POST['password'])) {
  // Retrieve the form data and sanitize it
  $userEmail = sanitizeData($_POST['username']);
  $userPassword = sanitizeData($_POST['password']);

  // Prepare and execute the SQL query to check the user credentials in the database
  $sql = "SELECT * FROM users WHERE userEmail = '$userEmail'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) === 1) {
    // User exists, check the password
    $userData = mysqli_fetch_assoc($result);
    $storedPassword = $userData['userPassword'];

    // Verify the password
    if (password_verify($userPassword, $storedPassword)) {
      // Login successful
      echo "Login successful!";
      // You can redirect the user to a different page or perform other actions here.
    } else {
      // Incorrect password
      echo "Incorrect password.";
    }
  } else {
    // User not found
    echo "User not found.";
  }

  // Close the database connection
  mysqli_close($conn);
}
?>
