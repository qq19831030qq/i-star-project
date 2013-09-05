<!--{@page layout='home'}-->
<!--{content pagehead}-->
<link rel="stylesheet" type="text/css" media="all" href="<?php echo MONK::include_css("space-index","/Home/source/styles/space/index.css",false,true); ?>">
<link rel="stylesheet" type="text/css" media="all" href="<?php echo MONK::include_css("grid","/Home/source/styles/grid.css",false,true); ?>">
<!--{/content}-->
<!--{content pagecontent}-->
<div class="container">
    <h2>关注的动态</h2>
    <div class="share-wall">
        <div class="user-box stamp">
            
        </div>
        <div class="star-recommend stamp">
        
        </div>
        <div class="fans-recommend stamp">
        
        </div>
        <div class="wall-grid">
            <div class="grid-hd clearfix">
                <a href="<?php echo MONK::_url('*/detail'); ?>">
                    <img src="/Home/source/uploads/share/a87ff679a2f3e71d9181a67b7542122c/T1qohkFkJdXXXXXXXX_!!273913842-0-pix.jpg_240x10000.jpg" width="240" height="333" />
                    <span class="img-text style1">
                        <p>喜欢雪纺连衣裙，穿着总有种衣袂飘飘的感觉，仙仙的。这两款哪个更适合约会...</p>
                    </span>
                </a>
            </div>
            <div class="grid-operate clearfix">
                <a class="like-link" href="javascript:;">
                    <span class="like-text">&#9829; 喜欢</span>
                    <span class="like-num">234</span>
                </a>
                <a class="comm-link" href="javascript:;">
                    <span class="comm-text">评论</span>
                    <span class="comm-num">34</span>
                </a>
            </div>
            <div class="user clearfix">
                <a class="avatar" href="#">
                    <img src="/Home/source/uploads/fans/3.jpg" />
                </a>
                <div class="info">
                    <p>
                        <a href="#">沈能洲</a><em>at</em><a class="store-name" href="#">大歌星KTV</a>添加分享并加入<a class="store-name" href="#">我的杂志</a>
                    </p>
                </div>
            </div>
            <ul class="comm-list clearfix">
                <li class="comm-item">
                    <a class="avatar" href="#">
                        <img src="/Home/source/uploads/fans/1.jpg" />
                    </a>
                    <div class="comm-info">
                        <a class="comm-user" href="#">王志荣</a>
                        <span class="comm-content">真的很好吃啊</span>
                    </div>
                </li>
                <li class="comm-item">
                    <a class="avatar" href="#">
                        <img src="/Home/source/uploads/fans/2.jpg" />
                    </a>
                    <div class="comm-info">
                        <a class="comm-user" href="#">余政</a>
                        <span class="comm-content">真的很好吃啊,下次还要去吃吃看到底怎么样</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--{/content}-->
<!--{content pagefoot}-->
<script src="<?php echo MONK::include_js("grid-a-licious","/Home/source/scripts/masonry.pkgd.min.js",false,true); ?>"></script>
<script src="<?php echo MONK::include_js("space-index","/Home/source/scripts/space/index.js",false,true); ?>"></script>
<!--{/content}-->