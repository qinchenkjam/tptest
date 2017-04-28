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
use think\Db;
use think\Request;
use think\Cache;
function isPost()
{
	
	return Request::instance()->isPost();
}

/*
*获取id后的数字
* http://www.tp5jsq.com:/index/pages/index/id/1.html
**/
function get_urlid(){
    $url=$_SERVER['REQUEST_URI'];
    $url=basename($url);
    $queryParts = explode('.', $url);
    $id=$queryParts[0];  
    return $id;
}


/**
 *   实现中文字串截取无乱码的方法
 */
function getSubstr($string, $start=0, $length=60) {
      if(mb_strlen($string,'utf-8')>$length){
          $str = mb_substr($string, $start, $length,'utf-8');
          return $str.'...';
      }else{
          return $string;
      }
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

//tpshop
if (!function_exists('get_client_ip')) {
    /**
     * 获取客户端IP地址
     * @param int $type 返回类型 0 返回IP地址 1 返回IPV4地址数字
     * @param bool $adv 是否进行高级模式获取（有可能被伪装）
     * @return mixed
     */
    function get_client_ip($type = 0, $adv = false) {
        $type       =  $type ? 1 : 0;
        static $ip  =   NULL;
        if ($ip !== NULL) return $ip[$type];
        if($adv){
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $arr    =   explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                $pos    =   array_search('unknown',$arr);
                if(false !== $pos) unset($arr[$pos]);
                $ip     =   trim($arr[0]);
            }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
                $ip     =   $_SERVER['HTTP_CLIENT_IP'];
            }elseif (isset($_SERVER['REMOTE_ADDR'])) {
                $ip     =   $_SERVER['REMOTE_ADDR'];
            }
        }elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        // IP地址合法验证
        $long = sprintf("%u",ip2long($ip));
        $ip   = $long ? array($ip, $long) : array('0.0.0.0', 0);
        return $ip[$type];
    }
}


/**
 * 记录行为日志，并执行该行为的规则
 * @param string $action 行为标识
 * @param string $model 触发行为的模型名
 * @param int $record_id 触发行为的记录id
 * @param int $user_id 执行行为的用户id
 * @return boolean
 * @author 
 */
function action_log($action = null, $model = null, $record_id = null, $user_id = null){  
    //参数检查
    if(empty($action) || empty($model) || empty($record_id)){
        return '参数不能为空';
    }
    /*if(empty($user_id)){
        $user_id = is_login();
    }*/

    //查询行为,判断是否执行  
    $action_info=Db::name('action')->where('name',$action)->select();
    //var_dump($action_info[0]);exit();
    if($action_info[0]['status'] != 1){
        return '该行为被禁用或删除';
    }

    
    //插入行为日志
    $data['action_id']      =   $action_info[0]['id'];
    $data['user_id']        =   $user_id;
    $data['action_ip']      =   get_client_ip();
    $data['model']          =   $model;
    $data['record_id']      =   $record_id;
    $data['create_time']    =   time();    
    Db::name('action_log')->insert($data);
   
}

/**
 * 获取行为数据
 * @param string $id 行为id
 * @param string $field 需要获取的字段
 * @author huajie <banhuajie@163.com>
 */
function get_action($id = null, $field = null){
	if(empty($id) && !is_numeric($id)){
		return false;
	}
	$list = Cache::get('action_list');
	if(empty($list[$id])){
		$map = array('status'=>array('gt', -1), 'id'=>$id);
		$list[$id] = Db::name('action')->where($map)->field(true)->find();
	}
	return empty($field) ? $list[$id] : $list[$id][$field];
}
