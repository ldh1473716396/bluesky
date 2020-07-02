<?php
namespace app\admin\controller;

use think\Controller;

class Index extends Controller
{
	//控制器初始方法	
	protected function initialize()
    {
    	if(!session('admin_id') || !session('admin_name'))
        {
           $this->redirect('admin/login/login'); 
        }
    }

    public function index()
    {	
        return view();
    }
}

