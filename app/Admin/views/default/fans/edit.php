<!--{@page layout='frame'}-->
<!--{content head}-->
<link rel="stylesheet" href="<?php echo MONK::include_css('form','/Admin/source/styles/form.css',false,true); ?>">
<link rel="stylesheet" href="<?php echo MONK::include_css('fans-edit','/Admin/source/styles/fans-edit.css',false,true); ?>">
<!--{/content}-->
<!--{content content}-->
<h2>编辑粉丝 - <a href="<?php echo MONK::_url('*/list'); ?>">返回</a></h2>
<div class="main">
    <form method="post" enctype="multipart/form-data">
    <input type="hidden" name="aid" value="<?php echo json_decode($fans['account'],true)['aid']; ?>">
    <input type="hidden" name="old_apwd" value="<?php echo json_decode($fans['account'],true)['apwd']; ?>">
    <input type="hidden" name="uid" value="<?php echo $fans['uid']; ?>">
    <input type="hidden" name="old_avatar" value="<?php echo $fans['avatar']; ?>">
    <h3>账户信息</h3>
    <dl>
        <dd>
            <label>* 账号：</label>
            <input class="_aname" type="text" name="aname" value="<?php echo json_decode($fans['account'],true)['aname']; ?>" />
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
            <input class="_nickname" type="text" name="nickname" value="<?php echo $fans['nickname']; ?>" />
        </dd>
        <dd>
            <label>* 头像：</label>
            <input type="file" class="_avatar" name="avatar">
            <img src="/Home/source/uploads/fans/<?php echo $fans['avatar']; ?>" />
        </dd>
        <dd>
            <button type="submit">提交</button>
        </dd>
    </dl>
    </form>
<div>
<!--{/content}-->
<!--{content foot}-->
<script type="text/javascript" src="<?php echo MONK::include_js('fans-edit','/Admin/source/scripts/fans/edit.js',false,true); ?>"></script>
<!--{/content}-->