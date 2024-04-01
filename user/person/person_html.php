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
        /* 编辑 */
        .box .content .top {
            position: relative;
            margin-left: 300px;
            height: 150px;
            text-align: center;
            line-height: 150px;
        }

        .box .content .top img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            vertical-align: middle;
        }

        .box .content .top .edit {
            position: absolute;
            top: 0;
            right: 50px;
            width: 65px;
            height: 34px;
            line-height: 34px;
            font-size: 14px;
            border-radius: 5px;
            background-color: #f55044;
            color: #fff;
        }

        /* 个人信息 */
        .box .content .item {
            margin-left: 300px;
        }

        .box .content .item_item {
            height: 45px;
            line-height: 45px;
            font-size: 14px;
            border-bottom: 1px dashed #b0b0b0;
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
                    <!-- 添加ai对话功能 -->
                    <li><a href="ai_html_test.php">智能服务</a></li>
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
                    <li><a href="./person.php" class="seed"><i class="iconfont icon-minus"></i>我的信息</a></li>
                    <li><a href="./p_act.php"><i class="iconfont icon-minus"></i>我的活动</a></li>
                    <li><a href="./p_message.php"><i class="iconfont icon-minus"></i>我的留言</a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="top">
                <a href="./person_edit.php" class="edit">编辑</a>
                <img src="../../images/child.jpg" alt="">
            </div>
            <div class="item">
                <div class="item_item">
                    <span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp昵称：</span>
                    <em><?php echo $user_info['username'] ?></em>
                </div>
                <div class="item_item">
                    <span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp姓名：</span>
                    <em><?php echo $user_info['realname'] ?></em>
                </div>
                <div class="item_item">
                    <span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp邮箱：</span>
                    <em><?php echo $user_info['email'] ?></em>
                </div>
                <div class="item_item">
                    <span>手机号码：</span>
                    <em><?php echo $user_info['phone'] ?></em>
                </div>
                <div class="item_item">
                    <span>个人特长：</span>
                    <em><?php echo $user_info['speciality'] ?></em>
                </div>
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
</body>

</html>