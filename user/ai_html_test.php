<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/base.css">
    <link rel="stylesheet" type="text/css" href="../css/common.css">

    <title>志愿者智能服务中心</title>
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
   
    
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 255, 0.2);
}

.header {
    background-color: #f55044;
    color: #fff;
    padding: 10px 20px;
    border-radius: 10px 10px 0 0;
    font-size: 20px;
    text-align: center;
}

.chat-box {
    height: 300px;
    overflow-y: auto;
    padding: 10px;
}

.message {
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 10px;
}

.user-message {
    text-align: right;
    background-color: #4caf50;
    color: #fff;
    border-radius: 10px 10px 0 10px;
}

.bot-message {
    text-align: left;
    background-color: #eee;
    border-radius: 10px 10px 10px 0;
}

.input-box {
    display: flex;
    align-items: center;
    background-color: #f5f5f5;
    padding: 10px;
    border-radius: 0 0 10px 10px;
}

.input-box input {
    flex: 1;
    padding: 10px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
}

.input-box button {
    padding: 10px 20px;
    background-color: #4caf50;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    margin-left: 10px;
    transition: background-color 0.3s;
}

.input-box button:hover {
    background-color: #45a049;
}

.input-box button:active {
    background-color: #3e8e41;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.message {
    animation: fadeIn 0.3s ease-out;
}

</style>
</head>
<body>
<div class="container">
    <div class="header">志愿者智能服务中心</div>
    <div class="chat-box" id="chatBox">
        <div class="message bot-message">欢迎！我是您的志愿者智能服务助手。请问有什么可以帮到您的吗？</div>
    </div>
    <div class="input-box">
        <input type="text" id="userInput" placeholder="输入您的消息...">
        <button onclick="sendMessage()">发送</button>
    </div>
</div>

<script>
function sendMessage() {
    var userInput = document.getElementById("userInput");
    var userMessage = userInput.value;
    if (userMessage.trim() === "") return;
    
    var chatBox = document.getElementById("chatBox");
    var userDiv = document.createElement("div");
    userDiv.className = "message user-message";
    userDiv.innerText = userMessage;
    chatBox.appendChild(userDiv);
    
    userInput.value = "";


    // 使用 AJAX 请求获取对话助手的回复
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // 将 Api 传递的数据转化成 JSON
                var responseObj = JSON.parse(xhr.responseText)
                var botMessage = document.createElement("div");
                botMessage.className = "message bot-message";
                // 获取具体信息字段
                botMessage.innerText = responseObj.result;
                chatBox.appendChild(botMessage);
                chatBox.scrollTop = chatBox.scrollHeight;
            } else {
                console.error('Error occurred: ' + xhr.status);
            }
        }
    };
    // xhr.open('GET', 'ai_simple.php', true);
    xhr.open('GET', 'ai_simple.php?userMessage=' + encodeURIComponent(userMessage), true);
    xhr.send();
}

</script>
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
