<?php
class Sample {
    // 实际应当避免硬编码
    const API_KEY = "Jp8OsAI0qtsH6mEtbatNl6DY";
    const SECRET_KEY = "m3kIw4PMI8DGs9vNUOV8jamO4PTUMGCf";

    public function run($photo) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://aip.baidubce.com/rest/2.0/face/v3/search?access_token={$this->getAccessToken()}",
            CURLOPT_TIMEOUT => 30,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER  => false,
            CURLOPT_SSL_VERIFYHOST  => false,
            CURLOPT_CUSTOMREQUEST => 'POST',
            
            //添加具体的图像数据
            CURLOPT_POSTFIELDS =>'{"image_type":"BASE64","image":"' . $photo . '","group_id_list":"1"}',
    
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),

        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
    
    /**
     * 使用 AK，SK 生成鉴权签名（Access Token）
     * @return string 鉴权签名信息（Access Token）
     */
    private function getAccessToken(){
        $curl = curl_init();
        $postData = array(
            'grant_type' => 'client_credentials',
            'client_id' => self::API_KEY,
            'client_secret' => self::SECRET_KEY
        );
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://aip.baidubce.com/oauth/2.0/token',
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_SSL_VERIFYPEER  => false,
            CURLOPT_SSL_VERIFYHOST  => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => http_build_query($postData)
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $rtn = json_decode($response);
        return $rtn->access_token;
    }
}

// 创建 Sample 类的实例
$sample = new Sample();

// 处理 POST 请求
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 检查是否传递了 photo 参数
    if (isset($_POST['photo'])) {
        // 获取用户消息
        $photo = $_POST['photo'];
        
        // 调用 run 方法
        $result = (new Sample())->run($photo);
        
        session_start();
        // 添加默认用户数据
        $_SESSION['user_info'] = array(
            'id' => '4',
            'username' => 'Ellle'
        );
        // 返回结果
        print_r($result);
    } else {
        // 返回结果
        print_r('Missing photo parameter');    
    }
}