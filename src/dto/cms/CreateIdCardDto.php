<?php

namespace Wotu\dto\cms;

use Wotu\dto\NormalBaseDto;

class CreateIdCardDto extends NormalBaseDto
{
    protected $param = array(
        "address" => "",//详细地址
        "birthday" => 0,//生日 毫秒级时间戳
        "expiredTime" => null,//身份证过期时间
        "idCard" => "",//身份证号
        "name" => "",//姓名
        "result" => "验证成功",//结果  默认  验证成功
        "resultCode" => 0,// 0成功 -1失败
        "sex" => 0,//1男 2女
        "type" => 1,//1系统验证 2人工验证
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