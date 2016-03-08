<?php
/**
 *  description :
 *  author      : mengguoru
 *  Date        : 2016/3/7 22:53
 */
namespace libs;

class useRedis{
    private static $redis;

    public static function getRedis()
    {
       self:: $redis = new \Redis();
        self::$redis->connect('127.0.0.1',6379);
        return self::$redis;
    }
}