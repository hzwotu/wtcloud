<?php

namespace Wotu\dto\user;

use Wotu\dto\NormalBaseDto;

class CreateSsoUserDto extends NormalBaseDto
{

    protected $param = array(
        "authType" => "",
        "idCard" => "",
        "isCertify" => false,
        "mobile" => "",
        "name" => "",
        "password" => "",
        "source" => 0,
        "sid" => 0,
        "groupList" => [],
        "isInitPassword" => false,
        "openId" => "",
        "username" => ""
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