<?php
namespace app\admin\controller;
use think\Request;
use think\Db;
use think\Model;
class Admin extends Base
{
	public function index()
    {
    	$list=\app\common\model\Admin::lists(5);
    	$this->assign('list',$list); 
    	return $this->fetch('admin/admin_list');
    }

    /*编辑页面*/
    public function edit($id=0){
    $id=input('param.id');                   
    $msg=\app\common\model\Admin::finds($id);                   
    $this->assign("msg",$msg);
    return $this->fetch('Admin/admin_add');
    }


    public function save(){
        $data = input('post.');
        $data['password']=encrypt($data['password']);
        //dump($data);exit;
        $id=input('param.id');
         //dump($data);exit();
            if($id>0){
               $result=\app\common\model\Admin::updatemsgs($data,$id);
            } else {
              $info=\app\common\model\Admin::get_info($data['user_name']);
              if($info){
               /* echo '2';exit();
                return false;*/
                 $this->error('用户名已经存在');
               
             /* }else{
                $ajreturn = [
                'status' => 1,
                'msg' => '用户名可以！',
                ];
                 
                echo json_encode($ajreturn);*/
                
              }
              $result=\app\common\model\Admin::inserts($data);
            }
            if(false !== $result){
                $this->success('保存信息成功','admin/Admin/index');
            }

     }


     public function removeinfo($id)
    {  
        $id=input('param.id');
        $res=\app\common\model\Admin::dels($id);
        if($res){
          $this->success('删除成功');
        }
        //dump($res);exit();
       
    }
}