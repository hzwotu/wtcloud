<?php

namespace Wotu\dto\cms;

use Wotu\dto\NormalBaseDto;

class DeleteIdCardDto extends NormalBaseDto
{
    protected $param = array(
        "idCard" => "",//身份证号
        "name" => "",//姓名
    );

    public function __construct()
    {
        $parentColumn = $this->column;
        $this->param = array_merge($parentColumn, $this->param);
    }

    public function getRequestParam($params)
    {
        return $this->formatParam($params, $this->param, true, ["name", "idCard"]);
    }
}