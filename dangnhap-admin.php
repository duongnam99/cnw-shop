<?php
    session_start();
    include("lib_db.php");
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ngoc Boi Shop</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="model-login-regis" >
        <div class="model-body">
        <form class="form-login" action="dangnhap.php" method="post" >
          
          <div class="">
              <label for="uname"><b>Tên đăng nhập</b></label>
              <input type="text" placeholder="Enter Username" name="username" required>

              <label for="psw"><b>Mật khẩu</b></label>
              <input type="password" placeholder="Enter Password" name="password" required>

              <button type="submit" name="submit_login">Đăng nhập</button>
              <label>
              <!-- <input type="checkbox" checked="checked" name="remember"> Nhớ tôi
              </label> -->
          </div>
      
      </form>
    </div>

    <script src="js/main.js"></script>
</body>

</html>