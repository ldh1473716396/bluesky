<?php

namespace app\api\controller;

use app\api\controller\Index;


class Log extends Index 
{
    //记录表添加页面
    public function addlog($event_id)
    {
        $log_conf = \app\admin\model\LogConf::order('id','asc')->select();

        foreach ($log_conf as $k => $v) {
            if (strstr($v['log_conf_value'],"/")) {
                $v['log_conf_value'] = explode("/",$v['log_conf_value']);
            }
            else{
                $v['log_conf_value'] = array($v['log_conf_value']);
            }
        }
        
        $event = \app\admin\model\Event::where('id',$event_id)->field('id,event_title')->find();
 
        return json_encode(['conf'=>$log_conf,'event'=>$event]); 
    }

    //记录表添加功能
    public function add($event_id)
    {
        $add = input('post.');

        $add['event_id'] = $event_id;
        $add['team_id'] = session('team_id');
        
        if (isset($add['log_content'])) {

            //禁用符号
            foreach ($add['log_content'] as $k => $v) {
                if (!is_array($v)&&(strstr($v,'|')||strstr($v,'*')||strstr($v,'-'))) {

                    $arr=['message'=>'填写内容含有禁用符号。','code'=>400];
                    return json_encode($arr);

                }
            }

            $modelEvent = new \app\admin\model\Event;
            $add['log_content'] = $modelEvent->content($add['log_content']);
        }

        $modellog = new \app\admin\model\Log;
        $judge = $modellog->save($add);

        if($judge){
            $arr = ['id'=>$event_id,'message'=>'添加成功','code'=>200];
            return json_encode($arr);
        }else{
            $arr=['id'=>$event_id,'message'=>'添加失败','code'=>400];
            return json_encode($arr);
        }        
    }

 	//记录表编辑页面
    public function editlog($id,$event_id)
    {
        $edit = \app\admin\model\Log::where('id',$id)->find();
        
        $log_conf = \app\admin\model\LogConf::order('id','asc')->select();
        foreach ($log_conf as $k => $v) {
            if (strstr($v['log_conf_value'],"/")) {
                $v['log_conf_value'] = explode("/",$v['log_conf_value']);
            }
            else{
                $v['log_conf_value'] = array($v['log_conf_value']);
            }
        }

        if (!empty($edit['log_content'])) {
            $modelEvent = new \app\admin\model\Event;
            $edit['log_content'] = $modelEvent->read($edit['log_content']);
        }

        $event = \app\admin\model\Event::where('id',$event_id)->field('id,event_title')->find();

        return json_encode(['conf'=>$log_conf,'edit'=>$edit,'event'=>$event]);
    }

    //记录表编辑功能
    public function edit($id)
    {
        $edit = input('post.');
        $modelEvent = new \app\admin\model\Event;

        //取出数据库里原先的数据化为数组
        $find = \app\admin\model\Log::where('id',$id)->find();        
        if (isset($find['log_content'])) {
            $modelEvent = new \app\admin\model\Event;
            $find['log_content'] = $modelEvent->read($find['log_content']);
        }

        //把编辑后的数据化为字符串
        if (isset($edit['log_content'])) {

            //禁用符号
            foreach ($edit['log_content'] as $k1 => $v1) {
                if (!is_array($v1)&&(strstr($v1,'|')||strstr($v1,'*')||strstr($v1,'-'))){                    
                    $arr=['message'=>'填写内容含有禁用符号。','code'=>400];
                    return json_encode($arr);
                }
            }
            
            //对比原先数据，为空的话等于原先数据，保持不变           
            foreach ($edit['log_content'] as $k => $v) {
                if (empty($v)) {
                    $edit['log_content'][$k] = $find['log_content'][$k];
                }
            }            
            $edit['log_content'] = $modelEvent->content($edit['log_content']);
        }

        $judge = $find->save($edit);
        
        if($judge){
            $arr = ['id'=>$find['event_id'],'message'=>'编辑成功','code'=>200];
            return json_encode($arr);
        }else{
            $arr=['id'=>$find['event_id'],'message'=>'编辑失败','code'=>400];
            return json_encode($arr);
        }
    }

    //记录表删除功能
    public function del($id,$event_id)
    {
    	$del = \app\admin\model\Log::where('id',$id)->find();
        $judge = $del->delete();
        
        if($judge){
            $arr = ['id'=>$event_id,'message'=>'删除成功','code'=>200];
            return json_encode($arr);
        }else{
            $arr=['id'=>$event_id,'message'=>'删除失败','code'=>400];
            return json_encode($arr);
        }      
    }
 
    

}
