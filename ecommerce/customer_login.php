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

    <?php
    if(isset($_SESSION["customer_id"])){
        echo "<script>window.open('index.php', '_self');</script>";
    }
    ?>

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

              <div>

                  <form action="" method="post" enctype="multipart/form-data">

                      <table align="center" bgcolor="skyblue" width="750">

                          <br>
                          <tr align="center">
                              <td colspan="3"><h2>Login or register to buy!</h2></td>
                          </tr>

                          <tr>
                              <td align="right" colspan="2"><b>Email:</b></td>
                              <td colspan="2"><input type="text" name="email" placeholder="Enter email here...">
                              </td>
                          </tr>

                          <tr>
                              <td align="right" colspan="2"><b>Password:</b></td>
                              <td colspan="2"><input type="password" name="password"></td>
                          </tr>

                          <tr align="center">
                              <td colspan="3"><a href="customer_login.php?forgot_password">Forgot Password?
                              </a></td>
                          </tr>

                          <tr align="center">
                              <td colspan="3"><input type="submit" name="login" value="Login">
                              </td>
                          </tr>

                      </table>

                  </form>

                  <?php

                  if(isset($_POST["login"])){

                      $customerEmail = $_POST["email"];
                      $customerPassword = $_POST["password"];

                      $getCustomer = "SELECT * FROM customers
                      WHERE customer_email='$customerEmail'";
                      $runGetCustomer = mysqli_query($con, $getCustomer);
                      $row = $runGetCustomer->fetch_assoc();

                      if($row["customer_email"] == $customerEmail){
                          if($row["customer_password"] == $customerPassword){
                              $_SESSION["customer_id"] = $row["customer_id"];
                              echo "<script>alert('Login successful.');
                              window.open('index.php', '_self');</script>";
                          } else {
                              echo "<script>alert('Password incorrect.');</script>";
                          }
                      } else {
                          echo "<script>alert('Login successful!');</script>";
                      }
                  }

                   ?>

                  <h3 style="float:left; padding:10px;">Start here: <a href="customer_registration.php">Register</a></h3>

              </div>

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
