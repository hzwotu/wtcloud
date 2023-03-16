<?php
namespace Wotu\question;
use Wotu\BaseRequest;
use Wotu\Config;

class QuestionBase extends BaseRequest {
    public  $domainUrl;
    public function __construct() {
        $this->domainUrl =  (new Config('question'))->getServiceDomain();
    }
}