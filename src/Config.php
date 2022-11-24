<?php

namespace Wotu;
class Config{
    private $serviceDomain = [
//        'auth' => 'http://localhost:36006',
        'auth' => 'http://47.98.193.2:36006',
        'finance' => 'http://47.98.193.2:36015',
        'admin' => 'http://47.98.193.2:36021',
        'id' => 'http://47.98.193.2:39001',
        'common-data' => 'http://47.98.193.2:36026',
        'gateway' => 'https://api.cloud.wozp.cn'

    ];
    private $domainUrl;
    public function __construct($domain){
        if(empty($this->serviceDomain[$domain])){
            throw new \ErrorException('服务不存在');
        }
        $this->domainUrl = $this->serviceDomain[$domain];
    }
    public function getServiceDomain(){
        return $this->domainUrl;
    }


}