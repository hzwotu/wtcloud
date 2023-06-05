<?php
/**
 * 考评服务
 * Author: cy <823176761@qq.com>
 * Date: 2023/6/5
 * Time: 17:16
 */

namespace Wotu\exam;


use Wotu\BaseService;

class Exam extends ExamBase
{
    public function uploadSingleVideo($params) {
        $arr = [
            'cloud' => 1,
            'fileType' => 1,
            'serverName' => 'exam_api',
            'type' => 2
        ];
        $params = array_merge($arr, $params);
        $url = $this->domainUrl . '/upload/singleUpload';
        return BaseService::sendNormalRequest('POST', $url , $params);
    }
}