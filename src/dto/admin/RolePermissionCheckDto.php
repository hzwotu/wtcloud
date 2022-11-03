<?php

namespace Wotu\dto\admin;

use Wotu\dto\NormalBaseDto;

class RolePermissionCheckDto extends NormalBaseDto
{
    protected $param = array(
        "apiRoute" => "",//	api路由地址 string
    );

    public function __construct()
    {
        $parentColumn = $this->column;
        $this->param = array_merge($parentColumn, $this->param);
    }

    public function getRequestParam($params)
    {
        return $this->formatParam($params, $this->param, true, []);
    }
}
