<?php
namespace Wotu\auth;
use Wotu\BaseRequest;
use Wotu\Config;

class CommonDataBase extends BaseRequest {
    public  $domainUrl;

    public function __construct(){
        $this->domainUrl =  (new Config('common-data'))->getServiceDomain();

    }
}
