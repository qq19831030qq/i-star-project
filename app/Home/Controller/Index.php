<?php
class Home_Controller_Index extends Home_Controller_Base {
    public function init(){
        parent::init();
    }
    public function actionIndex(){
        $this->assign('menu','index');
        $this->render();
    }
}