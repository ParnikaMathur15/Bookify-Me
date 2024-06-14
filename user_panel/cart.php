<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['update_cart'])){
   $cart_id = $_POST['cart_id'];
   $cart_quantity = $_POST['cart_quantity'];
   mysqli_query($conn, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id'") or die('query failed');
   $message[] = 'cart quantity updated!';
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');
   header('location:cart.php');
}

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cart</title>

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
         <a href="orders.php"><button class="sell_btn" value="Sell">View Your Orders</button></a>
         <div class="navbar icons">
            <a href="search_page.php" class="fas fa-search"></a>
            <div id="user-btn" class="fas fa-user"></div>
            <a href="cart.php" class="fas fa-shopping-cart"></a>
            <div id="menu-btn" class="fas fa-bars"></div>
         </div>
      </div>
   </div>

</header>

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

<body>
<div class="heading">
   <h3>Shopping Cart</h3>
</div>

<section class="shopping-cart">

   <h1 class="title">Products Added</h1>

   <div class="box-container">
      <?php
         $grand_total = 0;
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){   
      ?>
      <div class="box">
         <img src="uploaded_img/<?php echo $fetch_cart['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_cart['name']; ?></div>
         <div class="price">₹<?php echo $fetch_cart['price']; ?>/-</div>
         <form action="" method="post">
            <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
            <input type="number" min="1" name="cart_quantity" class="qty" value="<?php echo $fetch_cart['quantity']; ?>">
            <br><input type="submit" name="update_cart" value="Update" class="mfrm_btn">
         </form>
         <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="cancel" onclick="return confirm('Delete this from Cart?');">Delete Item</a>
         <div class="sub-total"> Sub total : <span>₹<?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']); ?>/-</span> </div>
      </div>
      <?php
      $grand_total += $sub_total;
         }
      }else{
         echo '<p class="empty">Your Cart is Empty!!!</p>';
      }
      ?>
   </div>

   <div style="margin-top: 2rem; text-align:center;">
      <a href="cart.php?delete_all" class=" cs <?php echo ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('delete all from cart?');">Delete All</a>
   </div>

   <div class="cart-total">
      <p>Grand Total : <span>₹<?php echo $grand_total; ?>/-</span></p>
      <div class="flex">
         <a href="shop.php" class="cs">Continue Shopping</a>
         <a href="checkout.php" class="cs <?php echo ($grand_total > 1)?'':'disabled'; ?>">Proceed to Checkout</a>
      </div>
   </div>


</section>

<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="script.js"></script>

</body>
</html>
