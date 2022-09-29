<?php

namespace Wotu\dto\organization;

use Wotu\dto\NormalBaseDto;

class CreateDepartmentDto extends NormalBaseDto
{
    protected $param = array(
        "name" => "",
        "organizationCode" => "",
        "parentCode" => ""
    );

    public function __construct()
    {
        $parentColumn = $this->column;
        $this->param = array_merge($parentColumn, $this->param);
    }

    public function getRequestParam($params)
    {
        return $this->formatParam($params, $this->param, true, [ "name", "organizationCode"]);
    }
}