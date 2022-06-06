<?php

// Authorisation

// If the user is not login
if (!isset($_SESSION['user'])) {
  // Ask the user to login
  $_SESSION['no-login-message'] = "<div class='error text-center'>Please login</div>";

  // Redirect to login page
  header('Location:'.SITEURL."admin/login.php");
}

?>
