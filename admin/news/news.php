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
//下拉框保留查询后状态
$state = isset($_POST['state']) ? $_POST['state'] : '';
$where = '';

// 分页显示信息
$page_size = 6;
$res = mysqli_query($link, 'select count(*) from `news_info`');
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
$sql = "select * from (select * from `news_info` $limit) a $where";
$news_info = fetchAll($sql);

//根据活动名称进行模糊查询
if (isset($_POST['keyword']) && empty($_POST['state'])) {
    $keyword = $_POST['keyword'];
    $keyword = mysqli_real_escape_string($link, $keyword);
    $where = "where title like '%$keyword%'";
    $page_size = 6;
    $res = mysqli_query($link, "select count(*) from `news_info` where title like '%$keyword%'");
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
//根据活动状态进行查询
if (empty($_POST['keyword']) && isset($_POST['state'])) {
    if ($_POST['state'] == 'check') {
        $where = "where `state`='待审核'";
        $page_size = 6;
        $res = mysqli_query($link, "select count(*) from `news_info` where `state`='待审核'");
        $count = mysqli_fetch_row($res);
        $count = $count[0];
        $max_page = ceil($count / $page_size); //向上取整
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $page = $page > $max_page ? $max_page : $page;
        $page = $page < 1 ? 1 : $page;
        $page_html = makePageHtml($page, $max_page);
        $offset = ($page - 1) * $page_size;
        $limit = "limit $offset,$page_size";
    } else if ($_POST['state'] == 'pass') {
        $where = "where `state`='已通过'";
        $page_size = 6;
        $res = mysqli_query($link, "select count(*) from `news_info` where `state`='已通过'");
        $count = mysqli_fetch_row($res);
        $count = $count[0];
        $max_page = ceil($count / $page_size); //向上取整
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $page = $page > $max_page ? $max_page : $page;
        $page = $page < 1 ? 1 : $page;
        $page_html = makePageHtml($page, $max_page);
        $offset = ($page - 1) * $page_size;
        $limit = "limit $offset,$page_size";
    } else {
        $where = '';
        $page_size = 6;
        $res = mysqli_query($link, 'select count(*) from `news_info`');
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
}
//根据活动名称和活动状态同时进行查询
if (isset($_POST['keyword']) && isset($_POST['state'])) {
    $keyword = $_POST['keyword'];
    $keyword = mysqli_real_escape_string($link, $keyword);
    if ($_POST['state'] == 'check') {
        $where = "where `state`='待审核' and title like '%$keyword%'";
        $page_size = 6;
        $res = mysqli_query($link, "select count(*) from `news_info` where `state`='待审核' and title like '%$keyword%'");
        $count = mysqli_fetch_row($res);
        $count = $count[0];
        $max_page = ceil($count / $page_size); //向上取整
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $page = $page > $max_page ? $max_page : $page;
        $page = $page < 1 ? 1 : $page;
        $page_html = makePageHtml($page, $max_page);
        $offset = ($page - 1) * $page_size;
        $limit = "limit $offset,$page_size";
    } else if ($_POST['state'] == 'pass') {
        $where = "where `state`='已通过' and title like '%$keyword%'";
        $page_size = 6;
        $res = mysqli_query($link, "select count(*) from `news_info` where `state`='已通过' and title like '%$keyword%'");
        $count = mysqli_fetch_row($res);
        $count = $count[0];
        $max_page = ceil($count / $page_size); //向上取整
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $page = $page > $max_page ? $max_page : $page;
        $page = $page < 1 ? 1 : $page;
        $page_html = makePageHtml($page, $max_page);
        $offset = ($page - 1) * $page_size;
        $limit = "limit $offset,$page_size";
    } else {
        $where = "where title like '%$keyword%'";
        $page_size = 6;
        $res = mysqli_query($link, "select count(*) from `news_info` where title like '%$keyword%'");
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
}

//读取数据库，查询结果
$sql = "select * from (select * from `news_info` $limit) a $where";
$news_info = fetchAll($sql);

//审核
if (isset($_GET['state']) && isset($_GET['id'])) {
    $update = $_GET['state'];
    $id = $_GET['id'];
    $sql = "update `news_info` set `state`=$update where `id`=$id";
    if (query($sql)) {
        header('Location:./news.php');
    } else {
        die('审核失败！');
    }
}

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
require "./news_html.php";
