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
        .box .content {
            height: 850px;
        }

        /* 账号信息 */
        .content .item {
            width: 1210px;
            margin-left: 350px;
            margin-bottom: 25px;
        }

        .content .item div:last-child {
            margin-bottom: 0px;
        }

        .content .item_tile {
            position: relative;
            width: 1210px;
            height: 60px;
            margin-top: 20px;
            padding-left: 20px;
            line-height: 75px;
            /* font-weight: 400; */
            font-size: 20px;
        }

        .item_tile:before {
            content: "";
            display: inline-block;
            width: 4px;
            height: 20px;
            background: #f55044;
            position: absolute;
            left: 0px;
            top: 28px;
        }

        .content .item_body {
            width: 1210px;
            padding-left: 20px;
        }

        .content .item_item {
            width: 1190px;
            height: 35px;
            margin-bottom: 20px;
        }

        .content .item_item span {
            display: inline-block;
            width: 190px;
            height: 35px;
            padding-left: 5px;
        }

        .content .item_item input {
            /* position: relative; */
            width: 275px;
            height: 35px;
            border: 1.5px solid #ccc;
            padding-left: 10px;
            border-radius: 2px;
        }

        /* 个人特长 */
        .content .item_item_spec {
            width: 1190px;
            height: 100px;
            margin-bottom: 20px;
        }

        .content .item_item_spec span {
            position: relative;
            top: -80px;
            left: 0;
            display: inline-block;
            width: 190px;
            height: 60px;
            padding-left: 5px;
        }

        .content .item_item_spec textarea {
            position: relative;
            width: 300px;
            height: 100px;
            padding: 10px;
            /* margin-left: 190px; */
            border: 1px solid #ccc;
            /* 设置文本域不可拖动 */
            resize: none;
            border: 1.5px solid #d5d5d5;
            border-radius: 3px;
            /* 鼠标聚焦边框颜色 */
            outline-color: #333;
        }

        /*获取input焦点*/
        .content .item_item input:focus {
            border: 1.5px solid #333;
        }

        /* 保存 */
        .content .field {
            height: 150px;
        }

        .content .field .submit {
            margin: 30px 30px 0 203px;
            width: 65px;
            height: 38px;
            color: #fff;
            font-size: 14px;
            background-color: #f55044;
            border-radius: 5px;
            cursor: pointer;
        }

        .content .field .cancel {
            display: inline-block;
            width: 65px;
            height: 38px;
            line-height: 36px;
            text-align: center;
            font-size: 14px;
            color: #747679;
            border: 1.5px solid #d5d5d5;
            border-radius: 5px;
        }
    </style>
    <script>
        //检查两次输入密码是否一致
        function checkForm() {
            var pw1 = document.getElementById("pw1").value;
            var pw2 = document.getElementById("pw2").value;
            if (pw1 !== pw2) {
                alert('两次输入密码不一致！');
                return false;
            }
            return true;
        }
    </script>
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
                    <li><a href="./person.php" class="seed">个人中心</a></li>
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
                    <a></a>
                    <li><a href="./person.php" class="seed"><i class="iconfont icon-minus"></i>我的信息</a></li>
                    <li><a href="./p_act.php"><i class="iconfont icon-minus"></i>我的活动</a></li>
                    <li><a href="./p_message.php"><i class="iconfont icon-minus"></i>我的留言</a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <form action="./person_edit.php" method="POST" onsubmit="return checkForm()">
                <div class="item">
                    <h1 class="item_tile">账号信息</h1>
                    <div class="item_body">
                        <div class="item_item">
                            <span>账号</span>
                            <input type="text" name="username" value="<?php echo $user_info['username'] ?>">
                        </div>
                        <div class="item_item">
                            <span>新密码</span>
                            <input type="password" id="pw1" name="password">
                        </div>
                        <div class="item_item">
                            <span>确认密码</span>
                            <input type="password" id="pw2" name="password">
                        </div>
                    </div>
                </div>
                <div class="item">
                    <h1 class="item_tile">联系方式</h1>
                    <div class="item_body">
                        <div class="item_item">
                            <span>邮箱</span>
                            <input type="text" name="email" value="<?php echo $user_info['email'] ?>">
                        </div>
                        <div class="item_item">
                            <span>手机号码</span>
                            <input type="text" name="phone" value="<?php echo $user_info['phone'] ?>">
                        </div>
                    </div>
                </div>
                <div class="item">
                    <h1 class="item_tile">基本信息</h1>
                    <div class="item_body">
                        <div class="item_item">
                            <span>姓名</span>
                            <input type="text" name="realname" value="<?php echo $user_info['realname'] ?>">
                        </div>
                        <div class="item_item">
                            <span>证件号码</span>
                            <input type="text" name="idnum" value="<?php echo $user_info['idnum'] ?>">
                        </div>
                        <div class="item_item_spec">
                            <span>个人特长</span>
                            <textarea name="speciality" maxlength="300"><?php echo $user_info['speciality'] ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="item">
                </div>
                <div class="field">
                    <input class="submit" type="submit" value="保存" />
                    <a href="./person.php" class="cancel">取消</a>
                </div>
            </form>
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