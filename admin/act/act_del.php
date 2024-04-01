<?php
require '../public_function.php';
$act_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($act_id == 0) die($act_id . '活动ID错误！');
//连接并选择数据库
$link = dbInit();
// 删除数据库的活动信息
$sql = "delete from `act_info` where `act_id`=$act_id";
mysqli_query($link, $sql);
header('Location:./act.php');
