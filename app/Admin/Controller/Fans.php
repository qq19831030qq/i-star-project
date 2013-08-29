<?php
class Admin_Controller_Fans extends Admin_Controller_Base{

    public function init(){
        parent::init();
    }

    public function actionList(){
        $this->_setType(array('p'=>PARAM_UINT));
        $page = $this->_get('p') || 1;
        $page_number = 30;
        $model_fans = MONK::getSingleton('Admin_Model_Fans');
        $fans = $model_fans->get_page($page,$page_number);
        $this->assign('fans',$fans);
        $this->assign('pager',$this->getDefaultPageLink(array(),$fans['recordCount'],$page,$page_number));
        $this->render();
    }

    public function actionAdd(){
        $this->_setType(array('uid'=>PARAM_UINT));
        $this->assign('uid',$this->_get('uid'));
        $this->render();
    }

    public function actionAdd_POST(){
        $this->_setType(array('aname'=>PARAM_STRING,'apwd'=>PARAM_STRING,'nickname'=>PARAM_STRING),'post');
        //上传开始
        $s_uploader = new uploader_file($_FILES['avatar'],'avatar');
        $avatar = md5($s_uploader->filename().time()).'.'.$s_uploader->extname();
        $s_uploader->move(MONK_UPLOAD.'fans'.DS.$avatar);
        //上传结束
        $a_data = array('aname'=>$this->_post('aname'),'apwd'=>$this->_post('apwd'));
        $_encrypt = MONK::getSingleton('Encrypt');
        $_encrypt->app_key = MONK::getConfig('app_key');
        $a_data['apwd'] = $_encrypt->passwdEncode($a_data['apwd']);
        $model_account = MONK::getSingleton('Admin_Model_Account');
        $model_fans = MONK::getSingleton('Admin_Model_Fans');
        $aid = $model_account->create($a_data);
        $uid = $model_fans->create(array('nickname'=>$this->_post('nickname'),'avatar'=>$avatar,'aid'=>$aid,'account'=>json_encode($a_data+array('aid'=>$aid))));
        return $this->redirect(MONK::_url('*/add',array('uid'=>$uid)));
    }

    public function actionEdit(){
        $this->_setType(array('uid'=>PARAM_UINT));
        $model_fans = MONK::getSingleton('Admin_Model_Fans');
        $this->assign('fans',$model_fans->get($this->_get('uid')));
        $this->render();
    }

    public function actionEdit_POST(){
        $this->_setType(array('aid'=>PARAM_UINT,'uid'=>PARAM_UINT,'old_avatar'=>PARAM_STRING,'aname'=>PARAM_STRING,'apwd'=>PARAM_STRING,'old_apwd'=>PARAM_STRING,'nickname'=>PARAM_STRING),'post');
        $aid = $this->_post('aid');
        $a_data = array('aname'=>$this->_post('aname'));
        $apwd = $this->_post('apwd');
        if(!empty($apwd)){
            $_encrypt = MONK::getSingleton('Encrypt');
            $_encrypt->app_key = MONK::getConfig('app_key');
            $a_data['apwd'] = $_encrypt->passwdEncode($apwd);
        }else{
            $a_data['apwd'] = $this->_post('old_apwd');
        }
        $data = array('nickname'=>$this->_post('nickname'),'account'=>json_encode($a_data+array('aid'=>$aid)));
        //上传开始
        if(!empty($_FILES['avatar']['name'])){
            $s_uploader = new uploader_file($_FILES['avatar'],'avatar');
            $avatar = md5($s_uploader->filename().time()).'.'.$s_uploader->extname();
            $s_uploader->move(MONK_UPLOAD.'fans'.DS.$avatar);
            unlink(MONK_UPLOAD.'fans'.DS.$this->_post('old_avatar'));
            $data['avatar'] = $avatar;
        }
        //上传结束
        $model_account = MONK::getSingleton('Admin_Model_Account');
        $model_fans = MONK::getSingleton('Admin_Model_Fans');
        $model_account->update($aid,$a_data);
        $uid = $model_fans->update($this->_post('uid'),$data);
        return $this->redirect(MONK::_url('*/edit',array('uid'=>$this->_post('uid'),'r'=>'success')));
    }

    public function actionDelete(){
        $this->_setType(array('uid'=>PARAM_UINT,'avatar'=>PARAM_STRING));
        $model_account = MONK::getSingleton('Admin_Model_Account');
        $model_fans = MONK::getSingleton('Admin_Model_Fans');
        $model_account->delete($this->_get('aid'));
        $model_fans->delete($this->_get('uid'));
        unlink(MONK_UPLOAD.'fans'.DS.$this->_get('avatar'));
        return $this->redirect(MONK::_url('*/list',array('r'=>'success')));
    }
}