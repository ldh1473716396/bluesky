<?php
namespace app\api\controller;

use think\Controller;

class Index extends Controller
{
	//控制器初始方法	
	protected function initialize()
    {
        //允许的源域名
        header("Access-Control-Allow-Origin: *");
        //允许的请求头信息
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
        //允许的请求类型
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS, PATCH');
    }

    public function index()
    {
        return view();
    }

}
