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
   <title>search page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style1.css">

</head>

<header class="header">

   <div class="header-2">
      <div class="flex">
         <a href="home.html" class="logo"><i class="fa-solid fa-book-open-reader"></i>BookifyMe</a>

         <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="about.php">About Us</a>
            <a href="shop.php"><span class="ac">Shop</span></a>
            <a href="contact.php">Contact</a>
         </nav>
      </div>
   </div> 
   
   <div class="header-1">
      <div class="flex">
         <div class="start">
            <a href="login.php"><button class="login_btn" value="Login">Login</button></a>
            <a href="register.php"><button class="reg_btn" value="Register">Register</button></a>
         </div>
         <div class="navbar icons">
            <a href="search_page.php" class="fas fa-search"></a>
            <div id="user-btn" class="fas fa-user"></div>
            <a href="cart.php" class="fas fa-shopping-cart"></a>
            <div id="menu-btn" class="fas fa-bars"></div>
         </div>
      </div>
   </div>
</header>

<body> 

<div class="heading">
   <h3>Search Page</h3>
</div>

<section class="search-form">
   <form action="" method="post">
      <input type="text" name="search" placeholder="Search products..." class="box">
      <input type="submit" name="submit" value="Search It" class="mfrm_btn" style="margin: 0;">
   </form>
</section>

<section class="products">

   <div class="pbox">
   <?php
      if(isset($_POST['submit'])){
         $search_item = $_POST['search'];
         $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE name LIKE '%{$search_item}%'") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
   ?>
   <form action="" method="post" class="box">
      <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="" class="image">
      <div class="name"><?php echo $fetch_product['name']; ?></div>
      <div class="price">₹<?php echo $fetch_product['price']; ?>/-</div>
      <input type="number"  class="qty" name="product_quantity" min="1" value="1">
      <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
      <input type="submit" class="cart_submit" value="Add to Cart" name="add_to_cart">
   </form>
   <?php
            }
         }else{
            echo '<p class="empty">No Result Found!</p>';
         }
      }else{
         echo '<p class="empty">Search Something!</p>';      }
   ?>
   </div>
</section>

<?php include 'footer.php'?>

<!-- custom js file link  -->
<script src="script.js"></script>

</body>
</html>