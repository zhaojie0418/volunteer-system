<?php
require '../public_function.php';
//读取session
session_start();
if (isset($_SESSION['admin_info'])) {
    $adminname = $_SESSION['admin_info']['adminname'];
} else {
    header('Location:../../user/login.php');
}
//在活动管理页面点击活动编辑时提交该活动的id
$act_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($act_id == 0) die('活动ID错误！');
//连接并选择数据库
$link = dbInit();
// 获取所有活动类型，形成下拉列表
$sql = "select distinct `type` from `act_info`";
$res = fetchAll($sql);
foreach ($res as $v) {
    $types[] = $v['type'];
}
array_push($types, '其它');
// print_r($types);

//提交编辑后数据，更新数据库
if (!empty($_POST)) {
    $fields = array('act_name', 'place', 'type', 'description',  'begin_time', 'end_time', 'count',  'reward');
    $update = array();
    foreach ($fields as $v) {
        $data = isset($_POST[$v]) ? $_POST[$v] : '';
        $data = safeHandle($data);
        $update[] = "`$v`='$data'";
    }
    $update = implode(',', $update);
    // 生成sql语句
    $sql = "update `act_info` set $update where `act_id`=$act_id";
    // die($sql);
    query($sql);
    sleep(1);
    header("location:./act.php");
    die;
}
//读取原数据库的内容
$sql = "select * from `act_info` where `act_id`=$act_id";
$act_info = fetchRow($sql);
require "./act_edit_html.php";
