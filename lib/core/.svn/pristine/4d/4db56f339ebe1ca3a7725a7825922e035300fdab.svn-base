<?php
if (!defined('MONK_VERSION')) exit('Access is no allowed.');
/**
* 控制器内调用规则
* rander(array(),'view'); 默认
* rander(array('xx'=>xx,'json')); xx为视图配置参数,包含type,file(可选)等等，一般性传入由assign($key,$value);
*
* view type 结构性总览
* 3种类型
* default 默认视图类型，属于每个app下标准视图结构
*   appname
*       views
*           theme
*               layout 布局文件
*               block 区块文件
*               controller
*                   action.php 标准控制器对应文件
* remote 远程文件
*   file 远程文件路径
* root 根目录全局视图，风格等同于默认
*   根目录
*       views
*           theme
*               layout 布局文件
*               block 区块文件
*               filename.php 对应文件
* 编译文件规范
*   根目录
*       c_views
*           type 编译视图的类型TYPE_DEFAULT，TYPE_REMOTE，TYPE_ROOT
*           TYPE_DEFAULT
*           TYPE_ROOT
*           TYPE_REMOTE
*               filename
* 约束1，layout文件必须和@page layout='xxx'在同一个views路径下
*/

//BigPipe ，页面分段输出
class view{
    private $theme; //风格目录名称
    private $filePath;//模板文件路径 name
    private $viewFile;//模板文件绝对路径
    private $compileFile;//编译文件路径
    private $themePath;//模板路径

    const TYPE_DEFAULT  = 'default';
    const TYPE_REMOTE   = 'remote';
    const TYPE_ROOT     = 'root';


    public function assign($key, $val=null){
        if(is_string($key)){
            $this->vars[$key] = $val;
        }else if(is_array($key)){
            foreach($key as $k => $v){
                $this->vars[$k] = $v;
            }
        }
    }

    public function setPath($path, $theme = 'default'){
        if(!is_dir($path.MONK::getConfig('view_dir_name')))
            throw new Exception('模板目录不存在，路径为`'.$path.MONK::getConfig('view_dir_name').'`',CORE_VIEW_EC_VIEW_NOT_EXISTS);
        if(!is_dir($path.MONK::getConfig('view_dir_name').DS.$theme))
            throw new Exception('风格目录不存在，路径为`'.$path.MONK::getConfig('view_dir_name').DS.$theme.'`',CORE_VIEW_EC_THEME_NOT_EXISTS);

        $this->themePath = $path.MONK::getConfig('view_dir_name').DS.$theme.DS;
    }
    /*  base::代表跟目录下的views
    *   scheme://user:pass@host
    *   app://
    *   remote url
    *   $param = array(
    *       'type' => 'remote'
    *       'file'  => '...'               
    *   )
    *   root view
    *   $param = array(
    *       'type'  => 'root',
    *       'theme' => '...' 可以为空
    *       'filename'  => '...'
    *   )
    *   一般状况下
    *   $param = array(
    *       'type'  => 'default',
    *       'app'   => '...', 可以为空
    *       'theme' => '...', 可以为空
    *       'controller'=> '...' 可以为空
    *       'action'=> '...' 可以为空
    *   )
    */
    public function _view($param = array()){
        if(empty($param['type'])) $param['type'] = self::TYPE_DEFAULT;

        if($param['type']==self::TYPE_REMOTE){
            $this->viewFile = $param['file'];
        }elseif($param['type']==self::TYPE_ROOT){
            $this->setPath(MONK_ROOT, empty($param['theme'])?MONK::getConfig('theme'):$param['theme']);
            $this->filePath = strtolower($param['filename']);
            $this->viewFile = $this->themePath.$this->filePath.DS.MONK::getConfig('view_file_subfix');
        }else{
            $app = empty($param['app'])?MONK::getConfig('app'):$param['app'];
            $theme = empty($param['theme'])?MONK::getConfig('theme'):$param['theme'];
            $controller = empty($param['controller'])?MONK::getConfig('controller'):$param['controller'];
            $action = empty($param['action'])?MONK::getConfig('action'):$param['action'];
            $this->setPath(MONK_APP.$app.DS, $theme);
            $this->filePath = strtolower($controller).DS.strtolower($action);
            $this->viewFile = $this->themePath.$this->filePath.DS.MONK::getConfig('view_file_subfix');
        }   

        
        if(MONK::getConfig('run_model') == 'debug'){
            $this->compileFile = $this->getComplieFile($this->viewFile,$param['type']);
            call_user_func_array(array($this,'view_parse_'.$param['type']), array());
        }else{
            $this->compileFile = $this->getComplieFile($this->viewFile,$param['type']);
            if(!is_file($this->compileFile))
                call_user_func_array(array($this,'view_parse_'.$param['type']), array());
        }

        $this->_show();
    }

    private function _show(){
        foreach($this->vars as $key=>$val){
            $$key = $val;
        }
        include($this->compileFile);
    }
    
    public function _blockView($param = array()){
        if(empty($param['type'])) $param['type'] = self::TYPE_DEFAULT;

        $app = empty($param['app'])?MONK::getConfig('app'):$param['app'];
        $theme = empty($param['theme'])?MONK::getConfig('theme'):$param['theme'];
        $block = empty($param['block'])?MONK::getConfig('block'):$param['block'];
        $this->setPath(MONK_APP.$app.DS, $theme);
        $this->filePath = strtolower($block);
        $this->viewFile = $this->themePath.'block'.DS.$this->filePath.MONK::getConfig('view_file_subfix');
        return $this->view_parse_block();
    }

    private function view_parse_default(){
        $filecontent = $this->view_filecontent($this->filePath);
        call_user_func_array(array($this,'parse_'.$filecontent['type']), array($filecontent));
    }

    private function view_parse_block(){
        return file_get_contents($this->viewFile);
    }

    private function view_parse_remote(){
        return file_put_contents($this->compileFile, file_get_contents($this->viewFile));
    }

    private function view_parse_root(){
        $this->view_parse_default();
    }

    private function view_parse_layout($content,$layout){
        //解析 layout
        if($layout != ''){
            $contents=array();
            $preg_pattern='/\<\!\-\-\{content\s+([a-z0-9_\/]+)\}\-\-\>([\s\S]+?)\<\!\-\-{\/content}\-\-\>/ie';
            if(preg_match_all($preg_pattern, $content, $tcontent)){
                foreach($tcontent[1] as $matchcontent){
                    $contents[$matchcontent]='';
                }
                for($i=0;$i<count($tcontent[2]);$i++){
                    $contents[$tcontent[1][$i]]=$tcontent[2][$i];
                }
            }
            $contentwithlayout = file_get_contents($this->getLayout($layout));
            if(preg_match_all('/\<\!\-\-\{contentplaceholderid ([\S]+)\}\-\-\>/ie',$contentwithlayout,$holdermatchs)){

                foreach($holdermatchs[1] as $holdermatch){
                    $contentwithlayout = preg_replace(
                        "/\<\!\-\-\{contentplaceholderid $holdermatch\}\-\-\>/i",
                        isset($contents[$holdermatch]) ? $contents[$holdermatch] : '',
                        $contentwithlayout
                    );
                }
            }
            $filecontent = $this->view_filecontent('layout'.DS.$layout);
            $content = $this->view_parse_layout($contentwithlayout,$filecontent['layout']);
        }
        return $content;
	}

    private function getComplieFile($viewFile, $type = self::TYPE_DEFAULT){
        $compile_dir = MONK::getConfig('compile_dir');
        if(!is_dir($compile_dir.$type))
            throw new Exception('模板编译目录不存在，路径为`'.$compile_dir.$type.'`',CORE_VIEW_EC_C_VIEW_NOT_EXISTS);
        return $compile_dir.$type.DS.md5($viewFile);
    }

    private function getLayout($name){
        return $this->themePath.MONK::getConfig('layout_dir_name').DS.$name.MONK::getConfig('view_file_subfix');
    }

    private function view_filecontent($name) {
        $array=array('name'=>$name,'type'=>'','layout'=>'','content'=>'');
        $filename = $this->themePath.$name.MONK::getConfig('view_file_subfix');
        $content = file_get_contents($filename);
        if(preg_match('/^\<\!\-\-\{\@([layout|page]+)( layout=\'([^\']+?)\'){0,1}\}\-\-\>/ie', $content, $filetype)){
            if(empty($filetype[1])) throw new Exception('该模板文件没有类型标识，路径为`'.$filename.'`',CORE_VIEW_EC_C_VIEW_NO_TYPE);
            $array['type']=$filetype[1];
            if(isset($filetype[2]) && empty($filetype[3])) throw new Exception('该模板文件的布局文件有误，路径为`'.$filename.'`',CORE_VIEW_EC_C_VIEW_NO_LAYOUT);
            $array['layout']=isset($filetype[3])?$filetype[3]:'';
            //$content = preg_replace('/^\<\!\-\-\{\@([\s\S]+?)\}\-\-\>/i','',$content);
            $array['content']=$content;
        }else{
            echo $filename;
            throw new Exception('该模板文件头信息编写错误，路径为`'.$filename.'`',CORE_VIEW_EC_C_VIEW_NO_META);
        }
        return $array;
    }

    private function parse_block($filecontent){
        $this->parse_page($filecontent);
    }

    private function parse_page($filecontent){
        $content = $this->view_parse_layout($filecontent['content'],$filecontent['layout']);
        $content = preg_replace('/^\<\!\-\-\{\@([\s\S]+?)\}\-\-\>/i','',$content);
        //如果存在全局模板配置，那么加入到全局模板
        if(Monk::getConfig('auto_root_view')){
            $root_content = file_get_contents(MONK_ROOT.MONK::getConfig('view_dir_name').DS.MONK::getConfig('theme').DS.MONK::getConfig('root_view_file').MONK::getConfig('view_file_subfix'));
            $content = str_replace('<!--{contentplaceholderid appcontent}-->', $content, $root_content);
        }

        //解析模板中的block
        $preg_pattern='/\<\!\-\-\{block name=\'([^\']+?)\' uri=\'([^\']+?)\'\}\-\-\>/ie';
        if(preg_match_all($preg_pattern,$content,$bcontent)){
            //支持区块缓存对象
            foreach($bcontent[2] as $key => $blockuri){
                $block_uri_array = explode('/',$blockuri);
                $new_block = Monk::getSingleton(ucfirst($block_uri_array[0]).'_Block_'.ucfirst($block_uri_array[1]));
                $new_block->name = $block_uri_array[1];
                $block_content = $new_block->init();
                $content = str_replace($bcontent[0][$key], $block_content, $content);
            }
        }
        
        file_put_contents($this->compileFile, trim($content));
    }
    
    //动态模板引入
    public function import($filePath, $params){
        foreach($params as $key=>$val){
            $$key = $val;
        }
        include($this->themePath.DS.$filePath.MONK::getConfig('view_file_subfix'));
    }
}
