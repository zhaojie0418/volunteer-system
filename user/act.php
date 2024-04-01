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

//显示全部活动
// $sql = "select * from `act_info`  where `state`='已通过'";
// $act_info = fetchAll($sql);

if (isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
    $keyword = mysqli_real_escape_string($link, $keyword);
    $where = "and `act_name` like '%$keyword%'";
} else {
    $where = '';
}
$sql = "select * from `act_info` where `state`='已通过' $where";
$act_info = fetchAll($sql);
require './act_html.php';
