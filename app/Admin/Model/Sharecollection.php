<?php
class Admin_Model_Sharecollection extends model {

    private $sqls = array(
        'count' => 'select count(1) from `core_share_collection`',
        'get_page' => 'select `id`,`uid`,`fans`,`name` from `core_share_collection` order by `updated` desc limit [@page_index],[@page_size];',
        'create' => 'insert into `core_share_collection`(`uid`,`fans`,`name`,`created`,`updated`) values([@uid],[@fans],[@name],[@created],[@updated])',
        'get' => 'select `id`,`uid`,`fans`,`name` from `core_share_collection` where `id`=[@id]',
        'get_list_by_uid' => 'select `id`,`uid`,`fans`,`name` from `core_share_collection` where `uid`=[@uid]',
        'update' => 'update `core_share_collection` set {{@set}} where `id` = [@id]',
        'delete'  => 'delete from `core_share_collection` where `id` = [@id]',
    );

    public function __construct(){
        parent::__construct();
    }

    public function get_page($page = 1, $page_size = 10){
        $page_index = ($page>=1)?($page-1)*$page_size:0;
        $data = array();
        $rc = mysql::fetch('core_share_collection',$this->sqls['count']);
        $data['recordCount'] = $rc[0]['count(1)'];
        $data['list'] = mysql::fetch('core_share_collection', $this->sqls['get_page'], array('page_index'=>$page_index, 'page_size'=>$page_size));
        return $data;
    }

    public function create($data){
        $data['created'] = $data['updated'] = time();
        mysql::execute('core_share_collection', $this->sqls['create'], $data);
        return mysql::insertId();
    }

    public function get($id){
        $record = mysql::fetch('core_share_collection', $this->sqls['get'], array('id'=>$id));
        if(!empty($record))
            return array_shift($record);
        else
            return false;
    }

    public function get_list_by_uid($uid){
        return mysql::fetch('core_share_collection', $this->sqls['get_list_by_uid'], array('uid'=>$uid));
    }

    public function update($id, $data){
        $set = array();
        $data['updated'] = time();
        foreach($data as $key=>$value){
            $set[] = '`'.$key.'` = [@'.$key.']';
        }
        $sql = str_replace('{{@set}}',implode(',',$set),$this->sqls['update']);
        mysql::execute('core_share_collection', $sql, $data+array('id'=>$id));
        return true;
    }

    public function delete($id){
        mysql::execute('core_share_collection', $this->sqls['delete'], array('id'=>$id));
        return true;
    }
}