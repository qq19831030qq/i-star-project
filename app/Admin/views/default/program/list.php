<!--{@page layout='frame'}-->
<!--{content head}-->
<link rel="stylesheet" href="<?php echo MONK::include_css('list','/Admin/source/styles/list.css',false,true); ?>">
<link rel="stylesheet" href="<?php echo MONK::include_css('program-list','/Admin/source/styles/program/list.css',false,true); ?>">
<!--{/content}-->
<!--{content content}-->
<div class="main">
<div class="actions"><a href="<?php echo MONK::_url('*/add'); ?>">添加节目</a></div>
<table>
<tr><th width="40">ID</th><th width="200">名称</th><th width="80">所属类别</th><th width="200">所属区域</th><th width="120">操作<th></tr>
<?php foreach($programs as $program){ ?>
<tr>
    <td><?php echo $program['id']; ?></td>
    <td class="l"><img src="/Home/source/uploads/program/<?php echo $program['logo']; ?>" width="48" height="24" /><?php echo $program['name']; ?></td>
    <td><?php echo json_decode($program['p_c'],true)['name']; ?></td>
    <td><?php echo json_decode($program['p_a'],true)['name']; ?></td>
    <td>
        <a href="<?php echo MONK::_url('*/edit',array('id'=>$program['id'])); ?>">编辑</a>
        <a href="<?php echo MONK::_url('*/delete',array('id'=>$program['id'],'logo'=>$program['logo'])); ?>">删除</a>
    </td>
</tr>
<?php } ?>
</table>
<div>
<!--{/content}-->
<!--{content foot}-->
<script type="text/javascript" src="<?php echo MONK::include_js('jquery','/source/scripts/jquery-1.9.1.min.js',false,false); ?>"></script>
<script type="text/javascript" src="<?php echo MONK::include_js('program-list','/Admin/source/scripts/program/list.js',false,true); ?>"></script>
<!--{/content}-->