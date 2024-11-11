<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = $_POST['password'];

   $select = " SELECT * FROM user_form WHERE username = '$username' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'manager'){

         $_SESSION['manager'] = $row['name'];
         header('location:manager_home.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user'] = $row['name'];
         header('location:user_home.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sign In</title>

   <link rel="stylesheet" href="./style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">

   <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
    ?>
      
      <input type="text" name="username" required placeholder="Username">
      <input type="password" name="password" required placeholder="Password">
      
      
      <input type="submit" name="submit" value="Sing in" class="form-btn">
      
   </form>

</div>

</body>
</html>