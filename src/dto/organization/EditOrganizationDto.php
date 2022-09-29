<?php

namespace Wotu\dto\organization;

use Wotu\dto\NormalBaseDto;

class EditOrganizationDto extends NormalBaseDto
{
    protected $param = array(
        "area" => 0,
        "city" => 0,
        "industryId" => 0,//行业id
        "name" => "",
        "province" => 0,
        "scale" => 0,//规模  category中获取  scale
        "certifyStatus" => false,//认证状态
        "certifyImage" => "",//工商照片
        "companyCode" => "",//统一信用代码
        "userCode" => "",//组织拥有者用户编码
        "code" => ""
    );

    public function __construct()
    {
        $parentColumn = $this->column;
        $this->param = array_merge($parentColumn, $this->param);
    }

    public function getRequestParam($params)
    {
        if (empty($params['sid'])) {
            throw new \ErrorException('站点不能为空');
        }
        return $this->formatParam($params, $this->param, true, ["area", "city", "industryId", "name", "province", "scale","userCode","certifyStatus","code"]);
    }
}