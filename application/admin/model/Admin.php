<?php

namespace app\admin\model;

use \think\Model;
use think\model\concern\SoftDelete;

class Admin extends Model
{
    protected $createTime = 'create_time';
    protected $updateTime = 'update_time';

    //软删除
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    protected $defaultSoftDelete = 0;
    
	public function login($data)
	{
        //1.查询登陆数据管理员名称是否存在
        $check=Admin::getByAdmin_name($data['admin_name']);

        //2.判断
        if($check)
        {
        	if($check['admin_password'] == md5($data['admin_password']))
            {
                session('admin_id',$check['id']);
                session('admin_name',$check['admin_name']);
                return 1; //管理员名称存在,密码正确
            }
            else
            {
                return 2; //管理员名称存在，密码不正确
            }           
        }
        
        else
        {
            	return 3; //管理员名称不存在
        }
    }
 
}

?>