<?php

namespace app\admin\model;

use \think\Model;
use think\model\concern\SoftDelete;

class Start extends Model
{
	//时间戳
	protected $createTime = 'create_time';//添加
    protected $updateTime = 'update_time';//修改

    //软删除
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    protected $defaultSoftDelete = 0;

    public function content($start_content)
    {
		foreach ($start_content as $k1 => $v1) {
		    $type = \app\admin\model\StartConf::where('id',$k1)->field('start_conf_type')->find();
		    if ($type['start_conf_type'] == 0 && strstr($v1,'-')) {
		        $start_content[$k1] = explode('-',$v1);
		        foreach ($start_content[$k1] as $k2 => $v2) {
		            $team = \app\team\model\Team::where('id',$v2)->field('team_name')->find();
		            $start_content[$k1][$k2] = $team['team_name'];
		        }
		        $start_content[$k1] = implode('，',$start_content[$k1]);
		    }
		    if ($type['start_conf_type'] == 0 && !strstr($v1,'-')) {
		        $team = \app\team\model\Team::where('id',$v1)->field('team_name')->find();
		        $start_content[$k1] = $team['team_name'];
		    }
		}

		return $start_content;
    }

    public function team($no_team_id)
    {
    	if (strstr($no_team_id,',')) {
            $no_team_id = explode(',',$no_team_id);
            foreach ($no_team_id as $k3 => $v3) {
                $team = \app\team\model\Team::where('id',$v3)->field('team_name')->find();
                $no_team_id[$k3] = $team['team_name'];
            }
            $no_team_id = implode('，',$no_team_id);
        }
        else{
            $team = \app\team\model\Team::where('id',$no_team_id)->field('team_name')->find();
            $no_team_id = $team['team_name'];
        }
        return $no_team_id;
    }
}

?>