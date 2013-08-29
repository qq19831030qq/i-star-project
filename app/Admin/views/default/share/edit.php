<!--{@page layout='frame'}-->
<!--{content head}-->
<link rel="stylesheet" href="<?php echo MONK::include_css('form','/Admin/source/styles/form.css',false,true); ?>">
<link rel="stylesheet" href="<?php echo MONK::include_css('share-add','/Admin/source/styles/share/add.css',false,true); ?>">
<!--{/content}-->
<!--{content content}-->
<h2>编辑分享 - <a href="javascript:history.back();">返回</a> - <a href="<?php echo MONK::_url('*/list'); ?>">分享管理</a></h2>
<div class="main">
    <form method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $share['id']; ?>">
    <input type="hidden" name="uid" value="<?php echo $share['uid']; ?>">
    <input type="hidden" name="old_sid" value='<?php echo $share['sid']; ?>'>
    <input type="hidden" name="img_group" value='<?php echo $share['img_group']; ?>'>
    <dl>
        <dd>
            <label>* 新秀ID：</label>
            <input class="num _sid" type="text" name="sid" value="<?php echo $share['sid']; ?>" />
        </dd>
        <dd>
            <label>* 所属杂志：</label>
            <select class="_sharecollection_mix" name="sharecollection_mix">
                <option value="">无</option>
                <?php foreach($sharecollections as $sharecollection){ ?>
                <option value='<?php echo $sharecollection['id'].JSON_MIX.json_encode($sharecollection); ?>' <?php if($sharecollection['id']==$share['s_c_id']){?>selected<?php } ?>><?php echo $sharecollection['name']; ?></option>
                <?php } ?>
            </select>
        </dd>
        <dd>
            <label>* 一句话说明：</label>
            <input class="title _desc" type="text" name="desc" value="<?php echo $share['desc']; ?>" />
        </dd>
        <h3>分享图片集 <a class="_add_file">增加</a></h3>
        <dd class="_img_group_area">
            <?php foreach(json_decode($share['img_group'],true) as $img){ ?>
            <input type="file" class="_img_group" name="img_group[]"><a target="_blank" href="/Home/source/uploads/share/<?php echo md5($share['id']).'/'.$img; ?>"><img src="/Home/source/uploads/share/<?php echo md5($share['id']).'/'.$img; ?>" width="300" /></a>
            <?php } ?>
        </dd>
        <dd>
            <button type="submit">提交</button>
        </dd>
    </dl>
    </form>
<div>
<!--{/content}-->
<!--{content foot}-->
<script type="text/javascript" src="<?php echo MONK::include_js('jquery','/source/scripts/jquery-1.9.1.min.js',false,true); ?>"></script>
<script type="text/javascript" src="<?php echo MONK::include_js('share-add','/Admin/source/scripts/share/add.js',false,true); ?>"></script>
<!--{/content}-->