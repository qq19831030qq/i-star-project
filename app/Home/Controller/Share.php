<?php
class Home_Controller_Share extends Home_Controller_Base {
    public function init(){
        parent::init();
    }
    
    //关注的动态
    public function actionFollow(){
        $this->assign('menu','share');
        $this->render();
    }

    //最热+推荐
    public function actionHot(){
        $this->assign('menu','share');
        $this->render();
    }
    
    //最新+推荐
    public function actionNew(){
        $this->assign('menu','share');
        $this->render();
    }
    
    //综艺
    public function actionVariety(){
        $this->assign('menu','share');
        $this->render();
    }
    
    //影视
    public function actionFilm(){
        $this->assign('menu','share');
        $this->render();
    }

    //nba
    public function actionNba(){
        $this->assign('menu','share');
        $this->render();
    }

    //选美
    public function actionBeauty(){
        $this->assign('menu','share');
        $this->render();
    }
    
    //首页直接跳转到最热页
    public function actionIndex(){
        return $this->redirect(MONK::_url('*/hot'));
    }

    public function actionDetail(){
        $this->render();
    }
}