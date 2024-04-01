<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/base.css">
    <link rel="stylesheet" type="text/css" href="../css/common.css">
    <link rel="stylesheet" type="text/css" href="../css/news.css">
    <title>news</title>
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
                    <li><a href="./index.php">首页</a></li>
                    <li><a href="./act.php">志愿项目</a></li>
                    <li><a href="./news.php" class="seed">志愿风采</a></li>
                    <li><a href="./message.php">留言板</a></li>
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
    <div class="news clearfix">
        <div class="wrapper">
            <div class="news_left">
                <h2 class="title">志愿风采</h2>
                <ul>
                    <?php foreach ($vol as $row) : ?>
                        <li>
                            <a href="#"><?php echo $row['title'] ?></a>
                            <span><?php echo $row['time'] ?></span>
                        </li>
                    <?php endforeach ?>
                </ul>
                <!-- <h2 class="title">志愿活动</h2>
                <ul>
                    <?php foreach ($act as $row) : ?>
                        <li>
                            <a href="#"><?php echo $row['title'] ?></a>
                            <span><?php echo $row['time'] ?></span>
                        </li>
                    <?php endforeach ?>
                </ul> -->
            </div>
            <div class="news_right">
                <h2 class="title">新闻资讯</h2>
                <ul>
                    <?php foreach ($new as $row) : ?>
                        <li>
                            <a href="#" title="<?php echo $row['title'] ?>"><?php echo $row['title'] ?></a>
                            <!-- <span><?php echo $row['time'] ?></span> -->
                        </li>
                    <?php endforeach ?>
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