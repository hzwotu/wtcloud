<?php

namespace Wotu\dto\user;

use Wotu\dto\NormalBaseDto;

class CreateUserDto extends NormalBaseDto
{

    protected array $param = array(
        "groupList" => [],
        "idCard" => "",
        "isCertify" => false,
        "isInitPassword" => false,
        "mobile" => "",
        "name" => "",
        "password" => "",
        "sid" => 0,
        "source" => 0,
        "username" => '',
        "authType" => "",
        "openId" => "",
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
        if(empty($params['source'])){
            throw new \ErrorException('来源不能为空');
        }
        return $this->formatParam($params,$this->param ,true ,[ "name"]);
    }
}