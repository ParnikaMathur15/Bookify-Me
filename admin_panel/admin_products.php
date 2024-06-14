<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_POST['add_product'])){

   $name = $_POST['name'];
   $price = $_POST['price'];
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$name'") or die('query failed');

   if(mysqli_num_rows($select_product_name) > 0){
      $message[] = 'Product Name already added';
   }else{
      $add_product_query = mysqli_query($conn, "INSERT INTO `products`(name, price, image) VALUES('$name', '$price', '$image')") or die('query failed');

      if($add_product_query){
         if($image_size > 2000000){
            $message[] = 'Image size is too large';
         }else{
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'Product added Successfully!';
         }
      }else{
         $message[] = 'Product could not be Added!';
      }
   }
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_image_query = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$delete_id'") or die('query failed');
   $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
   unlink('uploaded_img/'.$fetch_delete_image['image']);
   mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_products.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

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
   <a href="admin_products.php"><span class="ac">Products</span></a>
   <a href="admin_orders.php">Orders</a>
   <a href="admin_users.php">Users</a>
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

<!-- product CRUD section starts  -->

<section class="add-products">

   <h1 class="title">shop products</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <h3>add product</h3>
      <input type="text" name="name" class="box" placeholder="Enter Product Name" required>
      <input type="number" min="0" name="price" class="box" placeholder="Enter Product Price" required>
      <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
      <input type="submit" value="Add Product" name="add_product" class="mfrm_btn" style="margin: 2% auto;">
   </form>

</section>



<section class="show-products">

   <div class="box-container">

      <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
      <div class="box">
         <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_products['name']; ?></div>
         <div class="price">₹<?php echo $fetch_products['price']; ?>/-</div>
         <a href="admin_products.php?delete=<?php echo $fetch_products['id']; ?>" class="mfrm_btn" style="margin: 50px;" onclick="return confirm('Delete this product?');">Delete</a>
      </div>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

</section>

<!-- custom admin js file link  -->
<script src="script.js"></script>

</body>
</html>