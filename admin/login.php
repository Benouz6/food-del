<?php include('../config/constants.php') ?>

<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../css/style_php.css">
      <title>Log-in Food order system</title>
    </head>
    <body>
      <div class="login">
        <h1 class="text-center">Login</h1>
        <br><br>

        <?php
          if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
          }
          if (isset($_SESSION['no-login-message'])) {
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
          }
        ?>

        <br><br>
        <!-- Login form -->
        <form action="" method="POST" class="text-center">
          <label for="username">Username</label><br>
          <input type="text" name="username" id="" placeholder="Enter username"><br><br>
          <label for="password">Password</label><br>
          <input type="password" name="password" id="" placeholder="Enter your password"><br><br>
          <input type="submit" name="submit" value="submit" class="btn-primary">

        </form>
    <br>
        <p class="text-center">Created by <a href="#">Benoit Leboucher</a></p>
      </div>

    </body>
  </html>

    <?php

      if (isset($_POST['submit'])) {

        // Grab the name and the password
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // Check if the data are good
        $sql = "SELECT * FROM tbl_admin WHERE username ='$username' AND password = '$password'";

        // Execute the query
        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);
        if ($count == 1) {
          echo "hello";

          // User Available
          $_SESSION['login'] = "<div class='success'>Login Successful</div>";
          $_SESSION['user'] = $username;

          // REdirect to the homepage
          header("Location:".SITEURL."admin/");

        }
        else {

          echo "pas hello";
          $_SESSION['login'] = "<div class='error text-center'>Login failed</div>";
          // Login fail
          header("Location:".SITEURL."admin/login.php");
        }
      }
