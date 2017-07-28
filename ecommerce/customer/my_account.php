<!DOCTYPE>
<?php
  include("../functions/functions.php");
  include("../includes/db.php");
 ?>
<html>
  <head>

    <title>My Online Shop</title>
    <link rel="stylesheet" href="../styles/styles.css" type="text/css" media="all">
  </head>

  <body>
    <!-- Main containter starts here -->
    <div class="main_wrapper">

      <!-- Header starts here -->
      <div class="header_wrapper">

        <a href="index.php"><img id="logo" src="../images/logo.gif"></a>
        <img id="banner" src="../images/ad_banner.gif" style="width:800px;
        height:100px;">


      </div>
      <!-- Header ends here -->


      <!-- Navigation bar starts here -->
      <div class="menubar">

        <ul id="menu">
          <li><a href="../index.php">Home</a></li>
          <li><a href="../all_products.php">All products</a></li>
          <li><a href="../customer/my_account.php">My Account</a></li>
          <li><a href="../customer_registration.php">Sign up</a></li>
          <li><a href="../cart.php">Shopping cart</a></li>
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

              <div id="sidebar_title">My Account</div>

              <ul id="cats">
                  <li><a href="my_account.php?my_orders">My Orders</a></li>
                  <li><a href="my_account.php?edit_account">Edit account</a></li>
                  <li><a href="my_account.php?change_password">Change Password</a></li>
                  <li><a href="my_account.php?delete_account">Delete Account</a></li>
                  <li><a href="logout.php">Logout</a></li>
              </ul>

          </div>

        <div id="content_area">

            <?php

            cart();

            checkCustomer();

            ?>


          <div id="products_box">

              <?php


              $ip = getIp();
              $customerId = $_SESSION["customer_id"];
              $getCustomer = "SELECT * FROM customers WHERE customer_ip_address='$ip'
              AND customer_id='$customerId'";
              $runGetCustomer = mysqli_query($con, $getCustomer);
              $customer = mysqli_fetch_array($runGetCustomer);

              if(isset($_GET["my_orders"])){
                  echo "My Order";
              } else if(isset($_GET["edit_account"])){
                  include("edit_account.php");
              } else if(isset($_GET["change_password"])){

              } else if(isset($_GET["delete_account"])){

              } else {
                  echo "<br><p style='margin-right:150px;'><b>Welcome " . $customer["customer_name"] . "!</b></p>";
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
