<!--{@layout layout='base'}-->
<!--{content head}-->
<link rel="stylesheet" type="text/css" media="all" href="<?php echo MONK::include_css("home","/Home/source/styles/home.css",false,true); ?>">
<!--{contentplaceholderid pagehead}-->
<!--{/content}-->
<!--{content content}-->
<div class="page" id="page-<?php echo MONK::getConfig('app'); ?>-<?php echo MONK::getConfig('controller'); ?>-<?php echo MONK::getConfig('action'); ?>">
    <div class="header">
        <div class="container">
            <div class="logo">有新秀</div>
            <div class="top-search">
                <span><input type="text" x-webkit-grammar="builtin:translate" x-webkit-speech placeholder="新秀名" /></span>
                <span><i></i></span>
            </div>
            <div class="nav">
                <ul>
                    <li<?php if($menu=='index'){ ?> class="active"<?php } ?>><a href="<?php echo MONK::_url('index/index'); ?>">首页</a></li>
                    <li id="share" <?php if($menu=='share'){ ?> class="active"<?php } ?>>
                        <a href="<?php echo MONK::_url('share/index'); ?>">新鲜事</a>
                        <div class="sub-nav">
                            <ul class="h-n">
                                <li><a href="<?php echo MONK::_url('share/follow'); ?>">关注动态</a></li>
                                <li><a href="<?php echo MONK::_url('share/hot'); ?>">热门推荐</a></li>
                                <li><a href="<?php echo MONK::_url('share/new'); ?>">今日上新</a></li>
                            </ul>
                            <ul class="cate">
                                <li><a href="<?php echo MONK::_url('share/variety'); ?>">综艺</a></li>
                                <li><a href="<?php echo MONK::_url('share/nba'); ?>">NBA</a></li>
                                <li><a href="<?php echo MONK::_url('share/beauty'); ?>">选美</a></li>
                            </ul>
                        </div>
                    </li>
                    <li<?php if($menu=='sharecollection'){ ?> class="active"<?php } ?>><a href="<?php echo MONK::_url('sharecollection/index'); ?>">秀刊</a></li>
                    <li<?php if($menu=='star'){ ?> class="active"<?php } ?>><a href="<?php echo MONK::_url('star/index'); ?>">找新秀</a></li>
                    <li<?php if($menu=='program'){ ?> class="active"<?php } ?>><a href="<?php echo MONK::_url('program/index'); ?>">找节目</a></li>
                    <li<?php if($menu=='fans'){ ?> class="active"<?php } ?>><a href="<?php echo MONK::_url('fans/index'); ?>">达人</a></li>
                    <li<?php if($menu=='rank'){ ?> class="active"<?php } ?>><a href="<?php echo MONK::_url('rank/index'); ?>">最排行</a></li>
                </ul>
            </div>
            <div class="quick-list">
                <ul>
                    <li><a class="logout" data-icon="," href="#"></a></li>
                    <li><a class="setting" data-icon="#" href="#"></a></li>
                    <li><a class="notice" data-icon='"' href="#"></a></li>
                    <li><a class="name" href="#">沈能洲</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="middle"><!--{contentplaceholderid pagecontent}--></div>
    <div class="footer">
        <div class="container">
            © <a href="#">官方微博</a><em>·</em><a href="#">使用帮助</a>
        </div>
    </div>
</div>
<!--{contentplaceholderid pagefoot}-->
<!--{/content}-->