<?php
class Admin_Controller_Admin extends Admin_Controller_Base{

    public function init(){
        parent::init();
    }

    public function actionList(){
        $model_admin = MONK::getSingleton('Admin_Model_Admin');
        $this->assign('admins',$model_admin->get_list());
        $this->render();
    }

    public function actionDelete(){
        $this->_setType(array('id'=>PARAM_UINT));
        $model_admin = MONK::getSingleton('Admin_Model_Admin');
        $model_admin->delete($this->_get('id'));
        return $this->redirect(MONK::_url('*/list',array('r'=>'success')));
    }
}