<?php

namespace app\admin\controller;

use app\admin\controller\Index;


class Start extends Index 
{
    //出队名单添加页面
    public function addstart($event_id)
    {
        //备勤名单
    	$ready = \app\admin\model\Ready::where('event_id',$event_id)->
            field('bluesky_ready.team_id,bluesky_team.team_name')->
            join('bluesky_team','bluesky_ready.team_id=bluesky_team.id')->select();
        if (count($ready) == 0) {
            $this->error('暂时没有队员填写备勤名单。');
        }

        //出队名单是否存在
        $start = \app\admin\model\Start::where(['event_id'=>$event_id])->find();
        if ($start) {
            $this->error('出队名单已存在。');
        }

        //配置选项
        $start_conf = \app\admin\model\StartConf::order('start_conf_sort','asc')->select();
        foreach ($start_conf as $k => $v) {
            if (strstr($v['start_conf_value'],"/")) {
                $v['start_conf_value'] = explode("/",$v['start_conf_value']);
            }
            else{
                $v['start_conf_value'] = array($v['start_conf_value']);
            }
        }

        //事件信息
        $event = \app\admin\model\Event::where('id',$event_id)->field('id,event_title')->find();
        
        $this->assign(['ready'=>$ready,'conf'=>$start_conf,'event'=>$event]); 
        return view();
    }

    //出队名单添加功能
    public function add($event_id)
    {
        $modelStart = new \app\admin\model\Start;

        $add = input('post.');

        dump($add);die;

        $add['event_id'] = $event_id;
        $add['admin_id'] = session('admin_id');

        if (isset($add['no_team_id'])) {

            /*$yes_team_id = $modelStart->yes($add['no_team_id'],$event_id);
            foreach ($yes_team_id as $k => $v) {
                $modelReady->where(['event_id'=>$event_id,'team_id'=>$v])->update(['ready_state' => 1]);
            }*/

            $add['no_team_id'] = implode(',',$add['no_team_id']);
        }
        /*else{
            $ready_event = $modelReady->where('event_id',$event_id)->field('id')->select();
            foreach ($ready_event as $k1 => $v1) {
                $modelReady->where('id',$v1['id'])->update(['ready_state' => 1]);
            }
        }*/
        
        if (isset($add['start_content'])) {
            $modelEvent = new \app\admin\model\Event;
            $add['start_content'] = $modelEvent->content($add['start_content']);
        }

        $modelStart->save($add);

        $this->redirect('admin/event/readevent',['id'=>$event_id]);        
    }

 	//出队名单编辑页面
    public function editstart($event_id)
    {
        $edit = \app\admin\model\Start::where(['event_id'=>$event_id])->find();
        if (!$edit) {
            $this->error('您未填写过，不能编辑。');
        }
        
        //$start_conf
        $start_conf = \app\admin\model\StartConf::order('start_conf_sort','asc')->select();
        foreach ($start_conf as $k => $v) {
            if (strstr($v['start_conf_value'],"/")) {
                $v['start_conf_value'] = explode("/",$v['start_conf_value']);
            }
            else{
                $v['start_conf_value'] = array($v['start_conf_value']);
            }
        }

        //$edit['start_content']
        if (!empty($edit['start_content'])) {
            $modelEvent = new \app\admin\model\Event;
            $start_content = $modelEvent->read($edit['start_content']);

            foreach ($start_content as $k1 => $v1) {
                $type = \app\admin\model\StartConf::where('id',$k1)->field('start_conf_type')->find();
                if ($type['start_conf_type'] == 0 && strstr($v1,'-')) {
                    $start_content[$k1] = explode('-',$v1);
                }
                if ($type['start_conf_type'] == 0 && !strstr($v1,'-')) {
                    $start_content[$k1] = array($v1);
                }
            }
            $edit['start_content'] = $start_content;           
        }
        
        //$edit['no_team_id']
        if (!empty($edit['no_team_id'])) {
            $no_team_id = $edit['no_team_id'];
            if (strstr($no_team_id,',')) {
                $no_team_id = explode(',',$no_team_id);
            }
            else{
                $no_team_id = array($no_team_id);
            }
            $edit['no_team_id'] = $no_team_id;
        }

        //备勤名单
        $ready = \app\admin\model\Ready::where('event_id',$event_id)->
            field('bluesky_ready.team_id,bluesky_team.team_name')->
            join('bluesky_team','bluesky_ready.team_id=bluesky_team.id')->select();
        if (count($ready) == 0) {
            $this->error('暂时没有队员填写备勤名单。');
        }
        
        $event = \app\admin\model\Event::where('id',$event_id)->field('id,event_title')->find();

        $this->assign(['conf'=>$start_conf,'edit'=>$edit,'ready'=>$ready,'event'=>$event]);
        return view();
    }

    //出队名单编辑功能
    public function edit($event_id)
    {
        $edit = input('post.');

        $find = \app\admin\model\Start::where('event_id',$event_id)->find();        
        if (isset($edit['no_team_id'])) {
            $edit['no_team_id'] = implode(',',$edit['no_team_id']);
        }
        
        if (isset($edit['start_content'])) {
            $modelEvent = new \app\admin\model\Event;
            $edit['start_content'] = $modelEvent->content($edit['start_content']);
        }

        $find->save($edit);
        $this->redirect('admin/event/readevent',['id'=>$event_id]);
    }

    //出队名单删除功能
    public function del($event_id)
    {
    	$del = \app\admin\model\Start::where(['event_id'=>$event_id])->find();
        if($del){
            $del->delete();
        }
        $this->redirect('admin/event/readevent',['id'=>$event_id]);      
    }
 
    

}
