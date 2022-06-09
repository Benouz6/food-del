
        <?php
          include("partials/menu.php");
        ?>

      <!-- Menu sectione end -->
        <?php
          if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
          }
        ?>
    <!-- Main Section start -->
        <div class="main-content">
          <div class="wrapper">
            <h1>Manage category</h1>
            <br><br>

            <!-- Button to add admin -->
            <a href="add-category.php" class="btn-primary">Add Category</a>
             <br><br><br><br>

            <table class="tbl-full">
              <tr>
                <th>S.N.</th>
                <th>Name of the category</th>
                <th>Image name</th>
                <th>Active</th>
                <th>Featured</th>
                <th>Actions</th>
              </tr>
              <?php

              // Query to get all the category
              $sql = 'SELECT * FROM tbl_category';

              // Exectute the query
              $res = mysqli_query($conn, $sql);

              // Check it there is data in the DB
              if ($res == TRUE) {

                // Count the number of rows
                $rows = mysqli_num_rows($res);

                if ($rows > 0) {
                  $sn = 0;

                  while ($row = mysqli_fetch_assoc($res)) {
                    $sn ++;
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                    ?>
                    <tr>
                      <td><?php echo $sn ?></td>
                      <td><?php echo $title ?></td>
                      <td><?php
                        if ($image_name != "") {
                          ?>
                          <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="">
                          <?php
                        }
                        else {
                          echo '<div class="error">No image added</div>' ;
                        } ?></td>
                      <td><?php echo $active ?></td>
                      <td><?php echo $featured ?></td>
                      <td>
                        <a href="<?php echo SITEURL ?>admin/update-category.php?id=<?php echo $id ?>" class="btn-secondary">Update Category</a>
                        <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id ?>" class="btn-danger">Delete Category</a>
                      </td>
                    </tr>
                    <?php
                  }
                }
                else {
                  echo "No category";
                }
              }
              else {
                echo "False";
              }
              ?>
            </table>
          </div>
        </div>
      <!-- Menu Section end -->


      <!-- Footer Section start -->

      <?php
        include("partials/footer.php");
      ?>

      <!-- Footer Section end -->


    </body>
  </html>
