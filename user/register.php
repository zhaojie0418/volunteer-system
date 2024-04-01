<?php
require './public_function.php';
dbInit();
if ($_POST) {
    $username = $_POST['username'];
    $pwd = $_POST['password'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $realname = $_POST['realname'];
    $idnum = $_POST['idnum'];
    $spec = $_POST['speciality'];
    $sql = "select `u_id` from `user_info` where `username`='$username'";
    if (fetchRow($sql)) {
        die('用户名已存在！');
    }
    $sql = "insert into `user_info`(`username`,`password`,`phone`,`email`,`realname`,`idnum`,`speciality`) 
            values('$username','$pwd','$phone','$email','$realname','$idnum','$spec')";
    query($sql);
    // die('数据保存成功！' . '<a href="./login.php">登录</a>');
    echo "<script language=javascript>alert('注册成功！');window.location='./login.php'</script>";
    // header('Location:./login.php');
    die;
}
require './register_html.php';
