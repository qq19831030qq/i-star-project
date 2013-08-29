<?php
class Admin_Controller_Account extends Admin_Controller_Base{

    public function init(){
        parent::init();
    }

    public function actionList(){
        //获取节目列表
        $this->_setType(array('p'=>PARAM_UINT));
        $page = $this->_get('p') || 1;
        $page_number = 30;
        $model_account = MONK::getSingleton('Admin_Model_Account');
        $accounts = $model_account->get_page($page,$page_number);
        $this->assign('accounts',$accounts);
        $this->assign('pager',$this->getDefaultPageLink(array(),$accounts['recordCount'],$page,$page_number));
        $this->render();
    }

    public function actionAddadmin(){
        $this->_setType(array('aid'=>PARAM_UINT));
        $aid = $this->_get('aid');
        $model_account = MONK::getSingleton('Admin_Model_Account');
        $account = $model_account->get($aid);
        $model_admin = MONK::getSingleton('Admin_Model_Admin');
        $id = $model_admin->create(array('aid'=>$aid,'account'=>json_encode($account)));
        return $this->redirect(MONK::getReferer());
    }
}