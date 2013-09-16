<?php
class Home_Controller_Star extends Home_Controller_Base {
    public function init(){
        parent::init();
    }
    
    //关注的动态
    public function actionIndex(){
        $this->assign('menu','star');
        $this->render();
    }

}