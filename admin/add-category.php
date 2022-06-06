<?php
  include("partials/menu.php")
?>

<div class="main-content">
  <div class="wrapper">
    <h1>Add Category</h1>

    <?php
      if (isset($_SESSION['add'])) {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
      }
    ?>

    <form action="" method="post">

      <table class="tbl-30">
        <tr>
          <td>Title</td>
          <td><input type="text" name="title" placeholder="Category title"></td>
        </tr>
        <tr>
          <td>Featured </td>
          <td>
            <input type="radio" name="featured" value="yes">Yes
            <input type="radio" name="featured" value="no">No
          </td>
        </tr>
        <tr>
          <td>Active</td>
          <td>
            <input type="radio" name="active" value="yes">Yes
            <input type="radio" name="active" value="no">No
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="submit" name="submit" value="Add Category" class="btn-secondary">
          </td>
        </tr>
      </table>

    </form>

    <?php

    // Process the value of the form and save it in DB

      // If button submit have been clicked
      if (isset($_POST['submit'])) {

        // Get the data
        $title = $_POST['title'];

        // Check if the featured and active button is active or not
        if ($_POST['featured'] == "yes") {
          $featured = $_POST['featured'];
        }
        else {
          $featured = "No";
        }

        if ($_POST['active'] == "yes") {
          $active = $_POST['active'];
        }
        else {
          $active = "No";
        }

        //SQL Query to Save the data into the DB
        $sql = "INSERT INTO tbl_category SET
        title = $title
        featured = $featured
        active = $active
        ";

        // Save it in the DB
        
      }
    ?>

  </div>
</div>

<?php
  include("partials/footer.php")
?>
