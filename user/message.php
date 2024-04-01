<?php
require './public_function.php';

//读取session
session_start();
if (isset($_SESSION['user_info'])) {
    $u_id = $_SESSION['user_info']['id'];
} else {
    echo "<script language=javascript>alert('用户未登录，请登录账号！');window.location='./login.php'</script>";
}

$link = dbInit();
if (!empty($_POST)) {
    $fields = array('username', 'act_name', 'phone', 'content');
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
    $sql = "insert into `message_info`($fields,`u_id`)
     values($values,$u_id)";
    // die($sql);
    if (query($sql)) {
        echo "<script language=javascript>alert('留言提交成功！');window.location='./message.php'</script>";
    } else {
        echo "<script language=javascript>alert('留言提交失败！');window.location='./message.php'</script>";
    }
    die;
}
require './message_html.php';
