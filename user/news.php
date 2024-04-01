<?php
require './public_function.php';
//连接并选择数据库
$link = dbInit();

$sql_vol = "select * from `news_info` where `type`='志愿风采'and `state`='已通过'";
// $sql_act = "select * from `news_info` where `type`='志愿活动'";
$sql_new = "select * from `news_info` where `type`='新闻资讯' and `state`='已通过'";
//执行sql语句并读取结果集
$vol = fetchAll($sql_vol);
// $act = fetchAll($sql_act);
$new = fetchAll($sql_new);
//调用输出模板文件
// define('APP', 'volunteer_system');
require './news_html.php';
