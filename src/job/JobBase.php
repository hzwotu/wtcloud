<?php


namespace Wotu\job;


use Wotu\BaseRequest;
use Wotu\Config;

class JobBase extends BaseRequest
{
    public string $domainUrl;

    public function __construct(){
        $this->domainUrl =  (new Config('job'))->getServiceDomain();
    }

}