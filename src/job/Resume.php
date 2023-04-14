<?php


namespace Wotu\job;

use Wotu\BaseService;
use Wotu\dto\job\UserJobNormalRequestDto;

class Resume extends JobBase
{
    /**获取用户求职列表
     * @param array $params
     * @return array|mixed|string|void
     */
    public function getUserJobExpect($params = [])
    {
        $url = $this->domainUrl . '/job/resume_sdk/get_job_expect_list' ;
        $requestDto = new UserJobNormalRequestDto();
        return BaseService::sendNormalRequest('POST', $url, $requestDto->getRequestParam($params));
    }

    /**
     * 用户简历档案
     * @param array $params
     * @return array|mixed|string|void
     */
    public function getUserResumeDetail($params = [])
    {
        $url = $this->domainUrl . '/job/resume_sdk/resume_detail' ;
        $requestDto = new UserJobNormalRequestDto();
        return BaseService::sendNormalRequest('POST', $url, $requestDto->getRequestParam($params));
    }
}