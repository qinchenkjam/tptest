<?php
namespace app\admin\controller;
use think\Request;
use think\Model;
use think\Db;
class Article extends Base
{
	public function _initialize()
    {       	
        //列表 添加 修改 都用到
    	$ArticleCate=\app\common\model\ArticleCate::lists();   	
    	$this->assign('ArticleCate', $ArticleCate);
    }

	public function index()
	{    
		$map  = [];
        if(request()->isPost()){
         //$data=input('post.');
          $keyword=input('post.title');
          $Catid=intval(input('post.cat_id')); //input('param.cat_id') 只能post
          $sTime=strtotime(input("post.dateStart"));
    	  $dTime=strtotime(input("post.dateEnd")); 
        }
        //按关键词显示
	    if (!empty($keyword)) {
            $map['title'] = ['like', "%{$keyword}%"];
            //dump($map['title']);exit;
        }	    
	    //按分类显示		
		if(!empty($Catid)){			
			$map['cat_id'] =$Catid;  //数据库是数字
			//dump($map['cid']);exit;
		}
        
        //按时间显示		
		if(!empty($sTime)){			
			$map['add_time'] = ['gt',$sTime];//查询条件

		}
		if(!empty($dTime)){			
			$map['add_time'] = ['lt',$dTime];//查询条件
		}
	    $list=\app\common\model\Article::lists($map,2);
	  
    	//dump($list);exit;
    	$this->assign("list",$list);   	
		return $this->fetch();
	}

	public function newsAdd()
	{
		 if(request()->isAjax()){
		 	$data=[];
		 	$data['content']=input('post.editorValue');
		 	$data=input('post.');
		 	$insert=\app\common\model\Article::inserts($data);
    		if ($insert) {
    			$res=['status' => 1, 'msg' => '添加成功'];
         		echo json_encode($res);exit();
    		}else{

    		    $res=['status' => -1, 'msg' => '添加失败'];
         		echo json_encode($res);exit();	
    		}
		 			 	
		 }else{
		 			
		 	return $this->fetch('article/add');
		 }
		 	
		
	}

	public function newsEdit()
	{
		if(request()->isAjax()){
		 	//$data['content']=input('post.editorValue');		 	
            $data=[];
		    $data=input('post.');
		 	$id=input("param.id");
		   //dump($data);exit;
		   $edit=\app\common\model\Article::updatemsgs($data,$id);
		 	if($edit){
		 		$res=['status' => 1, 'msg' => '操作成功'];
         		echo json_encode($res);exit();
		 		
		 	}else{
		 	
		 		$res=['status' => -1, 'msg' => '操作失败'];
         		echo json_encode($res);exit();	
		 	}
		 
		 }else{
		 	$id=input("get.id");		 
     		$msg=\app\common\model\Article::finds($id);     	
			$this->assign('msg', $msg);
		 	return $this->fetch('article/edit');
		}
		
	}
	
	

	/*public function newsDel($id)
	{  
	    $res=$this->obj->where('id',input('get.id'))->delete();
	    //dump($res);exit();
		return $this->success('删除成功');
	}*/

	public function newsDel($id)
	{  
	    $del=\app\common\model\Article::dels($id);
	    //dump($res);exit();
		if(false !== $del){
    		$res=['status' => 1, 'msg' => '操作成功'];
         	echo json_encode($res);exit();
    	}else {
    		$res=['status' => -1, 'msg' => '操作失败'];
         	echo json_encode($res);exit();
    	}
    	
	}
}