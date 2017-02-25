<?php

include("functions/function.php");

?>

<?php
require_once 'connection.php';

@$uname = htmlentities($_GET['q']);

@$result=mysql_query("select * from account where email='$uname'");
if(!$result)
echo "Error in query.. <br />";
else {
  while($row=mysql_fetch_array($result,MYSQLI_ASSOC))
  {
    @$name_database=$row['first_name'];
    @$uemail_database=$row['email'];
  }

}

?>
<?php

require 'connection.php';
if(isset($_POST['search'])){
  $search_query = $_POST['user_query'];
  $result=mysql_query("select * from products where product_title like '%$search_query%' ");
  if(!$result)
  echo "Error in query.. <br />";
  else {
    header("Location:results.php?user_query=".$search_query);
  }
}
@mysqli_free_result($result);
@mysqli_close($dbh);

?>

<?php

require 'connection.php';

if(isset($_POST['cart_connect'])){
  $email = htmlentities($_POST['email']);
  $password = htmlentities($_POST['password']);
  $password_hash=md5($password); //when password is converted in to md5 then must change the code of line 20 or converted $password into $password_hash
  if(!empty($email)&&!empty($password_hash)){
    $result=mysql_query("select * from account where email='$email'");
    if(!$result)
    echo "Error in query.. <br />";
    else {
      while($row=mysql_fetch_array($result,MYSQLI_ASSOC))
      {
        $email_database=$row['email'];
        $password_database_hash=$row['password'];
        $uid_database=$row['first_name'];
      }
      //echo $uid_database;
      if(@($email==$email_database)&&($password_hash==$password_database_hash)){
        //require 'profile.php';
        header("Location:cart.php?q=".$email_database);
      } else {
        echo "<script>alert('Please Enter a Correct Username and Password!')</script>";
        echo  "<script>window.open('cart.php','_self')</script>";
      }
    }
  }else{
    echo "<script>alert('All Field are required!')</script>";
    echo  "<script>window.open('cart.php','_self')</script>";
  }
}
@mysqli_free_result($result);
@mysqli_close($dbh);

?>

<?php
include 'connection.php';

if(isset($_POST['cart_signup_connect'])){
  $first_name=$_POST['first_name_signup'];
  $email=$_POST['email_signup'];
  $mobile_no=$_POST['mobile_no_signup'];
  $password=$_POST['password_signup'];
  $password_hash=md5($password); //when password is converted in to md5 then must change the code of line 24 or converted $password into $password_hash and $password_again into $password_again_hash
  $password_again=$_POST['password_again_signup'];
  $password_again_hash=md5($password_again);

  if(!empty($first_name)&&!empty($mobile_no)&&!empty($email)&&!empty($password)&&!empty($password_again)){
    if($password_hash!=$password_again_hash){
      echo "<script>alert('Password do not match!')</script>";
      echo  "<script>window.open('cart.php','_self')</script>";
    }else{
      $query=mysql_query("INSERT INTO account (first_name,mobile_no,email,password,password_again) VALUES ('$first_name','$mobile_no','$email','$password_hash','$password_again_hash')");
      if($query_run=mysql_query($query)){
      }else{
        echo "<script>alert('Thanks! You are Sucessfully Register..')</script>";
        echo  "<script>window.open('cart.php?q=$email','_self')</script>";
        /*  header("Location:home.php?q=".$email);*/
      }
    }

  }else{
    echo "<script>alert('All field are Required!')</script>";
    echo  "<script>window.open('cart.php','_self')</script>";
  }
}
@mysqli_free_result($query);
@mysqli_close($dbh);

?>


<!Doctype html>
<html>
<head>
  <title>Clickcart-Go to Online shopping</title>
  <link rel="shortcut icon" href="images/icon1.jpg"></link>
  <link rel="stylesheet" href="css/style.css"></link>
  <link rel="stylesheet" href="css/style1.css"></link>
  <script type="text/javascript" src="js/script.js"></script>
  <script type="text/javascript" src="js/jquery.min.js"></script>
</head>

<body >
  <div class="header">
    <div class="header1">
      <ol>
        <li><img src="images/1.jpg" width="30px" height="30px" /></li>
        <li><a href="#"><span>sell</span></a></li>
        <li><nav> | </nav></li>
        <li><img src="images/3.jpg" width="30px" height="30px" /></li>
        <li><a href="#"><span>Download Apps</span></a></li>
        <li><nav> | </nav></li>
        <li><a href="#"><span> 24*7 Customer Care</span></a></li>
        <li><nav> | </nav></li>
        <li><img src="images/4.jpg" width="30px" height="30px" /></li>
        <li><a href="#"><span>Track Order</span></a></li>
        <li><nav> | </nav></li>
        <li><img src="images/2.jpg" width="30px" height="30px" /></li>
        <li><a href="cart.php"><span>Shopping Cart</span></a></li>
        <li><nav> | </nav></li>
        <li><img src="images/5.jpg" width="30px" height="30px" /></li>
        <li><a href="#"><span> Sign Up</span></a>
          <div id="login_header1">
            <div id="inner_login_header1">
              <span>Sign Up</span><br />
              <div id="inner_login_form">
                <form action="" method="post">
                  <font id="inner_name">Username : </font><br /><font id="inner_email"><input type="text" name="first_name_signup" placeholder="Username..." /></font><br /><br />
                  <font id="inner_name">Email : </font><br /><font id="inner_email"><input type="email" name="email_signup" placeholder="Enter your email..." /></font><br /><br />
                  <font id="inner_name">Mobile no : </font><br /><font id="inner_email"><input type="text" name="mobile_no_signup" placeholder="+91..." /></font><br /><br />
                  <font id="inner_pass_name">Password : </font><br /><font id="inner_password"><input type="password" name="password_signup" placeholder="Enter your password..." /></font><br /><br />
                  <font id="inner_pass_name">Password again : </font><br /><font id="inner_password"><input type="password" name="password_again_signup" placeholder="Enter again password..." /></font><br />
                  <font id="forget_pass"><a href="">forget Password?</a></font><br />
                  <font id="submit_right"><input type="submit" name="cart_signup_connect" value="Sign Up" /></font>
                </div>
              </div>
            </div>
          </li>
          <li><nav> | </nav></li>
          <li><a href="#"><span> Login</span></a>
            <div id="login_header">
              <div id="inner_login_header">
                <span>Sign In</span><br />
                <div id="inner_login_form">
                  <form action="" method="post">
                    <font id="inner_name">Email : </font><font id="inner_email"><input type="email" name="email" placeholder="Enter your email." /></font><img src="images/1.png"><br /><br />
                    <font id="inner_pass_name">Password : </font><font id="inner_password"><input type="password" name="password" placeholder="Enter your password." /></font><img src="images/2.png"><br />
                    <font id="forget_pass"><a href="">forget Password?</a></font><br />
                    <font id="submit_right"><input type="submit" name="cart_connect" value="Sign In" /></font>
                  </div>
                </div>
              </div>
            </li>
      </ol>
    </div><br /><br />
    <div class="header2">
      <center><table id="table">
        <tr>
          <form action="results.php" method="POST" enctype="multipart/form-data" >
            <td width="100px"><a href=""><span>ClickCart</span></a></td>
            <td width="100px"><img src="images/1.jpg" width="50px" height="50px"></td>
            <td width="100px"><font id="search"><input type="search" name="user_query" placeholder="So, What are you wishing for today?" ></font></td>
            <td width="100px"><input type="submit" name="search" value="Search" /></td>
          </form>
        </tr>
      </table></center>
    </div>
  </div><br /><br />
  <div class="menu" >
    <ol>
      <li><a href="#">ELECTRONICS</a>
        <div id="e_1">
          <div id="e_2">
            <center>
              <table  border="1">
                <th style="background-color:#20CFFF;">
                  <pre><a href=""><font color="blue" size="4px"><b>Shop By:</b></font></a>     <a href=""><font color="black" size="3px"><b>Catgories</b></font></a></pre>
                </th>
                <tr>
                  <td style="background-color:#FBFBFB;"><p><font style="font-family:fantasy;" color="red">Mobiles :</font></p><a href="">Motorola</a><br /><a href="">lenovo</a><br /><a href="">Samsung</a><br /><a href="">Mi</a><br /><a href="">Asus</a><br /><a href="">Huawei Honor</a><br /><br /><font style="font-family:fantasy;" color="red">All Exclusive Mobiles :</font><br /><p><font style="font-family:fantasy;" color="red">New and Popular Models :</font></p><a href="">Samsung ON5IOn7</a><br /><a href="">Lenovo Vibe P1</a><br /><br /></td>
                  <td style="background-color:#FBFBFB;"><p><font style="font-family:fantasy;" color="red">Wearable Smart Devices :</font></p><a href="">Smart Watch</a><br /><a href="">Smart Band</a><p><font style="font-family:fantasy;" color="red">Tablets :</font></p><a href="">Mi Tablets</a><br /><a href="">lenovo Tablets</a><br /><a href="">Asus Tablets</a><br /><a href="">Samsung Tablets</a><br /><p><font style="font-family:fantasy;" color="red">Laptops :</font></p><a href="">HP</a><br /><a href="">Lenovo</a><br/><br /></td>
                  <td style="background-color:#FBFBFB;"><p><font style="font-family:fantasy;" color="red">Mobile Accessories :</font></p><a href="">Cases & Cover</a><br /><a href="">Power banks</a><br /><a href="">Mobile Memory Card</a><br /><a href="">Value Combos</a><br /><a href="">On the Go Pendrive</a><p><font style="font-family:fantasy;" color="red">Headphones & headSets :</font></p><p><font style="font-family:fantasy;" color="red">Tablet Accessories :</font></p><p><font style="font-family:fantasy;" color="red">Computer Accessories :</font></p><a href="">External Hard disks</a><br/><br /><br /></td>
                  <td style="background-color:#FBFBFB;"><p><font style="font-family:fantasy;" color="red">Televisions :</font></p><a href="">Vu Tvs</a><br /><a href="">BPL Televisions</a><br /><a href="">24 inches & below</a><br /><a href="">32 inches</a><br /><a href="">39 inches & above</a><p><font style="font-family:fantasy;" color="red">Large Appliences :</font></p><a href="">Washing Machines</a><br /><a href="">Sansul Appliences</a><br /><a href="">Refrigetators</a><br /><a href="">Air Conditioners</a></p><br /><br /></td>
                  <td style="background-color:#FBFBFB;"><p><font style="font-family:fantasy;" color="red">Kitchen Appliences :</font></p><a href="">Microwave Ovens</a><br /><a href="">Mixers</a><br /><a href="">Induction Cooktops</a><br /><a href="">Air Fryers</a><br /><ahref="">Electric Kettles</a><p><font style="font-family:fantasy;" color="red">Personal Care Appliences :</font></p><a href="">Trimmers</a><br /><a href="">Hair Dryers</a><br /><a href="">Shevers</a><p><font style="font-family:fantasy;" color="red">Audio & Vedio :</font></p><br /><br /></td>
                </tr>
              </table>
            </center>
          </div>
        </div>
      </li>
      <li><nav> | </nav></li>
      <li><a href="#">MEN</a></li>
      <li><nav> | </nav></li>
      <li><a href="#">WOMEN</a></li>
      <li><nav> | </nav></li>
      <li><a href="#">BABY & KIDS</a></li>
      <li><nav> | </nav></li>
      <li><a href="#">HOME & FURNTURE</a></li>
      <li><nav> | </nav></li>
      <li><a href="#">BOOKS</a></li>
      <li><nav> | </nav></li>
      <li><a href="#">AUTO & SPORTS</a></li>
      <li><nav> | </nav></li>
      <li><a href="#">OFFER ZONE</a></li>
    </ol>
  </div>
  <div id="section">
    <div class="image_link">
      <div class="left_menu">
        <ol>
          <li><a href="home.php"><font id="home">Home</font></a></li>
          <li><a href="all_products.php"><span>All Products</span></a></li>
          <li><nav>Categories :</nav></li>
        </ol>
        <ol class="abc">
          <?php getCats(); ?>
        </ol>
        <ol>
          <li><nav>Brands :</nav></li>
        </ol>
        <ol class="abc">
          <?php getBrands(); ?>
        </ol>
      </div>
      <div class="right_menu">
        <?php cart(); ?>
        <div id="product_menu1">
          <span><font id="z">Welcome</font><a href="customer/account.php?q=<?php echo $uemail_database?>"><?php echo "<font id='user_name'>".@$name_database."</font>" ?></font></a> <a href="cart.php"><font id="a">Shopping cart</font></a><font id="b">Total item : <?php total_items(); ?></font><font id="b">Total price :<?php total_price(); ?></font> <a href="home.php"><font id="input"><input type="button" value="Back to Shop" ></a></font></span>
          <script type="text/javascript" src="js/script.js"></script>
          <script type="text/javascript" src="js/jquery.min.js"></script>
        </div>

        <?php
          include "connection.php";

        $get_pro_d="select * from products order by RAND() LIMIT 0,6";
        $run_pro_d=mysqli_query($con,$get_pro_d);
        while($row_pro=mysqli_fetch_array($run_pro_d)){

          $pro_image_d=$row_pro['product_image'];
          $pro_id_d=$row_pro['product_id'];

        /*  echo "
          <div id='details_image'>
          <a href='details.php?pro_id=$pro_id_d'><img src='admin_area/product_images/$pro_image_d' width='100px' height='120px'  /></a><br />
          </div>


          ";*/

        }
        $get_pro_d_1="select * from products order by RAND() LIMIT 0,2";
        $run_pro_d_1=mysqli_query($con,$get_pro_d_1);
        while($row_pro=mysqli_fetch_array($run_pro_d_1)){

          $pro_image_d_1=$row_pro['product_image'];
          $pro_id_d_1=$row_pro['product_id'];

          /*  echo "
          <div id='details_image'>
          <a href='details.php?pro_id=$pro_id_d'><img src='admin_area/product_images/$pro_image_d' width='100px' height='120px'  /></a><br />
          </div>


          ";*/

        }

        ?>

        <div id="middle_index" >
          <a href="#"><font id="image_home_offer_index">
            <img src="images/facebook_icon11.jpg" width="40px" height="40px" /><font id="home_feed_index">Tweet</font><hr />
            <img src="images/facebook_icon12.jpg" width="40px" height="40px" /><font id="home_feed_index">Share</font><hr />
            <img src="images/facebook_icon14.jpg" width="40px" height="40px" /><font id="home_feed_index">E-mail</font>
          </font></a>
        </div>

        <div id="middle_index_left_asd_1" >
          <a href="#"><font id="image_home_offer_index_left_asd_1">
            <font id="asd_1">OFFER</font>
          </font></a>
        </div>
        <div id="middle_index_left_1" >
          <?php

          echo "
           <a href='details.php?pro_id=$pro_id_d'><font id='image_home_offer_index_left_1'>
            <img src='admin_area/product_images/$pro_image_d'  />
          </font></a>
          ";

          ?>
        </div>

        <div id="middle_index_left_asd" >
          <a href="#"><font id="image_home_offer_index_left_asd">
            <font id="asd">OFFER</font>
          </font></a>
        </div>
        <div id="middle_index_left" >
          <?php

          echo "
          <a href='details.php?pro_id=$pro_id_d_1'><font id='image_home_offer_index_left'>
            <img src='admin_area/product_images/$pro_image_d_1'  />
          </font></a>
          ";

          ?>
        </div>


        <?php  getIp(); ?>
        <div class="product_insert_box">
          <form action="" method="post" enctype="multipart/form-part">

            <table id="cart_1" align="" width="670" bgcolor="">

              <tr align="">
                <th><font id="cart_name">Remove</font></th>
                  <th><font id="cart_name">Product(s)</font></th>
                    <th><font id="cart_name">Quantity</font></th>
                      <th><font id="cart_name">Total Price</font></th>
                      </tr>
                      <?php

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

                          $product_title=$pp_price['product_title'];

                          $product_image=$pp_price['product_image'];

                          $single_price=$pp_price['product_price'];

                          $values=array_sum($product_price);

                          $total +=$values;


                          ?>

                          <tr align="center">
                            <td><font id="check_box"><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"/></font></td>
                            <td><font id="product_title"><?php echo $product_title; ?></font><br />
                              <img src="admin_area/product_images/<?php echo $product_image; ?>" width="65px" height="65px" />
                            </td>
                            <td><input type="text" size="4" name="qty" value="<?php echo @$_SESSION['qty']; ?>"/></td>

                            <?php

                            if(isset($_POST['update_cart'])){
                              $qty=$_POST['qty'];
                              $update_qty="update cart set qty='$qty'";
                              $run_qty=mysqli_query($con, $update_qty);

                              $_SESSION['qty']=$qty;

                              $total=$total*$qty;
                            }


                            ?>
                            <td><font id="cart_price"><?php echo "$ " .$single_price; ?></font></td>
                          </tr>


                          <?php } } ?>

                          <tr>
                            <td colspan="4" align="right"><font id="total"><b>Sub Total :<b></font></td>
                              <td><font id="total1"><?php echo "$ " .$total.""; ?></font></td>
                            </tr>

                            <tr>
                              <td align="right" colspan="2" ><font id="button1"><input type="submit" name="update_cart" value="Update Cart" /></font></td>
                              <td align="right" ><font id="button1"><input type="submit" name="continue" value="Continue Shopping" /></font></td>
                              <td align="right"><font id="button1"><input name='checkout' type='submit'  value='Checkout' /></font></td>
                            </tr>
                          </table>
                        </form>

                        <?php

                        function updatecart(){

                          global $con;

                          $ip=getIp();

                          if(isset($_POST['update_cart'])){

                            foreach($_POST['remove'] as $remove_id){
                              $delete_product="delete from cart where p_id='$remove_id' AND ip_add='$ip'";

                              $run_delete=mysqli_query($con, $delete_product);

                              if($run_delete){

                                echo "<script>window.open('cart.php' , '_self')</script>";
                              }

                            }

                          }
                          if(isset($_POST['continue'])){

                            echo "<script>window.open('home.php' , '_self')</script>";



                          }
                          if(isset($_POST['checkout'])){

                            echo "<script>window.open('checkout.php' , '_self')</script>";



                          }
                        }
                        echo @$up_cart=updatecart();

                        ?>
        </div>
      </div>
    </div>
  </div>
  <div class="footer">
    <table>
      <tr>
        <td id="img" width=14px><img src="images/1.jpg" width="55px" height="55px" /></td>
        <td width=0px><a href=""><span>ClickCart</span></a></td>
        <td width=900px><p>© 2015 Fashion Mania. All Rights Reserved and manufture at delhi <br /> Design by W3layouts</p></td>
        <td><img src="images/twitter.png" width="35px" height="35px" />  <img src="images/facebook.png" width="35px" height="35px" />  <img src="images/rss.png" width="35px" height="35px" />  <img src="images/twitter.png" width="35px" height="35px" /></td>
      </tr>
    </table>
  </div>
</body>
</html>
