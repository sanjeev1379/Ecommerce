<?php
include("includes/db.php");
?>
<!Doctype html>
<html>
<head>
  <title>Clickcart-Go to Online shopping</title>
  <link rel="shortcut icon" href="../images/icon1.jpg"></link>
  <link rel="stylesheet" href="css/style.css"></link>
  <script type="text/javascript" src="../js/script.js"></script>
  <script type="text/javascript" src="../js/jquery.min.js"></script>
</head>

<body onload="javascript:auto()">
  <div class="header">
    <div class="header1">
      <ol>
        <li><img src="../images/1.jpg" width="30px" height="30px" /></li>
        <li><a href=""><span>sell</span></a></li>
        <li><nav> | </nav></li>
        <li><img src="../images/3.jpg" width="30px" height="30px" /></li>
        <li><a href=""><span>Download Apps</span></a></li>
        <li><nav> | </nav></li>
        <li><a href=""><span> 24*7 Customer Care</span></a></li>
        <li><nav> | </nav></li>
        <li><img src="../images/4.jpg" width="30px" height="30px" /></li>
        <li><a href=""><span>Track Order</span></a></li>
        <li><nav> | </nav></li>
        <li><img src="../images/2.jpg" width="30px" height="30px" /></li>
        <li><a href=""><span>Shopping Cart</span></a></li>
        <li><nav> | </nav></li>
        <li><img src="../images/5.jpg" width="30px" height="30px" /></li>
        <li><a href=""><span> Sign Up</span></a></li>
        <li><nav> | </nav></li>
        <li><a href=""><span> Login</span></a></li>
      </ol>
    </div><br /><br />
    <div class="header2">
      <center><table id="table">
        <tr>
          <td width="100px"><a href=""><span>ClickCart</span></a></td>
          <td width="100px"><img src="../images/1.jpg" width="50px" height="50px"></td>
          <td width="100px"><input type="search" name="search" placeholder="So, What are you wishing for today?" ></td>
          <td width="100px"><input type="submit" name="submit" value="Search" /></td>
        </tr>
      </table></center>
    </div>
  </div><br /><br />
  <div class="menu" >
    <ol>
      <li><a href="#">ELECTRONICS</a></li>
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
          <li><a href=""><span>All Products</span></a></li>
          <li><nav>Categories :</nav></li>
        </ol>
        <ol class="abc">
          <li><a href=""><font id="abc">Laptop</font></a></li>
          <li><a href=""><font id="abc">Computers</font></a></li>
          <li><a href=""><font id="abc">Mobiles</font></a></li>
          <li><a href=""><font id="abc">Cameras</font></a></li>
          <li><a href=""><font id="abc">iPads</font></a></li>
          <li><a href=""><font id="abc">Tablets</font></a></li>
        </ol>
        <ol>
          <li><nav>Brands :</nav></li>
        </ol>
        <ol class="abc">
          <li><a href=""><font id="abc">HP</font></a></li>
          <li><a href=""><font id="abc">DELL</font></a></li>
          <li><a href=""><font id="abc">Motorolo</font></a></li>
          <li><a href=""><font id="abc">Sony Eracson</font></a></li>
          <li><a href=""><font id="abc">LG</font></a></li>
          <li><a href=""><font id="abc">Apple</font></a></li>
        </ol>
      </div>
      <div class="right_menu">
        <div id="product_menu1">
          <span><font id="z">Welcome-Guest</font> <font id="a">Shopping cart :</font><font id="b">Total item :</font><font id="b">Total price :</font> <a href=""><input type="button" value="Go to Cart" ></a></span>
          <script type="text/javascript" src="../js/script.js"></script>
          <script type="text/javascript" src="../js/jquery.min.js"></script>
        </div>
        <div class="product_box">
             <div id="product_header">
               <span>Insert Product Now :</span>
             </div><br />
               <form action="" method="post" enctype="multipart/form-data">
                 <table align="center"  >

                   <tr>
                     <td align="right"><font id="name">Product Title:</font></td>
                     <td><input type="text" name="product_title" required  /></td>
                   </tr>
                   <tr>
                     <td align="right"><font id="name">Product Category:</font></td>
                     <td>
                       <font id="name1"><select name="product_cat" ></font>
                         <option>Select a Category</option>
                         <?php
                         $get_cats= "select * from categories";
                         $run_cats=mysqli_query($con,$get_cats);
                         while($row_cats=mysqli_fetch_array($run_cats)){
                           $cat_id=$row_cats['cat_id'];
                           $cat_title=$row_cats['cat_title'];
                           echo "<option value='$cat_id'>$cat_title</option>";

                         }
                         ?>
                       </select>
                     </td>
                   </tr>

                   <tr>
                     <td align="right"><font id="name">Product Brands:</font></td>
                     <td>
                       <font id="name1"><select  name="product_brand" ></font>
                         <option>Select a Brand</option>
                         <?php
                         $get_brands= "select * from brands";
                         $run_brands=mysqli_query($con,$get_brands);
                         while($row_brands=mysqli_fetch_array($run_brands)){
                           $brand_id=$row_brands['brand_id'];
                           $brand_title=$row_brands['brand_title'];
                           echo "<option value='$brand_id'>$brand_title</option>";

                         }
                         ?>
                       </select>

                     </td>
                   </tr>
                   <tr>
                     <td align="right"><font id="name">Product Image:</font></td>
                     <td><input type="file" name="product_image" /></td>
                   </tr>
                   <tr>
                     <td align="right"><font id="name">Product Price:</font></td>
                     <td><input type="text" name="product_price"  /></td>
                   </tr>
                   <tr>
                     <td align="right"><font id="name">Product Description:</font></td>
                     <td><textarea style="border-radius:8px;" id="textarea" name="product_desc" cols="54" rows="7" ></textarea></td>
                   </tr>
                   <tr>
                     <td align="right"><font id="name">Product Keywords:</font></td>
                     <td><input type="text" name="product_keywords"  /></td>
                   </tr>

                   <tr>
                     <td><input type="submit" name="insert_post" value="Insert Product Now" /></td>
                   </tr>

                 </table>
           </form>
        </div>
      </div>
    </div>
  </div>
  <div class="footer">
    <table>
      <tr>
        <td id="img" width=14px><img src="../images/1.jpg" width="55px" height="55px" /></td>
        <td width=0px><a href=""><span>ClickCart</span></a></td>
        <td width=900px><p>© 2015 Fashion Mania. All Rights Reserved and manufture at delhi <br /> Design by W3layouts</p></td>
        <td><img src="../images/twitter.png" width="35px" height="35px" />  <img src="../images/facebook.png" width="35px" height="35px" />  <img src="../images/rss.png" width="35px" height="35px" />  <img src="../images/twitter.png" width="35px" height="35px" /></td>
      </tr>
    </table>
  </div>
</body>
</html>
<?php
if(isset($_POST['insert_post'])){

  $product_title=$_POST['product_title'];
  $product_cat=$_POST['product_cat'];
  $product_brand=$_POST['product_brand'];
  $product_price=$_POST['product_price'];
  $product_desc=$_POST['product_desc'];
  $product_keywords=$_POST['product_keywords'];

  $product_image=$_FILES['product_image']['name'];
  $product_image_tmp=$_FILES['product_image']['tmp_name'];

  move_uploaded_file($product_image_tmp,"product_images/$product_image");

  $insert_product="INSERT into products (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) values('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";

  $insert_pro=mysqli_query($con,$insert_product);

  if($insert_pro){
    echo "<script>alert('Product Has been inserted!')</script>";
    echo  "<script>window.open('insert_product.php','_self')</script>";
  }
}

?>
