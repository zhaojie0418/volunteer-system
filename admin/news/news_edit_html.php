<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新闻管理</title>
    <link rel="stylesheet" type="text/css" href="../../css/base.css">
    <link rel="stylesheet" type="text/css" href="../../css/admin_common.css">
    <link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../../iconfont/iconfont.css">
    <style>
        /* 显示滚动条 */
        .scroll {
            overflow: scroll;
            overflow-x: hidden;

        }

        /* 滚动条整体部分 */
        .scroll::-webkit-scrollbar {
            width: 10px;
            background-color: rgba(0, 0, 0, .03);
            border-radius: 10px;
        }

        /* 滑块 */
        .scroll::-webkit-scrollbar-thumb {
            background-color: #c8c9cc;
            border-radius: 10px;
        }

        /* 控件 */
        .main_bag h3 {
            margin: 30px 0 0 30px;
            height: 50px;
            font-weight: 500;
            font-size: 20px;
        }

        .item,
        .item_type {
            height: 60px;
        }

        .item span,
        .item_type span {
            display: inline-block;
            margin: 11px 25px 0px 55px;

        }

        .item input {
            height: 30px;
            width: 800px;
            padding-left: 12px;
            border: 1.5px solid #d5d5d5;
            border-radius: 3px;
        }

        /* 活动时间 */
        .time input {
            width: 325px;
            padding-left: 30px;
        }

        /* 活动介绍 */
        .cot {
            height: 283px;
            padding-top: 10px;
        }

        .cot textarea {
            width: 800px;
            float: left;
            margin-left: 5px;
            margin-top: 10px;
            padding: 12px;
            height: 250px;
            margin: auto 0;
            /* 设置文本域不可拖动 */
            resize: none;
            border: 1.5px solid #d5d5d5;
            border-radius: 3px;
            /* 鼠标聚焦边框颜色 */
            outline-color: #3b9efc;
        }

        .cot p {
            float: left;
            margin: 11px 28px 0px 55px;
        }

        /* 活动类型 */
        .item_type span {
            float: left;
        }

        .item_type select {
            float: left;
            width: 150px;
            height: 30px;
            padding-left: 8px;
            margin-left: 4px;
            margin-top: 8px;
            color: #333;
            border: 1.5px solid #d5d5d5;
            border-radius: 3px;
        }

        /* 保存 */
        .field {
            height: 150px;
        }

        .field .submit {
            margin: 30px 30px 0 150px;
            width: 65px;
            height: 38px;
            color: #fff;
            font-size: 14px;
            background-color: #3b9efc;
            border-radius: 5px;
            transition: .5s;
        }

        .field .submit:hover {
            cursor: pointer;
            background-color: rgba(59, 158, 252, .8);
        }

        .field .cancel {
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

        /*获取input焦点*/
        .main_bag input:focus,
        .main_bag select:focus {
            border: 1.5px solid #3b9efc;
        }

        /* 闹钟小图标 */
        .time {
            position: relative;
        }

        #time {
            position: absolute;
            left: 156px;
            top: 11px;
            color: #d5d5d5;
            font-size: 18px;
        }

        /* 弹出层 */
        .header {
            position: relative;
        }

        .popup {
            display: none;
            position: absolute;
            padding-left: 6px;
            top: 10px;
            left: 500px;
            width: 300px;
            height: 40px;
            line-height: 40px;
            font-size: 14px;
            color: #6acd39;
            background-color: #ebf7e5;
            border: 1px solid #dbf3cf;
            z-index: 99999;
            border-radius: 3px;
            transition: 1s;
        }

        .popup i {
            line-height: 40px;
        }
    </style>
    <!-- 保存弹窗出现 -->
    <script>
        //给定一个值,使点 确定按钮 为 true,点其他为 false
        var isDelete = false;
        //显示弹窗函数，设置display为flex
        function showPopup() {
            document.getElementById("popup").style.display = "flex";
        }

        //关闭弹窗函数，设置display为none，传一个参数，把true和false传进去
        function hidePopup(x, e) {
            //处理冒泡，event 的 cancelable 事件返回一个布尔值 
            // 确定按钮有event参数，不会返回undefined（因为取消和其他区域，没传值 默认undefined）
            if (e != undefined) {
                e.cancelBubble = true;
            }
            document.getElementById("popup").style.display = "none";
            isDelete = x;
            console.log(x);
        }
    </script>
</head>

<body>
    <!-- 侧边栏 -->
    <div class="aside clearfix">
        <div class="welcom">
            <img src="../../images/yiyi.jpg" alt="">
            <span>欢迎您！管理员</span>
        </div>
        <div class="nav">
            <ul>
                <li>
                    <a href="../act/act.php">
                        <i class="fa fa-calendar-plus-o" aria-hidden="true"></i>
                        <span>活动管理</span>
                    </a>
                </li>
                <li>
                    <a href="./news.php">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        <span>新闻管理</span>
                    </a>
                </li>
                <li>
                    <a href="../message/message.php">
                        <i class="fa fa-comments" aria-hidden="true"></i>
                        <span>留言管理</span>
                    </a>
                </li>
                <li>
                    <a href="../volunteer/volunteer.php">
                        <i class="fa fa-user-o" aria-hidden="true"></i>
                        <span>志愿者管理</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="header clearfix">
            <!-- 弹出层后消失 -->
            <div class="popup" id="popup" onclick="hidePopup(false)">
                <i class="fa fa-check-circle"></i>保存成功
            </div>
            <i class=" fa fa-bars" aria-hidden="true"></i>
            <a href="">志愿服务系统</a>
            <a href="../quitLogin.php" class="quit">退出登录</a>
            <span class="admin">当前用户：<em><?php echo $adminname ?></em> </span>
        </div>
        <div class="bag clearfix">
            <div class="main_bag scroll">
                <form action="" method="POST" strcolling="yes">
                    <h3>编辑新闻</h3>
                    <div class="item">
                        <span>新闻标题</span>
                        <input type="text" name="title" value="<?php echo $news_info['title'] ?>">
                    </div>
                    <div class="item_type">
                        <span>新闻类别</span>
                        <div class="select" name="type">
                            <?php echo make_select('type', $types,  $news_info['type']) ?>
                        </div>
                    </div>
                    <div class="item cot">
                        <p>新闻内容</p>
                        <textarea class="scroll" name="content" rows="8" cols="5" maxlength="5000"><?php echo $news_info['content'] ?></textarea>
                    </div>
                    <div class="item time">
                        <span>发布时间</span>
                        <i class="iconfont icon-clock" id="time"></i>
                        <input type="text" name="time" value="<?php echo  $news_info['time'] ?> ">
                    </div>
                    <div class=" field">
                        <input class="submit" type="submit" value="保存" onclick="showPopup()" />
                        <a href=" ./news.php" class="cancel">取消</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>