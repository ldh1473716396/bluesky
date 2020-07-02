<?php
namespace app\team\controller;

use think\Controller;

class Index extends Controller
{
	//控制器初始方法	
	protected function initialize()
    {
    	if(!session('team_id') || !session('team_name'))
        {
           $this->success('请登录','team/team/signin'); 
        }
    }

    public function index()
    {
        return view();
    }

}
