<?php
namespace app\team\controller;
use think\Controller;

class Team extends Controller
{
    //登陆页面
    public function signin()
    {   
        return view();
    }

    //登录功能
    public function _signin()
    {
        $data = input('post.');
        $modelTeam = new \app\team\model\Team;
        $num = $modelTeam->login($data);
        if ($num == 1) {
        	$this->redirect('/');
        }
        if ($num == 2) {
        	$this->error('密码错误','team/team/signin');
        }
        if ($num == 3) {
        	$this->error('该队员名称不存在','team/team/signin');
        }     
    }

    //退出登陆功能
    public function signout()
    {
        session(null);
        $this->success('退出成功','team/team/signin');
    }

    

}
