<!DOCTYPE html>
<?php
include("includes/db.php");
 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inserting Product</title>
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script>
        tinymce.init({selector:'textarea'});
    </script>
  </head>
  <body bgcolor="skyblue">

    <form action="insert_product.php" method="post" enctype="multipart/form-data">

      <table align="center" width="700" border="2" bgcolor="orange">

        <tr align="center">
          <td colspan="8"><h2>Insert New Post Here</h2></td>
        </tr>

        <tr>
          <td align="right"><b>Product Title</b></td>
          <td><input type="text" name="product_title" size="60" required /></td>
        </tr>

        <tr>
          <td align="right"><b>Product Category</b></td>
          <td>
            <select name="product_cat" required>
              <option>Select a category</option>
              <?php
              $get_cats = "select * from categories";

              $run_cats = mysqli_query($con, $get_cats);

              while($row_cats=mysqli_fetch_array($run_cats)){
                $cat_id = $row_cats['cat_id'];
                $cat_title = $row_cats['cat_title'];

                echo "<option value='$cat_id'>$cat_title</option>";

              }

               ?>
          </td>
        </tr>

        <tr>
          <td align="right"><b>Product Brand</b></td>
          <td>
            <select name="product_brand" required>
              <option>Select a category</option>
              <?php
              $get_brands = "select * from brands";

              $run_brands = mysqli_query($con, $get_brands);

              while($row_brands=mysqli_fetch_array($run_brands)){
                $brands_id = $row_brands['brand_id'];
                $brands_title = $row_brands['brand_title'];

                echo "<option value='$brands_id'>$brands_title</option>";

              }
              ?>

          </td>
        </tr>

        <tr>
          <td align="right"><b>Product Image</b></td>
          <td><input type="file" name="product_image" required /></td>
        </tr>

        <tr>
          <td align="right"><b>Product Price</b></td>
          <td><input type="text" name="product_price" required /></td>
        </tr>

        <tr>
          <td align="right"><b>Product Description</b></td>
          <td><textarea name="product_description" cols="20" rows="10" ></textarea></td>
        </tr>

        <tr>
          <td align="right"><b>Product keywords</b></td>
          <td><input type="text" name="product_keywords" size="50" required /></td>
        </tr>


        <tr align="center">
          <td colspan="8"><input type="submit" name="insert_post" value="Insert Product Now" /></td>
        </tr>
    </table>
  </body>
</html>
<?php
  if(isset($_POST['insert_post'])){
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];

    $product_image = $_FILES['product_image']['name'];
    
    $product_image_tmp = $_FILES['product_image']['tmp_name'];

    move_uploaded_file($product_image_tmp,"product_images/$product_image");

    $insert_product = "insert into products
    (product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords)
    values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";

    $insert_pro = mysqli_query($con, $insert_product);
    echo $insert_pro;
    if($insert_pro){
      echo "<script>alert('Product Insert Successfully!')</script>";
      echo "<script>window.open('insert_product.php','_self')</script>";
    }
  }

 ?>
