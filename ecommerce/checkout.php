<!DOCTYPE>
<?php
include("functions/functions.php");
 ?>
<html>
  <head>

    <title>My Online Shop</title>
    <link rel="stylesheet" href="styles/styles.css" type="text/css" media="all">
  </head>

  <body>
    <!-- Main containter starts here -->
    <div class="main_wrapper">

      <!-- Header starts here -->
      <div class="header_wrapper">

        <a href="index.php"><img id="logo" src="images/logo.gif"></a>
        <img id="banner" src="images/ad_banner.gif" style="width:800px;
        height:100px;">


      </div>
      <!-- Header ends here -->


      <!-- Navigation bar starts here -->
      <div class="menubar">

        <ul id="menu">
          <li><a href="index.php">Home</a></li>
          <li><a href="all_products.php">All products</a></li>
          <li><a href="customer/my_account.php">My Account</a></li>
          <li><a href="customer_registration.php">Sign up</a></li>
          <li><a href="cart.php">Shopping cart</a></li>
          <li><a href="#">Contact us</a></li>
        </ul>

        <div id="form">

          <form method="get" action="results.php" enctype="multipart/form-data">
            <input type="text" name="user_query" placeholder="Search a product..."/>
            <input type="submit" name="search" value="Search"/>
          </form>

        </div>

      </div>
      <!-- Navigation bar ends here -->

      <!-- Content wrapper starts here -->
      <div class="content_wrapper">

        <div id="sidebar">

          <div id="sidebar_title">Categories</div>

          <ul id="cats">
            <?php getCats(); ?>
          </ul>

          <div id="sidebar_title">Brands</div>

          <ul id="cats">
            <?php getBrands(); ?>
          </ul>

        </div>
        <div id="content_area">


            <?php

            cart();

checkCustomer();

            ?>



          <div id="products_box">
              <?php

              if(!isset($_SESSION['customer_id'])){
                  echo "<script>window.open('customer_login.php', '_self');</script>";
              } else {

                  global $con;
                  $ip = getIp();

                  $getNumRows = "SELECT * FROM cart WHERE ip_address='$ip'";
                  $runGetNumRows = mysqli_query($con, $getNumRows);
                  $numRows = mysqli_num_rows($runGetNumRows);

                  if($numRows == 0){
                      echo "<script>alert('Buy something first!');
                      window.open('index.php', '_self');</script>";
                  } else {
                      echo "<script>window.open('payment.php', '_self');</script>";
                  }
              }

               ?>
          </div>

        </div>

      </div>
      <!-- Content wrapper ends here -->



      <div id="footer">
        <h2 id="copyrights">&copy 2017 by Dushan Terzikj</h2>
      </div>

    </div>
    <!-- Main containter ends here -->
  </body>

</html>
