<?php
class Admin_Model_Program extends model {

    private $sqls = array(
        'get_list' => 'select `id`,`p_c_id`,`p_a_id`,`p_c`,`p_a`,`name`,`logo` from `core_program`',
        'create' => 'insert into `core_program`(`p_c_id`,`p_a_id`,`p_c`,`p_a`,`name`,`logo`,`created`,`updated`) values([@p_c_id],[@p_a_id],[@p_c],[@p_a],[@name],[@logo],[@created],[@updated])',
        'get' => 'select `id`,`p_c_id`,`p_a_id`,`p_c`,`p_a`,`name`,`logo` from `core_program` where `id`=[@id]',
        'update' => 'update `core_program` set {{@set}} where `id` = [@id]',
        'delete'  => 'delete from `core_program` where `id` = [@id]',
    );

    public function __construct(){
        parent::__construct();
    }

    public function get_list(){
        return mysql::fetch('core_program', $this->sqls['get_list']);
    }

    public function create($data){
        $data['created'] = $data['updated'] = time();
        mysql::execute('core_program', $this->sqls['create'], $data);
        return mysql::insertId();
    }

    public function get($id){
        $record = mysql::fetch('core_program', $this->sqls['get'], array('id'=>$id));
        if(!empty($record))
            return array_shift($record);
        else
            return false;
    }

    public function update($id, $data){
        $set = array();
        $data['updated'] = time();
        foreach($data as $key=>$value){
            $set[] = '`'.$key.'` = [@'.$key.']';
        }
        $sql = str_replace('{{@set}}',implode(',',$set),$this->sqls['update']);
        mysql::execute('core_program', $sql, $data+array('id'=>$id));
        return true;
    }

    public function delete($id){
        mysql::execute('core_program', $this->sqls['delete'], array('id'=>$id));
        return true;
    }
}