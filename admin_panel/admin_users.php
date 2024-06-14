<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `users` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_users.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>users</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="admin_style.css">
   <link rel="stylesheet" href="style1.css">

</head>
<body>
   
<header class="header">

<div class="header-2">
<div class="flex">

<a href="admin_page.php" class="logo">Admin Panel</span></a>

<nav class="navbar">
   <a href="admin_page.php">Home</a>
   <a href="admin_products.php">Products</a>
   <a href="admin_orders.php">Orders</a>
   <a href="admin_users.php"><span class="ac">Users</span></a>
   <a href="admin_contacts.php">Messages</a>
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

<section class="users">

   <h1 class="title"> User Accounts </h1>

   <div class="box-container">
      <?php
         $select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
         while($fetch_users = mysqli_fetch_assoc($select_users)){
      ?>
      <div class="box">
         <p> User id : <span><?php echo $fetch_users['id']; ?></span> </p>
         <p> Username : <span><?php echo $fetch_users['name']; ?></span> </p>
         <p> Email : <span><?php echo $fetch_users['email']; ?></span> </p>
         <p> User type : <span style="color:<?php if($fetch_users['user_type'] == 'admin'){ echo 'red'; } ?>"><?php echo $fetch_users['user_type']; ?></span> </p>
         <a href="admin_users.php?delete=<?php echo $fetch_users['id']; ?>" onclick="return confirm('delete this user?');" class="mfrm_btn" style="margin:auto;">Delete User</a>
      </div>
      <?php
         };
      ?>
   </div>

</section>









<!-- custom admin js file link  -->
<script src="script.js"></script>

</body>
</html>