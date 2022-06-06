<?php include('partials/menu.php') ?>

<div class="main-content">
  <div class="wrapper">
    <h1>Change password</h1>

    <?php

     if (isset($_GET['id'])) {

    // Grab the id
    $id = $_GET['id'];
     }
    ?>

    <form action="" method="post">

      <table class="tbl-30">
        <tr>
          <td>Current password</td>
          <td><input type="password" name="current_password" placeholder="Actual Password"></td>
        </tr>
        <tr>
          <td>New Password</td>
          <td><input type="password" name="new_password" placeholder="New password"></td>
        </tr>
        <tr>
        <tr>
          <td>Confirm Password</td>
          <td><input type="password" name="confirm_password" placeholder="Confirm New password"></td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" value="Change password" class="btn-secondary">
          </td>
        </tr>
      </table>

    </form>

  </div>
</div>

<?php
  // Check if the submit button is clicked or not
  if (isset($_POST['submit'])) {

    // Grab the value from the submit button
    $id = $_POST['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    // Check if the user and password exist¸
    $sql = "SELECT * FROM tbl_admin WHERE id='$id' AND password='$current_password'";

    // Execute the query
    $res = mysqli_query($conn, $sql);

    if ($res == TRUE) {
      $count = mysqli_num_rows($res);

      // Check if there is a result
      if ($count == 1) {

        // Check if the new password and the confirm password is the same?
        if ($new_password == $confirm_password) {

          // Update the password
          $update_sql = "UPDATE tbl_admin SET
          password = '$new_password'
          WHERE id = '$id'
          ";

          // Execute the query
          $updated_res = mysqli_query($conn, $update_sql);

          // Check if the query is executed
          if ($updated_res==TRUE) {
            $_SESSION['change-pwd'] = "<div class='success'>Password updated</div>";

            // Redirect to admin page
            header("Location:".SITEURL."admin/manage-admin.php");
          }
          else {
            $_SESSION['change-pwd'] = "<div class='error'>Password not updated</div>";

            // Redirect to admin page
            header("Location:".SITEURL."admin/manage-admin.php");

          }

        }
        else {
          $_SESSION['pwd-not-match'] = "<div class='error'>password did not match</div>";

          // Redirect to admin page
          header("Location:".SITEURL."admin/manage-admin.php");
        }

      }
      // User doesn't exist
      else {
        $_SESSION['user-not-found'] = "<div class='error'>Failed updated the password</div>";

        // Redirect to admin page
        header("Location:".SITEURL."admin/manage-admin.php");
      }
    }
  }


?>

<?php include('partials/footer.php') ?>
