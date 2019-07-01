<?php
namespace app\index\controller;

use think\Controller;
use think\Request;


class Index extends Controller
{
    public function index($name = 'thinkphp')
    {
        $this->assign('name',$name);
        return $this->fetch();
    }
    public function repose($name){
        //第一种方法request方法
//        $resquest=Request::instance();
//        dump($resquest->url()) ;
        //第二种方法  原生的方法
//        dump($_GET);
//        dump($_SERVER);
        //第三种方法依靠controller父类
//        dump($this->request->url());
//        dump($this->request);
        //第四种方法通过参数注入request对象 没有继承的条件下  	public	function	hello(Request	$request,	$name	=	'World')
//        dump($request->utl());
        //第五种方法 借助于thinkphpt提供的助手函数
//        dump(request()->url());
//        dump(\request());
        //第六种方法
//            dump(input("get"));
//            dump(input("post"));



        $data=['name'=>'think','status'=>'1'];

        return $data;
    }

}
