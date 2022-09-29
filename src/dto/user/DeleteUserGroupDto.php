<?php

namespace Wotu\dto\user;

use Wotu\dto\NormalBaseDto;

class DeleteUserGroupDto extends NormalBaseDto
{

    protected $param = array(
        "userCode" => "",
        "groupList" => []
    );


    public function __construct()
    {
        $parentColumn = $this->column;;
        $this->param = array_merge($parentColumn, $this->param);
    }


    public function getRequestParam($params)
    {
        if(empty($params['groupList'])){
            throw new \ErrorException('用户组不能为空');
        }
        return $this->formatParam($params,$this->param ,true ,["userCode"]);
    }
}