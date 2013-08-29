<!--{@page layout='frame'}-->
<!--{content head}-->
<link rel="stylesheet" href="<?php echo MONK::include_css('list','/Admin/source/styles/list.css',false,true); ?>">
<link rel="stylesheet" href="<?php echo MONK::include_css('programcategory-list','/Admin/source/styles/programcategory/list.css',false,true); ?>">
<!--{/content}-->
<!--{content content}-->
<div class="main">
<table>
<tr><th width="20">ID</th><th width="200">分类名称</th></tr>
<?php foreach($programcategorys as $programcategory){ ?>
<tr><td><?php echo $programcategory['id']; ?></td><td><?php echo $programcategory['name']; ?></td></tr>
<?php } ?>
</table>
<div>
<!--{/content}-->
<!--{content foot}-->
<script type="text/javascript" src="<?php echo MONK::include_js('jquery','/source/scripts/jquery-1.9.1.min.js',false,false); ?>"></script>
<script type="text/javascript" src="<?php echo MONK::include_js('programcategory-list','/Admin/source/scripts/programcategory/list.js',false,true); ?>"></script>
<!--{/content}-->