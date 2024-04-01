<?php
require '../public_function.php';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id == 0) die($act_id . '活动ID错误！');
//连接并选择数据库
$link = dbInit();
// 删除数据库的活动信息
$sql = "delete from `news_info` where `id`=$id";
mysqli_query($link, $sql);
header('Location:./news.php');
