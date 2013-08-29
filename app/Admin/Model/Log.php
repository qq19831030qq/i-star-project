<?php
class Admin_Model_Log extends model {

    private $sqls = array(
        'count' => 'select count(1) from `sys_log`',
        'get_page' => 'select `id`,`content`,`created` from `sys_log` order by `created` desc limit [@page_index],[@page_size];',
        'create' => 'insert into `sys_log`(`content`,`created`) values([@content],[@created])',
        'delete'  => 'delete from `sys_log` where `id` = [@id]',
        'clear'  => 'delete from `sys_log`',
    );

    public function __construct(){
        parent::__construct();
    }

    public function get_page($page = 1, $page_size = 10){
        $page_index = ($page>=1)?($page-1)*$page_size:0;
        $data = array();
        $rc = mysql::fetch('sys_log',$this->sqls['count']);
        $data['recordCount'] = $rc[0]['count(1)'];
        $data['list'] = mysql::fetch('sys_log', $this->sqls['get_page'], array('page_index'=>$page_index, 'page_size'=>$page_size));
        return $data;
    }

    public function create($data){
        $data['created'] = time();
        mysql::execute('sys_log', $this->sqls['create'], $data);
        return mysql::insertId();
    }

    public function delete($id){
        mysql::execute('sys_log', $this->sqls['delete'], array('id'=>$id));
        return true;
    }

    public function clear(){
        mysql::execute('sys_log', $this->sqls['clear']);
        return true;
    }
}