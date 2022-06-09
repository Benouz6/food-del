
      <!-- Menu Section Start -->
        <?php
          include("partials/menu.php");
        ?>
      <!-- Menu Section end -->

      <!-- Main Section start -->
        <div class="main-content">
          <div class="wrapper">
            <h1>Manage admin</h1>
            <br><br>

            <?php
              if (isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
              }

              if (isset($_SESSION['delete'])) {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
              }

              if (isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
              }

              if (isset($_SESSION['user-not-found'])) {
                echo $_SESSION['user-not-found'];
                unset($_SESSION['user-not-found']);
              }
              if (isset($_SESSION['pwd-not-match'])) {
                echo $_SESSION['pwd-not-match'];
                unset($_SESSION['pwd-not-match']);
              }
              if (isset($_SESSION['change-pwd'])) {
                echo $_SESSION['change-pwd'];
                unset($_SESSION['change-pwd']);
              }
            ?>

            <br><br>
            <!-- Button to add admin -->
            <a href="add-admin.php" class="btn-primary">Add Admin</a>
            <br><br><br><br>

            <table class="tbl-full">
              <tr>
                <th>S.N.</th>
                <th>Full name</th>
                <th>Username</th>
                <th>Actions</th>
              </tr>
              <?php

                // Query to get  all admin
                $sql = "SELECT * FROM tbl_admin";

                // Execute the Query
                $res = mysqli_query($conn, $sql);

                // Check if there is data
                if ($res == TRUE) {
                  // Count the number of rows
                  $rows = mysqli_num_rows($res);

                  // Check the number of rows
                  if ( $rows > 0) {
                    $sn = 0;

                    while ($row = mysqli_fetch_assoc($res)) {
                      $sn ++;
                      $id = $row['id'];
                      $fullname = $row['full_name'];
                      $username = $row['username'];
                      ?>
                    <tr>
                      <td><?php echo $sn ?></td>
                      <td><?php echo $fullname ?></td>
                      <td><?php echo $username ?></td>
                      <td>
                        <a href="<?php echo SITEURL ?>admin/update-password.php?id=<?php echo $id ?>" class="btn-primary">Change password</a>
                        <a href="<?php echo SITEURL ?>admin/update-admin.php?id=<?php echo $id ?>" class="btn-secondary">Update admin</a>
                        <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id ?>" class="btn-danger">Delete admin</a>
                      </td>
                    </tr>
                    <?php
                    }
                  }
                  else {
                    echo "No admins";
                  }
                 }
                else {
                  echo "FALSE";
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
