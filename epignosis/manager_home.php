<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['manager'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Manager Home</title>

   <link rel="stylesheet" href="./style.css">

</head>

<body>
   
<div class="container">

   <div class="content">
      <h3>List of users</h3>
      <a href="create_a_user.php" class="btn">Create a user</a>
      <a href="logout.php" class="btn">logout</a>
      <table class="data_table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th></th>
        </tr>
        </thead>

        <tbody>
            <?php
                $query = "SELECT name, email FROM user_form";
                $result = mysqli_query($conn, $query);

                while($row = mysqli_fetch_array($result)){
                    $name = $row["name"];
                    $email = $row["email"];
                    echo "<tr>
                    <td>$name</td>
                    <td>$email</td>
                    <td><a href='edit.php'>Edit</a> 
                        <a href='delete.php'>Delete</a></td>
                    </tr>";
                }

            ?>

        </tbody>
        

        </table>
   </div>

</div>

</body>
</html>