<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:38:"./template/pc/default/pages\index.html";i:1493368291;s:31:"./template/pc/default/base.html";i:1493359363;s:43:"./template/pc/default/public\news_left.html";i:1493368236;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<title><?php echo $webConfig['WEB_NAME']; ?></title>
	<meta name="keyword" content="<?php echo $webConfig['WEB_KEYWORDS']; ?>">
	<meta name="description" content="<?php echo $webConfig['WEB_DESCRIPTION']; ?>">
	<meta name="author" content="Tengjungui">
	<link rel="stylesheet" href="__HOME__/css/common.css">
	<link rel="stylesheet" href="__HOME__/css/style.css">
	<script src="__HOME__/js/jquery.min.1.11.3.js"></script>
	<script src="__HOME__/js/SuperSlide.2.1.1.js"></script>
    <script src="__HOME__/js/js.js"></script>
<!--[if lt IE 9]>
<script src="__HOME__js/html5.js"></script>
<![endif]-->
<!--[if IE 6]>
<script src="__HOME__js/png.js"></script>
<script>
<![endif]-->


</head>
<body>
	<header class="index_header">
		<div class="index_header_l">
			<img src="__HOME__/images/index_03.png" alt="">
		</div>
		<ul class="index_header_l2">
			<li>尚品牌</li>
			<li>·</li>
			<li>重信誉</li>
			<li>·</li>
			<li>高质量</li>
			<li>·</li>
			<li>强服务</li>
		</ul>
		<dl class="index_header_r">
			<dt><img src="__HOME__/images/index_05.png" alt=""><span><?php echo $webConfig['WEB_TEL']; ?></span>
			<div class="clear"></div>
			</dt>
			<dd>7X24小时全国服务热线，欢迎来电咨询！</dd>
		</dl>
		<div class="clear"></div>
	</header>
	<nav class="index_nav">
		<ul class="index_nav_ul index_public">
			<li><a href="<?php echo url('index/index/index'); ?>">首页</a></li>
			<li><a href="<?php echo url('index/pages/index',['id'=>'1']); ?>">公司简介</a></li>
			<li><a href="<?php echo url('index/product/index'); ?>">产品展示</a></li>
			<li><a href="<?php echo url('index/article/lists'); ?>">新闻动态</a></li>
			<li><a href="<?php echo url('index/pages/index',['id'=>'3']); ?>">关于我们</a></li>
			
			<!-- <li><a href="case.html">案例展示</a></li> -->
			<li><a href="<?php echo url('index/pages/index',['id'=>'2']); ?>">联系我们</a></li>
		</ul>
	</nav>
	<!-- banner -->
	
    <!-- banner -->
    <div class="index_case_banner index_public">
        <img src="__HOME__/images/case_03.png" alt="">
    </div>

	<!-- banner -->

	<!-- main -->
	
    <!-- main -->
    <div class="case_main index_public">
        <section class="case_left">
            <footer class="case_left_t">
                <span class="case_left_t1">公司简介</span>
                <span class="case_left_t2">Company profile</span>
            </footer>
            <ul class="case_left_ul1">
                <li><a href="<?php echo url('index/pages/index',['id'=>'1']); ?>" class="case_left_li_on">公司简介</a></li>
                <li><a href="<?php echo url('index/pages/index',['id'=>'2']); ?>">关于我们</a></li>
                <li><a href="<?php echo url('index/pages/index',['id'=>'4']); ?>">联系我们</a></li>
            </ul>

            <footer class="case_left_b">
                <span class="case_left_b1">新闻咨询</span>
                <span class="case_left_b2"><a href="">MORE+</a></span>
            </footer>
           <!--公共新闻列表-->
                <ul class="case_left_ul2">
             <?php if(is_array($new_list) || $new_list instanceof \think\Collection || $new_list instanceof \think\Paginator): $i = 0; $__LIST__ = $new_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
             <li><a href="<?php echo url('index/article/detail',['id'=>$vo['id']]); ?>"><?php echo $vo['title']; ?></a></li>
             <?php endforeach; endif; else: echo "" ;endif; ?>
 </ul>

        </section>
        <section class="case_right">
            <header class="case_right_f">
                <div class="case_right_f_l"> <?php echo $page['page_name']; ?></div>
                <div class="case_right_f_r">
                    <a href="jvascript:;">首页</a>&gt
                    <a href="">公司简介</a>&gt
                    <a href="">发展历程</a>
                </div>
                <div class="clear"></div>
            </header>
            <div class="case_right_box">
                <div class="aboat_text">
                      <?php echo stripslashes(htmlspecialchars_decode($page['content'])); ?>
                </div>
                <div class="about_img1">
                    <img src="images/about1_03.png" alt="">
                </div>

            </div>
        </section>
        <div class="clear"></div>
    </div>


	<!-- main -->
	<!-- 页尾 -->
	<footer class="index_footer" style="height:110px;">
		<div class="index_footer_box index_public">
			<div class="index_footer_l">
				<img src="__HOME__/images/index1_03.png" alt="">
			</div>
			<div class="index_footer_c">
				<ul>
				<?php if(is_array($FriendLink) || $FriendLink instanceof \think\Collection || $FriendLink instanceof \think\Paginator): $i = 0; $__LIST__ = $FriendLink;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<li>|</li>
					<li><a href="<?php echo $vo['link_url']; ?>" target="_blank"><?php echo $vo['link_name']; ?></a></li>
					
				<?php endforeach; endif; else: echo "" ;endif; ?>

				</ul>
				<div><?php echo $webConfig['WEB_ICP_NUMBER']; ?> <br/> 传真：027-81331070
地址:<?php echo $webConfig['WEB_ADRESS']; ?> 技术支持:<a href="" target="_blank">拍拍建站</a></div>
			</div>
			<div class="index_footer_r">
				<img src="__HOME__/images/index_88.png" alt="">
			</div>
			<div class="clear">
			</div>
		</div>
	</footer>

</body>


<!---orther-->
<?php echo \think\Config::get('site.WEB_TONGJI'); ?>
<!---orther/-->
</html>