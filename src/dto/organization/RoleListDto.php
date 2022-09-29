<?php

namespace Wotu\dto\organization;

use Wotu\dto\NormalBaseDto;

class RoleListDto extends NormalBaseDto
{
    protected $param = array(
        "sid" => 0,//站点id
        "roleCode" => "",//角色编码   全权限列表该值不传 或空
    );

    public function __construct()
    {
        $parentColumn = $this->column;
        $this->param = array_merge($parentColumn, $this->param);
    }
    public function getRequestParam($params)
    {
        return $this->formatParam($params, $this->param, true, [ "sid"]);
    }
}