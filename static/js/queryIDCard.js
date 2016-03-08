/**
 *  description :
 *  dependance  : jquery
 *  author      : Administrator
 *  Date        : 2016/3/8 9:21
 */
var ID_QUERY ={};
//封装jquery ajax方法
ID_QUERY.ajax = function(url,params,callback){
    $.ajax({
        url:url,
        type:'POST',
        data:params,
        dataType:'json',
        success:callback,
        error:function(){
        alert('身份证输入错误');
    }
    });
};
/**
 * callback函数的da应是json格式
 */
ID_QUERY.dataCallback= function(data){
    if(data.code == 200){
        var sex = null;
        if(data.msg.sex == 'M')
            sex = '男';
        else
            sex = '女';
        $('#sex').text(sex);
        $('#bithday').text(data.msg.birthday);
        $('#address').text(data.msg.address);
        $('#provider').text(data.provider);
        $('#showResult').show();
    }else{
        alert('查询失败');
        $('#showResult').hide();
    }
};