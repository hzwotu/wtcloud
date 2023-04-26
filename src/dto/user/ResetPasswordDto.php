<?php
/**
 * @desc 重置密码-php临时-只开放内网
 * @author Tinywan(ShaoBo Wan)
 * @date 2023/4/14 9:19
 */
declare(strict_types=1);


namespace Wotu\dto\user;


use ErrorException;
use Wotu\dto\NormalBaseDto;

class ResetPasswordDto  extends  NormalBaseDto
{
    protected array $param = array(
        "initPassword" => "",
        "userCode" => ""
    );

    public function __construct()
    {
        $parentColumn = $this->column;;
        $this->param = array_merge($parentColumn, $this->param);
    }

    /**
     * @throws ErrorException
     */
    public function getRequestParam($params)
    {
        if(empty($params['initPassword'])){
            throw new ErrorException('初始密码不能为空');
        }

        if(empty($params['userCode'])){
            throw new ErrorException('用户编码不能为空');
        }
        return $this->formatParam($params,$this->param ,true ,["name"]);
    }
}