<?php
class Home_Controller_Maga extends Home_Controller_Base {
    public function init(){
        parent::init();
    }
    
    public function actionIndex(){
        $this->assign('menu','magazine');
        $this->render();
    }
}