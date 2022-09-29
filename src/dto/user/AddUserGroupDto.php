<?php

namespace Wotu\dto\user;

use Wotu\dto\NormalBaseDto;

class AddUserGroupDto extends NormalBaseDto
{

    protected $param = array(
        "userCode" => "",
        "sid" => 0,
        "groupList" => []
    );


    public function __construct()
    {
        $parentColumn = $this->column;;
        $this->param = array_merge($parentColumn, $this->param);
    }


    public function getRequestParam($params)
    {
        if(empty($params['sid'])){
            throw new \ErrorException('站点不能为空');
        }
        if(empty($params['groupList'])){
            throw new \ErrorException('用户组不能为空');
        }
        return $this->formatParam($params,$this->param ,true ,["userCode"]);
    }
}