<!--{@page layout='frame'}-->
<!--{content head}-->
<link rel="stylesheet" href="<?php echo MONK::include_css('form','/Admin/source/styles/form.css',false,true); ?>">
<link rel="stylesheet" href="<?php echo MONK::include_css('sharecollection-edit','/Admin/source/styles/sharecollection-edit.css',false,true); ?>">
<!--{/content}-->
<!--{content content}-->
<h2>编辑杂志 - <a href="<?php echo MONK::_url('*/list'); ?>">返回</a></h2>
<?php $fans = json_decode($sharecollection['fans'],true); ?>
<div class="main">
    <form method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $sharecollection['id']; ?>">
    <dl>
        <dd>
            <label>* 粉丝：</label>
            <img src="/Home/source/uploads/fans/<?php echo $fans['avatar']?>" width="24" height="24" /><?php echo json_decode($fans['account'],true)['aname']?>(<?php echo $fans['nickname']?>)
        </dd>
        <dd>
            <label>* 名称：</label>
            <input class="_name" type="text" name="name" value="<?php echo $sharecollection['name']?>" />
        </dd>
        <dd>
            <button type="submit">提交</button>
        </dd>
    </dl>
    </form>
<div>
<!--{/content}-->
<!--{content foot}-->
<script type="text/javascript" src="<?php echo MONK::include_js('sharecollection-edit','/Admin/source/scripts/sharecollection/edit.js',false,true); ?>"></script>
<!--{/content}-->