<?php

  //Import the constant
  include('../config/constants.php');

  // Get the id of admin
  $id = $_GET['id'];

  // SQL Query to delete admin
  $sql = "DELETE FROM tbl_admin WHERE id='$id'";

  // Execute the query
  $res = mysqli_query($conn, $sql) or die(mysqli_error());

  // Check if the query is well executed
  if ($res == TRUE) {
    // Create session variable to display message
    $_SESSION['delete'] = "<div class='success'>Admin Deleted succesfully</div>";

    // Redirect to the manage admin page with message
    header("Location:".SITEURL."admin/manage-admin.php");
  }
  else {
    // Create session variable to display message
    $_SESSION['delete'] = "<div class='error'>Admin not deleted</div>";

    // Redirect to the manage admin page with message
    header("Location:".SITEURL."admin/manage-admin.php");
  }


?>
