<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `message` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_contacts.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>messages</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="admin_style.css">
   <link rel="stylesheet" href="style1.css">

</head>
<header class="header">

<div class="header-2">
<div class="flex">

<a href="admin_page.php" class="logo">Admin Panel</span></a>

<nav class="navbar">
   <a href="admin_page.php">Home</a>
   <a href="admin_products.php">Products</a>
   <a href="admin_orders.php">Orders</a>
   <a href="admin_users.php">Users</a>
   <a href="admin_contacts.php"><span class="ac">Messages</span></a>
</nav>

<div class="icons">
   <div id="menu-btn" class="fas fa-bars"></div>
   <div id="user-btn" class="fas fa-user"></div>
</div>

</div>

   <div class="header-1">
      <div class="flex">
         <div class="start">
            <a href="login.php"><button class="login_btn" value="Login">Login</button></a>
            <a href="logout.php" class="mfrm_btn">Logout</a>
            <a href="register.php"><button class="reg_btn" value="Register">Register</button></a>
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

<section class="messages">

   <h1 class="title"> messages </h1>

   <div class="box-container">
   <?php
      $select_message = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
      if(mysqli_num_rows($select_message) > 0){
         while($fetch_message = mysqli_fetch_assoc($select_message)){
      
   ?>
   <div class="box">
      <p> User id : <span><?php echo $fetch_message['user_id']; ?></span> </p>
      <p> Name : <span><?php echo $fetch_message['name']; ?></span> </p>
      <p> Number : <span><?php echo $fetch_message['number']; ?></span> </p>
      <p> Email : <span><?php echo $fetch_message['email']; ?></span> </p>
      <p> Message : <span style="color: red;"><?php echo $fetch_message['message']; ?></span> </p>
      <a href="admin_contacts.php?delete=<?php echo $fetch_message['id']; ?>" onclick="return confirm('delete this message?');" class="mfrm_btn">Delete Message</a>
   </div>
   <?php
      };
   }else{
      echo '<p class="empty">you have no messages!</p>';
   }
   ?>
   </div>

</section>


<!-- custom admin js file link  -->
<script src="script.js"></script>

</body>
</html>