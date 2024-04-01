<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/base.css">
    <link rel="stylesheet" href="../../css/common.css">
    <link rel="stylesheet" href="../../css/person_common.css">
    <link rel="stylesheet" href="../../iconfont/iconfont.css">
    <title>个人中心</title>
    <style>
        .content {
            margin-left: 300px;
            height: auto;
        }

        .content .top {
            position: relative;
            height: 100px;
            padding-top: 15px;
            /* background-color: skyblue; */
        }

        .content .top .tip {
            float: left;
            width: 100px;
            height: 40px;
            margin-right: 565px;
            margin-bottom: 40px;
            line-height: 40px;
            text-align: center;
            border-radius: 5px;
            color: #fff;
            background-color: #f55044;
        }

        /* 搜索留言 */
        .content .top .search {
            float: left;
            margin-right: 15px;
            margin-left: 13px;
            padding-left: 21px;
            width: 80px;
            height: 38px;
            line-height: 38px;
            text-align: center;
            font-size: 15px;
            background-color: #fc9aa9;
            color: #fff;
            border-radius: 4px;
            transition: .6s;
            cursor: pointer;
        }

        .content .top .search:hover {
            background-color: #f8697b;
        }

        .content .top .iconfont {
            font-size: 16px;
        }

        .content .top .search_name {
            float: left;
            padding-left: 13px;
            width: 165px;
            height: 38px;
            border: 1px solid #b8b9bf;
            border-radius: 3px;
        }

        .content .top .icon-search {
            position: absolute;
            top: 22px;
            right: 69px;
            color: #fff;
        }

        /*获取input焦点*/
        .content .top .search_name:focus {
            border: 2px solid #fc9aa9;
        }

        /* 留言记录 */
        .mess table {
            width: 945px;
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
            background-color: #fef1f4;
            font-weight: 400;
            border-bottom: 1px solid #fee1e7;
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
            border-bottom: 1px solid #fee1e7;
        }

        .mess tbody td:nth-child(1) {
            padding-left: 10px;
            text-align: left;
        }

        .mess tbody td:nth-child(2) {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .mess tbody tr:nth-child(2n) {
            background-color: #fffcfd;
        }

        .mess tbody td a {
            color: #fc9aa9;
        }
    </style>
</head>

<body>

    <!-- 头部 -->
    <div class="header">
        <div class="wrapper">
            <div class="logo">
                <img src="../../images/logo2.png" alt="">
                <h1>志愿服务系统</h1>
            </div>
            <div class="nav">
                <ul>
                    <li><a href="../index.php">首页</a></li>
                    <li><a href="../act.php">志愿项目</a></li>
                    <li><a href="../news.php">志愿风采</a></li>
                    <li><a href="../message.php">留言板</a></li>
                    <li class="indi">
                        <a href="./person.php" class="seed">个人中心</a>
                        <div class="column">
                            <dl>
                                <dd><a href="./person_edit.php" target="_blank">账号设置</a></dd>
                                <dd><a href="./quitLogin.php" target="_blank">安全退出</a></dd>
                            </dl>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="pic">
        <div class="wrapper">
            <img src="../../images/p.png" alt="">
        </div>
    </div>
    <div class="box wrapper">
        <div class="aside">
            <div class="title">
                <i class="iconfont icon-dicengjiagou"></i>
                <span>个人中心</span>
            </div>
            <div class="minu">
                <ul>
                    <li><a href="./person.php"><i class="iconfont icon-minus"></i>我的信息</a></li>
                    <li><a href="./p_act.php"><i class="iconfont icon-minus"></i>我的活动</a></li>
                    <li><a href="./p_message.php" class="seed"><i class="iconfont icon-minus"></i>我的留言</a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="top">
                <div class="tip">留言墙</div>
                <form action="./p_message.php" method="POST" onsubmit="return check(this)">
                    <input type=" text" class="search_name" name="keyword" placeholder="请输入活动名称">
                    <i class="iconfont icon-search"></i>
                    <input type="submit" class="search" name="submit" value="搜索">
                </form>
            </div>
            <div class="mess">
                <table>
                    <thead>
                        <tr>
                            <th>活动名称</th>
                            <th>留言内容</th>
                            <th>留言时间</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <!-- table标签下添加<colgroup>标签配合<col>去分配每列的宽度 -->
                    <colgroup>
                        <col width="20%">
                        <col width="40%">
                        <col width="20%">
                        <col width="20%">
                    </colgroup>
                    <tbody>
                        <?php if (!empty($mess_info)) : ?>
                            <?php foreach ($mess_info as $row) : ?>
                                <tr>
                                    <td><?php echo $row['act_name'] ?></td>
                                    <td title="<?php echo $row['content'] ?>"><?php echo $row['content'] ?></td>
                                    <td><?php echo $row['time'] ?></td>
                                    <td>
                                        <a href="./p_message_del.php?id=<?php echo $row['m_id'] ?>" class="del" onclick="return confirm('是否删除选定留言？')">删除</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6">暂无留言</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- 尾部 -->
    <div class="footer">
        <div class="wrapper">
            <div class="middle">
                <p>中国社会组织政务服务平台 中国社会工作网 中华志愿者协会 中国文明网</p>
                <p>德恒千秋尺，爱博寸心高。</p>
                <p>地址：  计算机学院</p>
            </div>
            <div class="right">
                <ul>
                    <li class="app"></li>
                    <li class="wechat"></li>
                    <li class="sina"></li>
                    <li class="pay"></li>
                </ul>
            </div>
        </div>
    </div>
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
</body>

</html>