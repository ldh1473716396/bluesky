<?php

namespace app\admin\controller;
use think\Controller;

class login extends Controller
{
    //管理员登录页面
    public function login()
    {
        return view();
    }

    //管理员登录检测
    public function login_check()
    {  
        $data = input('post.');
        $modelAdmin = new \app\admin\model\Admin;
        $num = $modelAdmin->login($data);
        if ($num == 1) {
            $this->redirect('admin/index/index');
        }
        if ($num == 2) {
            $this->error('密码错误','admin/login/login');
        }
        if ($num == 3) {
            $this->error('该管理员名称不存在','admin/login/login');
        }
    }

    //管理员退出登陆功能
    public function logout()
    {
        session(null);
        $this->redirect('admin/login/login');
    }
}
