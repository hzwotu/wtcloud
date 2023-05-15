<?php

namespace Wotu;
use ErrorException;

class Config{

    private $serviceDomain = [
        'form' => 'http://192.168.0.11:36006',
        'auth' => 'http://192.168.0.11:36006',
        'finance' => 'http://192.168.0.11:36015',
        'admin' => 'http://192.168.0.11:36021',
        'id' => 'http://192.168.0.11:39001',
        'common-data' => 'http://192.168.0.11:36026',
        'question' => 'http://192.168.0.11:36076',
        'sign-in' => 'http://192.168.0.11:36081',
        'job' => 'http://192.168.0.11:36011',
        'organization' => 'http://192.168.0.11:36106',
        'gateway' => 'https://api.cloud.wozp.cn'
    ];

    private $domainUrl;

    /**
     * @throws ErrorException
     */
    public function __construct($domain){
        if(empty($this->serviceDomain[$domain])){
            throw new ErrorException('服务不存在');
        }
        $this->domainUrl = $this->serviceDomain[$domain];
    }

    public function getServiceDomain(){
        return $this->domainUrl;
    }


}