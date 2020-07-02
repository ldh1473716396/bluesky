<?php

namespace app\admin\model;

use \think\Model;
use think\model\concern\SoftDelete;

class Event extends Model
{
	//时间戳
	protected $createTime = 'create_time';//添加
    protected $updateTime = 'update_time';//修改

    //软删除
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    protected $defaultSoftDelete = 0;

    //事件详情
    public function read($data)
    {

    	if (strstr($data,"|")) {
            $data = explode("|",$data);
            foreach ($data as $k => $v) {
                $a = explode("*",$v);
                $data[$a[0]] = $a[1];                
            }            
        }        
        else{

            $a = explode("*",$data);
            $data = array();
            $data[$a[0]] = $a[1];          
        }

        return $data;
    }

    public function content($data)
    {
        foreach ($data as $k => $v) {
            if (is_array($v)) {
               $data[$k] = implode("-",$v);
            }
        }
        foreach ($data as $k => $v) {
            $data[$k] = $k."*".$v;
        }
        $data = implode("|",$data);
        return $data;
    }
}

?>