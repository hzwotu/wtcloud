<?php
namespace Wotu\auth;
use Wotu\BaseRequest;
use Wotu\Config;

class AuthBase extends BaseRequest {
    public  $domainUrl;
    public  $gatewayDomainUrl;
    public function __construct(){
        $this->domainUrl =  (new Config('auth'))->getServiceDomain();
        $this->gatewayDomainUrl =  (new Config('gateway'))->getServiceDomain();
    }
}
