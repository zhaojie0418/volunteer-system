<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/index.css">
    <!-- 引入字体图标 -->
    <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../iconfont/iconfont.css">
    <script type="text/javascript" src="../js/index.js">
    </script>
    <title>首页</title>
    <style>
        .box {
            height: 700px;
            background-color: #f3e6e670;
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
                    <li><a href="index.php" class="seed">首页</a></li>
                    <li><a href="act.php">志愿项目</a></li>
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
    <!-- 主体 -->
    <div class="box">

        <!--banner begin-->
        <div class="banner">
            <div class="banner_pic" id="banner_pic">
                <div class="current"><img class="ban" src="../images/ban6.png"></div>
                <div class="pic"><img class="ban" src="../images/ban2.jpg"></div>
                <div class="pic"><img class="ban" src="../images/ban3.jpg"></div>
                <div class="pic"><img class="ban" src="../images/ban7.png"></div>
                <div class="pic"><img class="ban" src="../images/ban4.jpg"></div>
            </div>
            <p>爱洒社会|彰显青春本色|和我们一起吧</p>
            <p>向下开启·属于你的志愿云途</p>
            <ol id="button">
                <li class="current"></li>
                <li class="but"></li>
                <li class="but"></li>
                <li class="but"></li>
                <li class="but"></li>
            </ol>
            <a href="#con" class="sanjiao"><img src="../images/jiantou.png" alt=""></a>
        </div>
        <!--banner end-->
    </div>


    <div>
        <button id="defaultOpen" class="tablink" οnclick="openPicture(event,'oldman')">文明管家</button>
        <button class="tablink" οnclick="openPicture(event,'children')">暖心大白</button>
        <button class="tablink" οnclick="openPicture(event,'poor')">爱心献血</button>
        <script>
            document.getElementById("defaultOpen").click;
        </script>
    </div>
    <br>
    <br>
    <div class="main">
        <!--中间内容-->
        <div class="others clearfix">
            <div class="aboutus">
                <!--关于我们-->
              <img src="../images/xt1.png"></a>
                <!-- <div class="content" id="con"> -->

                <!-- <a href="viedo/shipin.mp4">
                <img src="images/xt2.png">
                <div class="cur">
                    <h3>又红又专的我们</h3>
                    <span>查看详情</span>
                </div>
            </a> -->

                <p>
                志愿者信息管理系统，是一个汇聚爱心与智慧的数字平台。在这里，每一位志愿者的无私奉献都如繁星般闪耀，每一条信息的传递都如溪流般汇聚。
                </p>
                <p>
                我们用心搭建这座桥梁，连接着志愿者与需要帮助的人们，让爱心在信息的海洋中流淌，传递着温暖与力量。
                </p>
                <p>
                通过我们的系统，志愿者的行动变得更加高效有序，信息的流通变得更加畅通无阻。我们相信，在志愿者信息管理系统的助力下，更多的爱心将会汇聚，更多的温暖将会传递，共同点亮人间的希望之光。
                </p>
            </div>
            <div class="gonggao">
                <!--活动公告-->
                <div class="title">活动公告</div>
                <ul>
                    <li><a href="#">走进博雅楼</a></li>
                    <li><a href="#">校园猫狗驿站</a></li>
                    <li><a href="#">走进十号楼</a></li>
                    <li><a href="#">走进图书馆</a></li>
                    <li><a href="#">走进博雅楼</a></li>
                    <li><a href="#">校园猫狗驿站</a></li>
                    <li><a href="#">走进十号楼</a></li>
                    <li><a href="#">走进图书馆</a></li>
                </ul>
            </div>
        </div>
        <div class="act">
            <!--公益进行中-->
            <div class="title" id="con"><span>公益进行中</span><a href="act.php">查看更多</a></div>
            <div class="act_item">
                <ul>
                    <?php foreach ($act as $row) : ?>
                        <li>
                            <a href="./page/act<?php echo $row['act_id'] ?>_html.php?id=<?php echo $row['act_id'] ?>" target="_blank">
                                <img src="../images/ban1.jpg">
                                <p class="name"><?php echo $row['act_name'] ?></p>
                                <p class="des"><?php echo $row['description'] ?></p>
                                <p class="info">
                                    <span class="time"><i class="iconfont icon-clock"></i><?php echo $row['begin_time'] ?></span>
                                    <span class="place"><i class="iconfont icon-map"></i><?php echo $row['place'] ?></span>
                                </p>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
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