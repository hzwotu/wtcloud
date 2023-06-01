<?php
namespace Wotu\auth;
use Wotu\BaseRequest;
use Wotu\Config;

class OrganizationBase extends BaseRequest {
    public  $domainUrl;
    public  $gatewayDomainUrl;
    public function __construct(){
        $this->domainUrl =  (new Config('organization'))->getServiceDomain();
        $this->gatewayDomainUrl =  (new Config('gateway'))->getServiceDomain();
    }
}
