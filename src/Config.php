<?php

namespace Wotu;
use ErrorException;

class Config{

    private $serviceDomain = [
        'tool' => 'http://47.98.193.2:36126',
        'form' => 'http://47.98.193.2:36031',
        'auth' => 'http://47.98.193.2:36006',
        'finance' => 'http://47.98.193.2:36015',
        'admin' => 'http://47.98.193.2:36021',
        'id' => 'http://47.98.193.2:39001',
        'common-data' => 'http://47.98.193.2:36026',
        'question' => 'http://47.98.193.2:36076',
        'sign-in' => 'http://47.98.193.2:36081',
        'job' => 'http://47.98.193.2:36011',
        'questionnaireBase' => 'http://47.98.193.2:36121',
        'organization' => 'http://47.98.193.2:36106',
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