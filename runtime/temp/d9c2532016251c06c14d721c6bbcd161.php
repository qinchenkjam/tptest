<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"D:\wamp\www\ppjianzhang./application/admin\view\user\login.html";i:1493195876;}*/ ?>
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
<link href="__ADMIN__/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="__ADMIN__/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
<link href="__ADMIN__/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="__ADMIN__/lib/Hui-iconfont/1.0.7/iconfont.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<style>
  .header{
    background:;
  }
}
</style>
<title></title>
<meta name="keywords" content="H-ui.admin v2.3,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v2.3，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<div class=""></div>
<div class="loginWraper">
  <div id="loginform" class="loginBox">
    <form class="form form-horizontal" action="<?php echo url('admin/user/login'); ?>" method="post">
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          <input id="username" name="user_name" type="text" placeholder="账户" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-xs-8">
          <input id="password" name="password" type="password" placeholder="密码" class="input-text size-L">
        </div></div>
   
     
     <div class="row cl">
       <div class="formControls col-xs-8 col-xs-offset-3">
         <input class="input-text size-L" type="text"  id="vertify" name="vertify"  placeholder="验证码" onblur="if(this.value==''){this.value='验证码:'}" onclick="if(this.value=='验证码:'){this.value='';}" value="验证码:" style="width:150px;">
        <!--  <img src="<?php echo captcha_src(); ?>" alt="captcha" onclick="this.src='<?php echo captcha_src(); ?>?seed='+Math.random()">  -->
  <img src="<?php echo captcha_src(); ?>"  onclick="refreshVerify()" id="verify_img" > <a href="javascript:refreshVerify()">换一张</a> </div>
     </div>
      <!-- <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <label for="online">
            <input type="checkbox" name="online" id="online" value="">
            使我保持登录状态</label>
        </div>
      </div> -->
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input name="" type="button" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;" onclick="checkLogin()">

          <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo url('admin/admin/tomail'); ?>">忘记密码</a>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="footer">Copyright 你的公司名称 by H-ui.admin.v2.3</div>
<script type="text/javascript" src="__ADMIN__/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="__ADMIN__/static/h-ui/js/H-ui.js"></script> 
<script src="__ADMIN__/lib/layer/2.1/layer.js"></script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F080836300300be57b7f34f4b3e97d911' type='text/javascript'%3E%3C/script%3E"));
</script>
    <script>
   
        function refreshVerify() { 
            var ts=Math.random(); 
            $('#verify_img').attr("src", "<?php echo captcha_src(); ?>?seed="+ts);
        }
  
    </script>
    <script>
       function checkLogin(){

          var username = $('#username').val();
          var password = $('#password').val();
          //var vertify = $('input[name="vertify"]').val();
          var vertify = $('#vertify').val();
          //alert(vertify.length);
          if( username == '' || password ==''){
            layer.alert('用户名或密码不能为空', {icon: 2}); //alert('用户名或密码不能为空');
            return;
          }
          if(vertify ==''){
              layer.alert('验证码不能为空', {icon: 2});
            return;
          }
          if(vertify.length !=4){
              layer.alert('验证码位数有误', {icon: 2});
              //fleshVerify();
            return;
          }
     /*     
      $.ajax({
      url:"<?php echo url('admin/User/login'); ?>",
      type:'post',
      dataType:'json',
      data:{username:username,password:password,vertify:vertify},
      success:function(res){
        if(res.status==1){
            layer.alert(res.msg, {icon:1});
            location.href = "<?php echo url('index/index'); ?>"
        }else{
           layer.alert(res.msg, {icon: 2});
        }
       
      },
      error : function(XMLHttpRequest, textStatus, errorThrown) {
        layer.alert('网络失败，请刷新页面后重试', {icon: 2});
      }
          })*/
                   
        $.post(
          "<?php echo url('admin/User/login'); ?>",
          {'username':username,'password':password,'vertify':vertify},
          function(res){
          //console.log(res.status);
               if(res.status==1){
                  //alert();               
                  layer.msg(res.msg,{icon:1});
                  location.href = "<?php echo url('index/index'); ?>"
               }
               if(res.status==-1){               
                   layer.msg(res.msg,{icon:2});
                 
               }
               if(res.status==-2){               
                   layer.msg(res.msg,{icon:2});
                 
               }/*else{
                   //alert();
                   layer.msg("服务器错误",{icon:2});
               }*/
          },'json');
      
      }
    </script>
</body>
</html>