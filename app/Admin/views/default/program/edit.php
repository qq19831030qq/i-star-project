<!--{@page layout='frame'}-->
<!--{content head}-->
<link rel="stylesheet" href="<?php echo MONK::include_css('form','/Admin/source/styles/form.css',false,true); ?>">
<link rel="stylesheet" href="<?php echo MONK::include_css('program-edit','/Admin/source/styles/program-edit.css',false,true); ?>">
<!--{/content}-->
<!--{content content}-->
<h2>编辑节目 - <a href="<?php echo MONK::_url('*/list'); ?>">返回</a></h2>
<div class="main">
    <form method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $program['id']; ?>">
    <input type="hidden" name="old_logo" value="<?php echo $program['logo']; ?>">
    <dl>
        <dd>
            <label>* 所属分类：</label>
            <select class="_p_c_mix" name="p_c_mix">
                <?php foreach($programcategorys as $programcategory){ ?>
                <option value='<?php echo $programcategory['id'].JSON_MIX.json_encode($programcategory); ?>' <?php if($programcategory['id']==$program['p_c_id']){?>selected<?php } ?>><?php echo $programcategory['name']; ?></option>
                <?php } ?>
            </select>
        </dd>
        <dd>
            <label>* 所属地区：</label>
            <select class="_p_a_mix" name="p_a_mix">
                <?php foreach($programareas as $programarea){ ?>
                <option value='<?php echo $programarea['id'].JSON_MIX.json_encode($programarea); ?>' <?php if($programarea['id']==$program['p_a_id']){?>selected<?php } ?>><?php echo $programarea['name']; ?></option>
                <?php } ?>
            </select>
        </dd>
        <dd>
            <label>* 名称：</label>
            <input class="_name" type="text" name="name" value="<?php echo $program['name']; ?>" />
        </dd>
        <dd>
            <label>* LOGO：</label>
            <input type="file" class="_logo" name="logo">
            <img src="/Home/source/uploads/program/<?php echo $program['logo']; ?>" />
        </dd>
        <dd>
            <button type="submit">提交</button>
        </dd>
    </dl>
    </form>
<div>
<!--{/content}-->
<!--{content foot}-->
<script type="text/javascript" src="<?php echo MONK::include_js('program-edit','/Admin/source/scripts/program/edit.js',false,true); ?>"></script>
<!--{/content}-->