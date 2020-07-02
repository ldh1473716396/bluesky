<?php

namespace app\admin\controller;

use app\admin\controller\Index;

class LogConf extends Index 
{
    //记录表配置页面
    public function pageconf()
    {
        $modelLogConf = \app\admin\model\LogConf::order('log_conf_sort','asc')->select();
        foreach ($modelLogConf as $k => $v) {
            if (strstr($v['log_conf_value'],"/")) {
                $v['log_conf_value'] = explode("/",$v['log_conf_value']);
            }
            else{
                $v['log_conf_value'] = array($v['log_conf_value']);
            }
        }
        $this->assign('conf',$modelLogConf);
        return view();
    }

    //记录表配置项添加页面
    public function addconf()
    {
        return view();
    }

    //记录表配置项添加功能
    public function add()
    {
        $add = input('post.');
        if (isset($add['log_conf_value'])&&(strstr($add['log_conf_value'],'|')||strstr($add['log_conf_value'],'*')||strstr($add['log_conf_value'],'-'))) {
            $this->error('填写内容含有禁用符号。');
        }
        $modelLogConf = new \app\admin\model\LogConf;     
        $modelLogConf->save($add);
        $this->redirect('admin/log_conf/pageconf');
    }

    //记录表配置项修改页面
    public function editconf($id)
    {
    	$edit = \app\admin\model\LogConf::where('id',$id)->find();
    	$this->assign('edit',$edit);
        return view();
    }

    //记录表配置项修改功能
    public function edit($id)
    {
    	$save = input('post.');
        if (isset($save['log_conf_value'])&&(strstr($save['log_conf_value'],'|')||strstr($save['log_conf_value'],'*')||strstr($save['log_conf_value'],'-'))) {
            $this->error('填写内容含有禁用符号。');
        }
    	$edit = \app\admin\model\LogConf::where('id',$id)->find();
    	$edit->save($save);
    	$this->redirect('admin/log_conf/pageconf');
    }

    //记录表配置项删除功能
    public function del($id)
    {
    	$del = \app\admin\model\LogConf::where('id',$id)->find();
    	$del->delete();
    	$this->redirect('admin/log_conf/pageconf');
    }

    //排序
    public function sort()
    {
        $modelLogConf = new \app\admin\model\LogConf;
        $sort = input('post.');
        foreach ($sort as $k => $v) 
        {
            $modelLogConf->where('id', $k)->update(['log_conf_sort' => $v]);
        }       
        $this->redirect('admin/log_conf/pageconf');
    }

}
