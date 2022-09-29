<?php
namespace Wotu\id;
use Wotu\BaseRequest;
use Wotu\Config;

class IdBase extends BaseRequest {
    public  $domainUrl;
    public function __construct(){
        $this->domainUrl =  (new Config('id'))->getServiceDomain();
    }
}
