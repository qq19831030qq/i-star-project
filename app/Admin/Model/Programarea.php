<?php
class Admin_Model_Programarea extends model {

    public function __construct(){
        parent::__construct();
    }

    public function get_list(){
         return array(
             array('id'=>1,'name'=>'内地'),
             array('id'=>2,'name'=>'港台'),
             array('id'=>3,'name'=>'欧美'),
             array('id'=>4,'name'=>'亚洲'),
         );
    }
}