<!--{@page layout='frame'}-->
<!--{content head}-->
<link rel="stylesheet" href="<?php echo MONK::include_css('list','/Admin/source/styles/list.css',false,true); ?>">
<link rel="stylesheet" href="<?php echo MONK::include_css('star-list','/Admin/source/styles/star/list.css',false,true); ?>">
<!--{/content}-->
<!--{content content}-->
<div class="main">
<div class="actions"><a href="<?php echo MONK::_url('*/add'); ?>">添加新秀</a></div>
<table>
<tr><th width="20">ID</th><th width="200">姓名</th><th width="80">粉丝名</th><th width="200">所属节目</th><th width="120">操作<th></tr>
<?php foreach($stars['list'] as $star){ ?>
<tr>
    <td><?php echo $star['id']; ?></td>
    <td><img src="/Home/source/uploads/star/<?php echo $star['avatar']; ?>" width="24" height="24" /><?php echo $star['truename']; ?>(<?php echo $star['nickname']; ?>)</td>
    <td><?php echo $star['fans_tag']; ?></td>
    <td><?php echo json_decode($star['program'],true)['name']; ?></td>
    <td>
        <a href="<?php echo MONK::_url('*/edit',array('id'=>$star['id'])); ?>">编辑</a>
        <a href="<?php echo MONK::_url('*/delete',array('id'=>$star['id'],'avatar'=>$star['avatar'])); ?>">删除</a>
    </td>
</tr>
<?php } ?>
</table>
<div class="pager"><?php echo $pager; ?></div>
<div>
<!--{/content}-->
<!--{content foot}-->
<script type="text/javascript" src="<?php echo MONK::include_js('jquery','/source/scripts/jquery-1.9.1.min.js',false,false); ?>"></script>
<script type="text/javascript" src="<?php echo MONK::include_js('star-list','/Admin/source/scripts/star/list.js',false,true); ?>"></script>
<!--{/content}-->