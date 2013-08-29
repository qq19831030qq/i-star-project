<!--{@page layout='frame'}-->
<!--{content head}-->
<link rel="stylesheet" href="<?php echo MONK::include_css('form','/Admin/source/styles/form.css',false,true); ?>">
<link rel="stylesheet" href="<?php echo MONK::include_css('starsharecollection-add','/Admin/source/styles/starsharecollection-add.css',false,true); ?>">
<!--{/content}-->
<!--{content content}-->
<h2>添加秀刊 - <a href="javascript:history.back();">返回</a> - <a href="<?php echo MONK::_url('*/list'); ?>">秀刊管理</a> <?php if($id>0){ ?><span style="color:green;">创建成功，ID <?php echo $id; ?></span><?php } ?></h2>
<div class="main">
    <form method="post" enctype="multipart/form-data">
    <dl>
        <dd>
            <label>* 新秀ID：</label>
            <input class="num _sid" type="text" name="sid" />
        </dd>
        <dd>
            <label>* 名称：</label>
            <input class="_name" type="text" name="name" />
        </dd>
        <dd>
            <button type="submit">提交</button>
        </dd>
    </dl>
    </form>
<div>
<!--{/content}-->
<!--{content foot}-->
<script type="text/javascript" src="<?php echo MONK::include_js('starsharecollection-add','/Admin/source/scripts/starsharecollection/add.js',false,true); ?>"></script>
<!--{/content}-->