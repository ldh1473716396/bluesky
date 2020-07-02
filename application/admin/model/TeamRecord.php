<?php

namespace app\admin\model;

use \think\Model;
use think\model\concern\SoftDelete;

class TeamRecord extends Model
{
    protected $createTime = 'create_time';
    protected $updateTime = 'update_time';
    
    //软删除
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    protected $defaultSoftDelete = 0;

    public function page($team_sheet,$id)
    {
    	foreach ($team_sheet as $k_sheet => $v_sheet) {
            $v_sheet['sheet_conf'] = \app\admin\model\SheetConf::
                where('sheet_id',$v_sheet['id'])->
                field('id,sheet_conf_name')->
                order('sheet_conf_sort','asc')->
                select();
            
            $v_sheet['team_record'] = $this->
                where(['event_id'=>$id,'sheet_id'=>$v_sheet['id']])->
                field('bluesky_team_record.id,
                	   bluesky_team_record.team_id,
                	   bluesky_team_record.team_content,
                	   bluesky_team_record.update_time,
                	   bluesky_team.team_name')->
                join('bluesky_team','bluesky_team.id = bluesky_team_record.team_id')->
                select();

            if (count($v_sheet['team_record'])!==0) {
            	foreach ($v_sheet['team_record'] as $k_record => $v_record) {
            		if (!empty($v_record['team_content'])) {
                		$modelEvent = new \app\admin\model\Event;
                    	$v_record['team_content'] = $modelEvent->read($v_record['team_content']);
                	}
            	}                
            }           
        }
        return $team_sheet;
    }
}
?>