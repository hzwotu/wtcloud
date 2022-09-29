<?php

namespace Wotu\dto\organization;

use Wotu\dto\NormalBaseDto;

class CreateStaffDto extends NormalBaseDto
{
    protected $param = array(
        "staffList" => [],
    );

    protected $staffItem = array(
        "idCard" => "",
        "mobile" => "",
        "name" => "",
        "organizationCode" => "",//组织编码
        "roleCode" => "",//角色编码
        "departmentCode" => "", //部门编码
        "sid" => 0,
    );

    public function __construct()
    {
        $parentColumn = $this->column;
        $this->param = array_merge($parentColumn, $this->param);
    }

    public function getRequestParam($params)
    {
        if (empty($params['staffList'])) {
            throw new \ErrorException('成员信息不能为空');
        }
        $resultParam = [];
        foreach ($params['staffList'] as $item){
            if(empty($item['sid'])){
                throw new \ErrorException('站点不能为空');
            }
            $itemData = $this->formatParam($item, $this->staffItem, true, ["name", "idCard","mobile","organizationCode"]);
            if(empty($itemData)){
                throw new \ErrorException('入参数据格式异常');
            }
            $resultParam['staffList'][] = $itemData;
        }
        return $resultParam;
    }
}