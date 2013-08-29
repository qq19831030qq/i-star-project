<!--{@page layout='frame'}-->
<!--{content head}-->
<link rel="stylesheet" href="<?php echo MONK::include_css('list','/Admin/source/styles/list.css',false,true); ?>">
<link rel="stylesheet" href="<?php echo MONK::include_css('log-list','/Admin/source/styles/log/list.css',false,true); ?>">
<!--{/content}-->
<!--{content content}-->
<div class="main">
<div class="actions"><a href="<?php echo MONK::_url('*/clear'); ?>">清空日志</a></div>
<table>
<tr><th width="20">ID</th><th width="400">事件内容</th><th width="200">记录时间</th><th width="120">操作<th></tr>
<?php foreach($logs['list'] as $log){ ?>
<tr>
    <td><?php echo $log['id']; ?></td>
    <td><?php echo $log['content']; ?></td>
    <td><?php echo date('Y-m-d H:i:s',$log['created']); ?></td>
    <td>
        <a href="<?php echo MONK::_url('*/delete',array('id'=>$log['id'])); ?>">删除</a>
    </td>
</tr>
<?php } ?>
</table>
<div class="pagelist"></div>
<div>
<!--{/content}-->
<!--{content foot}-->
<script type="text/javascript" src="<?php echo MONK::include_js('jquery','/source/scripts/jquery-1.9.1.min.js',false,false); ?>"></script>
<script type="text/javascript" src="<?php echo MONK::include_js('log-list','/Admin/source/scripts/log/list.js',false,true); ?>"></script>
<!--{/content}-->