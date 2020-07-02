<?php

namespace app\admin\controller;

use app\admin\controller\Index;


class AdminRecord extends Index 
{
    public function addrecord($sheet_id,$event_id)
    {
        $judge = \app\admin\model\AdminRecord::where(['event_id'=>$event_id,'sheet_id'=>$sheet_id])->find();
        if ($judge) {
            $this->error('您已填写。');
        }

        //工作表内容信息
        $sheet = \app\admin\model\Sheet::where('id',$sheet_id)->find();

        //工作表内容配置信息
        $sheet_conf = \app\admin\model\SheetConf::where('sheet_id',$sheet_id)->order('sheet_conf_sort','asc')->select();
        foreach ($sheet_conf as $k => $v) {
            if (strstr($v['sheet_conf_values'],"/")) {
                $v['sheet_conf_values'] = explode("/",$v['sheet_conf_values']);
            }
            else{
                $v['sheet_conf_values'] = array($v['sheet_conf_values']);
            }
        }

        //事件信息
        $event = \app\admin\model\Event::where('id',$event_id)->field('id,event_title')->find();
        
        $this->assign(['sheet'=>$sheet,'conf'=>$sheet_conf,'event'=>$event]); 
        return view();
    }

    //工作表内容添加功能
    public function add($sheet_id,$event_id)
    {
        $add = input('post.');

        $add['sheet_id'] = $sheet_id;
        $add['event_id'] = $event_id;
        $add['admin_id'] = session('admin_id');
        
        if (isset($add['admin_content'])) {

            //禁用符号
            foreach ($add['admin_content'] as $k => $v) {
                if (!is_array($v)&&(strstr($v,'|')||strstr($v,'*')||strstr($v,'-'))) {
                    $this->error('填写内容含有禁用符号。');
                }
            }

            $modelEvent = new \app\admin\model\Event;
            $add['admin_content'] = $modelEvent->content($add['admin_content']);
        }

        $modelAdminRecord = new \app\admin\model\AdminRecord;
        $modelAdminRecord->save($add);

        $this->redirect('admin/event/readevent',['id'=>$event_id]);        
    }

    //工作表内容编辑页面
    public function editrecord($event_id,$sheet_id)
    {
        $edit = \app\admin\model\AdminRecord::where(['event_id'=>$event_id,'sheet_id'=>$sheet_id])->find();
        if (!$edit) {
            $this->error('您未填写过，不能编辑。');
        }
        
        //$sheet_conf
        $sheet_conf = \app\admin\model\SheetConf::where('sheet_id',$sheet_id)->order('sheet_conf_sort','asc')->select();
        foreach ($sheet_conf as $k => $v) {
            if (strstr($v['sheet_conf_values'],"/")) {
                $v['sheet_conf_values'] = explode("/",$v['sheet_conf_values']);
            }
            elseif(!empty($v['sheet_conf_values'])){
                $v['sheet_conf_values'] = array($v['sheet_conf_values']);
            }
        }

        //$edit['admin_content']
        if (!empty($edit['admin_content'])) {
            $modelEvent = new \app\admin\model\Event;
            $edit['admin_content'] = $modelEvent->read($edit['admin_content']);
        }
        
        $event = \app\admin\model\Event::where('id',$event_id)->field('id,event_title')->find();
        $sheet = \app\admin\model\Sheet::where('id',$sheet_id)->find();
        $this->assign(['conf'=>$sheet_conf,'edit'=>$edit,'event'=>$event,'sheet'=>$sheet]);

        return view();
    }

    //工作表内容编辑功能
    public function edit($event_id,$sheet_id)
    {
        $edit = input('post.');

        $find = \app\admin\model\AdminRecord::where(['event_id'=>$event_id,'sheet_id'=>$sheet_id])->find();

        if (isset($find['admin_content'])) {
            $modelEvent = new \app\admin\model\Event;
            $find['admin_content'] = $modelEvent->read($find['admin_content']);
        }

        if (isset($edit['admin_content'])) {

            //禁用符号
            foreach ($edit['admin_content'] as $k1 => $v1) {
                if (!is_array($v1)&&(strstr($v1,'|')||strstr($v1,'*')||strstr($v1,'-'))) {
                        $this->error('填写内容含有禁用符号。');                 
                }
            }
            
            //对比原先数据，为空的话等于原先数据，保持不变           
            foreach ($edit['admin_content'] as $k => $v) {
                if (empty($v)) {
                    $edit['admin_content'][$k] = $find['admin_content'][$k];
                }
            }            
            $edit['admin_content'] = $modelEvent->content($edit['admin_content']);
        }

        $find->save($edit);
        $this->redirect('admin/event/readevent',['id'=>$event_id]);
    }

    //工作表内容删除功能
    public function del($event_id,$sheet_id)
    {
        $del = \app\admin\model\AdminRecord::where(['event_id'=>$event_id,'sheet_id'=>$sheet_id])->find();
        if($del){
            $del->delete();
        }
        $this->redirect('admin/event/readevent',['id'=>$event_id]);      
    }



}
