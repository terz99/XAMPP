<?php

$con = mysqli_connect("localhost", "root", "", "ecommerce");

if(mysqli_connect_errno()){
    echo "<h1 style='color:white;'>Failed to connect to MySQL "
    . mysqli_connect_errno() . "</h1>";
}

function getCats(){

  global $con;

  $get_cats = "select * from categories;";
  $run_cats = mysqli_query($con, $get_cats);

  while($row_cats=mysqli_fetch_array($run_cats)){

    $cat_id = $row_cats['id'];
    $cat_title = $row_cats['title'];

    echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";

  }

}

function getBrands(){

  global $con;

  $get_brands = "select * from brands;";
  $run_brands = mysqli_query($con, $get_brands);

  while($row_brands=mysqli_fetch_array($run_brands)){

    $brand_id = $row_brands['id'];
    $brand_title = $row_brands['title'];

    echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";

  }
}

function getPro(){

  global $con;
  $max_title_len = 13;
  $title_procast_len = 10;

  if(isset($_GET["cat"])){
      $cat_id = $_GET["cat"];
      $get_pro = "select * from products where cat=$cat_id";
  } else if(isset($_GET["brand"])){
      $brand_id = $_GET["brand"];
      $get_pro = "select * from products where brand=$brand_id";
  } else {
      $get_pro = "select * from products LIMIT 0,6";
  }

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

}

function updateCart(){

    global $con;
    $ip = getIp();

    if(isset($_POST["update_cart"])){

        foreach ($_POST['remove'] as $removeId) {

            $deleteQuery = "DELETE FROM cart WHERE ip_address='$ip' AND
            id='$removeId'";
            $runDeleteQuery = mysqli_query($con, $deleteQuery);

            if($runDeleteQuery){
                echo "<script>window.open('cart.php', '_self')</script>";
            }
        }
    }
}

function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }

    return $ip;
}

function cart(){

    if(isset($_GET["add_cart"])){

        global $con;

        $ip_address = getIp();
        $pro_id = $_GET["add_cart"];

        $check_pro = "SELECT * FROM cart WHERE id='$pro_id' AND ip_address='$ip_address'";
        $run_check = mysqli_query($con, $check_pro);

        if(mysqli_num_rows($run_check) > 0){
            echo "<script>window.open('index.php', '_self')</script>";
        } else {

            $insert_pro = "INSERT INTO cart (id, ip_address) VALUES ('$pro_id', '$ip_address')";
            $run_pro = mysqli_query($con, $insert_pro);

            echo "<script>window.open('index.php', '_self')</script>";
        }
    }

}

function total_items(){

    global $con;

    $ip_address = getIp();
    $query_sin = "SELECT * FROM cart WHERE ip_address='$ip_address'";
    $query = mysqli_query($con, $query_sin);
    $count = mysqli_num_rows($query);

    echo $count;
}

function total_price(){

    global $con;
    $total_price = 0;

    $ip = getIp();
    $query_sin = "SELECT * FROM cart WHERE ip_address='$ip'";
    $query = mysqli_query($con, $query_sin);

    while($query_row=mysqli_fetch_array($query)){

        $pro_id = $query_row["id"];
        $pro_qty = $query_row["qty"];
        $getProPriceSyntax = "SELECT * FROM products WHERE id='$pro_id'";
        $getProPrice = mysqli_fetch_array(mysqli_query($con, $getProPriceSyntax));
        $total_price = $total_price + $pro_qty*$getProPrice["price"];
    }
    echo "$$total_price";
}



 ?>
