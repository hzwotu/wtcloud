<?php
namespace Wotu\admin;
use Wotu\BaseRequest;
use Wotu\Config;

class AdminBase extends BaseRequest {
    public  $domainUrl;
    public  $gatewayDomainUrl;
    public function __construct(){
        $this->domainUrl =  (new Config('admin'))->getServiceDomain();
        $this->gatewayDomainUrl =  (new Config('gateway'))->getServiceDomain();
    }
}
