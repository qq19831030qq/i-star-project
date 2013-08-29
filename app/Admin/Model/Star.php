<?php
class Admin_Model_Star extends model {

    private $sqls = array(
        'count' => 'select count(1) from `core_star`',
        'get_page' => 'select `id`,`truename`,`nickname`,`fans_tag`,`pid`,`program`,`avatar` from `core_star` order by `updated` desc limit [@page_index],[@page_size];',
        'create' => 'insert into `core_star`(`truename`,`nickname`,`fans_tag`,`pid`,`program`,`avatar`,`created`,`updated`) values([@truename],[@nickname],[@fans_tag],[@pid],[@program],[@avatar],[@created],[@updated])',
        'get' => 'select `id`,`truename`,`nickname`,`fans_tag`,`pid`,`program`,`avatar` from `core_star` where `id`=[@id]',
        'update' => 'update `core_star` set {{@set}} where `id` = [@id]',
        'delete'  => 'delete from `core_star` where `id` = [@id]',
    );

    public function __construct(){
        parent::__construct();
    }

    public function get_page($page = 1, $page_size = 10){
        $page_index = ($page>=1)?($page-1)*$page_size:0;
        $data = array();
        $rc = mysql::fetch('core_star',$this->sqls['count']);
        $data['recordCount'] = $rc[0]['count(1)'];
        $data['list'] = mysql::fetch('core_star', $this->sqls['get_page'], array('page_index'=>$page_index, 'page_size'=>$page_size));
        return $data;
    }

    public function create($data){
        $data['created'] = $data['updated'] = time();
        mysql::execute('core_star', $this->sqls['create'], $data);
        return mysql::insertId();
    }

    public function get($id){
        $record = mysql::fetch('core_star', $this->sqls['get'], array('id'=>$id));
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
        mysql::execute('core_star', $sql, $data+array('id'=>$id));
        return true;
    }

    public function delete($id){
        mysql::execute('core_star', $this->sqls['delete'], array('id'=>$id));
        return true;
    }
}