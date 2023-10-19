<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Petology</title>

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

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/Cartstyle.css">
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <img src="images/logo (2).png" alt="">
            <span>
              Pet Care Shelter
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="service.html">service </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pet.html">Pet's gallery </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.html">Contact us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="buy.php"> Pet Foods & Accesories </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="cart.php"> <img src="images/shopping cart 2.png" alt=""></a>
                </li>
              </ul>
            </div>

          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

<?php 
@include 'config.php';

if (isset($_POST['add_to_cart'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;
}
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE itemName = '$product_name'");

    // Check if the query execution is successful
    if ($select_cart === false) {
        die("Query failed: " . mysqli_error($conn));
    }

    // Now you can use mysqli_num_rows() safely
    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'product already added to cart';
    } else {
        $insert_product = mysqli_query($conn, "INSERT INTO `cart`(itemName, price,quantity) VALUES('$product_name', '$product_price', '$product_quantity')");
        if ($insert_product === false) {
            die("Insert query failed: " . mysqli_error($conn));
        }
        $message[] = 'product added to cart successfully';
    }



if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<div class="container">

<section class="products">

   <h1 class="heading">latest products</h1>

   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM `petfoods`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
            <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
            <h3><?php echo $fetch_product['itemName']; ?></h3>
            <div class="price">$<?php echo $fetch_product['price']; ?>/-</div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['itemName']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="submit" class="btn" value="add to cart" name="add_to_cart">
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

</section>

</div>

    

    <!-- Add more product cards as needed -->
</div>


  <section class="buy_section layout_padding">
    <div class="container">
      <h2>
        You Can Buy Pet From Our Clinic
      </h2>
      <p>
        We pride ourselves on offering a wide variety of high-quality pet foods that cater to different dietary
        preferences and health requirements,
        ensuring your furry friends receive optimal nutrition. In addition, we provide a delightful array of
        accessories,
        from trendy collars and cozy beds to interactive toys and grooming essentials, to enhance their comfort and
        happiness.
        Shop with us and treat your beloved pets to a world of exceptional nourishment and stylish indulgence.
      </p>
      <div class="d-flex justify-content-center">
        <a href="">
          Buy Now
        </a>
      </div>
    </div>
  </section>

  <!-- -->

  

  <!-- info section -->
  <section class="info_section layout_padding2">
    <div class="container">
      <div class="info_items">
        <a href="">
          <div class="item ">
            <div class="img-box box-1">
              <img src="" alt="">
            </div>
            <div class="detail-box">
              <p>
                Pet Care Shelter By Ravi
              </p>
            </div>
          </div>
        </a>
        <a href="">
          <div class="item ">
            <div class="img-box box-2">
              <img src="" alt="">
            </div>
            <div class="detail-box">
              <p>
                011 2257 556
              </p>
            </div>
          </div>
        </a>
        <a href="">
          <div class="item ">
            <div class="img-box box-3">
              <img src="" alt="">
            </div>
            <div class="detail-box">
              <p>
                petcareshelter@gmail.com
              </p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </section>
<!-- end info section -->

  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      &copy;  All Rights Reserved By Pet Care Shelter
      
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

</body>

</html>
