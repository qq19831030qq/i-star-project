<?php
function get_user(){
    call_user_func_array(array(MONK::$_input,'I'), array('cookie', array(MONK::getConfig('auth_token')=>PARAM_STRING)));
    $auth_token = MONK::$_input->cookie(MONK::getConfig('auth_token'));
    if($auth_token){
        //解码auth_token得到用户ID，邮箱，密码
        $user = array();
        include(MONK_APP.'Frame'.DS.'extensions'.DS.'Encrypt.php');
        $_encrypt = MONK::getSingleton('Encrypt');
        $_encrypt->app_key = MONK::getConfig('core_app_key');
        list($user_id,$user_email,$user_nickname,$user_maxim,$user_password,$user_avatar,$user_mobile,$is_checked) = explode(' ',$_encrypt->authTokenDecode($auth_token));
        //登陆检验，不过会增加数据库连接，在刷新频率比较高的情况下会非常耗资源，如果有比较好的缓存服务器倒是可以尝试，因为这样更安全
        //进行邮箱账号验证
        $is_email = validator::get_param_email($user_email);
        if($is_email){
            $user['user_id'] = $user_id;
            $user['user_email'] = $user_email;
            $user['user_nickname'] = $user_nickname;
            $user['user_maxim'] = $user_maxim;
            $user['user_avatar'] = $user_avatar;
            $user['user_password'] = $user_password;
            $user['is_checked'] = $is_checked;
            return $user;
        }else
            return false;
    }else
        return false;
}