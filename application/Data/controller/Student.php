<?php


namespace app\Data\controller;


use think\Db;

class Student
{
    public function select(){
//        $r=  Db::query("SELECT * FROM STUDENT");
//        $r=Db::table('student')->select();
        $r=Db::name("student")->select();
        dump($r);
    }
    public function  add(){
//       $r= Db::table('student')->insert(['names'=>"卫涛","sex"=>"男","age"=>16,"major"=>"软件开发于设计"]);
        //dump($r);
//        $data=input("post.");
//        $r=Db::table("student")->insert($data);
//        $r=Db::name("student")->where("id",80)->find();
//        $r=Db::name("student")->where('id','>=','80')->limit(10)->select();
//        $r=Db::name('student')->where('id','in',[79,80,85])->select();
//        $r=Db::name('student')->where('id',"between",[80,90])->select();
//        $r=Db::name("student")->where(['id'=>['between','85,90'],'names'=>['like','%卫%'],])->select();
//        $r=\app\model\StudentModel::get("80");
//        $r=\app\model\StudentModel::get(['age'=>16]);
//        $r=\app\model\StudentModel::get(function ($query){
//            return $query->where("id",80);
//        });
//        $r=\app\model\StudentModel::all();
//        foreach ($r as $user){
//            echo $user->names;
//            echo $user->age;
//            echo $user->sex;
//            echo '___<br/>';
//        }

//            return json($r);
    }
    public function updata(){
        {
            $user=\app\model\StudentModel::get(80);
            $user->names='刘海洋';
            $user->age=20;
            $user->major="人工智能方向";
            $user->sex="男";
            if	(false	!==	$user->save())	{
                return	'更新用户成功';
            }	else	{
                return	$user->getError();
            }
        }

    }
    public	function	delete($id) {

//        $id=input("get.");
//            dump( $id);

        $user	=	UserModel::get($id);
        if	($user)	{
            $user->delete();
            return	'删除用户成功';
        }	else	{
            return	'删除的用户不存在';
        } }



}