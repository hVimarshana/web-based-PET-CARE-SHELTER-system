<?php
if (isset($_POST['submit'])) {
    $servername = "localhost";  
    $username = "root";      
    $password = "";      
    $dbname = "petcaretestv1";       

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $itemname = $_POST['itemname'];
    $price = $_POST['price'];

    $sql = "INSERT INTO petfoods (itemName, price) VALUES ('$itemname', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Data added successfully.");</script>';
		header("Location: petfood.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
