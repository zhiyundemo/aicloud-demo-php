<?php
require_once('util/HttpUtil.php');
require_once('util/AuthV3Util.php');
// 您的应用ID
define("APP_KEY", "");
// 您的应用密钥
define("APP_SECRET", "");

function create_request()
{
    /*
     * note: 将下列变量替换为需要请求的参数
     * 取值参考文档: https://ai.youdao.com/DOCSIRMA/html/%E8%87%AA%E7%84%B6%E8%AF%AD%E8%A8%80%E7%BF%BB%E8%AF%91/API%E6%96%87%E6%A1%A3/%E6%96%87%E6%9C%AC%E7%BF%BB%E8%AF%91%E6%9C%8D%E5%8A%A1/%E6%96%87%E6%9C%AC%E7%BF%BB%E8%AF%91%E6%9C%8D%E5%8A%A1-API%E6%96%87%E6%A1%A3.html
     */
    $q = "待翻译文本";
    $from = "源语言语种";
    $to = "目标语言语种";
    $vocab_id = "您的用户词表ID";

    $params = array('q' => $q,
        'from' => $from,
        'to' => $to,
        'vocabId' => $vocab_id);
    $params = add_auth_params($params, APP_KEY, APP_SECRET);
    $r = do_call('https://openapi.youdao.com/api', 'post', array(), $params, 'application/json');
    echo $r;
}

/*
 * 网易有道智云翻译服务api调用demo
 * api接口: https://openapi.youdao.com/api
 */
create_request();
?>
