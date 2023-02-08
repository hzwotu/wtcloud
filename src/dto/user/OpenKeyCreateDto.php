<?php

namespace Wotu\dto\user;

use Wotu\dto\NormalBaseDto;

class OpenKeyCreateDto extends NormalBaseDto
{

    protected $param = array(
        "key" => "",
        "secret" => 0,
        "sid" => 0,
        "userCode" => ""
    );


    public function __construct()
    {
        $parentColumn = $this->column;;
        $this->param = array_merge($parentColumn, $this->param);
    }


    public function getRequestParam($params)
    {
        return $this->formatParam($params, $this->param, true, ["userCode"]);
    }
}