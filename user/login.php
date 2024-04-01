<?php
require "./public_function.php";
dbInit();
$error = '';
//取出用户名密码去搜索数据库
if (isset($_POST['ident'])) {
    $username = $_POST['username'];
    $username = safeHandle($username);
    $pwd = $_POST['password'];
    // session_start();
    if ($_POST['ident'] == 'user') {
        $sql = "select * from `user_info` where `username`='$username'";
        $user = fetchRow($sql); //数据库数据
        if (!empty($user)) {
            if ($pwd === $user['password']) {
                // die('登陆成功');
                session_start();
                $_SESSION['user_info'] = array(
                    'id' => $user['u_id'],
                    'username' => $username
                );
                header('Location:./index.php');
                die;
            } else {
                $error = '密码错误!';
            }
        } else {
            $error = '用户不存在!';
        }
    }
    if ($_POST['ident'] == 'admin') {
        $sql = "select * from `admin_info` where `adminname`='$username'";
        $admin = fetchRow($sql); //数据库数据
        if (!empty($admin)) {
            if ($pwd === $admin['password']) {
                // die('登陆成功');
                session_start();
                $_SESSION['admin_info'] = array(
                    'id' => $admin['a_id'],
                    'adminname' => $username
                );
                header('Location:../admin/admin.php');
                die;
            } else {
                $error = '密码错误!';
            }
        } else {
            $error = '用户不存在!';
        }
    }
}
require "./login_html.php";
