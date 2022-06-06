<?php
  // Include constant.php
  include('../config/constants.php');

  // Destroy the session
  session_destroy();

  // Redirect to login page
  header('Location:'.SITEURL.'admin/login.php')
?>
