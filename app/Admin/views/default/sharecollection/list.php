<!--{@page layout='frame'}-->
<!--{content head}-->
<link rel="stylesheet" href="<?php echo MONK::include_css('list','/Admin/source/styles/list.css',false,true); ?>">
<link rel="stylesheet" href="<?php echo MONK::include_css('sharecollection-list','/Admin/source/styles/sharecollection/list.css',false,true); ?>">
<!--{/content}-->
<!--{content content}-->
<div class="main">
<table>
<tr><th width="20">ID</th><th width="220">杂志名称</th><th width="220">创建者</th><th width="120">操作<th></tr>
<?php 
foreach($sharecollections['list'] as $sharecollection){ 
$fans = json_decode($sharecollection['fans'],true);
?>
<tr>
    <td><?php echo $sharecollection['id']; ?></td>
    <td><?php echo $sharecollection['name']; ?></td>
    <td><img src="/Home/source/uploads/fans/<?php echo $fans['avatar']?>" width="24" height="24" /><?php echo json_decode($fans['account'],true)['aname']?>(<?php echo $fans['nickname']?>)</td>
    <td>
        <a href="<?php echo MONK::_url('*/edit',array('id'=>$sharecollection['id'])); ?>">编辑</a>
        <a href="<?php echo MONK::_url('*/delete',array('id'=>$sharecollection['id'])); ?>">删除</a>
    </td>
</tr>
<?php } ?>
</table>
<div class="pagelist"><?php echo $pager; ?></div>
<div>
<!--{/content}-->
<!--{content foot}-->
<script type="text/javascript" src="<?php echo MONK::include_js('jquery','/source/scripts/jquery-1.9.1.min.js',false,false); ?>"></script>
<script type="text/javascript" src="<?php echo MONK::include_js('sharecollection-list','/Admin/source/scripts/sharecollection/list.js',false,true); ?>"></script>
<!--{/content}-->