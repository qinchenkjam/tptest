<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"D:\wamp\www\ppjianzhang./application/admin\view\friend_link\edit.html";i:1493110441;s:66:"D:\wamp\www\ppjianzhang./application/admin\view\public\layout.html";i:1492499367;}*/ ?>
﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<script type="text/javascript" src="lib/PIE_IE678.js"></script>
<![endif]-->
<!-- <link href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->
<link href="//cdn.amazeui.org/amazeui/2.7.2/css/amazeui.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="__ADMIN__/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="__ADMIN__/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="__ADMIN__/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="__ADMIN__/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="__ADMIN__/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="__ADMIN__/static/h-ui.admin/css/style.css" />

<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>资讯列表</title>



</head>

<body>
<div class="page-container">
	<form action="save" enctype="multipart/form-data" method="post" class="form form-horizontal" id="form_add">
	
    <input type='hidden' id='id' name="id" value='<?php echo $msg['id']; ?>'/>

    <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>链接标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo $msg['link_name']; ?>" placeholder="" id="" name="link_name" style="width:50%">
			</div>
	</div>

	<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>链接地址：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo $msg['link_url']; ?>" placeholder="" id="" name="link_url" style="width:50%">
			</div>
	</div>
	<!--f-->

		<!-- <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">缩略图：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="uploader-thum-container">
					<div id="fileList" class="uploader-list"></div>
					<img width="60" class="product-thumb" src="<?php echo UPLODS; ?><?php echo $msg['link_logo']; ?>">
					<input name="link_logo" type="file" class="" id="img" value="" datatype="*1-2" nullmsg="">
				</div>
			</div>
		</div> -->

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">排序值：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo $msg['orderby']; ?>" placeholder="" id="" name="orderby" style="width:50%">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">是否显示：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo $msg['is_show']; ?>" placeholder="" id="" name="is_show" style="width:50%"> 1 显示  0不显示
			</div>
		</div>
		
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button  class="btn btn-primary radius" type="button" id="sub"><i class="Hui-iconfont">&#xe632;</i> 保存并提交审核</button>
				<button onClick="article_save();" class="btn btn-secondary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存草稿</button>
				<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</div>

<!--_footer 作为公共模版分离出去-->


<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->

</body>

<script type="text/javascript" src="__ADMIN__/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="__ADMIN__/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="__ADMIN__/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="__ADMIN__/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="__ADMIN__/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="__ADMIN__/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="__ADMIN__/lib/layer/2.1/layer.js"></script> 

<script type="text/javascript" src="__ADMIN__/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="__ADMIN__/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="__ADMIN__/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">

$(function(){
	var ue = UE.getEditor('editor');
});

</script>
<script type="text/javascript">

$('#sub').click(function(){
	var img=$("#img").val();
	var content=$(".content").val();
    /*if(img==""){
        //alert('请上传图片');
        layer.msg('请上传图片');       
        return false;
    }*/
    if(content==""){
        //alert('请上传图片');
        layer.msg('请填写内容');       
        return false;
    }
    $('#form_add').submit();
});
 	
</script>


</html>
