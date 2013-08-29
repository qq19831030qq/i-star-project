<!--{@page layout='frame'}-->
<!--{content head}-->
<link rel="stylesheet" href="<?php echo MONK::include_css('list','/Admin/source/styles/list.css',false,true); ?>">
<link rel="stylesheet" href="<?php echo MONK::include_css('share-list','/Admin/source/styles/share/list.css',false,true); ?>">
<!--{/content}-->
<!--{content content}-->
<div class="main">
<table>
<tr><th width="20">ID</th><th width="300">发表粉丝</th><th width="200">所属杂志</th><th width="200">所属新秀</th><th width="120">操作<th></tr>
<?php 
foreach($shares['list'] as $share){ 
    $fans = json_decode($share['fans'],true);
    $star = json_decode($share['star'],true);
    $share_collection = !empty($share['share_collection'])?json_decode($share['share_collection'],true):array('name'=>'无');
?>
<tr>
    <td><?php echo $share['id']; ?></td>
    <td><img src="/Home/source/uploads/fans/<?php echo $fans['avatar']; ?>" width="24" height="24" /><?php echo json_decode($fans['account'],true)['aname']; ?>(<?php echo $fans['nickname']; ?>)</td>
    <td><?php echo $share_collection['name']; ?></td>
    <td><img src="/Home/source/uploads/star/<?php echo $star['avatar']; ?>" width="24" height="24" /><?php echo $star['truename']; ?>(<?php echo $star['nickname']; ?>)</td>
    <td>
        <a href="<?php echo MONK::_url('*/edit',array('id'=>$share['id'],'uid'=>$share['uid'])); ?>">编辑</a>
        <a href="<?php echo MONK::_url('*/delete',array('id'=>$share['id'],'img_dir'=>md5($share['id']))); ?>">删除</a>
    </td>
</tr>
<?php } ?>
</table>
<div class="pagelist"><?php echo $pager; ?></div>
<div>
<!--{/content}-->
<!--{content foot}-->
<script type="text/javascript" src="<?php echo MONK::include_js('jquery','/source/scripts/jquery-1.9.1.min.js',false,false); ?>"></script>
<script type="text/javascript" src="<?php echo MONK::include_js('share-list','/Admin/source/scripts/share/list.js',false,true); ?>"></script>
<!--{/content}-->