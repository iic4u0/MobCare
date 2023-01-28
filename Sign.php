<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
  
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login And Sign Up | التسجيل </title>
  <link rel="stylesheet" href="css/qSign.css" />
  <link rel="stylesheet" href="css/footer.css">
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
  </div>
  <div class="container">
    <input type="checkbox" id="flip" />
    <div class="cover">
      <div class="front">
        <img src="images/cats.jpg" />
        <div class="text"></div>
      </div>
      <div class="back">
        <img class="backImg" src="images/cats.jpg" />
        <div class="text"></div>
      </div>
    </div>
    <div class="form">
      <div class="form-content">
        <div class="login-from">

          <div class="title">تسجيل الدخول</div>
          <form action="" method="POST">
            <div class="input-boxes">
              <div class="input-box">
                <input type="text" name="email" placeholder="ايميلك" required minlength="10" />
              </div>

              <div class="input-box">
                <input type="Password" name="Password" placeholder="كلمة المرور" required minlength="8" />
              </div>

              <div class="button input-box">
                <input type="submit" name="GO" value="دخول" />

              </div>
              <?php
              require 'DB_Connect.php';
              if (!empty($_SESSION["id"])) {
                header("Location: Sign.php");
              }
              if (isset($_POST["GO"])) {
                $email = $_POST["email"];
                $password = $_POST["Password"];
                $Ress = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
                $row = mysqli_fetch_assoc($Ress);
                if (mysqli_num_rows($Ress) > 0) {
                  if ($password == $row['Password']) {
                    $_SESSION["Sign"] = true;
                    $_SESSION["id"] = $row["id"];
                    header("Location: Product.php");
                  } 
                  else 
                  {
                    echo
                    "<script> alert('خطأ في كلمة مرور'); </script>";
                  }
                 } 
                  else
                 {
                   echo
                  "<script> alert('لم يتم التسجيل بعد'); </script>";
                }
              }
              ?>
              <div class="text login-text">لا تملك حساب ؟<label for="flip"><span> سجل الأن </span></label>
              </div>
            </div>

          </form>
        </div>

        <div class="signup-from">
          <div class="title">تسجيل جديد</div>
          <form action="" method="POST">
            <div class="input-boxes">
              <div class="input-box">
                <input type="text" name="FullName" placeholder="اسمك بالكامل" required minlength="3" />
              </div>

              <div class="input-box">
                <input type="Email" name="email" placeholder="ايميلك" required minlength="10"/>
              </div>

              <div class="input-box">
                <input type="Password" name="Password" placeholder="كلمة المرور" required minlength="8" />
              </div>

              <div class="button input-box">
                <input type="submit" name="GO2" value="دخول" />
              </div>
              <?php
              require 'DB_Connect.php';
              if (!empty($_SESSION["id"])) {
                header("Location: Product.php");
              }
              if (isset($_POST["GO2"])) {
                $name = $_POST["FullName"];
                $email = $_POST["email"];
                $password = $_POST["Password"];
                $Res = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
                if (mysqli_num_rows($Res) > 0) {
                  echo
                  "<script> alert(يوجد خطأ في اسم المستخدم أو انه مستخدم بالفعل '); </script>";
                 }
                   else
                 {
                  if ($password) {
                    $query = "INSERT INTO users VALUES('','$name','$email','$password')";
                    mysqli_query($conn, $query);
                    echo
                    "<script> alert(' تم التسجيل بنجاح'); </script>";
                  }
                }
              }
              ?>
              <div class="text signup-text"> تملك حساب ؟ <label for="flip"><span>سجل دخول </span></label>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
</body>
</html>