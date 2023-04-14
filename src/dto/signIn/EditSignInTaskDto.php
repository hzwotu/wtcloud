<?php
/**
 * 编辑签到任务
 * User : liudengwei
 * Date : 2023/3/9
 * Time : 17:57
 */

namespace Wotu\dto\signIn;


use Wotu\dto\NormalBaseDto;

class EditSignInTaskDto extends NormalBaseDto
{
    protected array $param = array(
        "title" => "",
        "sid" => 0,
        "startTime" => 0,
        "endTime" => 0,
        "signEnd" => 0,
        "signStart" => 0,
        "location" => "",
        "lon" => "",
        "lat" => "",
        "ruleCode" => "",
        "code" => ""
    );

    public function __construct()
    {
        $parentColumn = $this->column;
        $this->param = array_merge($parentColumn, $this->param);
    }

    public function getRequestParam($params)
    {
        if (empty($params['sid'])) {
            throw new \ErrorException('站点不能为空');
        }
        return $this->formatParam($params, $this->param, true, ["code","title", "sid", "startTime", "endTime","location","ruleCode"]);
    }

}