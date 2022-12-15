<?php

namespace Wotu\dto\user;

use Wotu\dto\NormalBaseDto;

class UserLoginDto extends NormalBaseDto
{

    protected $param = array(
        "account" => "",
        "appKey" => "",
        "password" => "",
        "type" => 0,
        "sid" => 0,

    );


    public function __construct()
    {
        $parentColumn = $this->column;;
        $this->param = array_merge($parentColumn, $this->param);
    }


    public function getRequestParam($params)
    {
        return $this->formatParam($params, $this->param, true, ["account", "appKey", "password", "type", "sid"]);
    }
}