<?php

namespace Wotu\questionnaire;

use Wotu\BaseService;
use Wotu\dto\questionnaire\QuestionnaireListDto;
use Wotu\dto\questionnaire\UserQuestionnaireRequestDto;

/**
 * 问卷
 * Author: miao933
 * Date: 2023/06/02
 * Time: 10:34
 */
class Questionnaire extends QuestionnaireBase
{
    /**
     * 查询问卷列表
     *
     * @param array $params
     * @return bool|int|mixed
     */
    public function getList($params = []) {
        $url = $this->domainUrl . '/questionnaire/backend/collect/query_page';
        $requestDto = new QuestionnaireListDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    /**
     * 获取问卷收集详情
     *
     * @param $code
     * @return bool|int|mixed
     */
    public function getDetail($code) {
        $url = $this->domainUrl . '/questionnaire/backend/collect/getDetail/' . $code;
        return BaseService::sendNormalRequest('GET', $url , []);
    }

    /**
     * 获取当前用户最近一次提交的问卷记录
     *
     * @param $params
     * @return array|mixed|string|void
     */
    public function getLastDetail($params)
    {
        $url = $this->domainUrl . '/questionnaire/front/collect/get_last_questionnaire';
        $requestDto = new UserQuestionnaireRequestDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }
}