<?php

namespace Wotu;
class Config{
    private $serviceDomain = [
//        'auth' => 'http://localhost:36006',
        'auth' => 'http://114.55.62.34:36006',
        'finance' => 'http://114.55.62.34:36015',
        'admin' => 'http://114.55.62.34:36021',
        'id' => 'http://114.55.62.34:39001',
        'common-data' => 'http://114.55.62.34:36026',
        'gateway' => 'https://api.cloud.wozhipei.com'

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