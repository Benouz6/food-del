
        <?php
          include("partials/menu.php");
        ?>

      <!-- Menu sectione end -->


      <!-- Main Section start -->

      <div class="main-content">
        <div class="wrapper">
          <h1>DASHBOARD</h1>

            <?php
              if (isset($_SESSION['login'])) {
              echo $_SESSION['login'];
              unset($_SESSION['login']);
          }
            ?>

            <div class="col-4 text-center">
              <h2>5</h2>
              <h3>Category</h3>
            </div>
            <div class="col-4 text-center">
              <h2>5</h2>
              <h3>Category</h3>
            </div>
            <div class="col-4 text-center">
              <h2>5</h2>
              <h3>Category</h3>
            </div>
            <div class="col-4 text-center">
              <h2>5</h2>
              <h3>Category</h3>
            </div>
            <div class="clearfix"></div>
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
