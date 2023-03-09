<?php
/**
 * 创建签到任务
 * User : liudengwei
 * Date : 2023/3/9
 * Time : 17:55
 */

namespace Wotu\dto\signIn;


use Wotu\dto\NormalBaseDto;

class CreateSignInTaskDto extends NormalBaseDto
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
        "lat" => ""
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
        return $this->formatParam($params, $this->param, true, ["title", "sid", "startTime", "endTime", "signEnd", "signStart","location"]);
    }

}