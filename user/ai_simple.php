<?php
class Sample {
    // 实际应当避免硬编码
    const API_KEY = "JvKy4ecUyfIl7o935N2lSTBz";
    const SECRET_KEY = "aCXlQ1jE4i7DomSL5ycmJfUN7v3UuXJX";

    public function run($userMessage) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://aip.baidubce.com/rpc/2.0/ai_custom/v1/wenxinworkshop/chat/completions_pro?access_token={$this->getAccessToken()}",
            CURLOPT_TIMEOUT => 30,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER  => false,
            CURLOPT_SSL_VERIFYHOST  => false,
            CURLOPT_CUSTOMREQUEST => 'POST',
            
            CURLOPT_POSTFIELDS =>'{"messages":[{"role":"user","content":"' . $userMessage . '"}],"disable_search":false,"enable_citation":false}',
    
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

// 传递参数
// $rtn = (new Sample())->run($userMessage);
// print_r($rtn);

// 创建 Sample 类的实例
$sample = new Sample();

// 处理 GET 请求
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // 检查是否传递了 userMessage 参数
    if (isset($_GET['userMessage'])) {
        // 获取用户消息
        $userMessage = $_GET['userMessage'];
        
        // 调用 run 方法
        $result = (new Sample())->run($userMessage);

        // 返回结果
        print_r($result);
    } else {
        // 返回结果
        print_r('Missing userMessage parameter');    
    }
}

/*
正确返回数据参考
{
    "id": "as-zwttb8r1yw",
    "object": "chat.completion",
    "created": 1710073885,
    "result": "北京，简称“京”，古称燕京、北平，中华民族的发祥地之一，是中华人民共和国首都、直辖市、国家中心城市、超大城市，也是国务院批复确定的中国政治中心、文化中心、国际交往中心、科技创新中心，中国历史文化名城和古都之一，世界一线城市。因此，北京在中国的政治、文化、国际交往和科技创新等方面都扮演着重要的角色。\n\n北京被世界城市研究机构评为世界一线城市，联合国报告指出北京市人类发展指数居中国城市第二位。北京市成功举办夏奥会与冬奥会，成为全世界第一个“双奥之城”。同时，北京也是全球拥有世界遗产（7处）最多的城市，是全球首个拥有世界地质公园的首都城市。\n\n北京对外开放的旅游景点达200多处，有世界上最大的皇宫紫禁城、祭天神庙天坛、皇家园林北海公园、颐和园和圆明园，还有八达岭长城、慕田峪长城以及世界上最大的四合院恭王府等名胜古迹。北京市共有文物古迹7309项，99处全国重点文物保护单位（含长城和京杭大运河的北京段）、326处市级文物保护单位、5处国家地质公园、15处国家森林公园。\n\n总的来说，北京是一个充满活力和魅力的城市，拥有丰富的历史文化和自然景观，是中国的重要城市之一。",
    "is_truncated": false,
    "need_clear_history": false,
    "finish_reason": "normal",
    "usage": {
        "prompt_tokens": 2,
        "completion_tokens": 252,
        "total_tokens": 254
    }
}

*/