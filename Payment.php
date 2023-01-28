<!DOCTYPE html>
<html lang="en">
<head?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>الدفع</title>
  <link rel="stylesheet" href="css/Payment.css">
</head>

<body>

  <div class="container">

    <div class="card-container">
      <div class="front">
        <div class="image">
          <img src="images/chip.png">
          <img src="images/visa.png">
        </div>
        <div class="card-number-box">0000 0000 0000 0000</div>
        <div class="flexbox">
          <div class="box">
            <span>card holder</span>
            <div class="card-holder-name">full name</div>
          </div>
          <div class="box">
            <span>expires</span>
            <div class="expiration">
              <span class="exp-month">mm</span>
              <span class="exp-year">yy</span>
            </div>
          </div>
        </div>
      </div>

      <div class="back">
        <div class="stripe"></div>
        <div class="box">
          <span>cvv</span>
          <div class="cvv-box"></div>
          <img src="images/visa.png">
        </div>
      </div>

    </div>

    <form name="payment" method="post" action="success.php" onsubmit="return required()" required>
      <div class="inputBox">
        <span>رقم البطاقة</span>
        <input name="numCard" type="text" minlength="16" maxlength="16" class="card-number-input">
      </div>
      <div class="inputBox">
        <span>اسم حامل البطاقة</span>
        <input name="nameCard" type="text" minlength="3" maxlength="20" class="card-holder-input">
      </div>
      <div class="flexbox">
        <div class="inputBox">
          <span>تاريخ الانتهاء بالشهر</span>
          <select name="exMonth" id="" class="month-input">
            <option value="month" selected disabled>الشهر</option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
          </select>
        </div>
        <div class="inputBox">
          <span>تاريخ الانتهاء بالسنة</span>
          <select name="exYaer" id="" class="year-input">
            <option value="year" selected disabled>السنة</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
            <option value="2026">2026</option>
            <option value="2027">2027</option>
            <option value="2028">2028</option>
            <option value="2029">2029</option>
            <option value="2030">2030</option>
          </select>
        </div>
        <div class="inputBox">
          <span>cvv</span>
          <input name="cvv" type="text" class="cvv-input" minlength="3" maxlength="3">

        </div>
      </div>

      <input name="submit" type="submit" value="دفع" class="submit-btn">



    </form>

  </div>

  <script>
    function required() {
      var x = document.forms["payment"]["numCard" , "nameCard" , "cvv"].value;
      if (x == "") { 
        alert("يرجى كتابة جميع الحقول");
        return false
      }
    }

    document.querySelector('.card-number-input').oninput = () => {
      document.querySelector('.card-number-box').innerText = document.querySelector('.card-number-input').value;
    }

    document.querySelector('.card-holder-input').oninput = () => {
      document.querySelector('.card-holder-name').innerText = document.querySelector('.card-holder-input').value;
    }

    document.querySelector('.month-input').oninput = () => {
      document.querySelector('.exp-month').innerText = document.querySelector('.month-input').value;
    }

    document.querySelector('.year-input').oninput = () => {
      document.querySelector('.exp-year').innerText = document.querySelector('.year-input').value;
    }

    document.querySelector('.cvv-input').onmouseenter = () => {
      document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(-180deg)';
      document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(0deg)';
    }

    document.querySelector('.cvv-input').onmouseleave = () => {
      document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(0deg)';
      document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(180deg)';
    }

    document.querySelector('.cvv-input').oninput = () => {
      document.querySelector('.cvv-box').innerText = document.querySelector('.cvv-input').value;
    }
  </script>
</body>
</html>