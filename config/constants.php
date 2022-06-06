<?php

  // Start the session
  session_start();


  // Create constant

  define('SITEURL', 'http://localhost/food_dev/');

  define('LOCALHOST', 'localhost');
  define('DB_USERNAME', 'ben');
  define('DB_PASSWORD', 'GROS!mot2?paçe');
  define('DB_NAME', 'food_del');

  $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
  $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

?>
