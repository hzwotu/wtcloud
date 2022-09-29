<?php

namespace Wotu\dto\organization;

use Wotu\dto\NormalBaseDto;

class EditDepartmentDto extends NormalBaseDto
{
    protected $param = array(
        "name" => "",
        "code" => "",
    );

    public function __construct()
    {
        $parentColumn = $this->column;
        $this->param = array_merge($parentColumn, $this->param);
    }

    public function getRequestParam($params)
    {
        return $this->formatParam($params, $this->param, true, [ "name", "code"]);
    }
}