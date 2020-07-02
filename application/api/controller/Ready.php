<?php

namespace app\api\controller;

use app\api\controller\Index;


class Ready extends Index 
{
    //备勤名单添加页面
    public function addready($event_id)
    {
    	$judge = \app\admin\model\Ready::where(['event_id'=>$event_id,'team_id'=>session('team_id')])->find();
    	if ($judge) {
    		$arr=['message'=>'您已经填写过，无需再填写。','code'=>400];
            return json_encode($arr);
    	}

        $ready_conf = \app\admin\model\ReadyConf::order('id','asc')->select();

        foreach ($ready_conf as $k => $v) {
            if (strstr($v['ready_conf_value'],"/")) {
                $v['ready_conf_value'] = explode("/",$v['ready_conf_value']);
            }
            else{
                $v['ready_conf_value'] = array($v['ready_conf_value']);
            }
        }
        
        $event = \app\admin\model\Event::where('id',$event_id)->field('id,event_title')->find();

        return json_encode(['conf'=>$ready_conf,'event'=>$event]); 

    }

    //备勤名单添加功能
    public function add($event_id)
    {
        $add = input('post.');

        $add['event_id'] = $event_id;
        $add['team_id'] = session('team_id');
        
        if (isset($add['ready_content'])) {

            //禁用符号
            foreach ($add['ready_content'] as $k => $v) {
                if (!is_array($v)&&(strstr($v,'|')||strstr($v,'*')||strstr($v,'-'))) {

                	$arr=['message'=>'填写内容含有禁用符号。','code'=>400];
            		return json_encode($arr);

                }
            }

            $modelEvent = new \app\admin\model\Event;
            $add['ready_content'] = $modelEvent->content($add['ready_content']);
        }

        $modelready = new \app\admin\model\Ready;
        $judge = $modelready->save($add);

        if($judge){
			$arr = ['id'=>$event_id,'message'=>'添加成功','code'=>200];
			return json_encode($arr);
		}else{
			$arr=['id'=>$event_id,'message'=>'添加失败','code'=>400];
			return json_encode($arr);
		}       
    }

 	//备勤名单编辑页面
    public function editready($id,$event_id)
    {
        $edit = \app\admin\model\Ready::where('id',$id)->find();
        
        $ready_conf = \app\admin\model\ReadyConf::order('id','asc')->select();
        foreach ($ready_conf as $k => $v) {
            if (strstr($v['ready_conf_value'],"/")) {
                $v['ready_conf_value'] = explode("/",$v['ready_conf_value']);
            }
            else{
                $v['ready_conf_value'] = array($v['ready_conf_value']);
            }
        }

        if (!empty($edit['ready_content'])) {
            $modelEvent = new \app\admin\model\Event;
            $edit['ready_content'] = $modelEvent->read($edit['ready_content']);
        }

        $event = \app\admin\model\Event::where('id',$event_id)->field('id,event_title')->find();

        return json_encode(['conf'=>$ready_conf,'edit'=>$edit,'event'=>$event]);
    }

    //备勤名单编辑功能
    public function edit($id)
    {
        $edit = input('post.');
        $modelEvent = new \app\admin\model\Event;

        //取出数据库里原先的数据化为数组
        $find = \app\admin\model\Ready::where('id',$id)->find();        
        if (isset($find['ready_content'])) {
            $modelEvent = new \app\admin\model\Event;
            $find['ready_content'] = $modelEvent->read($find['ready_content']);
        }

        //把编辑后的数据化为字符串
        if (isset($edit['ready_content'])) {

            //禁用符号
            foreach ($edit['ready_content'] as $k1 => $v1) {
                if (!is_array($v1)&&(strstr($v1,'|')||strstr($v1,'*')||strstr($v1,'-'))) {

                    $arr=['message'=>'填写内容含有禁用符号。','code'=>400];
            		return json_encode($arr);

                }
            }
            
            //对比原先数据，为空的话等于原先数据，保持不变           
            foreach ($edit['ready_content'] as $k => $v) {
                if (empty($v)) {
                    $edit['ready_content'][$k] = $find['ready_content'][$k];
                }
            }            
            $edit['ready_content'] = $modelEvent->content($edit['ready_content']);
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

    //备勤名单删除功能
    public function del($id,$event_id)
    {
    	$del = \app\admin\model\Ready::where('id',$id)->find();
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
