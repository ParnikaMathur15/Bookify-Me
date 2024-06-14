<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>BookifyMe</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style1.css">

</head>

<header class="header">
   <div class="header-2">
      <div class="flex">
         <a href="home.php" class="logo"><i class="fa-solid fa-book-open-reader"></i>BookifyMe</a>

         <nav class="navbar">
            <a href="home.php"><span class="ac">Home</span></a>
            <a href="about.php">About Us</a>
            <a href="shop.php">Shop</a>
            <a href="contact.php">Contact</a>
         </nav>
      </div>
   </div>

   <div class="header-1">
      <div class="flex">
         <div class="start">
            <a href="login.php"><button class="login_btn" value="Login">Login</button></a>
            <a href="logout.php" class="mfrm_btn">Logout</a>
            <a href="register.php"><button class="reg_btn" value="Register">Register</button></a>
         </div>
         <div class="navbar icons">
            <a href="search_page.php" class="fas fa-search"></a>
            <div id="user-btn" class="fas fa-user"></div>
            <a href="cart.php" class="fas fa-shopping-cart"></a>
            <div id="menu-btn" class="fas fa-bars"></div>
         </div>

         <div class="user-box">
            <p>Username : <span><?php echo $_SESSION["user_name"]; ?></span></p>
            <p>Email : <span><?php echo $_SESSION["user_email"]; ?></span></p>
            <a href="logout.php" class="mfrm_btn">Logout</a>
         </div>
      </div>
   </div>

</header>

<body>

   <section class="home">
      <div class="content">
         <h3>Welcome Dear Reader !!!</h3>
         <p>Bookify Me provides you books of all genres at your doorstep at a click. <br>Happy Reading !!!</p>
         <div class="cbtn">
            <a href="shop.php"><button type="button" value="Buy" class="hbtn bbtn">Buy</button></a>
            <a href="sell.php"><button type="button" value="Sell" class="hbtn sbtn">Sell</button></a>
         </div>
         
      </div>
   </section>

   <div class="sevices">
      <h3 class="offer">WE OFFER</h3>
      <div class="services-box1">
         <div class="services-card">
            <i class="fa-brands fa-shopify"></i>
            <h3>Effective Buying</h3>
            <p>
               Step into a world of handpicked books just for you. 
               Our diverse collection guarantees a perfect match for your taste. 
               With expert recommendations and personalized service, finding your next 
               favorite read has never been easier. Join us in discovering the joy of literature, one book at a time.
            </p>
         </div>

         <div class="services-card">
            <i class="fa-solid fa-file-invoice-dollar"></i>
            <h3>Smooth Selling</h3>
            <p>
               Experience seamless transactions as we guide you through the process of selling your 
               books with ease and efficiency. Our dedicated team is committed to providing a 
               hassle-free selling experience, ensuring fair prices and transparent procedures every 
               step of the way.
            </p>
         </div>
      </div>
      <div class="services-box2">
         <div class="services-card">
            <i class="fa-solid fa-motorcycle"></i>
            <h3>Fast Delivery</h3>
            <p>
               Get your books delivered quickly with our fast delivery service.
            </p>
         </div>

         <div class="services-card">
            <i class="fa-sharp fa-solid fa-headphones"></i>
            <h3>24 x 7 Services</h3>
            <p>
               Access our services anytime, day or night, for your convenience.
            </p>
         </div>

         <div class="services-card">
            <i class="fa-solid fa-table-list"></i>
            <h3>Wide Choices</h3>
            <p>
               Explore a vast collection of books at our shop, offering something for every reader's taste and interest.
            </p>
         </div>

         <div class="services-card">
            <i class="fa-solid fa-credit-card"></i>
            <h3>Secure Payment</h3>
            <p>
               Make payments securely through our trusted payment gateway.
            </p>
         </div>

      </div>
   </div>

<section class="home-contact">

   <div class="content">
      <h3>Have a Question??</h3>
      <p>Facing a problem ? Feel free to contact us.</p>
      <a href="contact.php"><button type="button" class="hc">Send Your Query</button></a>
   </div>

</section>

<?php include 'footer.php'?>

<!-- custom js file link  -->
<script src="script.js"></script>
   
</body>
</html>
