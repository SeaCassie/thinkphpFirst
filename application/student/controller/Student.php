<?php


namespace app\student\controller;


use app\model\ManagerModel;
use think\Controller;
use think\Session;

class Student extends  Controller
{
    public function login(){
        return view("login/login",['title'=>'登录']);
    }
    public function checklogin() {
        $names=input("post.username");
        $pass=input("post.password");

        $model=new ManagerModel();
        $r=$model->where("names",$names)->find();


        if(isset($r)){
            if ($r->password===md5($pass)){
                Session::set("names",$names);
                 $this->success("登陆成功",'index');
            }else{
                $this->error("密码错误",'login');
            }
        }else{
             $this->error("用户名不存在",'login');
        }

    }
    public function index(){
       $f= Session::get("names");
        if (isset($f)){
                return view("login/index");
        } else{
            return redirect("login");
        }
    }
    public function select(){
        $r=\app\model\StudentModel::all();
        if (isset($r)){
            return json(["data"=>$r,"code"=>200,"msg"=>"获取成功"]);
        }else{
            return json(["code"=>10001,"msg"=>"获取失败"]);
        }
    }
    public function delete(){
        $id=input('get.id');
        $r=\app\model\StudentModel::destroy($id);
        if ($r>0){
            return json(["code"=>200,"msg"=>"删除成功"]);
        }else{
            return json(["code"=>10001,"msg"=>"删除失败"]);
        }
    }
    public function add(){
        $data=input("get.");
//        dump($data);
      $model=new \app\model\StudentModel();
      $r=$model->insert($data);
      if (isset($r)){
          return json(["code"=>200,"msg"=>"添加成功"]);
      }else{
          return json(["code"=>10001,"msg"=>"添加失败"]);
      }
    }
    public function selectone(){
        $id=input("get.id");

        $r=\app\model\StudentModel::get($id);
        if (isset($r)){
            return json(["code"=>200,"data"=>$r,"msg"=>"获取成功"]);
        }else {
            return json(["code"=>10001,"msg"=>"获取失败"]);
        }

    }
    public function update(){
        $stu=new \app\model\StudentModel();
        $data=input("get.");
        $r=$stu->allowField(true)->save($data,["id"=>$data["id"]]);
        if (isset($r)){
            return json(["code"=>200,"msg"=>"修改成功"]);
        }else{
            return json(["code"=>10001,"msg"=>"更新失败"]);
        }
    }
}