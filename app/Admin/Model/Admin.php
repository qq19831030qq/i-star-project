<?php
class Admin_Model_Admin extends model {

    private $sqls = array(
        'get_list' => 'select `id`,`aid`,`account` from `sys_admin` order by `updated`;',
        'create' => 'insert into `sys_admin`(`aid`,`account`,`created`,`updated`) values([@aid],[@account],[@created],[@updated])',
        'delete'  => 'delete from `sys_admin` where `id` = [@id]',
    );

    public function __construct(){
        parent::__construct();
    }

    public function get_list(){
        return mysql::fetch('sys_admin', $this->sqls['get_list']);
    }

    public function create($data){
        $data['created'] = $data['updated'] = time();
        mysql::execute('sys_admin', $this->sqls['create'], $data);
        return mysql::insertId();
    }

    public function delete($id){
        mysql::execute('core_program', $this->sqls['delete'], array('id'=>$id));
        return true;
    }

}