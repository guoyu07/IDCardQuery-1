<?php
/**
 *  description :
 *  author      : mengguoru
 *  Date        : 2016/3/6 8:58
 */
namespace app;

use libs\httpRequest;
use libs\useRedis;

class QueryIDCard
{
    const CACHE_INFO = 'ID_INFO';

    public static function query($num_IDCard)
    {
        $res = null;
       if(self::verifyID($num_IDCard))
       {
           $id_in_db = sprintf(self::CACHE_INFO.'-%s',$num_IDCard);
           $connect = useRedis::getRedis()->get($id_in_db);
           IF($connect)
           {
               $res = json_decode($connect,true);
               $res['provider'] = '来自数据库';
           }else
           {
               $res = httpRequest::request (['id'=>$num_IDCard]);
               if(self::verifyID($num_IDCard))
                   useRedis::getRedis()->set($id_in_db,json_encode($res));
               // 把json类型变为array类型，后期可以把这小块优化下
//               var_dump($res);
               $res = (array)$res;
//               var_dump($res);
               $res['provider'] = '来自第三方网络';
           }
       }
        return $res;
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