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

        <img id="logo" src="images/logo.gif">
        <img id="banner" src="images/ad_banner.gif" style="width:800px;
        height:100px;">


      </div>
      <!-- Header ends here -->


      <!-- Navigation bar starts here -->
      <div class="menubar">

        <ul id="menu">
          <li><a href="#">Home</a></li>
          <li><a href="#">All products</a></li>
          <li><a href="#">My Account</a></li>
          <li><a href="#">Sign up</a></li>
          <li><a href="#">Shopping cart</a></li>
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

          <div id="shopping_cart">

            <span style="float:right; color:white; font-size: 18px;
            padding: 5px; line-height: 40px;">
            Welcome Guest!
            <b style="color:yellow;">
              Shopping Cart -
            </b> Total Items: Total Price:
            <a href="cart.php" style="color:yellow;">Go to Cart</a>
          </span>

          </div>

          <div id="products_box">

            <?php

            if(isset($_GET["pro_id"])){

              $product_id = $_GET["pro_id"];

              $max_title_len = 13;
              $title_procast_len = 10;

              $get_pro = "select * from products where id=$product_id;";

              $run_pro = mysqli_query($con, $get_pro);

              while($row_pro=mysqli_fetch_array($run_pro)){

                $pro_id = $row_pro["id"];
                $pro_title = $row_pro["title"];
                $pro_price = $row_pro["price"];
                $pro_image = $row_pro["image"];
                $pro_desc = $row_pro["descr"];

                if(strlen($pro_title) > $max_title_len){
                  $pro_title = substr($pro_title, 0, $title_procast_len) . "...";

                }

                echo "<div id='single_product'>

                  <h3>$pro_title</h3>
                  <img src='admin_area/product_images/$pro_image' width='400' height='300'>
                  <p><b>$$pro_price</b></p>
                  <p>$pro_desc</p>
                  <a href='index.php' style='float:left;'>Go Back</a>
                  <a href='index.php?pro_id=$pro_id'><button style='float:right;'>Add to Cart</button></a>

                </div>";
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
