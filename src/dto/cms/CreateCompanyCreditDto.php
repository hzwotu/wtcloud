<?php

namespace Wotu\dto\cms;

use Wotu\dto\NormalBaseDto;

class CreateCompanyCreditDto extends NormalBaseDto
{
    protected $param = array(
        "address" => "",//详细地址
        "companyCode" => "",//统一信用代码
        "legalName" => "",//法人姓名
        "name" => "",//企业名称
        "registerMoney" => "",//注册资金
        "result" => "",//结果  success为验证通过
    );

    public function __construct()
    {
        $parentColumn = $this->column;
        $this->param = array_merge($parentColumn, $this->param);
    }

    public function getRequestParam($params)
    {
        return $this->formatParam($params, $this->param, true, ["name", "companyCode"]);
    }
}