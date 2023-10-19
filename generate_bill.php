<?php
// Retrieve the booking ID from the URL parameter
if (isset($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];

    // Create connection
    $conn = mysqli_connect('localhost', 'root', '', 'petcaretestv1');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch the booking details from the database based on the booking ID
    $sql = "SELECT * FROM sitterbookings WHERE id = $booking_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the booking details as an associative array
        $booking = $result->fetch_assoc();
    } else {
        // Handle the case when the booking ID is not found
        echo "Booking not found.";
        exit();
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle the case when the booking ID is not provided
    echo "Invalid request.";
    exit();
}
?>

<!DOCTYPE html>
<head>
  <title>Booking Bill</title>
  <style>
  body {
    font-family: "Tahoma";
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f2f2f2;
  }

  .pdf-container {
    width: 750px;
    border: 1px solid #ccc;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    padding: 20px;
  }

  h2 {
    text-align: left;
    font-size: 24px;
    margin-bottom: 20px;
    color: blue;
    margin-top: 100px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }

  th,
  td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ccc;
  }

  th {
    font-weight: bold;
  }

  .pdf-contents {
    margin-bottom: 20px;
  }

  .pdf-contents h3 {
    margin: 0;
    font-size: 18px;
    color: #555;
  }

  /* Optional: Highlight the sitter's info */
  tr.sitter-info td {
    background-color: #f2f2f2;
    font-weight: bold;
  }
  .terms{
    font-size :12px;
  }
  .conditions{
    font-size: 11px;
  }
</style>
</head>
<body>
    <div class="pdf-container">
        <div class="pdf-contents">
        <h2>Pet sitter Booking Bill</h2>
    <table>
        <tr>
            <td>
                <h2><img src="images/logo (2).png" alt=""></h2>

            </td>
            <td><h2>Pet sitter Booking Bill</h2></td>
        </tr>
        <tr>
            <td><p>Booking ID:</p></td>
            <td><p>00<?php echo $booking['id']; ?></p></td>
            <td></td>
        </tr>
        <tr>
            <td><h3>Pet Info:</h3></td>
            <td></td>
        </tr>
        <tr>
            <td><p>Pet Name:</p></td>
            <td><p><?php echo $booking['petName']; ?></p></td>
            <td></td>
        </tr>
        <tr>
            <td><p>Pet Type:</p></td>
            <td><p><?php echo $booking['petType']; ?></p></td>
        </tr>
        <tr>
            <td><p>Pet Owner Name:</p></td>
            <td><p><?php echo $booking['petOwnerName']; ?></p></td>
        </tr>
        <tr>
            <td><p>Check in date:</p></td>
            <td><p><?php echo $booking['startDate']; ?></p></td>
        </tr>
        <tr>
            <td><p>Check out date:</p></td>
            <td><p><?php echo $booking['endDate']; ?></p></td>
        </tr>

        <tr>
            <td><h3>Pet Sitters Info:</h3></td>
            <td></td>
        </tr>
        <tr>
            <td><p>Pet Sitter Name:</p></td>
            <td><h4><?php echo $booking['sitterName']; ?></h4></td>
        </tr>
        <tr>
            <td><p>Pet Sitter Email:</p></td>
            <td><h4><?php echo $booking['sitterEmail']; ?></h4></td>
        </tr>
        <tr>
            <td><p> Sitter's Price(per day):</p></td>
            <td><h4>$<?php echo $booking['sitterPrice']; ?></h4></td>
        </tr>
        <tr>
            <td><p> Your Total Amount:</p></td>
            <td><h3>$<?php echo $booking['totalAmount']; ?></h3></td>
        </tr>
        <tr>
            <td>
                <p class ="terms">Terms and Conditions:</p>

        <p class="conditions">Pets must be up-to-date on vaccinations and free from contagious diseases.</p>
        <p class="conditions">Pet owner is responsible for providing sufficient food, treats, and medications for the duration of pet sitting.</p>
        <p class="conditions">The pet sitter will make reasonable efforts to keep the pet safe and secure during the service period.</p>
        <p class="conditions">The pet owner grants permission for the pet sitter to seek medical treatment for the pet in case of an emergency.</p>
            </td>
        </tr>
        </table>
        
        </div>
    </div>
    <h1></h1>
    
</body>
</html>