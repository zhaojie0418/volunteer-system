<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/register.css">
    <title>注册</title>
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
    <div class="header wrapper">
        <div class="logo">
            <img src="../images/logo2.png" alt="">
        </div>
        <div class="right">
            <span>已有账号？</span>
            <a href="./login.php">直接登录</a>
        </div>
    </div>
    <form action="./register.php" method="post" onsubmit="return checkForm()">
        <section>
            <div class="content">
                <div class="wrapper">
                    <p class="title">请完善资料，注册成为实名志愿者</p>
                    <!-- 账号信息 -->
                    <div class="item">
                        <h1 class="item_tile">账号信息</h1>
                        <div class="item_body">
                            <div class="item_item">
                                <em class="em">*</em>
                                <span>账号</span>
                                <input type="text" name="username" placeholder="请输入账号">
                            </div>
                            <div class="item_item">
                                <em class="em">*</em>
                                <span>密码</span>
                                <input type="password" id="pw1" name="password" placeholder="请输入密码">
                            </div>
                            <div class="item_item">
                                <em class="em">*</em>
                                <span>确认密码</span>
                                <input type="password" id="pw2" name="password" placeholder="请再次输入密码">
                            </div>
                            <div class="item_item">
                                <em class="em">*</em>
                                <span>手机号码</span>
                                <input type="text" name="phone" placeholder="请输入手机号码">
                            </div>
                            <div class="item_item">
                                <em class="em">*</em>
                                <span>邮箱</span>
                                <input type="text" name="email" placeholder="请输入邮箱">
                            </div>
                        </div>
                        <!-- 基本信息 -->
                    </div>
                    <!-- 身份信息 -->
                    <div class="item">
                        <h1 class="item_tile">身份信息</h1>
                        <div class="item_body">
                            <div class="item_item">
                                <em class="em">*</em>
                                <span>姓名</span>
                                <input type="text" name="realname" placeholder="请输入姓名">
                            </div>
                            <div class="item_item">
                                <em class="em">*</em>
                                <span>证件号码</span>
                                <input type="text" name="idnum" placeholder="请输入证件号码">
                            </div>
                            <div class="item_item_spec">
                                <em class="em">*</em>
                                <span>个人特长</span>
                                <textarea name="speciality" placeholder="请输入个人特长（300字以内），选填" maxlength="300"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- 志愿者誓词 -->
                    <div class="item">
                        <h1 class="item_tile">志愿者誓词</h1>
                        <div class="vote">
                            <p>我宣誓，自愿成为一名光荣的志愿者，为使我们的国家和城市更美好、人民更幸福、环境更安全，我要团结身边的人，投身其间。面对需求，我要行动。</p>
                            <p>我承诺，我将竭尽所能，参加公益活动，帮助困难人群，真诚关怀有需要的人士，为他们带来温暖。</p>
                        </div>
                    </div>
                    <!-- 提交 -->
                    <div class="submit">
                        <input type="submit" value="申请成为志愿者">
                    </div>
                </div>

            </div>
        </section>
    </form>
</body>

</html>