<?php

namespace Wotu\dto\user;

use Wotu\dto\NormalBaseDto;

class OpenLoginDto extends NormalBaseDto
{

    protected $param = array(
        "appKey" => "",
        "key" => "",
        "secret" => 0,
    );


    public function __construct()
    {
        $parentColumn = $this->column;;
        $this->param = array_merge($parentColumn, $this->param);
    }


    public function getRequestParam($params)
    {
        return $this->formatParam($params, $this->param, true, ["appKey", "key", "secret"]);
    }
}