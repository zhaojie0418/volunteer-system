<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>留言管理</title>
    <link rel="stylesheet" type="text/css" href="../../css/base.css">
    <link rel="stylesheet" type="text/css" href="../../css/admin_common.css">
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../../iconfont/iconfont.css">
    <style>
        .main_bag .top {
            position: relative;
            width: 1255px;
            height: 100px;
        }

        /*获取input焦点*/
        .main_bag input:focus {
            border: 1.5px solid #3b9efc;
        }

        .top .search {
            float: right;
            margin: 30px 30px 0px 13px;
            padding-left: 21px;
            width: 80px;
            height: 38px;
            line-height: 38px;
            font-size: 15px;
            background-color: #3f93f6;
            color: #fff;
            border-radius: 4px;
            transition: .6s;
            cursor: pointer;
        }

        .top .search:hover {
            background-color: rgba(59, 158, 252, .8);
        }

        .top .search_title {
            float: right;
            margin-left: 13px;
            margin-top: 30px;
            padding-left: 13px;
            width: 165px;
            height: 38px;
            border: 1px solid #b8b9bf;
            border-radius: 3px;
        }

        .top .search_title::placeholder {
            color: #b8b9bf;
        }

        .main_bag .mess {
            margin-left: 30px;
        }

        .mess table {
            width: 1195px;
        }

        .mess table {
            /* 表格宽度不随文字增多而变长 */
            table-layout: fixed;
            border-collapse: collapse;
            text-align: center;
        }

        /* 设置table的每一行的背景色 */
        .mess thead th {
            height: 50px;
            background-color: #eff3f6;
            font-weight: 400;
            border-bottom: 1px solid #eceff5;
        }

        .mess thead th:first-child {
            padding-left: 10px;
            text-align: left;
        }

        .mess tbody tr {
            height: 60px;
            /* cursor: pointer; */
        }

        .mess tbody tr {
            border-bottom: 1px solid #ebeef4;
        }

        .mess tbody tr:nth-child(2n) {
            background-color: #fafafa;
        }

        .mess tbody tr:hover {
            background-color: #e4e8ee;
            cursor: pointer;
        }

        /* 设置table每一列的样式 */
        .mess tbody td:nth-child(1),
        .mess tbody td:nth-child(4) {
            padding-left: 10px;
            text-align: left;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .main_bag .page {
            float: right;
            margin-top: 30px;
            margin-right: 30px;
        }

        /* 页码颜色 */
        .main_bag .page {
            position: absolute;
            bottom: 115px;
            right: 17px;
            color: #676a6e;
            font-size: 14px;
        }

        .top .icon-search {
            position: absolute;
            top: 37px;
            right: 81px;
            color: #fff;
        }
    </style>
    <!-- form表单提交后保持输入的值 -->
    <!-- 搜索活动名称后保留搜索值 -->
    <script language="JavaScript">
        //声明全局数组，用于存放取值
        var inputArr = document.getElementsByTagName("input");

        function check(o) {
            var nameStr = "";
            for (var i = 0; i < inputArr.length - 1; i++) {
                nameStr += inputArr[i].value + ";";
            }
            nameStr += inputArr[inputArr.length - 1];
            window.name = nameStr;
        }

        if (window.name) {
            //声明数组，用于存放从window.name中分离出的值
            var nameArr = new Array();
            nameArr = window.name.split(";");

            for (var i = 0; i < nameArr.length; i++) {
                if (inputArr[i].type == "text") {
                    inputArr[i].value = nameArr[i];
                }
            }
        }
    </script>
</head>

<body>
    <!-- 侧边栏 -->
    <div class="aside clearfix">
        <div class="welcom">
            <img src="../../images/yiyi.jpg" alt="">
            <span>欢迎您！管理员</span>
        </div>
        <div class="nav">
            <ul>
                <li>
                    <a href="../act/act.php">
                        <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                        <span>活动管理</span>
                    </a>
                </li>
                <li>
                    <a href="../news/news.php">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        <span>新闻管理</span>
                    </a>
                </li>
                <li>
                    <a href="./message.php">
                        <i class="fa fa-comments" aria-hidden="true"></i>
                        <span>留言管理</span>
                    </a>
                </li>
                <li>
                    <a href="../volunteer/volunteer.php">
                        <i class="fa fa-user-o" aria-hidden="true"></i>
                        <span>志愿者管理</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="header clearfix">
            <i class="fa fa-bars" aria-hidden="true"></i>
            <a href="">志愿服务系统</a>
            <a href="../quitLogin.php" class="quit">退出登录</a>
            <span class="admin">当前用户：<em><?php echo $adminname ?></em> </span>
        </div>
        <div class="bag clearfix">
            <div class="main_bag">
                <div class="top">
                    <form action="./message.php" method="POST" onsubmit="return check(this)">
                        <i class="iconfont icon-search"></i>
                        <input type="submit" class="search" name="submit" value="搜索">
                        <input type="text" class="search_title" name="keyword" placeholder="请输入活动名称">
                    </form>
                </div>
                <div class="mess">
                    <table>
                        <thead>
                            <tr>
                                <th>姓名</th>
                                <th>联系方式</th>
                                <th>活动名称</th>
                                <th>留言内容</th>
                                <th>留言时间</th>
                            </tr>
                        </thead>
                        <!-- table标签下添加<colgroup>标签配合<col>去分配每列的宽度 -->
                        <colgroup>
                            <col width="10%">
                            <col width="15%">
                            <col width="20%">
                            <col width="40%">
                            <col width="15%">
                        </colgroup>
                        <tbody>
                            <?php if (!empty($mess_info)) : ?>
                                <?php foreach ($mess_info as $row) : ?>
                                    <tr>
                                        <td><?php echo $row['username'] ?></td>
                                        <td><?php echo $row['phone'] ?></td>
                                        <td><?php echo $row['act_name'] ?></td>
                                        <td title="<?php echo $row['content'] ?>"><?php echo $row['content'] ?></td>
                                        <td><?php echo $row['time'] ?></td>
                                    </tr>
                                <?php endforeach ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="6">暂无留言</td>
                                </tr>
                            <?php endif ?>
                            <div class="page">
                                <?php echo $page_html ?>
                            </div>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>