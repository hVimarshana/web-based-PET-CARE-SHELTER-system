<?php
	$connection = mysqli_connect('localhost', 'root', '', 'petcaretestv1');

	if (!$connection) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	if (isset($_POST['submit'])) {
	    $Fname = $_POST['firstname'];
		$lname = $_POST['lastname'];
		$Address = $_POST['Address'];
		$Email = $_POST['Email'];
		$phoneNb = $_POST['phoneNb'];
		$NIC = $_POST['NIC'];
		$Price = $_POST['Price'];
		$Description = $_POST['Description'];

	    $query = "INSERT INTO petsitters(Firstname, Lastname, Address, Email, phoneNb, NIC, Price, Description) VALUES ('$Fname', '$lname', '$Address', '$Email', '$phoneNb', '$NIC', '$Price', '$Description' )";

	    mysqli_query($connection, $query);
	    

	    header("Location: index.html");
    		exit();

	}

	mysqli_close($connection);
?>