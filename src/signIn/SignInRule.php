<?php
/**
 * Created By
 * User : liudengwei
 * Date : 2023/3/9
 * Time : 19:20
 */

namespace Wotu\signIn;

use Wotu\BaseService;
use Wotu\dto\signIn\CreateSignInRuleDto;
use Wotu\dto\signIn\EditSignInRuleDto;

class SignInRule extends SignInBase
{

    /**
     * 创建签到规则
     * @param $params
     * @return array|mixed|string
     * @throws \ErrorException
     */
    public function create($params)
    {
        $url = $this->domainUrl . '/sign_in/rule/create';
        $requestDto = new CreateSignInRuleDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    /**
     * 编辑签到规则
     * @param $params
     * @return array|mixed|string
     * @throws \ErrorException
     */
    public function edit($params)
    {
        $url = $this->domainUrl . '/sign_in/rule/edit';
        $requestDto = new EditSignInRuleDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    /**
     * 获取站点签到规则
     * @param $taskCode
     * @return array|mixed|string
     */
    public function getRule($sid)
    {
        $url = $this->domainUrl . '/sign_in/rule/' . $sid;
        return BaseService::sendNormalRequest('GET', $url, []);
    }

}