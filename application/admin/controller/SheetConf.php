<?php

namespace app\admin\controller;

use app\admin\controller\Index;

class SheetConf extends Index 
{
	//工作表配置项内容页面
    public function pageconf($sheet_id)
    {
        $sheet = \app\admin\model\Sheet::where('id',$sheet_id)->find();    
        $confs = \app\admin\model\SheetConf::where('sheet_id',$sheet_id)->order('sheet_conf_sort','asc')->select();
        foreach ($confs as $k => $v) {
            if (strstr($v['sheet_conf_values'],"/")) {
                $v['sheet_conf_values'] = explode("/",$v['sheet_conf_values']);
            }
            else{
                $v['sheet_conf_values'] = array($v['sheet_conf_values']);
            }
        }
        $this->assign(['sheet'=>$sheet,'confs'=>$confs]);
        return view();
    }

    //工作表配置项添加页面
    public function addconf($sheet_id,$sheet_name)
    {
        $this->assign(['sheet_id'=>$sheet_id,'sheet_name'=>$sheet_name]);
        return view();
    }

    //工作表配置项添加功能
    public function add($sheet_id)
    {
        $add = input('post.');
        if (isset($add['sheet_conf_values'])&&(strstr($add['sheet_conf_values'],'|')||strstr($add['sheet_conf_values'],'*')||strstr($add['sheet_conf_values'],'-'))) {
            $this->error('填写内容含有禁用符号。');
        }
        $add['sheet_id'] = $sheet_id;
        $modelSheetConf = new \app\admin\model\SheetConf;       
        $modelSheetConf->save($add);
        $this->redirect('admin/sheet_conf/pageconf', ['sheet_id' => $sheet_id]);
    }

    //工作表配置项修改页面
    public function editconf($conf_id,$sheet_name)
    {
        $edit = \app\admin\model\SheetConf::where('id',$conf_id)->find();
        $this->assign(['edit'=>$edit,'sheet_name'=>$sheet_name]);
        return view();
    }

    //工作表配置项修改功能
    public function edit($conf_id)
    {
        $edit_data = input('post.');
        if (isset($edit_data['sheet_conf_values'])&&(strstr($edit_data['sheet_conf_values'],'|')||strstr($edit_data['sheet_conf_values'],'*')||strstr($edit_data['sheet_conf_values'],'-'))) {
            $this->error('填写内容含有禁用符号。');
        }
        $save = \app\admin\model\SheetConf::where('id',$conf_id)->find();
        $save->save($edit_data);
        $this->redirect('admin/sheet_conf/pageconf', ['sheet_id' => $save['sheet_id']]);
    }

    //工作表配置项删除功能
    public function del($conf_id,$sheet_id)
    {
        $del = \app\admin\model\SheetConf::where('id',$conf_id)->find();
        $del->delete();
        $this->redirect('admin/sheet_conf/pageconf', ['sheet_id' => $sheet_id]);
    }


    //排序
    public function sort($sheet_id)
    {
        $modelSheetConf = new \app\admin\model\SheetConf;
        $sort = input('post.');
        foreach ($sort as $k => $v) 
        {
            $modelSheetConf->where('id', $k)->update(['sheet_conf_sort' => $v]);
        }       
        $this->redirect('admin/sheet_conf/pageconf', ['sheet_id' => $sheet_id]);
    }

}
