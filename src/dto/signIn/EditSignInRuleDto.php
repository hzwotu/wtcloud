<?php
/**
 * Created By
 * User : liudengwei
 * Date : 2023/3/9
 * Time : 19:17
 */

namespace Wotu\dto\signIn;


use Wotu\dto\NormalBaseDto;

class EditSignInRuleDto extends NormalBaseDto
{

    protected array $param = array(
        "sid" => 0,
        "checkFace" => 0,
        "distance" => 0,
        "signBefore" => 0,
        "signAfter" => 0,
        "signOutAfter" => 0,
        "signOutBefore" => ""
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
        return $this->formatParam($params, $this->param, true, ["sid", "checkFace", "signBefore", "signAfter"]);
    }

}