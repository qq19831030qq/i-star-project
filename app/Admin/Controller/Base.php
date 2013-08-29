<?php
class Admin_Controller_Base extends controller{
    public function init(){
        $this->assign('menu',$this->getMenu());
        parent::init();
    }

    protected function getMenu(){
        return array(
            array(
                'level'     => 1,
                'name'      => 'star',
                'has_url'   => 0,
            ),
            array(
                'level'     => 2,
                'name'      => '新秀管理',
                'has_url'   => 1,
                'url'       => MONK::_url('star/list')
            ),
            array(
                'level'     => 2,
                'name'      => '节目管理',
                'has_url'   => 1,
                'url'       => MONK::_url('program/list')
            ),
            array(
                'level'     => 2,
                'name'      => '节目分类管理',
                'has_url'   => 1,
                'url'       => MONK::_url('programcategory/list')
            ),
            array(
                'level'     => 2,
                'name'      => '节目区域管理',
                'has_url'   => 1,
                'url'       => MONK::_url('programarea/list')
            ),
            array(
                'level'     => 1,
                'name'      => 'fans',
                'has_url'   => 0,
            ),
            array(
                'level'     => 2,
                'name'      => '粉丝管理',
                'has_url'   => 1,
                'url'       => MONK::_url('fans/list')
            ),
            array(
                'level'     => 1,
                'name'      => 'share',
                'has_url'   => 0,
            ),
            array(
                'level'     => 2,
                'name'      => '分享管理',
                'has_url'   => 1,
                'url'       => MONK::_url('share/list')
            ),
            array(
                'level'     => 2,
                'name'      => '杂志管理',
                'has_url'   => 1,
                'url'       => MONK::_url('sharecollection/list')
            ),
            array(
                'level'     => 2,
                'name'      => '秀刊管理',
                'has_url'   => 1,
                'url'       => MONK::_url('starsharecollection/list')
            ),
            array(
                'level'     => 1,
                'name'      => 'ad',
                'has_url'   => 0,
            ),
            array(
                'level'     => 2,
                'name'      => '幻灯管理',
                'has_url'   => 1,
                'url'       => MONK::_url('slider/list')
            ),
            array(
                'level'     => 1,
                'name'      => 'system',
                'has_url'   => 0,
            ),
            array(
                'level'     => 2,
                'name'      => '帐套管理',
                'has_url'   => 1,
                'url'       => MONK::_url('account/list')
            ),
            array(
                'level'     => 2,
                'name'      => '管理员',
                'has_url'   => 1,
                'url'       => MONK::_url('admin/list')
            ),
            array(
                'level'     => 2,
                'name'      => '日志',
                'has_url'   => 1,
                'url'       => MONK::_url('log/list')
            ),
        );
    }
    
    protected function getDefaultPageLink($indexArr, $totalCount, $page = 1, $pageSize = 10){
        $pages = ceil($totalCount/$pageSize);
        $p_l = '';
        for($i=1;$i<=$pages;$i++){
            if($i == $page){
                $p_l .= '<span>'.$i.'</span>';
            }else{
                $p_l .= '<a href="'.MONK::_url('*/list', $indexArr+array('p'=>$i)).'">'.$i.'</a>';
            }
        }
        return $p_l;
    }
}
