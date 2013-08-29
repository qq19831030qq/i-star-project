<?php
class Admin_Controller_Program extends Admin_Controller_Base{

    public function init(){
        parent::init();
    }

    public function actionList(){
        $model_program = MONK::getSingleton('Admin_Model_Program');
        $this->assign('programs',$model_program->get_list());
        $this->render();
    }

    public function actionAdd(){
        $this->_setType(array('id'=>PARAM_UINT));
        $this->assign('id',$this->_get('id'));
        //获取节目区域及分类
        $model_programarea = MONK::getSingleton('Admin_Model_Programarea');
        $this->assign('programareas',$model_programarea->get_list());
        $model_programcategory = MONK::getSingleton('Admin_Model_Programcategory');
        $this->assign('programcategorys',$model_programcategory->get_list());
        $this->render();
    }

    public function actionAdd_POST(){
        $this->_setType(array('p_c_mix'=>PARAM_STRING,'p_a_mix'=>PARAM_STRING,'name'=>PARAM_STRING),'post');
        $p_c_mix = explode(JSON_MIX,$this->_post('p_c_mix'));
        $p_a_mix = explode(JSON_MIX,$this->_post('p_a_mix'));
        //上传开始
        $s_uploader = new uploader_file($_FILES['logo'],'logo');
        $logo = md5($s_uploader->filename().time()).'.'.$s_uploader->extname();
        $s_uploader->move(MONK_UPLOAD.'program'.DS.$logo);
        //上传结束
        $model_program = MONK::getSingleton('Admin_Model_Program');
        $id = $model_program->create(array('p_c_id'=>$p_c_mix[0],'p_c'=>$p_c_mix[1],'p_a_id'=>$p_a_mix[0],'p_a'=>$p_a_mix[1],'name'=>$this->_post('name'),'logo'=>$logo));
        return $this->redirect(MONK::_url('*/add',array('id'=>$id)));
    }

    public function actionEdit(){
        $this->_setType(array('id'=>PARAM_UINT));
        $model_program = MONK::getSingleton('Admin_Model_Program');
        $this->assign('program',$model_program->get($this->_get('id')));
        //获取节目区域及分类
        $model_programarea = MONK::getSingleton('Admin_Model_Programarea');
        $this->assign('programareas',$model_programarea->get_list());
        $model_programcategory = MONK::getSingleton('Admin_Model_Programcategory');
        $this->assign('programcategorys',$model_programcategory->get_list());
        $this->render();
    }

    public function actionEdit_POST(){
        $this->_setType(array('id'=>PARAM_UINT,'old_logo'=>PARAM_STRING,'p_c_mix'=>PARAM_STRING,'p_a_mix'=>PARAM_STRING,'name'=>PARAM_STRING),'post');
        $p_c_mix = explode(JSON_MIX,$this->_post('p_c_mix'));
        $p_a_mix = explode(JSON_MIX,$this->_post('p_a_mix'));
        $data = array('p_c_id'=>$p_c_mix[0],'p_c'=>$p_c_mix[1],'p_a_id'=>$p_a_mix[0],'p_a'=>$p_a_mix[1],'name'=>$this->_post('name'));
        //上传开始
        if(!empty($_FILES['logo']['name'])){
            $s_uploader = new uploader_file($_FILES['logo'],'logo');
            $logo = md5($s_uploader->filename().time()).'.'.$s_uploader->extname();
            $s_uploader->move(MONK_UPLOAD.'program'.DS.$logo);
            unlink(MONK_UPLOAD.'program'.DS.$this->_post('old_logo'));
            $data['logo'] = $logo;
        }
        //上传结束
        $model_program = MONK::getSingleton('Admin_Model_Program');
        $model_program->update($this->_post('id'),$data);
        return $this->redirect(MONK::_url('*/edit',array('id'=>$this->_post('id'),'r'=>'success')));
    }

    public function actionDelete(){
        $this->_setType(array('id'=>PARAM_UINT,'logo'=>PARAM_STRING));
        $model_program = MONK::getSingleton('Admin_Model_Program');
        $model_program->delete($this->_get('id'));
        unlink(MONK_UPLOAD.'program'.DS.$this->_get('logo'));
        return $this->redirect(MONK::_url('*/list',array('r'=>'success')));
    }
}