<?php

namespace Wotu;
use ErrorException;

class Config{

    private $serviceDomain = [
        'form' => 'http://192.168.2.90:36031',
        'auth' => 'http://192.168.2.90:36006',
        'finance' => 'http://192.168.2.90:36015',
        'admin' => 'http://192.168.2.90:36021',
        'id' => 'http://192.168.2.90:39001',
        'common-data' => 'http://192.168.2.90:36026',
        'question' => 'http://192.168.2.90:36076',
        'sign-in' => 'http://192.168.2.90:36081',
        'job' => 'http://192.168.2.90:36011',
        'organization' => 'http://192.168.2.90:36106',
        'gateway' => 'https://api.cloud.wozhipei.com',
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