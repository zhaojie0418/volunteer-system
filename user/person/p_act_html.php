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

        /* 搜索活动 */
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
            margin-right: 373px;
            line-height: 40px;
            text-align: center;
            border-radius: 5px;
            color: #fff;
            background-color: #f55044;
        }

        .content .top .search {
            float: left;
            margin-right: 0px;
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

        .content .top .search_name,
        .content .top .search_clock {
            float: left;
            margin-left: 13px;
            padding-left: 13px;
            width: 165px;
            height: 38px;
            border: 1px solid #b8b9bf;
            border-radius: 3px;
        }

        .content .top select {
            float: left;
            padding-right: 10px;
            /* color: #b8b9bf; */
        }

        .content .top .icon-search {
            position: absolute;
            top: 22px;
            right: 69px;
            color: #fff;
        }

        /*获取input焦点*/
        .content .top .search_name:focus,
        .content .top .search_clock:focus {
            border: 2px solid #fc9aa9;
        }

        /* 活动列表 */
        .content .act_item .item {
            height: 100px;
            padding: 15px;
            margin-bottom: 30px;
            background-color: #fff6f8;
            border-left: 4px solid #ffe7ec;
        }

        .content .act_item .date {
            float: left;
            margin-top: 10px;
            width: 100px;
            line-height: 25px;
        }

        .content .act_item .des {
            float: left;
            width: 725px;
            height: 72px;
            padding-left: 20px;
            border-left: 2px solid #ffe7ec;
        }

        .content .act_item a {
            float: right;
            width: 80px;
            height: 38px;
            margin-top: 15px;
            background-color: #f55044;
            color: #fff;
            text-align: center;
            line-height: 40px;
            border-radius: 5px;
        }

        .content .act_item .p1 {
            font-weight: 600;
        }

        .content .act_item .p2 {
            margin-top: 3px;
            font-size: 14px;
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
                    <li><a href="./p_act.php" class="seed"><i class="iconfont icon-minus"></i>我的活动</a></li>
                    <li><a href="./p_message.php"><i class="iconfont icon-minus"></i>我的留言</a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="top">
                <div class="tip">活动日程</div>
                <form action="./p_act.php" method="POST" onsubmit="return check(this)">
                    <input type=" text" class="search_name" name="keyword" placeholder="请输入活动名称">
                    <select id="color" class="search_clock" name="clock">
                        <option id="select_value" value="" selected disabled hidden>请选择活动状态</option>
                        <option value="check" <?php echo $clock == 'check' ? 'selected' : '' ?>>已报名</option>
                        <option value="pass" <?php echo $clock == 'pass' ? 'selected' : '' ?>>已签到</option>
                        <option value="all" <?php echo $clock == 'all' ? 'selected' : '' ?>>全部</option>
                    </select>
                    <i class="iconfont icon-search"></i>
                    <input type="submit" class="search" name="submit" value="搜索">
                </form>
            </div>
            <div class="title"></div>
            <div class="act_item">
                <?php if (!empty($sign_info)) : ?>
                    <?php foreach ($sign_info as $row) : ?>
                        <ul>
                            <li>
                                <div class="item">
                                    <div class="date"><?php echo $row['begin_time'] ?></div>
                                    <div class="des">
                                        <p class="p1"><?php echo $row['act_name'] ?></p>
                                        <p class="p2"><?php echo $row['description'] ?></p>
                                    </div>
                                    <a href="./p_act_clock.php?act_id=<?php echo $row['act_id'] ?>& clock=<?php echo $row['clock'] ?>"><?php echo $row['clock'] ?></a>
                                </div>
                            </li>
                        <?php endforeach ?>

                        </ul>
                    <?php else : ?>
                        <tr>
                            <td colspan="6">暂无活动日程</td>
                        </tr>
                    <?php endif ?>
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