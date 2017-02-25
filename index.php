
<?php

include("functions/function.php");

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

if(isset($_POST['home_connect'])){
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
        header("Location:home.php?q=".$email_database);
      } else {
        echo "<script>alert('Please Enter a Correct Username and Password!')</script>";
        echo  "<script>window.open('index.php','_self')</script>";
      }
    }
  }else{
    echo "<script>alert('All Field are required!')</script>";
    echo  "<script>window.open('index.php','_self')</script>";
  }
}
@mysqli_free_result($result);
@mysqli_close($dbh);

?>
<?php
include 'connection.php';

if(isset($_POST['home_signup_connect'])){
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
      echo  "<script>window.open('index.php','_self')</script>";
    }else{
      $query=mysql_query("INSERT INTO account (first_name,mobile_no,email,password,password_again) VALUES ('$first_name','$mobile_no','$email','$password_hash','$password_again_hash')");
      if($query_run=mysql_query($query)){
      }else{
        echo "<script>alert('Thanks! You are Sucessfully Register..')</script>";
        echo  "<script>window.open('home.php?q=$email','_self')</script>";
      /*  header("Location:home.php?q=".$email);*/
      }
    }

  }else{
    echo "<script>alert('All field are Required!')</script>";
    echo  "<script>window.open('index.php','_self')</script>";
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
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <!--<link rel="stylesheet" href="css/style.css"></link>-->
  <link rel="stylesheet" href="css/style1.css"></link>
  <script type="text/javascript" src="js/script.js"></script>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript">
  $(function () {
    $("#slider").responsiveSlides({
      auto: true,
      speed: 500,
      namespace: "callbacks",
      pager: true,
    });
  });
  </script>
</head>

<body  id="upper_offer" onload="javascript:auto()">
  <div class="header">
    <div class="header1_toggle">
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
        <li><a href="#"><font id="slide_toggle1"><span> Sign Up</span></font></a>
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
                  <font id="forget_pass"><a href="#">forget Password?</a></font><br />
                  <font id="submit_right"><input type="submit" name="home_signup_connect" value="Sign Up" /></font>
                </div>
              </div>
            </div>
        </li>
        <li><nav> | </nav></li>
        <li><a href="#"><font id="slide_toggle"><span> Login</span></font></a>
        <div id="login_header">
           <div id="inner_login_header">
             <span>Sign In</span><br />
             <div id="inner_login_form">
             <form action="" method="post">
             <font id="inner_name">Email : </font><font id="inner_email"><input type="email" name="email" placeholder="Enter your email." /></font><img src="images/1.png"><br /><br />
             <font id="inner_pass_name">Password : </font><font id="inner_password"><input type="password" name="password" placeholder="Enter your password." /></font><img src="images/2.png"><br />
             <font id="forget_pass"><a href="">forget Password?</a></font><br />
             <font id="submit_right"><input type="submit" name="home_connect" value="Sign In" /></font>
           </div>
           </div>
        </div>
        <script type="text/javascript" src="js/script.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        </li>
      </ol>
    </div><br /><br />
    <div class="header2">
      <center><table id="table">
        <tr>
          <form action="results.php" method="POST" enctype="multipart/form-data" >
            <td width="100px"><a href=""><span>ClickCart</span></a></td>
            <td width="100px"><img src="images/1.jpg" width="50px" height="50px"></td>
            <td width="100px"><font id="search"><input id="search_p" type="search" name="user_query" placeholder="So, What are you wishing for today?" ></font></td>
            <td width="100px"><input type="submit" name="search" value="Search" /></td>
          </form>
        </tr>
      </table></center>
    </div>
  </div><br /><br />
  <div id="section">
      <div class="right_menu_home">
      <div id="middle">
        <a class="scroll" href="#offer"><font id="image_offer"><img src="images/bottam.png" /></font></a>
        <a href="#"><font id="image_home_offer">
          <img src="images/facebook_icon11.jpg" width="40px" height="40px" /><font id="home_feed">Tweet</font><hr />
          <img src="images/facebook_icon12.jpg" width="40px" height="40px" /><font id="home_feed">Share</font><hr />
          <img src="images/facebook_icon14.jpg" width="40px" height="40px" /><font id="home_feed">E-mail</font>
          </font></a>
          <a href="#"><font id="image_home_offer_status_left">
            <font id="feed_back_status">
            <table>
              <tr>
                <td><font id="t">Email :</font></td>
              </tr>
              <tr>
                <td><input type="email" name="" ></td>
              </tr>
              <tr>
                <td><font id="t">Status :</font></td>
              </tr>
              <tr>
                <td><textarea rows="4" cols="22" ></textarea></td>
              </tr>
              <tr>
                <td><input type="submit" name="" value="Submit" ></td>
              </tr>
            </table>
            </font>
          </font></a>
          <a href="#"><font id="image_home_offer_left">
          <font id="feed_back" >F</font><br />
          <font id="feed_back" >E</font><br />
          <font id="feed_back" >E</font><br />
          <font id="feed_back" >D</font><br />
          <font id="feed_back" >B</font><br />
          <font id="feed_back" >A</font><br />
          <font id="feed_back" >C</font><br />
          <font id="feed_back" >K</font>
          </font></a>
        <div id="fade">
          <a href="home.php"><font id="fade_button"><input type="button" name="" Value="Get Started" /></font></a><br /><br />
          <font id="fade_name">Go Online Shopping and shop to Exclusive offer to minimum price and best offers.... </font>
        </div>
        <div id="middle_image">
          <div class="gallery">
            <ul class="images">
              <li class="show"><img width="846px" height="486px" src="images/cover1.jpg" alt="photo_one" /></li>
              <li><img width="846px" height="486px" src="images/cover2.jpg" alt="photo_two" /></li>
              <li><img width="846px" height="486px" src="images/cover3.jpg" alt="photo_three" /></li>
              <li><img width="846px" height="486px" src="images/cover4.jpg" alt="photo_four" /></li>
            </ul>
          </div>
        </div>
    </div>
    <div id="middle_bottam_1">
      <table>
        <tr>
          <td><img src="images/page3-img2.png" /></td>
           <td><span>Online Shopping</span><br /><font id="font">Best Shopping site</font></td>
         </tr>
       </table>
       <table>
         <tr>
           <td><p>Go to online shopping site a shop to exclusive offers and many more like mobiles & computers .</p></td>
           <td><font id="image_x"><img src="images/page3-img6.png" /></font></td>
         </tr>
       </table>
    </div>
    <div id="middle_bottam_2">
      <table>
        <tr>
          <td><img src="images/page3-img3.png" /></td>
          <td><span>Exclusive Offers</span><br /><font id="font">Best gift offer</font></td>
        </tr>
      </table>
      <table>
        <tr>
          <td><p>Go to online shopping site a shop to exclusive offers and many more like mobiles & computers .</p></td>
          <td><font id="image_x"><img src="images/page3-img6.png" /></font></td>
        </tr>
      </table>
    </div>
    </div>
  </div>
  <section id="offer">
    <a class="scroll" href="#upper_offer"><font id="bottam_footer"><img src="images/up.png" /></font></a>
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
</div>
</section>
<script type="text/javascript">
jQuery(document).ready(function($) {
  $(".scroll").click(function(event){
    event.preventDefault();
    $('html,body').animate({scrollTop:$(this.hash).offset().top},1100);
  });
});
</script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.easing-sooper.js"></script>
<script type="text/javascript" src="js/jquery.sooperfish.js"></script>
<script type="text/javascript" src="js/image_fade.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('ul.sf-menu').sooperfish();
});
</script>
</body>
</html>
