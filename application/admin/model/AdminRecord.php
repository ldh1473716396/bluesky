<?php

namespace app\admin\model;

use \think\Model;
use think\model\concern\SoftDelete;

class AdminRecord extends Model
{
    protected $createTime = 'create_time';
    protected $updateTime = 'update_time';

    //软删除
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    protected $defaultSoftDelete = 0;

    public function page($admin_sheet,$id)
    {
    	foreach ($admin_sheet as $k_sheet => $v_sheet) {
            $v_sheet['sheet_conf'] = \app\admin\model\SheetConf::
                where('sheet_id',$v_sheet['id'])->
                field('id,sheet_conf_name,sheet_conf_type')->
                order('sheet_conf_sort','asc')->
                select();
            
            $v_sheet['admin_record'] = $this->
                where(['event_id'=>$id,'sheet_id'=>$v_sheet['id']])->
                field('bluesky_admin_record.id,
                	   bluesky_admin_record.admin_content,
                	   bluesky_admin_record.create_time,
                	   bluesky_admin_record.update_time,
                	   bluesky_admin.admin_name')->
                join('bluesky_admin','bluesky_admin.id = bluesky_admin_record.admin_id')->
                find();

            if (!is_null($v_sheet['admin_record'])) {
                if (!empty($v_sheet['admin_record']['admin_content'])) {
                	$modelEvent = new \app\admin\model\Event;
                    $v_sheet['admin_record']['admin_content'] = $modelEvent->read($v_sheet['admin_record']['admin_content']);
                }
            }           
        }
        return $admin_sheet;
    }
}

?>