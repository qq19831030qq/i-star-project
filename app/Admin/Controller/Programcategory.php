<?php
class Admin_Controller_Programcategory extends Admin_Controller_Base{

    public function init(){
        parent::init();
    }

    public function actionList(){
        $model_programcategory = MONK::getSingleton('Admin_Model_Programcategory');
        $this->assign('programcategorys',$model_programcategory->get_list());
        $this->render();
    }
}