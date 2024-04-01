<?php
require '../public_function.php';
//读取session,获得管理员名字
session_start();
if (isset($_SESSION['admin_info'])) {
    $adminname = $_SESSION['admin_info']['adminname'];
} else {
    header('Location:../../user/login.php');
}
// $act_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
// if ($act_id == 0) die('活动ID错误！');
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
//添加活动，更新数据库
if (!empty($_POST)) {
    //处理表单提交的数据
    $fields = array('act_name', 'place', 'type', 'description', 'begin_time', 'end_time', 'count', 'reward');
    $values = array();
    foreach ($fields as $k => $v) {
        $data = isset($_POST[$v]) ? $_POST[$v] : '';
        $data = safeHandle($data);
        $fields[$k] = "`$v`";
        $values[] = "'$data'";
    }
    print_r($fields);
    print_r($values);
    $fields = implode(',', $fields);
    $values = implode(',', $values);
    // 生成sql语句
    $sql = "insert into `act_info`($fields)
     values($values)";
    // die($sql);
    query($sql);
    sleep(1);
    header("location:./act.php");
    die;
}
require './act_add_html.php';
