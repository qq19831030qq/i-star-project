<?php
class Home_Controller_Space extends Home_Controller_Base {
    public function init(){
        parent::init();
    }
    public function actionIndex(){
        $this->assign('menu','space');
        $this->render();
    }
}