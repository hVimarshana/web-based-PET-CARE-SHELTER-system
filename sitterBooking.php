<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Pet Sitter Form</title>
    <link rel="stylesheet" href="css/sitterBookingCSS.css">

    <!-- ... (existing code) ... -->

<!-- Add the following CSS styles in the head section -->
<style>
  /* Style for the selected sitter box */
  .sitter-box.selected {
    border: 5px solid #4CAF50;
    background-color: #f2f2f2;
  }

  /* Style for the "Select" button after it's been clicked */
  .select-sitter-btn.clicked {
    background-color: #4CAF50;
    color: #fff;
  }
</style>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Get all the "select" buttons
    const selectButtons = document.querySelectorAll(".select-sitter-btn");

    // Add a click event listener to each "select" button
    selectButtons.forEach(button => {
      button.addEventListener("click", function() {
        // Remove the "selected" class from all sitter boxes
        const sitterBoxes = document.querySelectorAll(".sitter-box");
        sitterBoxes.forEach(box => {
          box.classList.remove("selected");
        });

        // Add the "selected" class to the parent sitter box
        const sitterBox = button.closest(".sitter-box");
        sitterBox.classList.add("selected");

        // Remove the "clicked" class from all "Select" buttons
        selectButtons.forEach(btn => {
          btn.classList.remove("clicked");
        });

        // Add the "clicked" class to the clicked "Select" button
        button.classList.add("clicked");

        // Get the selected sitter's name, email, and price from the data attributes
        const sitterName = button.getAttribute("data-sitter-name");
        const sitterEmail = button.getAttribute("data-sitter-email");
        const sitterPrice = button.getAttribute("data-sitter-price");

        // Set the values of hidden input fields to the selected sitter's name, email, and price
        document.getElementById("selectedSitterName").value = sitterName;
        document.getElementById("selectedSitterEmail").value = sitterEmail;
        document.getElementById("selectedSitterPrice").value = sitterPrice;
      });
    });
  });
</script>

</head>

<body>
    <div class="container">
        <h2>Book a Pet Sitter</h2>
        <form action="sitterBookings.php" method="post">
            <div class="form-group">
                <label for="petName">Pet Name:</label>
                <input type="text" id="petName" name="petName" required>
            </div>
            <div class="form-group">
                <label for="petType">Select Pet Type:</label><br>

                <label for="cat">Cat</label>
                <input type="checkbox" id="cat" name="petType" value="cat">
                
                <label for="dog">Dog</label>
                <input type="checkbox" id="dog" name="petType" value="dog">
                
            </div>
            <div class="form-group">
                <label for="petOwnerName">Pet Owner Name:</label>
                <input type="text" id="petOwnerName" name="petOwnerName" required>
            </div>
            <div class="form-group">
                <label for="specialNeeds">Special Needs of Pet:</label>
                <textarea id="specialNeeds" name="specialNeeds"></textarea>
            </div>
            <div class="form-group">
                <label for="startDate">From Date:</label>
                <input type="date" id="startDate" name="startDate" required>
            </div>
            <div class="form-group">
                <label for="endDate">To Date:</label>
                <input type="date" id="endDate" name="endDate" required>
            </div>
            <div class="form-group">
                <label for="feedingSchedule">Feeding Schedule:</label>
                <input type="text" id="feedingSchedule" name="feedingSchedule" required>
            </div>
            <div class="form-group">
                <label for="exerciseSchedule">Exercise Schedule:</label>
                <input type="text" id="exerciseSchedule" name="exerciseSchedule" required>
            </div>
            <div class="form-group">
                <label for="petPhoto">Upload Image of Your Pet:</label>
                <input type="file" id="petPhoto" name="petPhoto" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="additionalInfo">Any other information you would like to provide:</label>
                <textarea id="additionalInfo" name="additionalInfo"></textarea>
            </div>
            <!-- Placeholder to display available sitters -->
            <div id="availableSittersContainer">

                    <?php
        // Assuming you have set up the database connection
        $conn = mysqli_connect("localhost", "root", "", "petcaretestv1");

        // Retrieve the data from the 'sitters' table
        $query = "SELECT * FROM petsitters";
        $result = mysqli_query($conn, $query);
        $sitters = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach ($sitters as $sitter) {
        ?>
        <div class="sitter-box">
            <h3><?php echo $sitter['FirstName']; ?></h3>
            <p>Contact: <?php echo $sitter['PhoneNb']; ?></p>
            <p>Email: <?php echo $sitter['Email']; ?></p>
            <p>Address: <?php echo $sitter['Address']; ?></p>
            <p>Price: <?php echo $sitter['Price']; ?></p>
            <p>Description: <?php echo $sitter['Description']; ?></p>
            
            <!-- Hidden input fields to store the selected sitter's name, email, and price -->
            <input type="hidden" class="selectedSitterName" name="selectedSitterName" value="<?php echo $sitter['FirstName']; ?>">
            <input type="hidden" class="selectedSitterEmail" name="selectedSitterEmail" value="<?php echo $sitter['Email']; ?>">
            <input type="hidden" class="selectedSitterPrice" name="selectedSitterPrice" value="<?php echo $sitter['Price']; ?>">

            <input type="button" class="select-sitter-btn" data-sitter-name="<?php echo $sitter['FirstName']; ?>
            " data-sitter-email="<?php echo $sitter['Email']; ?>
            " data-sitter-price="<?php echo $sitter['Price']; ?>" value="Select">
        </div>
        <?php
    }
    // Close the database connection
    mysqli_close($conn);
    ?>
           
            </div><br>
            <div class="form-group">
                <input type="submit" value="Submit">
            </div>

        </form>
    </div>
</body>

</html>