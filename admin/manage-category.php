
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
                <th>Full name</th>
                <th>Username</th>
                <th>Actions</th>
              </tr>
              <tr>
                <td>1. </td>
                <td>Benoit Leboucher</td>
                <td>Benouz</td>
                <td>
                 <a href="#" class="btn-secondary">Update admin</a>
                 <a href="#" class="btn-danger">Delete admin</a>
                </td>
              </tr>
              <tr>
                <td>2. </td>
                <td>Benoit Leboucher</td>
                <td>Benouz</td>
                <td>
                  <a href="#" class="btn-secondary">Update admin</a>
                  <a href="#" class="btn-danger">Delete admin</a>
                </td>
              </tr>
              <tr>
                <td>3. </td>
                <td>Benoit Leboucher</td>
                <td>Benouz</td>
                <td>
                  <a href="#" class="btn-secondary">Update admin</a>
                  <a href="#" class="btn-danger">Delete admin</a>
                </td>
              </tr>
              <tr>
                <td>4. </td>
                <td>Benoit Leboucher</td>
                <td>Benouz</td>
                <td>
                  <a href="#" class="btn-secondary">Update admin</a>
                  <a href="#" class="btn-danger">Delete admin</a>
                </td>
              </tr>
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
