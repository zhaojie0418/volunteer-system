<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登录页面</title>
  <style>
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }

    body {
      background: url(../images/bg1.jpg) no-repeat;
      background-size: 100%;
      /* width: 100%; */
    }

    .box {
      position: relative;
      margin: 150px auto;
      width: 360px;
      height: 350px;
      background-color: rgba(255, 255, 255, 1);
      border-radius: 5px;
    }

    h1 {
      padding-top: 35px;
      height: 70px;
      text-align: center;
      font-size: 18px;
    }

    .input {
      margin: 10px 30px;
      padding-left: 8px;
      width: 300px;
      height: 35px;
      border: 1.5px solid #ddd;
      border-radius: 3px;
    }

    .login {
      margin: 3px 30px 10px;
      width: 300px;
      height: 35px;
      background-color: #34478d;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    .select {
      padding: 5px 30px;
      width: 360px;
      height: 35px;
    }

    .select .von {
      margin-right: 5px;
      vertical-align: middle;
    }

    .select .man {
      margin-left: 50px;
      margin-right: 5px;
      vertical-align: middle;
    }

    span {
      margin-left: 30px;
      font-size: 16px;
      color: #000;
    }

    a {
      position: relative;      
      left: 275px;
      text-align: center;
      font-size: 14px;
      color: #00a1d8;
    }
    
  </style>
</head>

<body>
  <div class="box">
    <form method="POST">
      <h1>登录</h1>
      <input type="text" class="input" name="username" placeholder="请输入用户名">
      <input type="password" class="input" name="password" placeholder="请输入密码">
      <div class="select">
        <label><input type="radio" class="von" name="ident" value="user" checked>志愿者</label>
        <label><input type="radio" class="man" name="ident" value="admin">管理员</label>
      </div>
      <input type="submit" class="login" value="立即登录">
      <input type="button" class="login" value="人脸识别登录" onclick="window.location.href='face.html'">
      <span><?php echo $error ?></span>
      <!-- 注册链接转换成块元素 便于移动其位置 -->
      <p><a href="./register.php">免费注册</a></p>
      <form method="POST">
  </div>
</body>

</html>