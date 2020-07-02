<?php

namespace app\admin\model;

use \think\Model;
use think\model\concern\SoftDelete;

class Log extends Model
{
	//时间戳
	protected $createTime = 'create_time';//添加
    protected $updateTime = 'update_time';//修改

    //软删除
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    protected $defaultSoftDelete = 0;
}

?>