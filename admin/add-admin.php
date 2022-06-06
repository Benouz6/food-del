<?php
  include("partials/menu.php")
?>

<div class="main-content">
  <div class="wrapper">
    <h1>Add Admin</h1>

    <?php
      if (isset($_SESSION['add'])) {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
      }
    ?>

    <form action="" method="post">

      <table class="tbl-30">
        <tr>
          <td>Full Name</td>
          <td><input type="text" name="full_name" placeholder="Enter your name"></td>
        </tr>
        <tr>
          <td>Username</td>
          <td><input type="text" name="username" placeholder="Enter your username"></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="password" name="password" placeholder="Enter your password"></td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="submit" name="submit" value="Add admin" class="btn-secondary">
          </td>
        </tr>
      </table>

    </form>
  </div>
</div>
<?php
  include("partials/footer.php")
?>


<?php

  // Process the value of the form and save it in DB

  // Button click
  if (isset($_POST["submit"])) {

    // Get the data
    $full_name = $_POST["full_name"];
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    //SQL Query to Save the data into the DB

    $sql = "INSERT INTO tbl_admin SET
      full_name = '$full_name',
      username = '$username',
      password = '$password'
      ";

    // SAve it in the DB
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    if ($res == TRUE) {
      // Create a Session Variable to display message
      $_SESSION['add'] = "<div class='success'>Admin Added succesfully</div>";

      // Redirect the page to the manage admin page
      header("Location:".SITEURL."admin/manage-admin.php");
    }
    else {
        // Create a Session Variable to display message
        $_SESSION['add'] = "<div class='error'>Admin not added</div>";

        // Redirect the page to add admin page
        header("Location:".SITEURL."admin/add-admin.php");
    }
  }
?>
