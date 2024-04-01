<?php
require './public_function.php';
//读取session，获取用户id
session_start();
if (isset($_SESSION['user_info'])) {
    $u_id = $_SESSION['user_info']['id'];
} else {
    echo "<script language=javascript>alert('用户未登录，无法报名，请登录账号！');window.location='./login.php'</script>";
}

$link = dbInit();
//在志愿项目页面点击报名时提交该活动的id
$act_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($act_id == 0) die('活动ID错误！');

//将报名信息添加到act_sign表
if (isset($_GET['id'])) {
    $sql = "insert into `act_sign`(`act_id`,`u_id`)values('$act_id','$u_id')";
    if ($result = mysqli_query($link, $sql)) {
        echo "<script language=javascript>alert('报名成功，可在个人中心查看活动！');window.location='./act.php'</script>";
        //在act_sign表中计算在该活动id下的报名人数
        $sql1 = "select count(*) as count from `act_sign` where `act_id`=$act_id";
        if ($res = mysqli_fetch_array(mysqli_query($link, $sql1))) {
            $sign = $res['count'];
        } else {
            $sign = 0;
        }
        // print_r($sign);
        //更新act_info表中报名人数sign
        $sql2 = "update `act_info` set `sign`=$sign where `act_id`=$act_id";
        query($sql2);
    } else {
        echo "<script language=javascript>alert('已报名该活动，请不要重复报名！');window.location='./act.php'</script>";
    }
}
