<!--{@page layout='frame'}-->
<!--{content head}-->
<link rel="stylesheet" href="<?php echo MONK::include_css('list','/Admin/source/styles/list.css',false,true); ?>">
<link rel="stylesheet" href="<?php echo MONK::include_css('account-list','/Admin/source/styles/account/list.css',false,true); ?>">
<!--{/content}-->
<!--{content content}-->
<div class="main">
<table>
<tr><th width="20">ID</th><th width="200">用户名</th><th width="200">操作<th></tr>
<?php foreach($accounts['list'] as $account){ ?>
<tr>
    <td><?php echo $account['aid']; ?></td>
    <td><?php echo $account['aname']; ?></td>
    <td>
        <a href="<?php echo MONK::_url('*/addAdmin',array('aid'=>$account['aid'])); ?>">设为管理员</a>
    </td>
</tr>
<?php } ?>
</table>
<div class="pagelist"><?php echo $pager; ?></div>
<div>
<!--{/content}-->
<!--{content foot}-->
<script type="text/javascript" src="<?php echo MONK::include_js('jquery','/source/scripts/jquery-1.9.1.min.js',false,false); ?>"></script>
<script type="text/javascript" src="<?php echo MONK::include_js('account-list','/Admin/source/scripts/account/list.js',false,true); ?>"></script>
<!--{/content}-->