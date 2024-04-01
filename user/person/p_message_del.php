<?php
require '../public_function.php';
$m_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($m_id == 0) die($m_id . '活动ID错误！');
//连接并选择数据库
$link = dbInit();
// 删除数据库的活动信息
$sql = "delete from `message_info` where `m_id`=$m_id";
mysqli_query($link, $sql);
header('Location:./p_message.php');
