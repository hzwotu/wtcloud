<?php
/**
 * @desc 修改密码
 * @author Tinywan(ShaoBo Wan)
 * @date 2023/4/11 22:04
 */
declare(strict_types=1);


namespace Wotu\dto\user;


use Wotu\dto\NormalBaseDto;

class ModifyPasswordDto extends  NormalBaseDto
{
    protected array $param = array(
        "oldPassword" => "",
        "password" => "",
        "passwordRepeat" => "",
    );

    public function __construct()
    {
        $parentColumn = $this->column;;
        $this->param = array_merge($parentColumn, $this->param);
    }

    public function getRequestParam($params)
    {
        if(empty($params['oldPassword'])){
            throw new \ErrorException('旧密码不能为空');
        }

        if(empty($params['password'])){
            throw new \ErrorException('密码不能为空');
        }

        if(empty($params['passwordRepeat'])){
            throw new \ErrorException('确认新密码不能为空');
        }
        return $this->formatParam($params,$this->param ,true ,["name"]);
    }
}