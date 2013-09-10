<?php
class Home_Controller_Base extends controller {
    public function init(){
       parent::init();
       $this->assign('menu','');
    }
}