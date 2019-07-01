<?php


namespace app\admin\controller;

use think\Controller;
use think\Db;

class Admin extends Controller
{
    function show(){
        $r=Db::table("student")->select();
        $this->assign("data",$r);
        return $this->fetch();
    }

}