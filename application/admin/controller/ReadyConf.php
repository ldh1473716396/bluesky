<?php

namespace app\admin\controller;

use app\admin\controller\Index;

class ReadyConf extends Index 
{
    //事件配置页面
    public function pageconf()
    {
        $modelReadyConf = \app\admin\model\ReadyConf::order('ready_conf_sort','asc')->select();
        foreach ($modelReadyConf as $k => $v) {
            if (strstr($v['ready_conf_value'],"/")) {
                $v['ready_conf_value'] = explode("/",$v['ready_conf_value']);
            }
            else{
                $v['ready_conf_value'] = array($v['ready_conf_value']);
            }
        }
        $this->assign('conf',$modelReadyConf);
        return view();
    }

    //事件配置项添加页面
    public function addconf()
    {
        return view();
    }

    //事件配置项添加功能
    public function add()
    {
        $add = input('post.');
        if (isset($add['ready_conf_value'])&&(strstr($add['ready_conf_value'],'|')||strstr($add['ready_conf_value'],'*')||strstr($add['ready_conf_value'],'-'))) {
            $this->error('填写内容含有禁用符号。');
        }
        $modelReadyConf = new \app\admin\model\ReadyConf;     
        $modelReadyConf->save($add);
        $this->redirect('admin/ready_conf/pageconf');
    }

    //事件配置项修改页面
    public function editconf($id)
    {
    	$edit = \app\admin\model\ReadyConf::where('id',$id)->find();
    	$this->assign('edit',$edit);
        return view();
    }

    //事件配置项修改功能
    public function edit($id)
    {
    	$save = input('post.');
        if (isset($save['ready_conf_value'])&&(strstr($save['ready_conf_value'],'|')||strstr($save['ready_conf_value'],'*')||strstr($save['ready_conf_value'],'-'))) {
            $this->error('填写内容含有禁用符号。');
        }
    	$edit = \app\admin\model\ReadyConf::where('id',$id)->find();
    	$edit->save($save);
    	$this->redirect('admin/ready_conf/pageconf');
    }

    //事件配置项删除功能
    public function del($id)
    {
    	$del = \app\admin\model\ReadyConf::where('id',$id)->find();
    	$del->delete();
    	$this->redirect('admin/ready_conf/pageconf');
    }

    //排序
    public function sort()
    {
        $modelReadyConf = new \app\admin\model\ReadyConf;
        $sort = input('post.');
        foreach ($sort as $k => $v) 
        {
            $modelReadyConf->where('id', $k)->update(['ready_conf_sort' => $v]);
        }       
        $this->redirect('admin/ready_conf/pageconf');
    }

}
