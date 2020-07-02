<?php

namespace app\admin\controller;

use app\admin\controller\Index;


class Sheet extends Index 
{
	//工作表列表页面
    public function listsheet()
    {
        $list = \app\admin\model\Sheet::order('sheet_sort','asc')->select();
        $this->assign('list',$list);
        return view();
    }

    //工作表添加页面
    public function addsheet()
    { 
        return view();
    }

    //工作表添加功能
    public function add()
    {
        $add = input('post.');
        $modelSheet = new \app\admin\model\Sheet;
        $modelSheet->save($add);
        $this->redirect('admin/sheet/listsheet');
    }

 	//工作表修改页面
    public function editsheet($id)
    {
        $edit = \app\admin\model\Sheet::where('id',$id)->find();
        $this->assign('edit',$edit);
        return view();
    }

    //工作表修改功能
    public function edit($id)
    {
        $edit_data = input('post.');
        $save = \app\admin\model\Sheet::where('id',$id)->find();
        $save->save($edit_data);
        $this->redirect('admin/sheet/listsheet');
    }

    //工作表删除功能
    public function del($id)
    { 
        $del = \app\admin\model\Sheet::where('id',$id)->find();

        //删有关该表的配置
        $sheet_conf_del = \app\admin\model\SheetConf::where('sheet_id',$id)->select();
        if (count($sheet_conf_del) !== 0) {
            foreach ($sheet_conf_del as $k => $v) {
                $v->delete();
            }
        }

        //删该表
        $del->delete();
        $this->redirect('admin/sheet/listsheet');
    }

    //排序
    public function sort()
    {
        $modelSheet = new \app\admin\model\Sheet;
        $sort = input('post.');
        foreach ($sort as $k => $v) 
        {
            $modelSheet->where('id', $k)->update(['sheet_sort' => $v]);
        }       
        $this->redirect('admin/sheet/listsheet');
    }

    

    

}
