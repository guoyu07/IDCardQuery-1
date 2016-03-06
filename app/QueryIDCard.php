<?php
/**
 *  description :
 *  author      : mengguoru
 *  Date        : 2016/3/6 8:58
 */
namespace app;

use libs\httpRequest;

class QueryIDCard
{
    public static function query($num_IDCard)
    {
       if(self::verifyID($num_IDCard))
       {
           $response = httpRequest::request (['id'=>$num_IDCard]);
           var_dump($response);
       }

    }

    /**
     * 检验身份证号合法性
     * @param $num_IDCard
     * @return bool
     */
    public static function verifyID($num_IDCard){
       if(preg_match('/^\d{18}/',$num_IDCard))
           return true;
        else
            return false;
    }
}