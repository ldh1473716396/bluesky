<?php

namespace app\admin\controller;

use app\admin\controller\Index;


class Event extends Index 
{
	//事件列表页面
    public function listevent()
    {
        $list = \app\admin\model\Event::order('update_time','desc')->select();
        $this->assign('list',$list);
        return view();
    }

    //事件添加页面
    public function addevent()
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

    //事件添加功能
    public function add()
    {
        $add = input('post.');
        $modelEvent = new \app\admin\model\Event;
        if (isset($add['event_content'])) {
            $add['event_content'] = $modelEvent->content($add['event_content']);
        }      
        $modelEvent->save($add);
        $this->redirect('admin/event/listevent');        
    }

 	//事件修改页面
    public function editevent($id)
    {
        $event_conf = \app\admin\model\EventConf::order('event_conf_sort','asc')->select();
        foreach ($event_conf as $k => $v) {
            if (strstr($v['event_conf_value'],"/")) {
                $v['event_conf_value'] = explode("/",$v['event_conf_value']);
            }
            else{
                $v['event_conf_value'] = array($v['event_conf_value']);
            }
        }

        $modelEvent = new \app\admin\model\Event;
        $edit = $modelEvent->where('id',$id)->find();

        if (!empty($edit['event_content'])) {
            $edit['event_content'] = $modelEvent->read($edit['event_content']);
        }

        $this->assign(['conf'=>$event_conf,'edit'=>$edit]);
        return view();
    }

    //事件修改功能
    public function edit($id)
    {
        $edit = input('post.');
        $modelEvent = new \app\admin\model\Event;

        if (isset($edit['event_content'])) {
            $edit['event_content'] = $modelEvent->content($edit['event_content']);
        }

        $find = $modelEvent->where('id',$id)->find();
        $find->save($edit);
        $this->redirect('admin/event/listevent');
    }

    //事件删除功能
    public function del($id)
    {
    	$del = \app\admin\model\Event::where('id',$id)->find();
        $del->delete();
        $this->redirect('admin/event/listevent');        
    }


    //事件状态改变
    public function state()
    {
        $data = input('post.');
        $modelEvent = new \app\admin\model\Event;
        foreach ($data as $k => $v) {
            $modelEvent->where('id',$k)->update(['event_state' => $v]);
        }
        $this->redirect('admin/event/listevent');
    }


    //事件详情和工作表页面
    public function readevent($id)
    {
        //事件详情
        $modelEvent = new \app\admin\model\Event;
        $read = $modelEvent->where('id',$id)->find();
        if (!empty($read['event_content'])) {
            $read['event_content'] = $modelEvent->read($read['event_content']);
        }
        $event_conf = \app\admin\model\EventConf::order('event_conf_sort','asc')->select();      
        $this->assign(['read'=>$read,'event_conf'=>$event_conf]);


        //管理员填表
        $admin_sheet = \app\admin\model\Sheet::where(['sheet_role'=>2,'sheet_enable'=>1])->field('id,sheet_name')->order('sheet_sort','asc')->select();
        $modelAdminRecord = new \app\admin\model\AdminRecord;
        $admin_sheet = $modelAdminRecord->page($admin_sheet,$id);
        $this->assign(['admin_sheet'=>$admin_sheet]);


        //队员填表
        $team_sheet = \app\admin\model\Sheet::where(['sheet_role'=>1,'sheet_enable'=>1])->field('id,sheet_name')->order('sheet_sort','asc')->select();
        $modelTeamRecord = new \app\admin\model\TeamRecord;
        $team_sheet = $modelTeamRecord->page($team_sheet,$id);
        $this->assign(['team_sheet'=>$team_sheet]);
        

        //备勤名单
        $ready_conf = \app\admin\model\ReadyConf::field('id,ready_conf_key')->order('ready_conf_sort','asc')->select();
        $ready = \app\admin\model\Ready::where('event_id',$id)->
            field('bluesky_ready.*,bluesky_team.team_name')->
            join('bluesky_team','bluesky_ready.team_id = bluesky_team.id')->
            order('update_time','desc')->select();
        foreach ($ready as $k => $v) {
            if (!empty($v['ready_content'])) {
                $v['ready_content'] = $modelEvent->read($v['ready_content']);
            }
        }
        $this->assign(['ready'=>$ready,'ready_conf'=>$ready_conf]);


        //出队名单
        $modelStart = new \app\admin\model\Start;
        $modelStartConf = new \app\admin\model\StartConf;
        $start = $modelStart->where('event_id',$id)->find();
        if (!empty($start['start_content'])) {
            $start['start_content'] = $modelEvent->read($start['start_content']);
            $start['start_content'] = $modelStart->content($start['start_content']);
        }
        //不参与队员
        if (!empty($start['no_team_id'])) {
            $start['no_team_id'] = $modelStart->team($start['no_team_id']);
        }        
        $start_conf = $modelStartConf->field('id,start_conf_key')->order('start_conf_sort','asc')->select();
        $this->assign(['start'=>$start,'start_conf'=>$start_conf]);

        //记录表
        $log_conf = \app\admin\model\LogConf::field('id,log_conf_key')->order('log_conf_sort','asc')->select();
        $log = \app\admin\model\Log::where('event_id',$id)->
            field('bluesky_log.*,bluesky_team.team_name')->
            join('bluesky_team','bluesky_log.team_id = bluesky_team.id')->
            order('update_time','desc')->select();
        foreach ($log as $k => $v) {
            if (!empty($v['log_content'])) {
                $v['log_content'] = $modelEvent->read($v['log_content']);
            }
        }
        $this->assign(['log_conf'=>$log_conf,'log'=>$log]);

        return view();
    }   
    

}
