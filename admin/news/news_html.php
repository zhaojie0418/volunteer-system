<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新闻管理</title>
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

        .top a,
        .top .search {
            float: left;
            margin: 30px 668px 0px 30px;
            width: 80px;
            height: 38px;
            line-height: 38px;
            text-align: center;
            font-size: 15px;
            background-color: #3f93f6;
            color: #fff;
            border-radius: 4px;
            transition: .6s;
        }

        .top a:hover,
        .top .search:hover {
            background-color: rgba(59, 158, 252, .8);
        }

        .top .iconfont {
            font-size: 16px;
        }

        .top .search_title,
        .top .search_state {
            float: left;
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

        .top .search {
            margin-right: 0px;
            margin-left: 13px;
            padding-left: 21px;
            cursor: pointer;
        }

        .top .icon-search {
            position: absolute;
            top: 37px;
            right: 81px;
            color: #fff;
        }

        /*获取input焦点*/
        .main_bag input:focus {
            border: 2px solid #333;
        }

        .main_bag .news {
            margin-left: 30px;
        }

        .news table {
            width: 1195px;
        }

        .news table {
            /* 表格宽度不随文字增多而变长 */
            table-layout: fixed;
            border-collapse: collapse;
            text-align: center;
        }

        /* 设置table的每一行的背景色 */
        .news thead th {
            height: 50px;
            background-color: #eff3f6;
            font-weight: 400;
            border-bottom: 1px solid #eceff5;
        }

        .news thead th:first-child {
            padding-left: 10px;
            text-align: left;
        }

        .news tbody tr {
            height: 60px;
            /* cursor: pointer; */
        }

        .news tbody tr {
            border-bottom: 1px solid #ebeef4;
        }

        .news tbody tr:nth-child(2n) {
            background-color: #fafafa;
        }

        .news tbody tr:hover {
            background-color: #e4e8ee;
            cursor: pointer;
        }

        /* 设置table每一列的样式 */
        .news tbody td:nth-child(1) {
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

        /* 审核、编辑、删除字体颜色 */
        .news .check,
        .edit,
        .del {
            color: #3e9ffc;
            font-size: 15px;
        }

        /* 审核状态颜色 */
        .news .state_check {
            margin: 0 auto;
            width: 58px;
            height: 30px;
            line-height: 30px;
            font-size: 12px;
            color: #4890ea;
            background-color: #e7f0fb;
            border: 1px solid #d3e6fb;
            border-radius: 5px;
        }

        .news .state_pass {
            margin: 0 auto;
            width: 58px;
            height: 30px;
            line-height: 30px;
            font-size: 12px;
            color: #63ca38;
            background-color: #ebf7e5;
            border: 1px solid #daf2ce;
            border-radius: 5px;
        }

        /* 页码颜色 */
        .main_bag .page {
            position: absolute;
            bottom: 115px;
            right: 17px;
            color: #676a6e;
            font-size: 14px;
        }
    </style>
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
                    <a href="./news.php">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        <span>新闻管理</span>
                    </a>
                </li>
                <li>
                    <a href="../message/message.php">
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
            <i class=" fa fa-bars" aria-hidden="true"></i>
            <a href="">志愿服务系统</a>
            <a href="../quitLogin.php" class="quit">退出登录</a>
            <span class="admin">当前用户：<em><?php echo $adminname ?></em> </span>
        </div>
        <div class="bag clearfix">
            <div class="main_bag scroll">
                <div class="top">
                    <form action="./news.php" method="POST" onsubmit="return check(this)">
                        <a href="./news_add.php"><i class="iconfont icon-add"></i> 添加</a>
                        <input type="text" class="search_title" name="keyword" placeholder="请输入新闻名称">
                        <select id="color" class="search_state" name="state">
                            <option id="select_value" value="" selected disabled hidden>请选择审核状态</option>
                            <option value="check" <?php echo $state == 'check' ? 'selected' : '' ?>>待审核</option>
                            <option value="pass" <?php echo $state == 'pass' ? 'selected' : '' ?>>已通过</option>
                            <option value="all" <?php echo $state == 'all' ? 'selected' : '' ?>>全部</option>
                        </select>
                        <i class="iconfont icon-search"></i>
                        <input type="submit" class="search" name="submit" value="搜索">
                    </form>
                </div>
                <div class="news">
                    <table>
                        <thead>
                            <tr>
                                <th>新闻标题</th>
                                <th>新闻类别</th>
                                <th>发布日期</th>
                                <th>审核状态</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <!-- table标签下添加<colgroup>标签配合<col>去分配每列的宽度 -->
                        <colgroup>
                            <col width="20%">
                            <col width="20%">
                            <col width="20%">
                            <col width="20%">
                            <col width="20%">
                        </colgroup>
                        <tbody>
                            <?php if (!empty($news_info)) : ?>
                                <?php foreach ($news_info as $row) : ?>
                                    <tr>
                                        <td title="<?php echo $row['title'] ?>">
                                            <?php echo $row['title'] ?>
                                        </td>
                                        <td><?php echo $row['type'] ?></td>
                                        <td><?php echo $row['time'] ?></td>
                                        <td>
                                            <div id="<?php echo $row['id'] ?>"><?php echo $row['state'] ?>
                                        </td>
                                        <?php if ($row['state'] == '待审核') : ?>
                                            <td>
                                                <a href="?state='已通过'&id=<?php echo $row['id'] ?>" class="check" onclick="return confirm('是否审核通过？')">审核 </a>&nbsp;
                                                <a href="./news_edit.php?id=<?php echo $row['id'] ?>" class="edit">编辑</a>&nbsp;&nbsp;
                                                <a href="./news_del.php?id=<?php echo $row['id'] ?>" class="del" onclick="return confirm('是否删除选定记录？')">删除</a>
                                            </td>
                                        <?php else : ?>
                                            <td>
                                                <a href="./news_edit.php?id=<?php echo $row['id'] ?>" class="edit">编辑</a>&nbsp;&nbsp;
                                                <a href="./news_del.php?id=<?php echo $row['id'] ?>" class="del" onclick="return confirm('是否删除选定记录？')">删除</a>
                                            </td>
                                        <?php endif ?>
                                    </tr>
                                <?php endforeach ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="6">暂无新闻</td>
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
<!-- 根据不同审核状态显示不同样式 -->
<script>
    <?php foreach ($news_info as $row) : ?>
        var text = document.getElementById("<?php echo $row['id'] ?>").innerText; //提取DIV中的内容
        if (text == "待审核") {
            document.getElementById("<?php echo $row['id'] ?>").className = "state_check"; //更换新样式名
        } else {
            document.getElementById("<?php echo $row['id'] ?>").className = "state_pass";
        }
    <?php endforeach ?>
</script>