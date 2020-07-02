<?php

namespace app\team\model;

use \think\Model;
use think\model\concern\SoftDelete;

class Team extends Model
{
	protected $createTime = 'create_time';
	protected $updateTime = 'update_time';

    //软删除
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    protected $defaultSoftDelete = 0;

	public function login($data)
	{
        //1.查询登陆数据用户名称是否存在
        $check=Team::getByTeam_name($data['team_name']);
        
        //2.判断
        if($check)
        {
            if($check['team_password'] == md5($data['team_password']))
            {
                session('team_id',$check['id']);
                session('team_name',$check['team_name']);
                return 1; //队员名称存在,密码正确
            }
            else
            {
                return 2; //队员名称存在，密码不正确
            }           
        }
        
        else
        {
                return 3; //队员名称不存在
        }
    }
}

?>