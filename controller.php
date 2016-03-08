<?php
/**
 *  description :
 *  author      : mengguoru
 *  Date        : 2016/3/6 9:54
 */
require_once "autoload.php";

use app\QueryIDCard;
//以下为将要返回给前端页面的数据
$request = $_POST;
$request = $request['id_post'];

//先测试是否能正确返回数组类型数据
$request= QueryIDCard::query($request);
$response = null;
if($request['errNum']==0){
    $response['code'] = 200;
    $response['msg'] = $request['retData'];
    $response['provider'] = $request['provider'];
}else{
    $response['code'] = 400;
    $response['msg'] = '身份证号码不合法!';
}
//返回json 格式
echo json_encode($response);