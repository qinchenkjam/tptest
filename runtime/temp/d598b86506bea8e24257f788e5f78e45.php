<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"D:\wamp\www\ppjianzhang./application/admin\view\product\cate_edit.html";i:1493274955;s:66:"D:\wamp\www\ppjianzhang./application/admin\view\public\layout.html";i:1492499367;}*/ ?>
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

</head>
<body>
<div class="page-container">
  <form class="Huiform" action="cateEdit?id=<?php echo $msg['cat_id']; ?>" method="post" id="form-article-class">
    栏目： <span class="select-box" style="width:150px">
    <select class="select" id="sel_Sub"  onchange="SetSubID(this);">
    <option value="0" >--顶级栏目--</option>

      <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>

      <option id="sel"  name="" value="<?php echo $vo['cat_id']; ?>" <?php if($vo['cat_id'] == $msg['pid']): ?>selected<?php endif; ?> ><?php echo $vo['cat_name']; ?></option>

      <?php endforeach; endif; else: echo "" ;endif; ?>   
    </select>
    </span>
    <input type="hidden" id="hid_ccid" value="<?php echo $msg['cat_id']; ?>" name="cat_id">
    排序：
    <input class="input-text text-c" style="width:50px" type="text" value="<?php echo $msg['sort']; ?>" placeholder="排序" name="sort" id="class-rank">
    分类名：
    <input class="input-text" style="width:170px" type="text" value="<?php echo $msg['cat_name']; ?>" placeholder="输入分类" name="cat_name" id="class-val">
    <div class="text-c mt-20" style="margin-left:-100px;">
      <button type="submit" class="btn btn-success radius" id="" name="" onClick="class_save(this,'2');"><i class="icon-save"></i> 保存</button>
      <a class="btn btn-success radius" id="admin-role-save laclose" href="javascript:history.back()">返回</a>
    </div>
  </form>
</body>

<script type="text/javascript" src="__ADMIN__/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="__ADMIN__/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="__ADMIN__/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="__ADMIN__/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="__ADMIN__/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="__ADMIN__/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="__ADMIN__/lib/layer/2.1/layer.js"></script> 

<script type="text/javascript" src="__ADMIN__/lib/icheck/jquery.icheck.min.js"></script> 
<script type="text/javascript" src="__ADMIN__/lib/Validform/5.3.2/Validform.min.js"></script>
<script type="text/javascript">
$(function(){
  $('.skin-minimal input').iCheck({
    checkboxClass: 'icheckbox-blue',
    radioClass: 'iradio-blue',
    increaseArea: '20%'
  });
  
  $("#form-user-add").Validform({
    tiptype:2,
    callback:function(form){
      form[0].submit();
      var index = parent.layer.getFrameIndex(window.name);
      parent.$('.btn-refresh').click();
      parent.layer.close(index);
    }
  });
});
</script>
<script>
 $('#sel_Sub').change(function(){
   var options=$("#sel_Sub option:selected").val();

 })
  function checksubmit(){
  if (document.form1.cat_name.value==""){

         layer.alert('请输入名称！');
         return false;
         document.form1.myname.focus();
           
    }else{
      return true; 
    } 
  }
</script>
<script type="text/javascript">

$('#send').click(function(){
   var cate_name=$('input[name="cate_name"]').val();
$.ajax({
        type:"PSOT",
        url:"<?php echo url('admin/productCate/cateAdd'); ?>",
        data:{cate_name:cate_names},
        dataType: "json",
        success:function(ss){
            alert(ss);
        }
    });  

}
</script>



</html>
