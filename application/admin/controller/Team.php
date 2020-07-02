<?php

namespace app\admin\controller;

use app\admin\controller\Index;


class Team extends Index 
{
	//队员列表页面
    public function listteam()
    {
        $list = \app\team\model\Team::select();
        $this->assign('list',$list);        
        return view();
    }

    //队员添加页面
    public function addteam()
    {        
        return view();
    }

    //队员添加功能
    public function add()
    {
        $add = input('post.');
        $add['team_password'] = md5($add['team_password']);
        $modelTeam = new \app\team\model\Team;
        $modelTeam->save($add);
        $this->redirect('admin/team/listteam');
    }

    //队员账号删除功能
    public function del($id)
    { 
    	$this->error('未开发。');
    }
}
