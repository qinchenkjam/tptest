<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
use think\Request;
function isPost()
{
	
	return Request::instance()->isPost();
}

/**
 *   加密方式
 */
function encrypt($str){
     return md5(config('AUTH_CODE').$str);
}


function json_data($status=1,$msg='')
{
	$res=['status' => $status, 'msg' => '$msg'];
	echo json_encode($res); exit();
}
