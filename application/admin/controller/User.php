<?php
namespace app\admin\controller;
use think\Request;
use think\Db;
use think\Model;
class User extends Base
{
	public function login(){
		if(Request::instance()->isAjax()){
			  $this->check_code();      
		    $this->check_acount(); 
		}
		 

      return $this->fetch('user/login'); 
    }

	  public function check_code(){
		    $captcha=input('post.verify');
        //$captcha=$this->request->post('verify', '');
        //dump($captcha);exit;
        if(!captcha_check($captcha)){
         $res=['status' => -2, 'msg' => '验证码错误'];
         echo json_encode($res);exit();
        };
    
    }

    public function check_acount(){
    	  $data['user_name'] = input('post.username');
        $data['password']  =encrypt(input('post.password'));
        $re=\app\common\model\Admin::_check($data['user_name'],$data['password']);
       
        if(empty($re)) {
              $res=['status' => -1, 'msg' => '用户名或密码错误'];
        }else{

	        $d=\app\common\model\Admin::get_info($data['user_name']);
	        session('aid',$d['id']);
          session('aname',$d['user_name']);
	        session('aip',$d['last_ip']);
	        session('last_login',$d['last_login']);
	        session('login_count',$d['login_count']);
	        $data['last_login']=time();
            //$data['last_ip']=get_client_ip();
	        $data['login_count'] =$d['login_count'] + 1;
	        $result=\app\common\model\Admin::updatemsgs($data,$d['id']);
	        //dump($data);exit;
          
          //行为记录 
          action_log('user_login', 'article', $result, session('aid'));
	        $res=['status' => 1, 'msg' => '验证通过'];
        }
        echo json_encode($res);exit();
    
    }


    public function login_out()
    {
      if(Request::instance()->isAjax()){
       session(null);
       $res=['status' => -1, 'msg' => '退出登陆'];
       echo json_encode($res);exit();
      }
      	$this->success('未登陆',url('admin/User/login')); 
      
    }
}