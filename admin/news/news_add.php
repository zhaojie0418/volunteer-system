<?php
require '../public_function.php';
//读取session,获得管理员名字
session_start();
if (isset($_SESSION['admin_info'])) {
    $adminname = $_SESSION['admin_info']['adminname'];
} else {
    header('Location:../../user/login.php');
}

//连接并选择数据库
$link = dbInit();
// 获取所有活动类型，形成下拉列表
$sql = "select distinct `type` from `news_info`";
$res = fetchAll($sql);
foreach ($res as $v) {
    $types[] = $v['type'];
}
// array_push($types, '其它');
// print_r($types);
//添加活动，更新数据库
if (!empty($_POST)) {
    //处理表单提交的数据
    $fields = array('title',  'type', 'content', 'time');
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
    $sql = "insert into `news_info`($fields)
     values($values)";
    // die($sql);
    query($sql);
    sleep(1);
    header("location:./news.php");
    die;
}
require './news_add_html.php';
