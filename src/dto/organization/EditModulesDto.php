<?php

namespace Wotu\dto\organization;

use Wotu\dto\NormalBaseDto;

class EditModulesDto extends NormalBaseDto
{
    protected $param = array(
        "organizationCode" => "",//组织编码
        "moduleList" => [],//模块id
        "sid" => 0,//站点id
    );


    public function __construct()
    {
        $parentColumn = $this->column;
        $this->param = array_merge($parentColumn, $this->param);
    }

    public function getRequestParam($params)
    {
        return $this->formatParam($params, $this->param, ["organizationCode", "sid"]);
    }
}