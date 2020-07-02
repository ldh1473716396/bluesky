<?php

namespace app\admin\model;

use \think\Model;
use think\model\concern\SoftDelete;

class SheetConf extends Model
{
	/*时间戳*/
	protected $createTime = 'create_time';
    protected $updateTime = 'update_time';

	//软删除
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    protected $defaultSoftDelete = 0;
}

?>