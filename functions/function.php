
<?php
$con=mysqli_connect("localhost","root","","ecommerce");

if(mysqli_connect_errno()){

  echo "Field to connect to Mysql:" .mysqli_connect_error();

}

function getIp(){

  $ip=$_SERVER['REMOTE_ADDR'];

  if(!empty($_SERVER['HTTP_CLIENT_IP'])){
    $ip=$_SERVER['HTTP_CLIENT_IP'];
  }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
    $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  return $ip;
}


function cart(){

  if(isset($_GET['add_cart'] )){

    global $con;
    $ip=getIp();

    $pro_id=$_GET['add_cart'];

    $check_pro="select * from cart where ip_add='$ip' AND p_id='$pro_id'";

    $run_check=mysqli_query($con,$check_pro);

    if(mysqli_num_rows($run_check)>0){

      echo "";

    }else{

      $insert_pro="INSERT INTO `ecommerce`.`cart` (`p_id`, `ip_add`) VALUES ('$pro_id', '$ip')";

      $run_pro=mysqli_query($con,$insert_pro);

      echo "<script>window.open('home.php','_self')</script>";

    }


  }
}

function total_items(){

  if(isset($_GET['add_cart'])){

    global $con;

    $ip=getIp();

    $get_items="select * from cart where ip_add='$ip'";

    $run_items=mysqli_query($con, $get_items);

    $count_items=mysqli_num_rows($run_items);
  }
  else{
    global $con;
    $ip=getIp();

    $get_items="select * from cart where ip_add='$ip'";

    $run_items=mysqli_query($con, $get_items);

    $count_items=mysqli_num_rows($run_items);

  }
  echo "<font color=black><b>".$count_items."</b></font>";
}

function total_price(){
  $total=0;

  global $con;

  $ip=getIp();
  $sel_price="select * from cart where ip_add='$ip'";
  $run_price=mysqli_query($con,$sel_price);

  while($p_price=mysqli_fetch_array($run_price)){

    $pro_id=$p_price['p_id'];

    $pro_price="select * from products where product_id='$pro_id'";

    $run_pro_price=mysqli_query($con,$pro_price);

    while($pp_price=mysqli_fetch_array($run_pro_price)){

      $product_price=array($pp_price['product_price']);

      $values=array_sum($product_price);

      $total +=$values;

    }

  }
  echo "<font color=black><b> $ ".$total."</b></font>";


}



function getCats(){
  global $con;

  $get_cats="select * from categories";
  $run_cats=mysqli_query($con,$get_cats);
  while($row_cats=mysqli_fetch_array($run_cats)){
    $cat_id=$row_cats['cat_id'];
    $cat_title=$row_cats['cat_title'];
    echo "
    <li><a href='home.php?cat=$cat_id'><font id='abc'>$cat_title</font></a></li>
    ";

  }
}


function getBrands(){
  global $con;

  $get_brands= "select * from brands";
  $run_brands=mysqli_query($con,$get_brands);
  while($row_brands=mysqli_fetch_array($run_brands)){
    $brand_id=$row_brands['brand_id'];
    $brand_title=$row_brands['brand_title'];
    echo "
    <li><a href='home.php?brand=$brand_id'><font id='abc'>$brand_title</font></a></li>
    ";

  }
}

function getPro(){

  if(!isset($_GET['cat'])){
    if(!isset($_GET['brand'])){

      global $con;
      $get_pro="select * from products order by RAND() LIMIT 0,6";
      $run_pro=mysqli_query($con,$get_pro);
      while($row_pro=mysqli_fetch_array($run_pro)){

        $pro_id=$row_pro['product_id'];
        $pro_cat=$row_pro['product_cat'];
        $pro_brand=$row_pro['product_brand'];
        $pro_title=$row_pro['product_title'];
        $pro_price=$row_pro['product_price'];
        $pro_image=$row_pro['product_image'];

       echo "

       <div id='single1'>
       <div id='single_product'>

       <div id='single_product_insert'>
       <font id='pro_title'>$pro_title</font>
       <img src='admin_area/product_images/$pro_image'  />
       <br /><font id='pro_price'>Price :$ $pro_price </font><br />
       <font id='pro_detail'><a href='details.php?pro_id=$pro_id'>Details</a></font>
       <font id='submit_cart'><a href='home.php?add_cart=$pro_id'><input type='button' value='Add to Cart' ></a></font>
       </div>
       </div><br /><br />
       </div>




        ";

      }
    }
  }
}

function getDetailsPro(){

  global $con;
  $get_pro_d="select * from products order by RAND() LIMIT 0,4";
  $run_pro_d=mysqli_query($con,$get_pro_d);
  while($row_pro=mysqli_fetch_array($run_pro_d)){

    $pro_image_d=$row_pro['product_image'];

    echo "
    <div id='details_image'>
    <img src='admin_area/product_images/$pro_image_d' width='100px' height='100px'  />
    </div>




    ";

  }

}


function getCatPro(){

  if(isset($_GET['cat'])){

    $cat_id=$_GET['cat'];

    global $con;
    $get_cat_pro="select * from products where product_cat='$cat_id'";
    $run_cat_pro=mysqli_query($con,$get_cat_pro);
    $count_cats=mysqli_num_rows($run_cat_pro);
    if($count_cats==0){

      echo "<h2 style='padding:20px; color:yellow;'>There in no Product in this Category!</h2>";
      exit();
    }


    while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){

      $pro_id=$row_cat_pro['product_id'];
      $pro_cat=$row_cat_pro['product_cat'];
      $pro_brand=$row_cat_pro['product_brand'];
      $pro_title=$row_cat_pro['product_title'];
      $pro_price=$row_cat_pro['product_price'];
      $pro_image=$row_cat_pro['product_image'];


      echo "

      <div id='single1'>
      <div id='single_product'>

      <div id='single_product_insert'>
      <font id='pro_title'>$pro_title</font>
      <img src='admin_area/product_images/$pro_image' width='140' height='140' />
      <br /><font id='pro_price'>Price :$ $pro_price </font><br />
      <font id='pro_detail'><a href='details.php?pro_id=$pro_id'>Details</a></font>

      <font id='submit_cart'><a href='home.php?add_cart=$pro_id'><input type='button' value='Add to Cart' ></a></font>
      </div>
      </div><br /><br />
      </div>




      ";

    }

  }
}


function getBrandPro(){

  if(isset($_GET['brand'])){

    $brand_id=$_GET['brand'];

    global $con;
    $get_brand_pro="select * from products where product_brand='$brand_id'";
    $run_brand_pro=mysqli_query($con,$get_brand_pro);
    $count_brands=mysqli_num_rows($run_brand_pro);
    if($count_brands==0){

      echo "<h2 style='padding:20px; color:yellow;'>no Product where found associted with this brand!</h2>";
      exit();
    }


    while($row_brand_pro=mysqli_fetch_array($run_brand_pro)){

      $pro_id=$row_brand_pro['product_id'];
      $pro_cat=$row_brand_pro['product_cat'];
      $pro_brand=$row_brand_pro['product_brand'];
      $pro_title=$row_brand_pro['product_title'];
      $pro_price=$row_brand_pro['product_price'];
      $pro_image=$row_brand_pro['product_image'];


      echo "

      <div id='single1'>
      <div id='single_product'>

      <div id='single_product_insert'>
      <font id='pro_title'>$pro_title</font>
      <img src='admin_area/product_images/$pro_image' width='140' height='140' />
      <br /><font id='pro_price'>Price :$ $pro_price </font><br />
      <font id='pro_detail'><a href='details.php?pro_id=$pro_id'>Details</a></font>

      <font id='submit_cart'><a href='home.php?add_cart=$pro_id'><input type='button' value='Add to Cart' ></a></font>
      </div>
      </div><br /><br />
      </div>




      ";

    }

  }
}



?>
