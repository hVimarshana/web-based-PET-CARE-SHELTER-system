<?php
	
	$connection = mysqli_connect('localhost', 'root', '', 'petcaretestv1');

	if (!$connection) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	if (isset($_POST['submit'])) {
	    $petType = $_POST['pettype'];
		$petName = $_POST['petname'];
		$breed = $_POST['Breed'];
		$weight = $_POST['Weight'];
		$gender = $_POST['gender'];
		$specialReq = $_POST['specialReq'];


	    $query = "INSERT INTO petsreg (pet_type, pet_name, breed, weight, gender, special_req) VALUES ('$petType', '$petName', '$breed', '$weight', '$gender',
	    '$specialReq')";

	    mysqli_query($connection, $query);

	    echo "Form data inserted successfully!";
	    
	}

	mysqli_close($connection);
?>