<?php
require '../public_function.php';
//读取session
session_start();
if (isset($_SESSION['user_info'])) {
    $u_id = $_SESSION['user_info']['id'];
} else {
    echo "<script language=javascript>alert('用户未登录，请登录账号！');window.location='../login.php'</script>";
}

$link = dbInit();
//读取用户信息
$sql = "select * from `user_info` where `u_id`=$u_id";
$user_info = fetchRow($sql);
require './person_html.php';
