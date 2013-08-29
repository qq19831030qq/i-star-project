<?php
class Admin_Controller_Sharecollection extends Admin_Controller_Base{

    public function init(){
        parent::init();
    }

    public function actionList(){
        $this->_setType(array('p'=>PARAM_UINT));
        $page = $this->_get('p') || 1;
        $page_number = 30;
        $model_sharecollection = MONK::getSingleton('Admin_Model_Sharecollection');
        $sharecollections = $model_sharecollection->get_page($page,$page_number);
        $this->assign('sharecollections',$sharecollections);
        $this->assign('pager',$this->getDefaultPageLink(array(),$sharecollections['recordCount'],$page,$page_number));
        $this->render();
    }

    public function actionAdd(){
        $this->_setType(array('id'=>PARAM_UINT));
        $this->assign('id',$this->_get('id'));
        $this->render();
    }

    public function actionAdd_POST(){
        $this->_setType(array('uid'=>PARAM_UINT));
        $uid = $this->_get('uid');
        $this->_setType(array('name'=>PARAM_STRING),'post');
        $model_fans = MONK::getSingleton('Admin_Model_Fans');
        $fans = $model_fans->get($uid);
        $model_sharecollection = MONK::getSingleton('Admin_Model_Sharecollection');
        $id = $model_sharecollection->create(array('uid'=>$uid,'fans'=>json_encode($fans),'name'=>$this->_post('name')));
        return $this->redirect(MONK::_url('*/add',array('uid'=>$uid,'id'=>$id)));
    }

    public function actionEdit(){
        $this->_setType(array('id'=>PARAM_UINT));
        $model_sharecollection = MONK::getSingleton('Admin_Model_Sharecollection');
        $this->assign('sharecollection',$model_sharecollection->get($this->_get('id')));
        $this->render();
    }

    public function actionEdit_POST(){
        $this->_setType(array('id'=>PARAM_UINT,'name'=>PARAM_STRING),'post');
        $model_sharecollection = MONK::getSingleton('Admin_Model_Sharecollection');
        $id = $model_sharecollection->update($this->_post('id'),array('name'=>$this->_post('name')));
        return $this->redirect(MONK::_url('*/edit',array('id'=>$this->_post('id'),'r'=>'success')));
    }

    public function actionDelete(){
        $this->_setType(array('id'=>PARAM_UINT));
        $model_sharecollection = MONK::getSingleton('Admin_Model_Sharecollection');
        $model_sharecollection->delete($this->_get('id'));
        return $this->redirect(MONK::_url('*/list',array('r'=>'success')));
    }
}