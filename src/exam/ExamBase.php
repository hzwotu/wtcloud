<?php
/**
 * 考评服务
 * Author: cy <823176761@qq.com>
 * Date: 2023/6/5
 * Time: 17:13
 */

namespace Wotu\exam;

use Wotu\BaseRequest;
use Wotu\Config;

class ExamBase extends BaseRequest
{
    public  $domainUrl;
    public function __construct() {
        $this->domainUrl =  (new Config('exam-main'))->getServiceDomain();
        $this->domainUrl .= '/exam-main';
    }
}
