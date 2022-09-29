<?php

namespace Wotu\dto\user;
use Wotu\dto\NormalBaseDto;

class GetGroupDto extends NormalBaseDto{
    protected $param = array(
        "sid" => 0,
        "type" => 0,
        'id' => 0,
    );

    public function __construct()
    {
        $parentColumn = $this->column;;
        $this->param = array_merge($parentColumn, $this->param);
    }

    public function getRequestParam($params)
    {
        return $this->formatParam($params,$this->param );
    }
}