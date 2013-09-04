<!--{@page layout='home'}-->
<!--{content pagehead}-->
<link rel="stylesheet" type="text/css" media="all" href="<?php echo MONK::include_css("space-index","/Home/source/styles/space/index.css",false,true); ?>">
<!--{/content}-->
<!--{content pagecontent}-->
<div class="container">
    <div class="filter default-shadow">
        <div class="filter-wrap">
            <p>
                <h4>按关注对象</h4>
                <ul>
                    <li><a href="#">全部</a></li>
                    <li><a href="#">新秀</a></li>
                    <li><a href="#">秀丁</a></li>
                    <li><a href="#">秀刊</a></li>
                </ul>
            </p>
            <p>
                <h4>按动态类型</h4>
                <ul>
                    <li><a href="#">全部</a></li>
                    <li><a href="#">分享</a></li>
                    <li><a href="#">秀刊</a></li>
                </ul>
            </p>
            <p><input type="text" class="feed-search" name="key" />搜索</p>
        </div>
        <div class="date-list">
            <ul>
                <li>今天</li>
                <li>昨天</li>
                <li>前天</li>
                <li>查看更多</li>
            </ul>
        </div>
    </div>
    <div class="feed-space">
        <div class="i-hd">
            <h3>最新动态<i>设置</i></h3>
        </div>
        <div class="i-bd">
            <div class="push">
                <div class="push-hd">
                    <span>我们推荐你关注这些</span>
                    <ul>
                        <li><a href="#">新秀<i>刷新按钮</i></a><li>
                        <li><a href="#">秀丁<i></i></a><li>
                        <li><a href="#">节目<i></i></a><li>
                        <li><a href="#">秀刊<i></i></a><li>
                    </ul>
                </div>
                <div class="push-bd">
                    <ul>
                        <li>
                            <div class="push-item-info">
                                <a href="#"><img src="#" /></a>
                                <p>张学友</p>
                                <p>粉丝 2345 | 分享 3677</p>
                            </div>
                            <div class="push-item-title">葛优力荐新秀</div>
                        </li>
                        <li>
                            <div class="push-item-info">
                                <a href="#"><img src="#" /></a>
                                <p>张学友</p>
                                <p>粉丝 2345 | 分享 3677</p>
                            </div>
                            <div class="push-item-title">葛优力荐新秀</div>
                        </li>
                        <li>
                            <div class="push-item-info">
                                <a href="#"><img src="#" /></a>
                                <p>张学友</p>
                                <p>粉丝 2345 | 分享 3677</p>
                            </div>
                            <div class="push-item-title">葛优力荐新秀</div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="feed-time-list"></div>
        </div>
    </div>
</div>
<!--{/content}-->
<!--{content pagefoot}-->
<script src="<?php echo MONK::include_js("space-index","/Home/source/scripts/space/index.js",false,true); ?>"></script>
<!--{/content}-->