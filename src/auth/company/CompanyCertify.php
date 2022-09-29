<?php
namespace Wotu\auth\company;
use Wotu\auth\AuthBase;
use Wotu\BaseService;
use Wotu\dto\company\CertifyCompanyDto;


class CompanyCertify extends AuthBase{

    /**
     * @param $params
     * @return mixed|string
     * @throws \ErrorException
     *批量验证工商二要素
     */
    public function certifyCompany($params){
        $url = $this->domainUrl . '/auth/organization/batch_certify';
        $requestDto = new CertifyCompanyDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }









}