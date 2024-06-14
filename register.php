<?php

include 'config.php';

   if(isset($_POST['submit'])){
    // Retrieve data from form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];
    $user_type = $_POST['user_type'];

    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'User Already Exists!';
   }else{
      if($pass != $cpass){
         $message[] = 'Confirmed Password does not match!';
      }else{
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
         $message[] = 'Registered Successfully!';
         header('location:login.php');
      }
}
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>

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
   
   <div class="reg_form">

      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
         <h3>Register Now</h3>
         <input type="text" name="name" placeholder="Enter your Name" required class="box">
         <input type="email" name="email" placeholder="Enter your Email" required class="box">
         <input type="password" name="password" placeholder="Enter your Password" required class="box">
         <input type="password" name="cpassword" placeholder="Confirm your Password" required class="box">
         <select name="user_type" class="box">
            <option value="user">User</option>
            <option value="admin">Admin</option>
         </select>
         <input type="submit" name="submit" value="Register Now" class="mfrm_btn">
         <p>Already have an Account? <a href="login.php">Login Now</a></p>
      </form>

   </div>

   <script src="script.js"></script>
</body>
</html>