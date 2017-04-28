<?php
namespace app\admin\controller;
use think\Request;
use think\Db;
class Product extends Base
{
    public function _initialize()
    {           
        //$Tree = new \util\Tree;
        $Tree = new \util\Tree;
        $list=\app\common\model\ProductCate::lists(2);           
        $list=$Tree->tree($list);
        //dump($list);exit; 
        $this->assign("list",$list);
       
    }
    /*显示*/
    public function index()
    {
    	$list=\app\common\model\Product::lists(2);
    	//dump($list);exit;
    	$this->assign("list",$list);   	
        return $this->fetch();
    }

    /*新增*/
    public function add()
    {
    	if (Request::instance()->isPost()) {     
    	    $data=[];
            $data['content']=input('post.editorValue');
            $data['add_time']=time();          
            $data=input('post.');
            //获取全部的post变量
            //dump($data);exit;
    		$insert=\app\common\model\Product::inserts($data);
    		if ($insert) {
                action_log('add_product', 'product', $insert, session('aid'));  			
    			$this->success("操作成功","admin/product/index");
    		}else{
    			$this->error("操作失败");
    		}
    		  
    	}
    	return $this->fetch();
    }

   
    

   /*更新数据*/
    public function edit($id)
    {
        $msg=\app\common\model\Product::finds($id);
        $img=$msg['image']; //用于修改时删除
        //dump($img);exit();
        $this->assign("msg",$msg);
        if (Request::instance()->isPost()) {
            $data=Request::instance()->post();
            // dump($data);
            $edit=\app\common\model\Product::updatemsgs($data,$id);
            if ($edit){
                $img=UPLODS.$msg['image'];
                //dump($img);exit();
                if(file_exists($img)){
                   unlink($img);
                }
                 action_log('edit_product', 'product', $id, session('aid'));              
                $this->success("更新成功","admin/product/index",1);
            }else{
                 $this->error('操作失败');
            }

        }else{

            return $this->fetch();
        }
    }

    /**
     * 删除
    */
    public function del(){    	    		
	    if(request()->isPost()){
	    	 $ids=input('param.','int');
	    	 //dump($ids);exit();
	    	 foreach ($ids as $key => $value) {
	    	 	$ids= $value; 	 		
	    	 }	
	    	  //dump($ids);exit();   	 	
    		 $map['id'] = ['in',$ids];
	    }
	    if(request()->isGet()){
	    	 $ids=input('get.id',0,'int');	
    		 $map['id'] = $ids;
	    }	     	
     	$res=\app\common\model\Product::dels($map);    
        if($res){
          //unlink("./Uploads/".$data['images']);
          //行为记录 
          if(is_array($ids)){
             $ids=implode(",",$ids);
          }
          action_log('del_product', 'product', $ids, session('aid'));
          $this->success('删除成功',url('index'),'1');
        }else{
          $this->error('删除失败');
        }
    }
   

   
}