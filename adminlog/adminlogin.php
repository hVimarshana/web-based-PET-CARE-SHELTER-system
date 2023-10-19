<!DOCTYPE html>
<html lang="en">

<head>
  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card">
          <h2 class="card-title text-center">Admin Login</h2>
          <div class="card-body py-md-4">
            <form method="POST" action="adminlog.php">
              <div class="form-group">
                <input type="text" class="form-control" id="username" name="username" placeholder="UserName">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
              </div>
              <div id="error-popup" class="d-none alert alert-danger" role="alert">
                <?php
                  if (isset($_SESSION['error_message'])) {
                    echo $_SESSION['error_message'];
                    unset($_SESSION['error_message']); // Clear the error message after displaying
                  }
                ?>
              </div>
              <div class="d-flex flex-row align-items-center justify-content-between">
                <button class="btn btn-primary" type="submit">Login</button>
              </div>
			  
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Add jQuery and Bootstrap's JavaScript -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.min.js"></script>
  
  <script>
    // Show popup if error message is present
    $(document).ready(function() {
      const errorMessage = "<?php echo isset($_SESSION['error_message']) ? $_SESSION['error_message'] : ''; ?>";
      if (errorMessage) {
        $('#error-popup').removeClass('d-none');
      }
    });
  </script>
</body>
</html>
