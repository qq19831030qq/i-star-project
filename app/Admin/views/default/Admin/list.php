<!--{@page layout='frame'}-->
<!--{content head}-->
<link rel="stylesheet" href="<?php echo MONK::include_css('list','/Admin/source/styles/list.css',false,true); ?>">
<link rel="stylesheet" href="<?php echo MONK::include_css('admin-list','/Admin/source/styles/admin/list.css',false,true); ?>">
<!--{/content}-->
<!--{content content}-->
<div class="main">
<table>
<tr><th width="20">ID</th><th width="200">用户名</th><th width="120">操作<th></tr>
<?php foreach($admins as $admin){ ?>
<tr>
    <td><?php echo $admin['id']; ?></td>
    <td><?php echo json_decode($admin['account'],true)['aname']; ?></td>
    <td>
        <a href="<?php echo MONK::_url('*/delete',array('id'=>$admin['id'])); ?>">取消管理员</a>
    </td>
</tr>
<?php } ?>
</table>
<div>
<!--{/content}-->
<!--{content foot}-->
<script type="text/javascript" src="<?php echo MONK::include_js('jquery','/source/scripts/jquery-1.9.1.min.js',false,false); ?>"></script>
<script type="text/javascript" src="<?php echo MONK::include_js('admin-list','/Admin/source/scripts/admin/list.js',false,true); ?>"></script>
<!--{/content}-->