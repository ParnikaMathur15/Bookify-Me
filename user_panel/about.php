<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About</title>

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
            <a href="about.php"><span class="ac">About Us</span></a>
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

<div class="heading">
   <h3>About Us</h3>
</div>

<section class="home-contact">

   <div class="content">
      <h3>Why Choose Us??</h3>
      <p>At Bookify Me, we strive to provide the best book-buying experience for our customers. Our commitment to quality service and customer satisfaction sets us apart.</p>
         <p>With a wide selection of books and convenient delivery options, we make it easy for you to indulge in your love for reading.</p>
      <a href="#footer"><button type="button" class="hc">Check Our Socials</button></a>
   </div>

</section>

<h1 class="c_title">Our client reviews</h1>

<section class="reviews">

   <div class="box-container">

      <div class="box">
         <img src="pic-1.png" alt="">
         <div class="info">
            <h3>Michael Smith</h3>
            <div class="stars">
               <h3>Rating : 3</h3>
            </div>
         </div>
         <p>Bookify Me made buying books online a breeze. Their wide selection and prompt delivery exceeded my expectations.</p>
      </div>

      <div class="box">
         <img src="pic-2.png" alt="">
         <div class="info">
            <h3>Emily Johnson</h3>
            <div class="stars">
               <h3>Rating : 3</h3>
            </div>
         </div>
         <p>I absolutely love Bookify Me! Their selection is vast, and their delivery is always quick. Highly recommend!</p>
      </div>

      <div class="box">
         <img src="pic-3.png" alt="">
         <div class="info">
            <h3>David Will</h3>
            <div class="stars">
               <h3>Rating : 3</h3>
            </div>
         </div>
            <p>I've been a loyal customer of Bookify Me for years. Their customer service is top-notch, and their book quality is unmatched</p>
      </div>

      <div class="box">
         <img src="pic-4.png" alt="">
         <div class="info">
            <h3>Sarah Taylor</h3>
            <div class="stars">
               <h3>Rating : 3</h3>
            </div>
         </div>
         <p>I recently discovered Bookify Me, and I'm impressed! Their website is easy to navigate, and the checkout process is smooth.</p>
      </div>
   </div>
   <button class="crbtn" id="addr" onmouseover="showButton()" onmouseout="hideButton()" onclick="add()">+</button>
   <button class="rbtn" id="reviewButton">Click to Add Your Review Now !!!</button>

   <div class="rbox" id="formBox">
      <button class="close-btn" onclick="formclose()">&times;</button>
      <form action="#" id="reviewForm">
        <label for="review">Write your review :</label>
        <textarea id="review" name="review" rows="4" cols="50"></textarea>
        <button  class="sh_btn" type="submit">Share</button>
      </form>
   </div>
    
</section>

<section class="authors">

   <h1 class="title">Bestselling Authors</h1>

   <div class="box-container">

      <div class="box">
         <img src="author-6.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Bella Davis</h3>
      </div>

      <div class="box">
         <img src="author-2.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Sandra Will</h3>
      </div>

      <div class="box">
         <img src="author-3.jpg" alt="">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <h3>Jacob Gregory</h3>
      </div>
   </div>

</section>

<?php include 'footer.php'?>

<!-- custom js file link  -->
<script src="script.js"></script>

</body>
</html>