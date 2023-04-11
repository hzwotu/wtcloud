<?php

namespace Wotu;
use ErrorException;

class Config{
//    private $serviceDomain = [
////        'auth' => 'http://localhost:36006',
//        'form' => 'http://192.168.2.90:36031',
//        'auth' => 'http://192.168.2.90:36006',
//        'finance' => 'http://192.168.2.90:36015',
//        'admin' => 'http://192.168.2.90:36021',
//        'id' => 'http://192.168.2.90:39001',
//        'common-data' => 'http://192.168.2.90:36026',
//        'question' => 'http://192.168.2.90:36076',
//        'sign-in' => 'http://192.168.2.90:36081',
//        'gateway' => 'https://api.cloud.wozhipei.com',
//    ];

    private array $serviceDomain = [
        'form' => 'http://47.98.193.2:36006',
        'auth' => 'http://47.98.193.2:36006',
        'finance' => 'http://47.98.193.2:36015',
        'admin' => 'http://47.98.193.2:36021',
        'id' => 'http://47.98.193.2:39001',
        'common-data' => 'http://47.98.193.2:36026',
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