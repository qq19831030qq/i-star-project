<!--{@page layout='frame'}-->
<!--{content head}-->
<link rel="stylesheet" href="<?php echo MONK::include_css('list','/Admin/source/styles/list.css',false,true); ?>">
<link rel="stylesheet" href="<?php echo MONK::include_css('programarea-list','/Admin/source/styles/programarea/list.css',false,true); ?>">
<!--{/content}-->
<!--{content content}-->
<div class="main">
<table>
<tr><th width="20">ID</th><th width="200">区域名称</th></tr>
<?php foreach($programareas as $programarea){ ?>
<tr><td><?php echo $programarea['id']; ?></td><td><?php echo $programarea['name']; ?></td></tr>
<?php } ?>
</table>
<div class="pagelist"></div>
<div>
<!--{/content}-->
<!--{content foot}-->
<script type="text/javascript" src="<?php echo MONK::include_js('jquery','/source/scripts/jquery-1.9.1.min.js',false,false); ?>"></script>
<script type="text/javascript" src="<?php echo MONK::include_js('programarea-list','/Admin/source/scripts/programarea/list.js',false,true); ?>"></script>
<!--{/content}-->