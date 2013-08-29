<!--{@page layout='frame'}-->
<!--{content head}-->
<link rel="stylesheet" href="<?php echo MONK::include_css('form','/Admin/source/styles/form.css',false,true); ?>">
<link rel="stylesheet" href="<?php echo MONK::include_css('star-edit','/Admin/source/styles/star-edit.css',false,true); ?>">
<!--{/content}-->
<!--{content content}-->
<h2>编辑新秀 - <a href="<?php echo MONK::_url('*/list'); ?>">返回</a></h2>
<div class="main">
    <form method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $star['id']; ?>">
    <input type="hidden" name="old_avatar" value="<?php echo $star['avatar']; ?>">
    <dl>
        <dd>
            <label>* 所属节目：</label>
            <select class="_program_mix" name="program_mix">
                <?php foreach($programs as $program){ ?>
                <option value='<?php echo $program['id'].JSON_MIX.json_encode($program); ?>' <?php if($program['id']==$star['pid']){?>selected<?php } ?>><?php echo $program['name']; ?></option>
                <?php } ?>
            </select>
        </dd>
        <dd>
            <label>* 真实姓名：</label>
            <input class="_truename" type="text" name="truename" value="<?php echo $star['truename']; ?>" />
        </dd>
        <dd>
            <label>* 昵称：</label>
            <input class="_nickname" type="text" name="nickname" value="<?php echo $star['nickname']; ?>" />
        </dd>
        <dd>
            <label>* 粉丝名称：</label>
            <input class="_fans_tag" type="text" name="fans_tag" value="<?php echo $star['fans_tag']; ?>" />
        </dd>
        <dd>
            <label>* 头像：</label>
            <input type="file" class="_avatar" name="avatar">
            <img src="/Home/source/uploads/star/<?php echo $star['avatar']; ?>" />
        </dd>
        <dd>
            <button type="submit">提交</button>
        </dd>
    </dl>
    </form>
<div>
<!--{/content}-->
<!--{content foot}-->
<script type="text/javascript" src="<?php echo MONK::include_js('star-edit','/Admin/source/scripts/star/edit.js',false,true); ?>"></script>
<!--{/content}-->