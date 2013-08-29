<?php
class Admin_Controller_Share extends Admin_Controller_Base{

    public function init(){
        parent::init();
    }

    public function actionList(){
        $this->_setType(array('p'=>PARAM_UINT));
        $page = $this->_get('p') || 1;
        $page_number = 30;
        $model_share = MONK::getSingleton('Admin_Model_Share');
        $shares = $model_share->get_page($page,$page_number);
        $this->assign('shares',$shares);
        $this->assign('pager',$this->getDefaultPageLink(array(),$shares['recordCount'],$page,$page_number));
        $this->render();
    }

    public function actionAdd(){
        $this->_setType(array('id'=>PARAM_UINT,'uid'=>PARAM_UINT));
        $this->assign('id',$this->_get('id'));
        //获取杂志
        $model_sharecollection = MONK::getSingleton('Admin_Model_Sharecollection');
        $this->assign('sharecollections',$model_sharecollection->get_list_by_uid($this->_get('uid')));
        $this->render();
    }

    public function actionAdd_POST(){
        $this->_setType(array('uid'=>PARAM_UINT));
        $uid = $this->_get('uid');
        $this->_setType(array('sid'=>PARAM_UINT,'sharecollection_mix'=>PARAM_STRING,'desc'=>PARAM_STRING),'post');
        //上传开始
        $img_group = array();
        $m_uploader = new uploader();
        $files = $m_uploader->allfiles();
        foreach($files as $key=>$file){
            $fname = md5($file->filename().$key.time()).'.'.$file->extname();
            $img_group[$key] = $fname;
        }
        //上传结束
        $model_fans = MONK::getSingleton('Admin_Model_Fans');
        $fans = $model_fans->get($uid);
        $sid = $this->_post('sid');
        $model_star = MONK::getSingleton('Admin_Model_Star');
        $star = $model_star->get($sid);
        $data = array('uid'=>$uid,'fans'=>json_encode($fans),'sid'=>$sid,'star'=>json_encode($star),'desc'=>$this->_post('desc'),'img_group'=>json_encode($img_group));
        $sharecollection_mix = $this->_post('sharecollection_mix');
        if(!empty($sharecollection_mix)){
            $sharecollection_mix = explode(JSON_MIX,$sharecollection_mix);
            $data['s_c_id'] = $sharecollection_mix[0];
            $data['share_collection'] = $sharecollection_mix[1];
        }else{
            $data['s_c_id'] = 0;
            $data['share_collection'] = '';
        }
        $model_share = MONK::getSingleton('Admin_Model_Share');
        $id = $model_share->create($data);
        $dir = MONK_UPLOAD.'share'.DS.md5($id).DS;
        mkdir($dir);
        foreach($files as $key=>$file){
            $file->move($dir.$img_group[$key]);
        }
        return $this->redirect(MONK::_url('*/add',array('id'=>$id)));
    }

    public function actionEdit(){
        $this->_setType(array('id'=>PARAM_UINT,'uid'=>PARAM_UINT));
        $model_share = MONK::getSingleton('Admin_Model_Share');
        $this->assign('share',$model_share->get($this->_get('id')));
        $model_sharecollection = MONK::getSingleton('Admin_Model_Sharecollection');
        $this->assign('sharecollections',$model_sharecollection->get_list_by_uid($this->_get('uid')));
        $this->render();
    }

    public function actionEdit_POST(){
        $this->_setType(array('id'=>PARAM_UINT,'uid'=>PARAM_UINT,'old_sid'=>PARAM_UINT,'img_group'=>PARAM_STRING,'sid'=>PARAM_UINT,'sharecollection_mix'=>PARAM_STRING,'desc'=>PARAM_STRING),'post');
        $id = $this->_post('id');
        $dir = MONK_UPLOAD.'share'.DS.md5($id).DS;
        //上传开始
        $img_group = json_decode($this->_post('img_group'),true);
        $m_uploader = new uploader();
        $files = $m_uploader->allfiles();
        foreach($files as $key=>$file){
            $fname = md5($file->filename().$key.time()).'.'.$file->extname();
            unlink($dir.$img_group[$key]);
            $img_group[$key] = $fname;
        }
        //上传结束
        $data = array('desc'=>$this->_post('desc'),'img_group'=>json_encode($img_group));
        $sid = $this->_post('sid');
        $old_sid = $this->_post('old_sid');
        if($old_sid!=$sid){       
            $model_star = MONK::getSingleton('Admin_Model_Star');
            $star = $model_star->get($sid);
            $data['sid'] = $sid;
            $data['star'] = json_encode($star);
        }
        $sharecollection_mix = $this->_post('sharecollection_mix');
        if(!empty($sharecollection_mix)){
            $sharecollection_mix = explode(JSON_MIX,$sharecollection_mix);
            $data['s_c_id'] = $sharecollection_mix[0];
            $data['share_collection'] = $sharecollection_mix[1];
        }else{
            $data['s_c_id'] = 0;
            $data['share_collection'] = '';
        }
        $model_share = MONK::getSingleton('Admin_Model_Share');
        $r = $model_share->update($id,$data);
        foreach($files as $key=>$file){
            $file->move($dir.$img_group[$key]);
        }
        return $this->redirect(MONK::_url('*/edit',array('id'=>$id,'uid'=>$this->_post('uid'),'r'=>'success')));
    }

    public function actionDelete(){
        $this->_setType(array('id'=>PARAM_UINT));
        $id = $this->_get('id');
        $model_share = MONK::getSingleton('Admin_Model_Share');
        $model_share->delete($id);
        rrmdir(MONK_UPLOAD.'share'.DS.md5($id).DS);
        return $this->redirect(MONK::_url('*/list',array('r'=>'success')));
    }
}