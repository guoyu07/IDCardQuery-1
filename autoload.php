<?php
/**
 *  description :
 *  author      : mengguoru
 *  Date        : 2016/3/6 9:53
 */

function myLoad($fileName){
    $filePath = sprintf('%s.php',str_replace('\\','/',$fileName));
    if(is_file($filePath))
        require_once $filePath;
}
spl_autoload_register('myLoad');