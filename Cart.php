<?php

session_start();

require_once("DbPRODUCT.php");
require_once("cartFunction.php");

// ** create database class **
$database = new DbPRODUCT("Productdb", "Producttb");

if (isset($_POST['remove'])) {
  if ($_GET['action'] == 'remove') {
    foreach ($_SESSION['cart'] as $key => $value) {
      if ($value["product_id"] == $_GET['id']) {
        unset($_SESSION['cart'][$key]);
        echo "<script>alert('تم حذف المنتج بنجاح!')</script>";
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cart</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/Cart.css">
  <link rel="stylesheet" href="css/Home.css">
  

</head>

<body class="">

  <?php
  require_once('header.php');
  ?>

  <div class="container-fluid">
    <div class="row px-5">
      <div class="col-md-7">
        <div class="shopping-cart">
          <h4>السلة</h4>
          <hr>

          <?php
          $total = 0;
          if (isset($_SESSION['cart'])) {
            $product_id = array_column($_SESSION['cart'], 'product_id');

            $result = $database->getData();
            while ($row = mysqli_fetch_assoc($result)) {
              foreach ($product_id as $id) {
                if ($row['id'] == $id) {
                  cartElement($row['product_image'], $row['product_name'], $row['product_price'], $row['id']);
                  $total = $total + (int)$row['product_price'];
                }
              }
            }
          }
          ?>

        </div>
      </div>
      <div class="col-md-4 offset-md-1 rounded mt-5 h-25">

        <div class="pt-4">
          <h6>تفاصيل الشراء</h6>
          <hr>
          <div class="row price-details">
            <div class="col-md-6">
              <?php
              if (isset($_SESSION['cart'])) {
                $count  = count($_SESSION['cart']);
                echo "<h6>سعر ($count المنتجات)</h6>";
              } else {
                echo "<h6>سعر (0 المنتجات)</h6>";
              }
              ?>
              <h6>الشحن</h6>
              <hr>
              <h6>الإجمالي</h6>
            </div>
            <div class="col-md-6">
              <h6>$<?php echo $total; ?></h6>
              <h6 class="text-success">مجاني</h6>
              <hr>

              
             <h6>$<?php echo $total;
     
              if($total > 1){
                echo ("<br><br> <button type=\"submit\" onclick=\"location.href='Payment.php'\" class=\"btn btn-dark col-6\">إتمام الشراء </button>");
              }
              
              else {
                echo ('<hr> سلة المشتريات فارغة !');
              }
              ?>
            
              </h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="js/jquery-3.6.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.js"></script>
</body>
</html>