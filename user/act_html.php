<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 引入字体图标 -->
    <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/act.css">
    <title>志愿项目</title>
    <style>
        .footer {
            margin-top: 20px;
        }

        .main .banner {
            width: 100%;
            height: 200px;
        }

        .banner .slide {
            float: left;
            margin: 36px 40px 20px 0;
        }

        .banner .slide img {
            width: 370px;
        }

        .type {
            padding-top: 50px;
            width: 100%;
            height: 130px;
        }

        .type span,
        .find span {
            float: left;
            font-size: 20px;
        }

        .type .all {
            float: left;
            width: 90px;
            height: 30px;
            margin-left: 20px;
            margin-right: 10px;
            padding: 0 20px;
            line-height: 30px;
            text-align: center;
            font-weight: 500;
            background-color: rgba(255, 163, 62, .18);
            border-radius: 16px;
            color: #FF8713;
        }

        .type ul li {
            float: left;
        }

        .type ul li a {
            float: left;
            padding: 0 20px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            font-size: 16px;
        }

        .type ul li a:hover {
            height: 30px;
            font-weight: 500;
            border-radius: 16px;
            color: #FF8713;
            background-color: rgba(255, 163, 62, .18);
        }

        .find {
            position: relative;
            width: 100%;
            height: 70px;
        }

        .find .search_name {
            float: left;
            width: 275px;
            height: 28px;
            margin-left: 20px;
            padding-left: 14px;
            border: 1px solid rgba(255, 163, 62, .18);
            background-color: #FFF;
            line-height: 28px;
            border-radius: 14px;
        }

        /*获取input焦点*/
        .find .search_name:focus {
            border: 1.5px solid #FF8713;
        }

        /* 搜索 */
        .find .search {
            position: absolute;
            top: 1px;
            left: 347px;
            width: 30px;
            height: 25px;
            background-image: url(../images/search.png);
            background-repeat: no-repeat;
            background-position: center center;
            background-color: #fff;
            border: none;
            border-radius: 14px;
        }
    </style>
</head>

<body>
    <!-- 头部 -->
    <div class="header">
        <div class="wrapper">
            <div class="logo">
                <img src="../images/logo2.png" alt="">
                <h1>志愿服务系统</h1>
            </div>
            <div class="nav">
                <ul>
                    <li><a href="index.php">首页</a></li>
                    <li><a href="act.php" class="seed">志愿项目</a></li>
                    <li><a href="news.php">志愿风采</a></li>
                    <li><a href="message.php">留言板</a></li>
                    <!-- 添加ai对话功能 -->
                    <li><a href="ai_html_test.php">智能服务</a></li>
                    <li class="indi">
                        <a href="./person/person.php">个人中心</a>
                        <div class="column">
                            <dl>
                                <dd><a href="./person/person_edit.php" target="_blank">账号设置</a></dd>
                                <dd><a href="./person/quitLogin.php" target="_blank">安全退出</a></dd>
                            </dl>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main clearfix">
        <div class="wrapper">
            <div class="select">
                <div class="banner">
                    <div class="slide"><a href="https://mp.weixin.qq.com/s/oQtyMffOLBFQ9PBlOzOTWg"><img src="../images/1.jpg" alt=""></a></div>
                    <div class="slide"><a href="https://mp.weixin.qq.com/s/Q51B26vNv3XLueljTXiV_A"><img src="../images/2.jpg" alt=""></a></div>
                    <div class="slide"><a href="https://mp.weixin.qq.com/s/s4D1d7COeB7veV0sqERnBQ"><img src="../images/3.jpg" alt=""></a></div>
                </div>
                <div class="type">
                    <span class="s1">活动类型:</span>
                    <a href="./act.php" class="all">全部</a>
                    <ul>
                        <?php foreach ($types as $v) : ?>
                            <li class="item"><a href="./act_select.php?type=<?php echo $v ?>"><?php echo $v ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </div>
                </script>
                <div class="find">
                    <span>活动查找:</span>
                    <form action="./act.php" method="POST" onsubmit="return check(this)">
                        <input type=" text" class="search_name" name="keyword" placeholder="请输入活动名称" value="<?php if (isset($_POST['keyword'])) {
                                                                                                                print $_POST['keyword'];
                                                                                                            } ?>">
                        <i class="iconfont icon-search"></i>
                        <button type="submit" class="search" name="submit"></button>
                        <!-- <input type="submit" class="search" name="submit"></input> -->
                    </form>
                </div>
            </div>
        </div>
        <!--中间内容-->
        <div class="xiangmu wrapper">
            <!--公益项目-->
            <div class="title"><span>公益项目</span></div>
            <ul>
                <?php foreach ($act_info as $row) : ?>
                    <li>
                        <img src="../images/xt2.png">
                        <p class="p1"><?php echo $row['act_name'] ?></p>
                        <p class="p2"><?php echo $row['description'] ?></p>
                        <a href="./act_sign.php?id=<?php echo $row['act_id'] ?>">点击报名</a>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
    <!-- 尾部 -->
    <div class="footer">
        <div class="wrapper">
            <div class="middle">
                <p>中国社会组织政务服务平台 中国社会工作网 中华志愿者协会 中国文明网</p>
                <p>德恒千秋尺，爱博寸心高。</p>
                
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