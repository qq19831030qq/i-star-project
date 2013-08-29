<?php
if (!defined('MONK_VERSION')) exit('Access is no allowed.');

/*
* 区块类似于控制器
* 区块的数据来自于model
* 区块的视图 views
*
*/
class block{

    public $name = '';

    public function render($param = array()){
        $this->beforeRender();
        $block_content = MONK::getSingleton('view')->_blockView($param + array('block'=>$this->name));
        $this->afterRender();
        return $block_content;
    }

    protected function beforeRender(){
        return true;
    }

    protected function afterRender(){
        return true;
    }

    public function assign($key, $val=null){
        $newkey = 'block_'.$key;
        MONK::getSingleton('view')->assign($newkey,$val);
    }
}

