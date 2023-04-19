<?php

namespace Wotu\dto\job;

use Wotu\dto\NormalBaseDto;

class UserJobNormalRequestDto extends NormalBaseDto
{
    protected $param = array(
        "userCode" => "",//角色编码
        "openKey" => "",//班级唯一编码 (版本号) 可空 但是key必须给
    );

    public function __construct()
    {
        $parentColumn = $this->column;
        $this->param = array_merge($parentColumn, $this->param);
    }
    public function getRequestParam($params)
    {
        return $this->formatParam($params, $this->param, true, [ "userCode"]);
    }
}