<?php
class Admin_Model_Programcategory extends model {

    public function __construct(){
        parent::__construct();
    }

    public function get_list(){
         return array(
             array('id'=>1,'name'=>'综艺'),
             array('id'=>3,'name'=>'NBA'),
             array('id'=>4,'name'=>'选美大赛'),
             array('id'=>9,'name'=>'其他'),
         );
    }
}