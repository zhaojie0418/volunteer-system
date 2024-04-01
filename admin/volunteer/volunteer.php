<?php
require '../public_function.php';
//读取session
session_start();
if (isset($_SESSION['admin_info'])) {
    $adminname = $_SESSION['admin_info']['adminname'];
} else {
    header('Location:../../user/login.php');
}
//连接并选择数据库
$link = dbInit();
$where = '';

// 分页显示信息
$page_size = 6;
$res = mysqli_query($link, 'select count(*) from `user_info`');
$count = mysqli_fetch_row($res);
$count = $count[0];
$max_page = ceil($count / $page_size); //向上取整
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$page = $page > $max_page ? $max_page : $page;
$page = $page < 1 ? 1 : $page;
$page_html = makePageHtml($page, $max_page);
$offset = ($page - 1) * $page_size;
$limit = "limit $offset,$page_size";

//读取数据库，查询结果
$sql = "select * from (select * from `user_info` $limit) a $where";
$user_info = fetchAll($sql);

//根据活动名称进行模糊查询
if (isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];
    $keyword = mysqli_real_escape_string($link, $keyword);
    $where = "where username like '%$keyword%'";
    $page_size = 6;
    $res = mysqli_query($link, "select count(*) from `user_info` where username like '%$keyword%'");
    $count = mysqli_fetch_row($res);
    $count = $count[0];
    $max_page = ceil($count / $page_size); //向上取整
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $page = $page > $max_page ? $max_page : $page;
    $page = $page < 1 ? 1 : $page;
    $page_html = makePageHtml($page, $max_page);
    $offset = ($page - 1) * $page_size;
    $limit = "limit $offset,$page_size";
}

//读取数据库，查询结果
$sql = "select * from (select * from `user_info` $limit) a $where";
$user_info = fetchAll($sql);

// 组合分页链接
function makePageHtml($page, $max_page)
{
    $params = $_GET;
    unset($params['page']);
    $params = http_build_query($params);
    if ($params) $params .= '&';
    $next_page = $page + 1;
    if ($next_page > $max_page) $next_page = $max_page;
    $prev_page = $page - 1;
    if ($prev_page < 1) $prev_page = 1;
    $page_html = '<a style="color:#c0c4cb;font-size:16px;" href="?' . $params . 'page=' . $prev_page . '"><</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    $page_html .= $page;
    $page_html .= '&nbsp;&nbsp;&nbsp;&nbsp;<a style="color:#c0c4cb;font-size:16px;"href="?' . $params . 'page=' . $next_page . '"> ></a>&nbsp;&nbsp;&nbsp;&nbsp;';
    // $page_html .= '<a href="?' . $params . 'page=' . $max_page . '">尾页</a>';
    $page_html .= '共&nbsp;' . $max_page . '&nbsp;页' . '&nbsp;&nbsp';
    return $page_html;
}
require "./volunteer_html.php";
