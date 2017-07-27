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

            <?php

            cart();

checkCustomer();

            ?>



          <div id="products_box">
            <?php

            $max_title_len = 13;
            $title_procast_len = 10;

            $get_pro = "SELECT * FROM products";

            $run_pro = mysqli_query($con, $get_pro);

            $count_cats = mysqli_num_rows($run_pro);

            if($count_cats == 0){
                echo "<h2 style='padding:20px;'>No products where found in this category or brand!</h2>";
            }

            while($row_pro=mysqli_fetch_array($run_pro)){

              $pro_id = $row_pro["id"];
              $pro_cat = $row_pro["cat"];
              $pro_brand = $row_pro["brand"];
              $pro_title = $row_pro["title"];
              $pro_price = $row_pro["price"];
              $pro_image = $row_pro["image"];

              if(strlen($pro_title) > $max_title_len){
                $pro_title = substr($pro_title, 0, $title_procast_len) . "...";

              }

              echo "<div id='single_product'>

                <h3>$pro_title</h3>
                <img src='admin_area/product_images/$pro_image' width='180' height='180'>
                <p><b>Price: $ $pro_price</b></p>
                <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
                <a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a>

              </div>";
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
