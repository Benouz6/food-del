<?php
  include("partials/menu.php");
?>

<div class="main-content">
  <div class="wrapper">
    <h1>Update Admin</h1>

    <?php
      // Get the id
      $id = $_GET['id'];

      // SQL Query
      $sql = "SELECT * FROM tbl_admin WHERE id='$id'";

      // Execute the Query
      $res = mysqli_query($conn, $sql);

      // Check if the query is executed
      if ($res==TRUE) {
        $count = mysqli_num_rows($res);

        // Check if there is a result
        if ($count == 1) {
          $row = mysqli_fetch_assoc($res);
          $full_name = $row['full_name'];
          $username = $row['username'];
        }
        else {
          // Redirect to manage
          header("Location:".SITEURL."admin/manage-admin.php");
        }
      }
    ?>

    <form action="" method="post">

      <table class="tbl-30">
        <tr>
          <td>Full Name</td>
          <td><input type="text" name="full_name" value="<?php echo $full_name ?>"></td>
        </tr>
        <tr>
          <td>Username</td>
          <td><input type="text" name="username" value="<?php echo $username ?>"></td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" name="submit" value="Update admin" class="btn-secondary">
          </td>
        </tr>
      </table>

    </form>
  </div>
</div>
<?php

  // Check if the submit button is clicked or not
  if (isset($_POST['submit'])) {
    // Grab the value from form to update
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    // SQL Query to update the admin
    $sql = "UPDATE tbl_admin SET
    full_name = '$full_name',
    username = '$username'
    WHERE id ='$id'
    ";

    // Execute the query
    $res = mysqli_query($conn, $sql);

    // Check if the query is executed
    if ($res == TRUE) {

      $_SESSION['update'] = "<div class='success'>Admin updated successfully</div>";

      // Redirect to admin page
      header("Location:".SITEURL."admin/manage-admin.php");
    }
    else {
      $_SESSION['update'] = "<div class='error'>Failed updated </div>";

      // Redirect to admin page
      header("Location:".SITEURL."admin/manage-admin.php");
    }
  }

?>

<?php
  include("partials/footer.php");
?>
