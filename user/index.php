<?php
require './public_function.php';
//连接并选择数据库
$link = dbInit();

$sql = "select * from  (select * from `act_info` limit 0,4 ) a where `state`='已通过'";
// $sql = "select * from `act_info`  where `state`='已通过'";
//执行sql语句并读取结果集
$act = fetchAll($sql);
require './index_html.php';
