<?php
/**
 * 签到中心
 * User : liudengwei
 * Date : 2023/3/9
 * Time : 17:48
 */

namespace Wotu\signIn;


use Wotu\BaseService;
use Wotu\dto\signIn\CreateSignInTaskDto;
use Wotu\dto\signIn\EditSignInTaskDto;

class SignIn extends SignInBase
{

    /**
     * 创建签到任务
     * @param $params
     * @return array|mixed|string
     * @throws \ErrorException
     */
    public function create($params)
    {
        $url = $this->domainUrl . '/sign_in/task/create';
        $requestDto = new CreateSignInTaskDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    /**
     * 编辑签到任务
     * @param $params
     * @return array|mixed|string
     * @throws \ErrorException
     */
    public function edit($params)
    {
        $url = $this->domainUrl . '/sign_in/task/edit';
        $requestDto = new EditSignInTaskDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    /**
     * 获取用户签到信息
     * @param $taskCode
     * @param string $userCode
     * @return array|mixed|string
     */
    public function getUserSignInfo($taskCode, $userCode = '')
    {
        $url = $this->domainUrl . '/sign_in/task/sign_info/' . $taskCode;
        $params['userCode'] = $userCode;
        return BaseService::sendNormalRequest('GET', $url, $params);
    }

    /**
     * 获取签到任务信息
     * @param $taskCode
     * @return array|mixed|string
     */
    public function getTaskInfo($taskCode)
    {
        $url = $this->domainUrl . '/sign_in/task/' . $taskCode;
        return BaseService::sendNormalRequest('GET', $url, []);
    }


}