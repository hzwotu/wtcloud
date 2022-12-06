<?php

namespace Wotu\dto\organization;

use Wotu\dto\NormalBaseDto;

class CheckPermissionsDto extends NormalBaseDto
{
    protected $param = array(
        "organizationCode" => "",//组织编码
        "userCode" => "",//用户编码
        "url" => "",//接口路由
        "type" => 0,//业务线类型 1平台 2职培 3考评 4职培
    );


    public function __construct()
    {
        $parentColumn = $this->column;
        $this->param = array_merge($parentColumn, $this->param);
    }

    public function getRequestParam($params)
    {
        return $this->formatParam($params, $this->param, ["organizationCode", "type", "url", "userCode"]);
    }
}