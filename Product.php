<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>
   
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!--css-->
    <link rel="stylesheet" href="css/Home.css">
    <link rel="stylesheet" href="css/Cart.css">
    
</head>
<body>
  <div class="hero">
    <nav>
      <img src="images/MobCare_logo.png" class="logo" />
      <ul>
          <li><a href="Home.php">الرئيسية</a></li>

          <li><a href="Product.php">المنتجات</a></li>
          
          <li><a href="About.php">تعرف على MobCare</a></li>
      </ul>
    </nav>

    <?php

session_start();

require_once ("DbPRODUCT.php");
require_once ("cartFunction.php");


//** create database class **
$database = new DbPRODUCT("Productdb", "Producttb");

if (isset($_POST['add'])){
    // print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('تمت اضافة المنتج بالفعل!')</script>";
            echo "<script>window.location = 'Product.php'</script>";
        }
        else {

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
          }
        }
         else {

        $item_array = array('product_id' => $_POST['product_id']);
        $_SESSION['cart'][0] = $item_array;
    }
}
?>

<?php require_once ("header.php"); ?>
<div class="container">
        <div class="row text-center py-5">
            <?php
                $result = $database->getData();
                while ($row = mysqli_fetch_assoc($result)){
                    component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
                }
            ?>
    </div>
  </div>
</div>

<script src="js/jquery-3.6.1.min.js"></script>
<script src="js/popper.min.js" ></script>
<script src="js/bootstrap.js"></script>
<?php
    require_once("footer.html");
    ?>
</body>
</html>