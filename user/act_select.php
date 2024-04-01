<?php
require './public_function.php';
//连接并选择数据库
$link = dbInit();
// 获取所有活动类型，形成筛选列表
$select_sql = "select distinct `type` from `act_info`";
$res = fetchAll($select_sql);
foreach ($res as $v) {
    $types[] = $v['type'];
}
array_push($types, '其它');

//根据类型显示相应志愿活动
$type = $_GET['type'];
// $type = isset($_GET['type']) ? $_GET['type'] : 0;
// if ($type == 0) die('活动类型错误！');
if (isset($_GET['type'])) {
    $sql = "select * from `act_info` where `type`='$type'";
}
$act_info = fetchAll($sql);
require './act_html.php';
