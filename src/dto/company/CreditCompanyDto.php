<?php

namespace Wotu\dto\company;

use Wotu\dto\NormalBaseDto;
use ErrorException;

class CreditCompanyDto extends NormalBaseDto
{
    /**
     * @var array|string[]
     */
    protected array $param = [
        'companyCode' => '', // 工商信用代码
        'name' => '', // 企业名称
    ];

    public function __construct()
    {
        $parentColumn = $this->column;
        $this->param = array_merge($parentColumn, $this->param);
    }

    /**
     * @param $params
     * @return mixed
     * @throws ErrorException
     */
    public function getRequestParam($params)
    {
        return $this->formatParam($params, $this->param, true, ['companyCode', 'name']);
    }
}