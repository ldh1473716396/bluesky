<?php

namespace app\admin\controller;

use app\admin\controller\Index;
use app\admin\controller\Login;

class Admin extends Index
{
	//管理员列表页面
    public function listadmin()
    {
        $list = \app\admin\model\Admin::select();
        $this->assign('list',$list);        
        return view();
    }

    //管理员添加页面
    public function addadmin()
    { 
        return view();
    }

    //管理员添加功能
    public function add()
    {
    	if (session('admin_id') !== 1) {
    		$this->error('无权添加。');
    	}
        $add = input('post.');
        $add['admin_password'] = md5($add['admin_password']);
       	$modelAdmin = new \app\admin\model\Admin;
        $modelAdmin->save($add);
        $this->redirect('admin/admin/listadmin');       
    }

 	//管理员名称编辑页面
    public function editadmin_name($id)
    {
    	if (session('admin_id') !== 1) {
    		$this->error('无权编辑。');
    	}
    	$data = \app\admin\model\Admin::where('id',$id)->find();
    	$this->assign(['id'=>$id, 'admin_name'=>$data['admin_name']]);        
        return view();
    }

    //管理员密码修改页面
    public function editadmin_password($id)
    {
    	if (session('admin_id') !== 1) {
    		$this->error('无权修改。');
    	}
    	$data = \app\admin\model\Admin::where('id',$id)->find();
        $this->assign(['id'=>$id, 'admin_name'=>$data['admin_name']]);      
        return view();
    }

    //管理员修改功能
    public function edit($id)
    { 
    	$edit = input('post.');

        if (isset($edit['admin_name'])) {
        	$save = \app\admin\model\Admin::where('id',$id)->find();       	
        	$save->save($edit);
        	$this->redirect('admin/admin/listadmin');      	        	
        }

        if (isset($edit['admin_password'])) {
        	$save = \app\admin\model\Admin::where('id',$id)->find();
        	$edit['admin_password'] = md5($edit['admin_password']);
        	$save->save($edit);
        	$this->redirect('admin/admin/listadmin');       	
        }
    }

    //管理员删除功能
    public function del($id)
    {
    	if (session('admin_id') !== 1) {
    		$this->error('无权删除。');
    	} 
    	$del = \app\admin\model\Admin::where('id',$id)->find();
    	$del->delete();
    	$this->redirect('admin/admin/listadmin');
    }


    public function text()
    { 
        return view();
    }



    

}
