<?php
class Admin_Controller_Programarea extends Admin_Controller_Base{

    public function init(){
        parent::init();
    }

    public function actionList(){
        $model_programarea = MONK::getSingleton('Admin_Model_Programarea');
        $this->assign('programareas',$model_programarea->get_list());
        $this->render();
    }
}