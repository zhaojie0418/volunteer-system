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

//修改用户信息
if (!empty($_POST)) {
    $fields = array('username', 'password', 'phone',  'email', 'realname', 'idnum',  'speciality');
    $update = array();
    foreach ($fields as $v) {
        $data = isset($_POST[$v]) ? $_POST[$v] : '';
        $data = safeHandle($data);
        $update[] = "`$v`='$data'";
    }
    $update = implode(',', $update);
    // 生成sql语句
    $sql = "update `user_info` set $update where `u_id`=$u_id";
    // die($sql);
    query($sql);
    header("location:./person.php");
    die;
}
require './person_edit_html.php';
