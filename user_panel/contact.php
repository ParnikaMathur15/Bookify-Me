<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $email = $_POST['email'];
   $number = $_POST['number'];
   $msg = $_POST['message'];

   $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'Message sent Already!';
   }else{
      mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
      $message[] = 'Message sent Successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>contact</title>

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
            <a href="shop.php">Shop</a>
            <a href="contact.php"><span class="ac">Contact</span></a>
         </nav>
      </div>
   </div>
   
   <div class="header-1">
      <div class="flex">
         <div class="start">
            <a href="login.php"><button class="login_btn" value="Login">Login</button></a>
            <a href="logout.php" class="mfrm_btn">Logout</a>
            <a href="register.html"><button class="reg_btn" value="Register">Register</button></a>
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
   <h3>Contact Us</h3>
</div>

<section class="contact">

   <form action="" method="post">
      <h3>Your Message</h3>
      <input type="text" name="name" required placeholder="Enter your Name" class="box">
      <input type="email" name="email" required placeholder="Enter your Email" class="box">
      <input type="number" name="number" required placeholder="Enter your Number" class="box">
      <textarea name="message" class="box" placeholder="Your Message" id="" cols="30" rows="10"></textarea>
      <input type="submit" value="SEND" name="send" class="contact_btn">
   </form>

</section>

<?php include 'footer.php'?>

<!-- custom js file link  -->
<script src="script.js"></script>

</body>
</html>