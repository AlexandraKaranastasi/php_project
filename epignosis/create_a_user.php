<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = $_POST['password'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      
         $insert = "INSERT INTO user_form(name, email, password) VALUES('$name','$email','$pass')";
         if (mysqli_query($conn, $insert)) {
            // Registration successful, set success message
            $success = 'User has been added successfully!';
        } else {
            $error[] = 'Error during registration. Please try again.';
        }
      
   }

};


?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Create a User</title>

   <link rel="stylesheet" href="./style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>User Properties</h3>

   <?php
   if (!empty($success)) {
       echo '<span class="success-msg">' . $success . '</span><br>';
   }
   ?>

   <?php
   if (isset($error) && !empty($error)) {
      foreach ($error as $message) {
         echo '<span class="error-msg">' . $message . '</span><br>';
      }
   }
   ?>
      
      <input type="text" name="name" required placeholder="Name">
      <input type="email" name="email" required placeholder="Email">
      <input type="password" name="password" required placeholder="Password">
      
      
      <input type="submit" name="submit" value="Save" class="form-btn">
      
   </form>

</div>

</body>
</html>