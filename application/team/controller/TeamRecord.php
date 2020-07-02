<?php

namespace app\team\controller;

use app\team\controller\Index;

class TeamRecord extends Index
{
	public function addrecord($sheet_id,$event_id)
    {
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
        $add['team_id'] = session('team_id');
        
        if (isset($add['team_content'])) {

            //禁用符号
            foreach ($add['team_content'] as $k => $v) {
                if (!is_array($v)&&(strstr($v,'|')||strstr($v,'*')||strstr($v,'-'))) {
                    $this->error('填写内容含有禁用符号。');
                }
            }

            $modelEvent = new \app\admin\model\Event;
            $add['team_content'] = $modelEvent->content($add['team_content']);
        }

        $modelTeamRecord = new \app\admin\model\TeamRecord;
        $modelTeamRecord->save($add);

        $this->redirect('team/event/readevent',['id'=>$event_id]);        
    }

    //工作表内容编辑页面
    public function editrecord($id,$event_id,$sheet_id)
    {
        $edit = \app\admin\model\TeamRecord::where(['id'=>$id])->find();
    
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

        //$edit['team_content']
        if (!empty($edit['team_content'])) {
            $modelEvent = new \app\admin\model\Event;
            $edit['team_content'] = $modelEvent->read($edit['team_content']);
        }
        
        $event = \app\admin\model\Event::where('id',$event_id)->field('id,event_title')->find();
        $sheet = \app\admin\model\Sheet::where('id',$sheet_id)->find();
        $this->assign(['conf'=>$sheet_conf,'edit'=>$edit,'event'=>$event,'sheet'=>$sheet]);

        return view();
	}

    //工作表内容编辑功能
    public function edit($id)
    {
        $edit = input('post.');
        $modelEvent = new \app\admin\model\Event;

        //取出数据库里原先的数据化为数组
        $find = \app\admin\model\TeamRecord::where('id',$id)->find();        
        if (isset($find['team_content'])) {
            $modelEvent = new \app\admin\model\Event;
            $find['team_content'] = $modelEvent->read($find['team_content']);
        }

        //把编辑后的数据化为字符串
        if (isset($edit['team_content'])) {

            //禁用符号
            foreach ($edit['team_content'] as $k1 => $v1) {
                if (!is_array($v1)&&(strstr($v1,'|')||strstr($v1,'*')||strstr($v1,'-'))) {
                        $this->error('填写内容含有禁用符号。');                 
                }
            }
            
            //对比原先数据，为空的话等于原先数据，保持不变           
            foreach ($edit['team_content'] as $k => $v) {
                if (empty($v)) {
                    $edit['team_content'][$k] = $find['team_content'][$k];
                }
            }            
            $edit['team_content'] = $modelEvent->content($edit['team_content']);
        }

        $find->save($edit);
        $this->redirect('team/event/readevent',['id'=>$find['event_id']]);
    }

    public function del($id,$event_id)
    {
        $del = \app\admin\model\TeamRecord::where('id',$id)->find();
        $del->delete();
        $this->redirect('team/event/readevent',['id'=>$event_id]);        
    }
}

?>