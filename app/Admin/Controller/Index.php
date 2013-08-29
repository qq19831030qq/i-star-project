<?php
class Admin_Controller_Index extends Admin_Controller_Base{
    public function init(){
        $this->assign('active','index');
        parent::init();
    }

    public function actionIndex(){
        return $this->render();
    }

    /**
    * 登陆
    */
    public function actionLogin(){
        return $this->render();
    }

    public function actionLogin_AJAX(){
        
    }

    /**
    * 注册
    */
    public function actionRegister(){
        return $this->render();
    }

    public function actionRegister__POST(){
        
    }

}
