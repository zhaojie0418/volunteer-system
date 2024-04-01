<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 引入字体图标 -->
    <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/base.css">
    <link rel="stylesheet" href="../../css/page.css">
    <link rel="stylesheet" href="../../css/common.css">
    <title>活动详情</title>
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
                        <a href="../person/person.php">个人中心</a>
                        <div class="column">
                            <dl>
                                <dd><a href="../person/person_edit.php" target="_blank">账号设置</a></dd>
                                <dd><a href="../person/quitLogin.php" target="_blank">安全退出</a></dd>
                            </dl>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content clearfix">
        <div class="wrapper">
            <div class="content_top">
                <div class="top_top">
                    <h3>“文明管家”志愿活动</h3>
                    <h4>Date:2023/2/21 View:1.3w</h4>
                </div>
                <div class="top_left">
                    <img src="../../images/act2.png" alt="">
                </div>
                <div class="top_right">
                    <table>
                        <tr>
                            <th>活动编号:</th>
                            <td><em>02</em></td>
                        </tr>
                        <tr>
                            <th>活动标签:</th>
                            <td><em>校园环保</em></td>
                        </tr>
                        <tr>
                            <th>活动地点:</th>
                            <td><em>崇远路</em></td>
                        </tr>
                        <tr>
                            <th>志愿时长:</th>
                            <td><em>1h</em></td>
                        </tr>
                        <tr>
                            <th>招募人数:</th>
                            <td><em>12人</em></td>
                        </tr>
                        <tr>
                            <th>活动时间:</th>
                            <td><em>2022-11-12 12:30 ~ 2022-11-12 13:30</em></td>
                        </tr>
                        <tr>
                            <th>报名限制:</th>
                            <td><em>仅限大一、大二学生报名。</em></td>
                        </tr>
                        <tr>
                            <th>活动简介:</th>
                            <td><em>清除针对分布在路边的烟头，纸片等垃圾。</em></td>
                        </tr>
                        <tr>
                            <th>服务要求:</th>
                            <td><em>参加人员需按时到场，不允许使用电子设备，需全程佩戴口罩。</em></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="sign">
                <a href="./act_sign.php?id=<?php echo $_GET['id'] ?>">点击报名</a>
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