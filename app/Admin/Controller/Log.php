<?php
class Admin_Controller_Log extends Admin_Controller_Base{

    public function init(){
        parent::init();
    }

    public function actionList(){
        $this->_setType(array('p'=>PARAM_UINT));
        $page = $this->_get('p') || 1;
        $page_number = 30;
        $model_log = MONK::getSingleton('Admin_Model_Log');
        $logs = $model_log->get_page($page,$page_number);
        $this->assign('logs',$logs);
        $this->assign('pager',$this->getDefaultPageLink(array(),$logs['recordCount'],$page,$page_number));
        $this->render();
    }

    public function actionDelete(){
        $this->_setType(array('id'=>PARAM_UINT));
        $model_log = MONK::getSingleton('Admin_Model_Log');
        $model_log->delete($this->_get('id'));
        return $this->redirect(MONK::_url('*/list',array('r'=>'success')));
    }

    public function actionClear(){
        $model_log = MONK::getSingleton('Admin_Model_Log');
        $model_log->clear();
        return $this->redirect(MONK::getReferer());
    }
}