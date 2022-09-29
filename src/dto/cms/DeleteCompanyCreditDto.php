<?php

namespace Wotu\dto\cms;

use Wotu\dto\NormalBaseDto;

class DeleteCompanyCreditDto extends NormalBaseDto
{
    protected $param = array(
        "companyCode" => "",//统一信用代码
        "name" => "",//企业名称
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