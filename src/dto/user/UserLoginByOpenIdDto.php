<?php

namespace Wotu\dto\user;

use Wotu\dto\NormalBaseDto;

class UserLoginByOpenIdDto extends NormalBaseDto
{

    protected $param = array(
        "authType" => "",
        "openId" => "",
        "type" => 0,
    );


    public function __construct()
    {
        $parentColumn = $this->column;;
        $this->param = array_merge($parentColumn, $this->param);
    }


    public function getRequestParam($params)
    {
        return $this->formatParam($params, $this->param, true, ["authType", "openId", "type"]);
    }
}