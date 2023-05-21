<?php
namespace Wotu\auth\company;
use Wotu\auth\AuthBase;
use Wotu\BaseService;
use Wotu\dto\company\CertifyCompanyDto;
use Wotu\dto\company\CreditCompanyDto;


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

    /**
     * @param $params
     * @return mixed|string
     * @throws \ErrorException
     *企业信息库信息
     */
    public function creditCompany($params){
        $url = $this->domainUrl . '/auth/backend/company_credit/info_php';
        $requestDto = new CreditCompanyDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }









}