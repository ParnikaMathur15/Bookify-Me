<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shop</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <!-- <link rel="stylesheet" href="style.css"> -->
   <link rel="stylesheet" href="style1.css">

</head>

<header class="header">

   <div class="header-2">
      <div class="flex">
         <a href="home.php" class="logo"><i class="fa-solid fa-book-open-reader"></i>BookifyMe</a>

         <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="about.php">About Us</a>
            <a href="sell.php"><span class="ac">Sell</span></a>
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
         <a href="shop.php"><button class="shop_btn">Visit Our Shop</button></a>
         <div class="navbar icons">
            <div id="user-btn" class="fas fa-user"></div>
            <div id="menu-btn" class="fas fa-bars"></div>
         </div>
      </div>
   </div>
</header>

<body>   

<div class="heading">
   <h3>Your Shop</h3>
</div>

<!-- <div class="products"> -->
<div class="bm">

    <div class="box-container">
        <form action="" method="post" class="box">
        <img class="image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQxE3eyaAfoO8ADGXLGzuxjAPq0LBK0MKrCQ&usqp=CAU" alt="">
        <div class="name">Refurbished : uitiwt qqeqe op</div>
        <div class="price">120</div>
        <input type="number" min="1" name="product_quantity" value="1" class="qty">
        <input type="hidden" name="product_name">
        <input type="hidden" name="product_price">
        <input type="hidden" name="product_image">
        </form>
    </div>

</div>

   <button class="crbtn" id="addr" onmouseover="showButton()" onmouseout="hideButton()" onclick="add()">+</button>
   <button class="pbtn" id="reviewButton">Add Your Product !!!</button>
    <div class="sbox-container" id="formBox">
        <button class="sclose-btn" onclick="formclose()">&times;</button>
        <form action="" method="post">
            <img class="image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQxE3eyaAfoO8ADGXLGzuxjAPq0LBK0MKrCQ&usqp=CAU" alt="">
            <div class="name">Refurbished : uitiwt qqeqe op</div>
            <div class="price">120</div>
            <input type="number" min="1" name="product_quantity" value="1" class="qty">
            <input type="hidden" name="product_name">
            <input type="hidden" name="product_price">
            <input type="hidden" name="product_image">
            <button  class="add_sell" type="submit">Add</button>
        </form>
    </div>


<!-- </div> -->

<?php include 'footer.php'?>

<!-- custom js file link  -->
<script src="script.js"></script>

</body>
</html>