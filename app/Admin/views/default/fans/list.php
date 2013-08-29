<!--{@page layout='frame'}-->
<!--{content head}-->
<link rel="stylesheet" href="<?php echo MONK::include_css('list','/Admin/source/styles/list.css',false,true); ?>">
<link rel="stylesheet" href="<?php echo MONK::include_css('fans-list','/Admin/source/styles/fans/list.css',false,true); ?>">
<!--{/content}-->
<!--{content content}-->
<div class="main">
<div class="actions"><a href="<?php echo MONK::_url('*/add'); ?>">添加粉丝</a></div>
<table>
<tr><th width="20">ID</th><th width="300">粉丝名</th><th width="220">操作<th></tr>
<?php foreach($fans['list'] as $fans){ ?>
<tr>
    <td><?php echo $fans['uid']; ?></td>
    <td><img src="/Home/source/uploads/fans/<?php echo $fans['avatar']; ?>" width="24" height="24" /><?php echo json_decode($fans['account'],true)['aname']; ?>(<?php echo $fans['nickname']; ?>)</td>
    <td>
        <a href="<?php echo MONK::_url('share/add',array('uid'=>$fans['uid'])); ?>">添加分享</a>
        <a href="<?php echo MONK::_url('sharecollection/add',array('uid'=>$fans['uid'])); ?>">添加杂志</a>
        <a href="<?php echo MONK::_url('starsharecollection/add',array('uid'=>$fans['uid'])); ?>">添加秀刊</a>
        <a href="<?php echo MONK::_url('*/edit',array('uid'=>$fans['uid'])); ?>">编辑</a>
        <a href="<?php echo MONK::_url('*/delete',array('aid'=>json_decode($fans['account'],true)['aid'],'uid'=>$fans['uid'],'avatar'=>$fans['avatar'])); ?>">删除</a>
    </td>
</tr>
<?php } ?>
</table>
<div class="pagelist"><?php echo $pager; ?></div>
<div>
<!--{/content}-->
<!--{content foot}-->
<script type="text/javascript" src="<?php echo MONK::include_js('jquery','/source/scripts/jquery-1.9.1.min.js',false,false); ?>"></script>
<script type="text/javascript" src="<?php echo MONK::include_js('fans-list','/Admin/source/scripts/fans/list.js',false,true); ?>"></script>
<!--{/content}-->