<?php
class Admin_Model_Account extends model {

    private $sqls = array(
        'count' => 'select count(1) from `sys_account`',
        'get_page' => 'select `aid`,`aname` from `sys_account` order by `updated` desc limit [@page_index],[@page_size];',
        'get' => 'select `aid`,`aname`,`apwd` from `sys_account` where `aid`=[@aid]',
    );

    public function __construct(){
        parent::__construct();
    }

    public function get_page($page = 1, $page_size = 10){
        $page_index = ($page>=1)?($page-1)*$page_size:0;
        $data = array();
        $rc = mysql::fetch('sys_account',$this->sqls['count']);
        $data['recordCount'] = $rc[0]['count(1)'];
        $data['list'] = mysql::fetch('sys_account', $this->sqls['get_page'], array('page_index'=>$page_index, 'page_size'=>$page_size));
        return $data;
    }

    public function get($aid){
        $record = mysql::fetch('sys_account', $this->sqls['get'], array('aid'=>$aid));
        if(!empty($record))
            return array_shift($record);
        else
            return false;
    }

}