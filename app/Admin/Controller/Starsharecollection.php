<?php
class Admin_Controller_Starsharecollection extends Admin_Controller_Base{

    public function init(){
        parent::init();
    }

    public function actionList(){
        $this->_setType(array('p'=>PARAM_UINT));
        $page = $this->_get('p') || 1;
        $page_number = 30;
        $model_starsharecollection = MONK::getSingleton('Admin_Model_Starsharecollection');
        $starsharecollections = $model_starsharecollection->get_page($page,$page_number);
        $this->assign('starsharecollections',$starsharecollections);
        $this->assign('pager',$this->getDefaultPageLink(array(),$starsharecollections['recordCount'],$page,$page_number));
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
        $model_fans = MONK::getSingleton('Admin_Model_Fans');
        $fans = $model_fans->get($uid);
        $this->_setType(array('sid'=>PARAM_UINT,'name'=>PARAM_STRING),'post');
        $sid = $this->_post('sid');
        $model_star = MONK::getSingleton('Admin_Model_Star');
        $star = $model_star->get($sid);
        $model_starsharecollection = MONK::getSingleton('Admin_Model_Starsharecollection');
        $id = $model_starsharecollection->create(array('uid'=>$uid,'fans'=>json_encode($fans),'sid'=>$sid,'star'=>json_encode($star),'name'=>$this->_post('name')));
        return $this->redirect(MONK::_url('*/add',array('uid'=>$uid,'id'=>$id)));
    }

    public function actionEdit(){
        $this->_setType(array('id'=>PARAM_UINT));
        $model_starsharecollection = MONK::getSingleton('Admin_Model_Starsharecollection');
        $this->assign('starsharecollection',$model_starsharecollection->get($this->_get('id')));
        $this->render();
    }

    public function actionEdit_POST(){
        $this->_setType(array('id'=>PARAM_UINT,'old_sid'=>PARAM_UINT,'sid'=>PARAM_UINT,'name'=>PARAM_STRING),'post');
        $model_starsharecollection = MONK::getSingleton('Admin_Model_Starsharecollection');
        $data = array('name'=>$this->_post('name'));
        $sid = $this->_post('sid');
        $old_sid = $this->_post('old_sid');
        if($old_sid!=$sid){       
            $model_star = MONK::getSingleton('Admin_Model_Star');
            $star = $model_star->get($sid);
            $data['sid'] = $sid;
            $data['star'] = json_encode($star);
        }
        $id = $model_starsharecollection->update($this->_post('id'),$data);
        return $this->redirect(MONK::_url('*/edit',array('id'=>$this->_post('id'),'r'=>'success')));
    }

    public function actionDelete(){
        $this->_setType(array('id'=>PARAM_UINT));
        $model_starsharecollection = MONK::getSingleton('Admin_Model_Starsharecollection');
        $model_starsharecollection->delete($this->_get('id'));
        return $this->redirect(MONK::_url('*/list',array('r'=>'success')));
    }
}