<?php

namespace Wotu\questionnaire;

use Wotu\BaseRequest;
use Wotu\Config;

class QuestionnaireBase extends BaseRequest {

    public string $domainUrl;

    public function __construct() {
        $this->domainUrl =  (new Config('questionnaireBase'))->getServiceDomain();
    }
}