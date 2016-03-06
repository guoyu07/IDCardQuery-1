<?php
/**
 *  description :
 *  author      : mengguoru
 *  Date        : 2016/3/6 12:43
 */
namespace libs;

class httpRequest{

    const BAIDU_API = 'http://apis.baidu.com/apistore/idservice/id';

    /**
     * 如果需要添加对方法的判断，后期再加
     * @param $url
     * @param $params
     * @return null|string
     */
    public static function request($params){
//        $method = strtoupper($method);
//        if($method == 'POST'){
//
//        }
        $url = self::BAIDU_API;
        $url = $url.'?'.http_build_query($params);
//        $response = file_get_contents($url);

        /**
         * 以下为使用第三方的实例代码
         */
        $ch = curl_init();
        $header = array(
            'apikey: 你自己的apikey',
        );
        // 添加apikey到header
        curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 执行HTTP请求
        curl_setopt($ch , CURLOPT_URL , $url);
        $res = curl_exec($ch);

        $res = json_decode($res);

        return $res;
    }
}