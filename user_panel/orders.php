<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>orders</title>

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
            <a href="home.php">Home</a>
            <a href="about.php">About Us</span></a>
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
      </div>
   </div>

</header>


<body>
<div id="message">
      <?php
         if(isset($message)){
            foreach($message as $message){
               echo $message;
            }
         }
      ?>
      <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
   </div> 

<div class="heading">
   <h3>your orders</h3>
</div>

<section class="placed-orders">

   <h1 class="title">placed orders</h1>

   <div class="box-container">

      <?php
         $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($order_query) > 0){
            while($fetch_orders = mysqli_fetch_assoc($order_query)){
      ?>
      <div class="box">
         <p> Name : <span><?php echo $fetch_orders['name']; ?></span> </p>
         <p> Number : <span><?php echo $fetch_orders['number']; ?></span> </p>
         <p> Email : <span><?php echo $fetch_orders['email']; ?></span> </p>
         <p> Address : <span><?php echo $fetch_orders['address']; ?></span> </p>
         <p> Payment Method : <span><?php echo $fetch_orders['method']; ?></span> </p>
         <p style="width: 100%;"> Your Orders : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
         <p> Total Price : <span>₹<?php echo $fetch_orders['total_price']; ?>/-</span> </p>
         <p> Payment Status : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; } ?>;"><?php echo $fetch_orders['payment_status']; ?></span> </p>
         </div>
      <?php
       }
      }else{
         echo '<p class="empty">No orders placed yet!</p>';
      }
      ?>
   </div>

</section>


<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>