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
//下拉框保留查询后状态
$clock = isset($_POST['clock']) ? $_POST['clock'] : '';
$where = '';

//查询该用户报名的全部活动
// $sql = "select * from `act_info` where `act_id` in 
//         (select `act_id` from `act_sign` where `u_id`=$u_id)";
// $sql = "select * from `act_info`,`act_sign` 
//         where act_info.act_id=act_sign.act_id and `u_id`=$u_id";
// $sign_info = fetchAll($sql);

//根据活动名称进行模糊查询
if (isset($_POST['keyword']) && empty($_POST['clock'])) {
    $keyword = $_POST['keyword'];
    $keyword = mysqli_real_escape_string($link, $keyword);
    $where = "and `act_name` like '%$keyword%'";
}
//根据活动状态进行查询
if (empty($_POST['keyword']) && isset($_POST['clock'])) {
    if ($_POST['clock'] == 'check') {
        $where = " and `clock`='签到'";
    } else if ($_POST['clock'] == 'pass') {
        $where = " and`clock`='已签到'";
    } else {
        $where = '';
    }
}
//根据活动名称和活动状态同时进行查询
if (isset($_POST['keyword']) && isset($_POST['clock'])) {
    $keyword = $_POST['keyword'];
    $keyword = mysqli_real_escape_string($link, $keyword);
    if ($_POST['clock'] == 'check') {
        $where = "and `clock`='签到' and act_name like '%$keyword%'";
    } else if ($_POST['clock'] == 'pass') {
        $where = "and `clock`='已签到' and act_name like '%$keyword%'";
    } else {
        $where = "and act_name like '%$keyword%'";
    }
}

//读取数据库，查询结果
$sql = "select * from `act_info`,`act_sign` 
where act_info.act_id=act_sign.act_id and `u_id`=$u_id $where";
$sign_info = fetchAll($sql);

require './p_act_html.php';
