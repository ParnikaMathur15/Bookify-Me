<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $pass = $_POST['password'];

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){

      $row = mysqli_fetch_assoc($select_users);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION["user_name"] = $row["name"];
         $_SESSION["user_email"] = $row["email"];
         $_SESSION['user_id'] = $row["id"];
         header('location:home.php');

      }

   }else{
      $message[] = 'Incorrect Email or Password!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style1.css">

</head>
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
   
<div class="log_form">

   <form action="" method="post">
      <h3>Login Now</h3>
      <input type="email" name="email" placeholder="Enter your Email" required class="box">
      <input type="password" name="password" placeholder="Enter your Password" required class="box">
      <input type="submit" name="submit" value="Login Now" class="mfrm_btn">
      <p>Don't have an Account? <a href="register.php">Register Now</a></p>
   </form>

</div>

</body>
</html>