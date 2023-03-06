<?php
namespace Wotu\question;
use Wotu\BaseService;

/**
 * 试题管理
 * Author: cy <823176761@qq.com>
 * Date: 2023/3/3
 * Time: 13:47
 */
class Question extends QuestionBase
{
    /**
     * 试题列表
     * @param $orgCode
     * @param int $page
     * @param int $limit
     * @param array $params
     * @return bool|int|mixed
     */
    public function questionList($orgCode, $page = 1, $limit = 10, $params = []) {
        $url = $this->domainUrl . '/question/front/page';
        $params['merchantCode'] = $orgCode;
        $params['pageNo'] = $page;
        $params['pageSize'] = $limit;
        return BaseService::sendNormalRequest('POST', $url ,$params);
    }

    /**
     * 试题详情
     * @param $examCode
     * @return bool|int|mixed
     */
    public function questionDetail($examCode) {
        $url = $this->domainUrl . '/question/front/detail/' . $examCode;
        return BaseService::sendNormalRequest('GET', $url , []);
    }

    /**
     * 根据Code批量查询
     * @param $examCodeArr
     * @return bool|int|mixed
     */
    public function questionByCode($examCodeArr) {
        $url = $this->domainUrl . '/question/front/list';
        return BaseService::sendNormalRequest('POST', $url , ['codeList' => $examCodeArr]);
    }

    /**
     * 更新试题
     * @param $params
     * @return array
     */
    public function questionUpdate($params) {
        $url = $this->domainUrl . '/question/front/updateStatus';
        return BaseService::sendNormalRequest('POST', $url , $params);
    }
}