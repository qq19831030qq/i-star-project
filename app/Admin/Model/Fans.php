<?php
class Admin_Model_Fans extends model {

    private $sqls = array(
        'count' => 'select count(1) from `core_fans`',
        'get_page' => 'select `uid`,`nickname`,`avatar`,`aid`,`account` from `core_fans` order by `updated` desc limit [@page_index],[@page_size];',
        'create' => 'insert into `core_fans`(`nickname`,`avatar`,`aid`,`account`,`created`,`updated`) values([@nickname],[@avatar],[@aid],[@account],[@created],[@updated])',
        'get' => 'select `uid`,`nickname`,`avatar`,`aid`,`account` from `core_fans` where `uid`=[@uid]',
        'update' => 'update `core_fans` set {{@set}} where `uid` = [@uid]',
        'delete'  => 'delete from `core_fans` where `uid` = [@uid]',
    );

    public function __construct(){
        parent::__construct();
    }

    public function get_page($page = 1, $page_size = 10){
        $page_index = ($page>=1)?($page-1)*$page_size:0;
        $data = array();
        $rc = mysql::fetch('core_fans',$this->sqls['count']);
        $data['recordCount'] = $rc[0]['count(1)'];
        $data['list'] = mysql::fetch('core_fans', $this->sqls['get_page'], array('page_index'=>$page_index, 'page_size'=>$page_size));
        return $data;
    }

    public function create($data){
        $data['created'] = $data['updated'] = time();
        mysql::execute('core_fans', $this->sqls['create'], $data);
        return mysql::insertId();
    }

    public function get($uid){
        $record = mysql::fetch('core_fans', $this->sqls['get'], array('uid'=>$uid));
        if(!empty($record))
            return array_shift($record);
        else
            return false;
    }

    public function update($uid, $data){
        $set = array();
        $data['updated'] = time();
        foreach($data as $key=>$value){
            $set[] = '`'.$key.'` = [@'.$key.']';
        }
        $sql = str_replace('{{@set}}',implode(',',$set),$this->sqls['update']);
        mysql::execute('core_fans', $sql, $data+array('uid'=>$uid));
        return true;
    }

    public function delete($uid){
        mysql::execute('core_fans', $this->sqls['delete'], array('uid'=>$uid));
        return true;
    }
}