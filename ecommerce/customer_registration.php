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
          <li><a href="">Sign up</a></li>
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

            <?php cart(); ?>

          <div id="shopping_cart">

            <span style="float:right; color:white; font-size: 18px;
            padding: 5px; line-height: 40px;">
            Welcome Guest!
            <b style="color:yellow;">
              Shopping Cart -
          </b> Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?>
            <a href="cart.php" style="color:yellow;">Go to Cart</a>
          </span>

          </div>


          <div id="products_box">

              <form action="customer_registration.php" method="post"
              enctype="multipart/form-data">

                    <br>
                    <table align="center" bgcolor="skyblue" width="750">

                        <tr align="center">
                            <td colspan="2"><h2>Create an Account</h2></td>
                        </tr>

                        <tr>
                            <td align="right">Full Name:</td>
                            <td colspan="8"><input type="text" name="customer_name" required></td>
                        </tr>

                        <tr>
                            <td align="right">Email:</td>
                            <td colspan="8"><input type="text" name="customer_email" required></td>
                        </tr>

                        <tr>
                            <td align="right">Confirm Email:</td>
                            <td colspan="8"><input type="text"
                                name="customer_email_confirmation" required></td>
                        </tr>

                        <tr>
                            <td align="right">Password:</td>
                            <td colspan="8">
                                <input type="password" name="customer_password" required>
                            </td>
                        </tr>

                        <tr>
                            <td align="right">Confirm Password:</td>
                            <td colspan="8"><input type="password"
                                name="customer_password_confirmation" required></td>
                        </tr>

                        <tr>
                            <td align="right">Country:</td>
                            <td colspan="8"><select name="customer_country">
                                <option>Select Country...</option>
                                <?php

                                $getCountries = "SELECT * FROM countries";
                                $runGetCountries = mysqli_query($con, $getCountries);

                                while($countries_row=mysqli_fetch_array($runGetCountries)){

                                    $country_name = $countries_row["country_name"];

                                    echo "<option>$country_name</option>";
                                }

                                 ?>
                            </select></td>
                        </tr>

                        <tr>
                            <td align="right">City:</td>
                            <td colspan="8"><input type="text" name="customer_city" required></td>
                        </tr>

                        <tr>
                            <td align="right">Address:</td>
                            <td colspan="8"><input type="text" name="customer_address" required></td>
                        </tr>

                        <tr>
                            <td align="right">Birthdate:</td>
                            <td colspan="8"><input type="date" name="customer_birthdate"></td>
                        </tr>

                        <tr>
                            <td align="right">Gender:</td>
                            <td colspan="8"><select name="customer_gender">
                                <option>Select Gender...</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select></td>
                        </tr>

                        <tr align="center">
                            <td colspan="2" style="padding:10px;">
                                <input type="submit" name="create_account" value="Create Account">
                            </td>
                        </tr>

                    </table>

              </form>

              <?php

              if(isset($_POST["create_account"])){

                  $customer_email = $_POST["customer_email"];
                  if($customer_email != $_POST["customer_email_confirmation"]){
                      echo "<script>alert('The emails do not match!');
                      window.open('customer_registration.php', '_self')</script>";
                      exit();
                  }

                  $customer_password = $_POST["customer_password"];
                  if($customer_password != $_POST["customer_password_confirmation"]){
                      echo "<script>alert('The passwords do not match!');
                      window.open('customer_registration.php', '_self')</script>";
                      exit();
                  }

                  $customer_name = $_POST["customer_name"];
                  $customer_country = $_POST["customer_country"];
                  $customer_city = $_POST["customer_city"];
                  $customer_address = $_POST["customer_address"];
                  $customer_birthdate = $_POST["customer_birthdate"];
                  $customer_gender = $_POST["customer_gender"];
                  $customer_ip = getIp();

                  $insertCustomer = "INSERT INTO customers (customer_name,
                      customer_email, customer_country, customer_city,
                      customer_password, customer_birthdate, customer_address, customer_ip_address,
                      customer_gender) VALUES ('$customer_name', '$customer_email',
                          '$customer_country', '$customer_city', '$customer_password',
                          '$customer_birthdate', '$customer_address', '$customer_ip',
                          '$customer_gender')";
                  $runInsertCustomer = mysqli_query($con, $insertCustomer);

                  if($runInsertCustomer){
                      echo "<script>alert('Registration complete!');
                      window.open('checkout.php', '_self');</script>";
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
