<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta charset="UTF-8">
    <title>留言板</title>
    <!-- <link rel="stylesheet" href="style/style.css"> -->
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/message.css">
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
                    <li><a href="./news.php">志愿风采</a></li>
                    <li><a href="./message.php" class="seed">留言板</a></li>
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
    <!-- 中间 -->
    <form action="./message.php" method="POST">
        <section>
            <div class="box1">
                <img src="../images/message_bg.jpg" alt="">
                <div class="box2">
                    <p>有事您说话...</p>
                    <div class="box3">
                        <em class="em">*</em>
                        <span>姓名:</span>
                        <input type="text" name="username" placeholder="请输入姓名">
                    </div>
                    <div class="box3">
                        <em class="em">*</em>
                        <span>手机:</span>
                        <input type="text" name="phone" placeholder="请输入手机号码">
                    </div>
                    <div class="box3">
                        <em class="em">*</em>
                        <span>活动名称:</span>
                        <input type="text" name="act_name" placeholder="请输入活动名称">
                    </div>
                    <div class="box4">
                        <em class="em">*</em>
                        <span>留言:</span>
                        <textarea name="content" placeholder="感谢对我们的支持，很抱歉我们无法逐一回复，但我们会认真阅读！尽快给您回复！欢迎提出宝贵的意见和建议。" style="resize:none"></textarea>
                    </div>
                    <div class="submit">
                        <input type="submit" value="提交留言">
                    </div>
                </div>
            </div>
        </section>
    </form>
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