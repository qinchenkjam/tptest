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
            $data=input('post.');
            //获取全部的post变量
            //dump($data);exit;
    		$insert=\app\common\model\Product::inserts($data);
    		if ($insert) {  			
    			$this->success("操作成功","admin/product/index");
    		}else{
    			$this->success("操作失败");
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
                $this->success("更新成功","admin/product/index",1);
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
          $this->success('删除成功',url('index'),'1');
        }else{
          $this->error('删除失败');
        }
    }
   

    public function cateIndex()
    {   
        /*$Tree = new \util\Tree;
        $list=Db::table('tb_product_cate')->select();
        $list=$Tree->tree($list);
       
        $this->assign("list",$list); */
        //dump($list);exit;
    	return $this->fetch('product/cate_index');
    }

     public function cateAdd()
    {
        $Tree = new \util\Tree;
        $list=Db::table('tb_product_cate')->select();
        $list=$Tree->tree($list); 
        if (Request::instance()->isPost()) {

           $data=input('post.');
           $inserts=\app\common\model\ProductCate::insert($data);
           if($inserts){
                return $this->success('添加成功','admin/product/cateIndex');
                //return $this->success('添加成功',url('Product/cateIndex'));
            }else{

                $this->error('添加失败');
            }
        }      
        //dump($list);exit;
    	return $this->fetch('product/cate_add');
    }

    public function cateEdit($id)
    {

       $msg=\app\common\model\ProductCate::finds($id);
       $Tree = new \util\Tree;
       $list=Db::table('tb_product_cate')->select();
       $list=$Tree->tree($list); 

       $this->assign("cate",$list); 
       $this->assign("msg",$msg);
       return $this->fetch();
    }

    public function cateDel($id)
    {
        $list=\app\common\model\Product::k_lists($id);
        if(!empty($list)){
            //exit('<script>alert("分类下有内容");</script>');
            $this->error('分类下有内容');            
        }
       $res=\app\common\model\ProductCate::dels($id);
        if($res){
          $this->success('删除成功');
        }      
    }
}