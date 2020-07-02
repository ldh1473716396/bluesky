<?php

namespace app\team\controller;

use app\team\controller\Index;

class Event extends Index 
{
	//事件列表页面
    public function listevent()
    {
        $list = \app\admin\model\Event::order('update_time','desc')->select();
        $this->assign('list',$list);
        return view();
    }

    //事件详情页面
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
        $start_conf = $modelStartConf->field('id,start_conf_key')->order('start_conf_sort','asc')->select();
        $this->assign(['start'=>$start,'start_conf'=>$start_conf]);

        //记录表
        if(!empty($ready)){
            foreach ($ready as $k1 => $v1) {
                $ready_team_id[] = $v1['team_id']; 
            }
        }
        if (isset($ready_team_id)) {
            if (!empty($start['no_team_id'])) {
                if (strstr($start['no_team_id'],',')) {
                    $no_team_id = explode(',',$start['no_team_id']);
                    foreach ($no_team_id as $k_int => $v_int) {
                        foreach ($ready_team_id as $k1 => $v1) {
                            if($v1 == $v_int){
                                unset($ready_team_id[$k1]);
                            }
                        }
                    }
                }
                else{
                    foreach ($ready_team_id as $k1 => $v1) {
                        if($v1 == $start['no_team_id']){
                            unset($ready_team_id[$k1]);
                        }
                    }
                }
            }
            in_array(session('team_id'), $ready_team_id)?$limit=1:$limit=0;           
        }
        else{
            $limit=0;
        }
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

        $this->assign(['limit'=>$limit,'log_conf'=>$log_conf,'log'=>$log]);

        return view();
    }    
    

}
