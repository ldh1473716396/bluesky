<?php

namespace app\admin\controller;

use app\admin\controller\Index;

class StartConf extends Index 
{
    //出队名单配置页面
    public function pageconf()
    {
        $modelStartConf = \app\admin\model\StartConf::order('start_conf_sort','asc')->select();
        foreach ($modelStartConf as $k => $v) {
            if (strstr($v['start_conf_value'],"/")) {
                $v['start_conf_value'] = explode("/",$v['start_conf_value']);
            }
            else{
                $v['start_conf_value'] = array($v['start_conf_value']);
            }
        }
        $this->assign('conf',$modelStartConf);
        return view();
    }

    //出队名单配置项添加页面
    public function addconf()
    {
        return view();
    }

    //出队名单配置项添加功能
    public function add()
    {
        $add = input('post.');
        if (isset($add['start_conf_value'])&&(strstr($add['start_conf_value'],'|')||strstr($add['start_conf_value'],'*')||strstr($add['start_conf_value'],'-'))) {
            $this->error('填写内容含有禁用符号。');
        }
        $modelStartConf = new \app\admin\model\StartConf;     
        $modelStartConf->save($add);
        $this->redirect('admin/start_conf/pageconf');
    }

    //出队名单配置项修改页面
    public function editconf($id)
    {
    	$edit = \app\admin\model\StartConf::where('id',$id)->find();
    	$this->assign('edit',$edit);
        return view();
    }

    //出队名单配置项修改功能
    public function edit($id)
    {
    	$save = input('post.');
        if (isset($save['start_conf_value'])&&(strstr($save['start_conf_value'],'|')||strstr($save['start_conf_value'],'*')||strstr($save['start_conf_value'],'-'))) {
            $this->error('填写内容含有禁用符号。');
        }
    	$edit = \app\admin\model\StartConf::where('id',$id)->find();
    	$edit->save($save);
    	$this->redirect('admin/start_conf/pageconf');
    }

    //出队名单配置项删除功能
    public function del($id)
    {
    	$del = \app\admin\model\StartConf::where('id',$id)->find();
    	$del->delete();
    	$this->redirect('admin/start_conf/pageconf');
    }

    //排序
    public function sort()
    {
        $modelStartConf = new \app\admin\model\StartConf;
        $sort = input('post.');
        foreach ($sort as $k => $v) 
        {
            $modelStartConf->where('id', $k)->update(['start_conf_sort' => $v]);
        }       
        $this->redirect('admin/start_conf/pageconf');
    }

}
