<?php
require '../public_function.php';
//读取session，获取用户id
session_start();
if (isset($_SESSION['user_info'])) {
    $u_id = $_SESSION['user_info']['id'];
} else {
    echo "<script language=javascript>alert('用户未登录，无法报名，请登录账号！');window.location='./login.php'</script>";
}

//获取签到活动的id
$act_id = isset($_GET['act_id']) ? intval($_GET['act_id']) : 0;
if ($act_id == 0) die('活动ID错误！');

$link = dbInit();
//更新sign_info表中的签到情况
if ($_GET['clock'] == '签到') {
    $sql = "update `act_sign` set `clock`='已签到' where `act_id`=$act_id and `u_id`=$u_id";
    query($sql);
    echo "<script language=javascript>alert('签到成功！');window.location='./p_act.php'</script>";
} else if ($_GET['clock'] == '已签到') {
    echo "<script language=javascript>alert('该活动已签到，请不要重复签到');window.location='./p_act.php'</script>";
} else {
    echo "<script language=javascript>alert('签到失败！');window.location='./p_act.php'</script>";
}
