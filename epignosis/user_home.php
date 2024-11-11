<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Home</title>

   <link rel="stylesheet" href="./style.css">

</head>

<body>
   
<div class="container">

   <div class="content">
      <h3>Vacation Requests</h3>
      <a href="request_vacation.php" class="btn">Request vacation</a>
      <a href="logout.php" class="btn">logout</a>
      <!-- here should be a table with vacation requests fetched from db -->
      <table class="data_table">
        <tr>
            <th>Date submitte</th>
            <th>Dates requested</th>
            <th>reaso</th>
            <th>total days</th>
            <th>status</th>
        </tr>

        </table>
   </div>

</div>

</body>
</html>