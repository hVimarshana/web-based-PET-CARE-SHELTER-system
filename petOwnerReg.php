<?php
	
	$connection = mysqli_connect('localhost', 'root', '', 'petcaretestv1');

	if (!$connection) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	if (isset($_POST['submit'])) {
	    $Fname = $_POST['firstname'];
		$lname = $_POST['lastname'];
		$Address = $_POST['Address'];
		$phoneNb = $_POST['phoneNb'];
		$Email = $_POST['Email'];

	    $query = "INSERT INTO petowner(firstname, lastname, Address, phoneNb, Email) VALUES ('$Fname', '$lname', '$Address', '$phoneNb', '$Email')";

	    mysqli_query($connection, $query);
	    

	    header("Location: PetReg.html");
    	exit();

	}

	mysqli_close($connection);
?>