<?php

namespace Wotu\dto\organization;

use Wotu\dto\NormalBaseDto;

class DeleteStaffDto extends NormalBaseDto
{
    protected $param = array(
        "organizationCode" => "",//组织编码
        "staffList" => [],//删除的员工编码
    );


    public function __construct()
    {
        $parentColumn = $this->column;
        $this->param = array_merge($parentColumn, $this->param);
    }

    public function getRequestParam($params)
    {
        if (empty($params['staffList'])) {
            throw new \ErrorException('成员编码不能为空');
        }
        if (empty($params['organizationCode'])) {
            throw new \ErrorException('组织编码不能为空');
        }

        return $this->formatParam($params, $this->param);
    }
}