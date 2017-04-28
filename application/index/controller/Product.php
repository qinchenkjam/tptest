<?php
namespace app\index\controller;
class Product extends Base
{
  public function index()
  {
    
    $pro_cate=\app\common\model\ProductCate::topList(); 
    
    $cid=get_urlid(); 
    if($cid>0){         
      $pro_list=\app\common\model\Product::k_lists($cid,12);     
    }else{      
      $pro_list=\app\common\model\Product::lists(12);
    
    }

    $this->assign("pro_list",$pro_list); 
    $this->assign("pro_cate",$pro_cate);  	
    return $this->fetch();
  }



  public function product_show($id)
  {
   /* $url=$_SERVER['REQUEST_URI'];
    $url=basename($url);
    $queryParts = explode('.', $url);
    $id=$queryParts[0];*/
   //dump($id);exit;
    //$id=input("get.id");
    //$id=22;
  
    $id=get_urlid();
    //dump($id);exit;
   	$pro=\app\common\model\Product::finds($id);
   	//$pro_detail=\app\common\model\Product::lists(8);
   	//dump($pro_detail);exit;
    $this->assign("pro",$pro); 
    return $this->fetch();
  }
}