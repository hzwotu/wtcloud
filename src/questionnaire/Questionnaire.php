<?php

namespace Wotu\questionnaire;

use Wotu\BaseService;

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
     * @param int $page
     * @param int $limit
     * @param array $params
     * @return bool|int|mixed
     */
    public function getList($page = 1, $limit = 10, $params = []) {
        $url = $this->domainUrl . '/questionnaire/backend/collect/query_page';
        $params['pageNo'] = $page;
        $params['pageSize'] = $limit;
        return BaseService::sendNormalRequest('POST', $url ,$params);
    }

    /**
     * 获取问卷收集详情
     * @param $code
     * @return bool|int|mixed
     */
    public function getDetail($code) {
        $url = $this->domainUrl . '/questionnaire/backend/collect/getDetail/' . $code;
        return BaseService::sendNormalRequest('GET', $url , []);
    }
}