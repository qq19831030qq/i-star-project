<!--{@page layout='frame'}-->
<!--{content head}-->
<link rel="stylesheet" href="<?php echo MONK::include_css('form','/Admin/source/styles/form.css',false,true); ?>">
<link rel="stylesheet" href="<?php echo MONK::include_css('star-add','/Admin/source/styles/star-add.css',false,true); ?>">
<!--{/content}-->
<!--{content content}-->
<h2>添加新秀 - <a href="<?php echo MONK::_url('*/list'); ?>">返回</a> <?php if($id>0){ ?><span style="color:green;">创建成功，ID <?php echo $id; ?></span><?php } ?></h2>
<div class="main">
    <form method="post" enctype="multipart/form-data">
    <dl>
        <dd>
            <label>* 所属节目：</label>
            <select class="_program_mix" name="program_mix">
                <?php foreach($programs as $program){ ?>
                <option value='<?php echo $program['id'].JSON_MIX.json_encode($program); ?>'><?php echo $program['name']; ?></option>
                <?php } ?>
            </select>
        </dd>
        <dd>
            <label>* 真实姓名：</label>
            <input class="_truename" type="text" name="truename" />
        </dd>
        <dd>
            <label>* 昵称：</label>
            <input class="_nickname" type="text" name="nickname" />
        </dd>
        <dd>
            <label>* 粉丝名称：</label>
            <input class="_fans_tag" type="text" name="fans_tag" />
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
<script type="text/javascript" src="<?php echo MONK::include_js('star-add','/Admin/source/scripts/star/add.js',false,true); ?>"></script>
<!--{/content}-->