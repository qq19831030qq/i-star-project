<?php
class Home_Controller_Share extends Home_Controller_Base {
    public function init(){
        parent::init();
    }
    public function actionIndex(){
        $this->assign('menu','share');
        $this->render();
    }
}