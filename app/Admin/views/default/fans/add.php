<!--{@page layout='frame'}-->
<!--{content head}-->
<link rel="stylesheet" href="<?php echo MONK::include_css('form','/Admin/source/styles/form.css',false,true); ?>">
<link rel="stylesheet" href="<?php echo MONK::include_css('fans-add','/Admin/source/styles/fans-add.css',false,true); ?>">
<!--{/content}-->
<!--{content content}-->
<h2>添加粉丝 - <a href="<?php echo MONK::_url('*/list'); ?>">返回</a> <?php if($uid>0){ ?><span style="color:green;">创建成功，ID <?php echo $uid; ?></span><?php } ?></h2>
<div class="main">
    <form method="post" enctype="multipart/form-data">
    <h3>账户信息</h3>
    <dl>
        <dd>
            <label>* 账号：</label>
            <input class="_aname" type="text" name="aname" />
        </dd>
        <dd>
            <label>* 密码：</label>
            <input class="_apwd" type="password" name="apwd" />
        </dd>
    </dl>
    <h3>附加信息</h3>
    <dl>
        <dd>
            <label>* 昵称：</label>
            <input class="_nickname" type="text" name="nickname" />
        </dd>
        <dd>
            <label>* 头像：</label>
            <input type="file" class="_avatar" name="avatar">
        </dd>
        <dd>
            <button type="submit">提交</button>
        </dd>
    </dl>
    </form>
<div>
<!--{/content}-->
<!--{content foot}-->
<script type="text/javascript" src="<?php echo MONK::include_js('fans-add','/Admin/source/scripts/fans/add.js',false,true); ?>"></script>
<!--{/content}-->