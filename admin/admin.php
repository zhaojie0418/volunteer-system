<?php
require './public_function.php';
//读取session
session_start();
if (isset($_SESSION['admin_info'])) {
    $adminname = $_SESSION['admin_info']['adminname'];
} else {
    header('Location:../user/login.php');
}

require "./admin_html.php";
