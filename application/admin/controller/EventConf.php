<?php

namespace app\admin\controller;

use app\admin\controller\Index;

class EventConf extends Index 
{
    //事件配置页面
    public function pageconf()
    {
        $modelEventConf = \app\admin\model\EventConf::order('event_conf_sort','asc')->select();
        foreach ($modelEventConf as $k => $v) {
            if (strstr($v['event_conf_value'],"/")) {
                $v['event_conf_value'] = explode("/",$v['event_conf_value']);
            }
            else{
                $v['event_conf_value'] = array($v['event_conf_value']);
            }
        }
        $this->assign('conf',$modelEventConf);
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
        if (isset($add['event_conf_value'])&&(strstr($add['event_conf_value'],'|')||strstr($add['event_conf_value'],'*')||strstr($add['event_conf_value'],'-'))) {
            $this->error('填写内容含有禁用符号。');
        }
        $modelEventConf = new \app\admin\model\EventConf;     
        $modelEventConf->save($add);
        $this->redirect('admin/event_conf/pageconf');
    }

    //事件配置项修改页面
    public function editconf($id)
    {
    	$edit = \app\admin\model\EventConf::where('id',$id)->find();
    	$this->assign('edit',$edit);
        return view();
    }

    //事件配置项修改功能
    public function edit($id)
    {
    	$save = input('post.');
        if (isset($save['event_conf_value'])&&(strstr($save['event_conf_value'],'|')||strstr($save['event_conf_value'],'*')||strstr($save['event_conf_value'],'-'))) {
            $this->error('填写内容含有禁用符号。');
        }
    	$edit = \app\admin\model\EventConf::where('id',$id)->find();
    	$edit->save($save);
    	$this->redirect('admin/event_conf/pageconf');
    }

    //事件配置项删除功能
    public function del($id)
    {
    	$del = \app\admin\model\EventConf::where('id',$id)->find();
    	$del->delete();
    	$this->redirect('admin/event_conf/pageconf');
    }

    //排序
    public function sort()
    {
        $modelEventConf = new \app\admin\model\EventConf;
        $sort = input('post.');
        foreach ($sort as $k => $v) 
        {
            $modelEventConf->where('id', $k)->update(['event_conf_sort' => $v]);
        }       
        $this->redirect('admin/event_conf/pageconf');
    }

}
