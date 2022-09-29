<?php

namespace Wotu\dto\organization;

use Wotu\dto\NormalBaseDto;

class EditRoleDto extends NormalBaseDto
{
    protected $param = array(
        "code" => "",
        "description" => "",
        "name" => "",
        "organizationCode" => "",
    );

    public function __construct()
    {
        $parentColumn = $this->column;
        $this->param = array_merge($parentColumn, $this->param);
    }
    public function getRequestParam($params)
    {
        return $this->formatParam($params, $this->param, true, [ "name", "organizationCode" , "code"]);
    }
}