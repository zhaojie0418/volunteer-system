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
//根据活动名称进行模糊查询
if (isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
    $keyword = mysqli_real_escape_string($link, $keyword);
    $sql = "select * from `message_info` where  `act_name` like '%$keyword%'";
} else {
    //读取全部留言
    $sql = "select * from `message_info` where `u_id`=$u_id";
}
$mess_info = fetchAll($sql);
require './p_message_html.php';
