<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/base.css">
    <link rel="stylesheet" type="text/css" href="../css/admin_common.css">
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">
    <title>后台</title>
    <style>
        /* 系统信息 */
        .content .header {
            border-bottom: 1px solid #ddd;
        }

        .content .bag {
            background-color: #fff;
        }

        .system_info,
        .system {
            float: left;
            margin: 50px 0 10px 40px;
            background-color: #fff;
        }

        .system_info table,
        .system table {
            width: 500px;
            border-top: 1px solid #cfe0f8;
            border-left: 1px solid #cfe0f8;
            border-collapse: separate;
            border-spacing: 0;
        }

        .system_info caption,
        .system caption {
            width: 1200px;
            height: 50px;
            line-height: 50px;
            background-color: #dae6f9;
        }

        .system_info tr,
        .system tr {
            height: 55px;
        }

        .system_info th,
        .system th {
            padding-left: 5px;
            border: 1px solid #cfe0f8;
            border-top: none;
            border-left: none;
            text-align: left;
            font-weight: 400;
            font-size: 14px;
            /* vertical-align: bottom; */
        }

        .system_info th:nth-child(1),
        .system_info th:nth-child(3) {
            width: 200px;
        }

        .system_info th:nth-child(2),
        .system_info th:nth-child(4) {
            width: 400px;
        }

        .system th:first-child {
            width: 250px;
        }
    </style>
</head>

<body>
    <!-- 侧边栏 -->
    <div class="aside clearfix">
        <div class="welcom">
            <img src="../images/yiyi.jpg" alt="">
            <span>欢迎您！管理员</span>
        </div>
        <div class="nav">
            <ul>
                <li>
                    <a href="./act/act.php">
                        <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                        <span>活动管理</span>
                    </a>
                </li>
                <li>
                    <a href="./news/news.php">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        <span>新闻管理</span>
                    </a>
                </li>
                <li>
                    <a href="./message/message.php">
                        <i class="fa fa-comments" aria-hidden="true"></i>
                        <span>留言管理</span>
                    </a>
                </li>
                <li>
                    <a href="./volunteer/volunteer.php">
                        <i class="fa fa-user-o" aria-hidden="true"></i>
                        <span>志愿者管理</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="header">
            <i class="fa fa-bars" aria-hidden="true"></i>
            <a href="./admin_html.php">志愿服务系统</a>
            <a href="./quitLogin.php" class="quit">退出登录</a>
            <span class="admin">当前用户：<em><?php echo $adminname ?></em> </span>
        </div>
        <!-- 系统信息 -->
        <div class="bag">
            <div class="system_info">
                <table>
                    <caption>系统基本信息</caption>
                    <tr>
                        <th>当前用户：</th>
                        <th><?php echo $adminname ?></th>
                        <th>您的权限</th>
                        <th>管理员</th>
                    </tr>
                    <tr>
                        <th>IP地址：</th>
                        <th><?php echo $_SERVER['REMOTE_ADDR'] ?></th>
                        <th>服务器域名：</th>
                        <th>localhost</th>
                    </tr>
                    <tr>
                        <th>浏览器版本：</th>
                        <th>Google Chrome/64 107.0.5304.63</th>
                        <th>服务器类型及版本号：</th>
                        <th>Apache2.4</th>
                    </tr>
                    <tr>
                        <th>当前日期：</th>
                        <th><?php echo date('Y-m-d') ?></th>
                        <th>开发日期：</th>
                        <th>2023-11-28</th>
                    </tr>
                </table>
            </div>
            <div class="system">
                <table>
                    <caption>志愿服务系统</caption>
                    <tr>
                        <th class="wid">建立初愿：</th>
                        <th>志愿服务系统旨在实现志愿服务信息数据互通互联，推广志愿服务活动并提高志愿者参与志愿服务活动的积极性。</th>
                    </tr>
                    <tr>
                        <th class="wid">服务对象：</th>
                        <th>湖北省高校及社区</th>
                    </tr>
                    <tr>
                        <th>建立时间：</th>
                        <th>2023年11月28日</th>
                    </tr>
                    
                </table>
            </div>
        </div>
</body>

</html>