<?php
class Admin_Controller_Star extends Admin_Controller_Base{

    public function init(){
        parent::init();
    }

    public function actionList(){
        //获取节目列表
        $this->_setType(array('p'=>PARAM_UINT));
        $page = $this->_get('p') || 1;
        $page_number = 30;
        $model_star = MONK::getSingleton('Admin_Model_Star');
        $stars = $model_star->get_page($page,$page_number);
        $this->assign('stars',$stars);
        $this->assign('pager',$this->getDefaultPageLink(array(),$stars['recordCount'],$page,$page_number));
        $this->render();
    }

    public function actionAdd(){
        $this->_setType(array('id'=>PARAM_UINT));
        $this->assign('id',$this->_get('id'));
        //获取节目列表
        $model_program = MONK::getSingleton('Admin_Model_Program');
        $this->assign('programs',$model_program->get_list());
        $this->render();
    }

    public function actionAdd_POST(){
        $this->_setType(array('program_mix'=>PARAM_STRING,'truename'=>PARAM_STRING,'nickname'=>PARAM_STRING,'fans_tag'=>PARAM_STRING),'post');
        $program_mix = explode(JSON_MIX,$this->_post('program_mix'));
        //上传开始
        $s_uploader = new uploader_file($_FILES['avatar'],'avatar');
        $avatar = md5($s_uploader->filename().time()).'.'.$s_uploader->extname();
        $s_uploader->move(MONK_UPLOAD.'star'.DS.$avatar);
        //上传结束
        $model_star = MONK::getSingleton('Admin_Model_Star');
        $id = $model_star->create(array('truename'=>$this->_post('truename'),'nickname'=>$this->_post('nickname'),'fans_tag'=>$this->_post('fans_tag'),'pid'=>$program_mix[0],'program'=>$program_mix[1],'avatar'=>$avatar));
        return $this->redirect(MONK::_url('*/add',array('id'=>$id)));
    }

    public function actionEdit(){
        $this->_setType(array('id'=>PARAM_UINT));
        $model_star = MONK::getSingleton('Admin_Model_Star');
        $this->assign('star',$model_star->get($this->_get('id')));
        //获取节目列表
        $model_program = MONK::getSingleton('Admin_Model_Program');
        $this->assign('programs',$model_program->get_list());
        $this->render();
    }

    public function actionEdit_POST(){
        $this->_setType(array('id'=>PARAM_UINT,'old_avatar'=>PARAM_STRING,'program_mix'=>PARAM_STRING,'truename'=>PARAM_STRING,'nickname'=>PARAM_STRING,'fans_tag'=>PARAM_STRING),'post');
        $program_mix = explode(JSON_MIX,$this->_post('program_mix'));
        $data = array('truename'=>$this->_post('truename'),'nickname'=>$this->_post('nickname'),'fans_tag'=>$this->_post('fans_tag'),'pid'=>$program_mix[0],'program'=>$program_mix[1]);
        //上传开始
        if(!empty($_FILES['avatar']['name'])){
            $s_uploader = new uploader_file($_FILES['avatar'],'avatar');
            $avatar = md5($s_uploader->filename().time()).'.'.$s_uploader->extname();
            $s_uploader->move(MONK_UPLOAD.'star'.DS.$avatar);
            unlink(MONK_UPLOAD.'star'.DS.$this->_post('old_avatar'));
            $data['avatar'] = $avatar;
        }
        //上传结束
        $model_star = MONK::getSingleton('Admin_Model_Star');
        $id = $model_star->update($this->_post('id'),$data);
        return $this->redirect(MONK::_url('*/edit',array('id'=>$this->_post('id'),'r'=>'success')));
    }

    public function actionDelete(){
        $this->_setType(array('id'=>PARAM_UINT,'avatar'=>PARAM_STRING));
        $model_star = MONK::getSingleton('Admin_Model_Star');
        $model_star->delete($this->_get('id'));
        unlink(MONK_UPLOAD.'star'.DS.$this->_get('avatar'));
        return $this->redirect(MONK::_url('*/list',array('r'=>'success')));
    }
}