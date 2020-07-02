<?php

namespace app\admin\model;

use \think\Model;
use think\model\concern\SoftDelete;

class Sheet extends Model
{
	protected $createTime = 'create_time';
    protected $updateTime = 'update_time';

    //软删除
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    protected $defaultSoftDelete = 0;
}

?>