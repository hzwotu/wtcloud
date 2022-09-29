<?php
namespace Wotu\auth\idCard;
use Wotu\auth\AuthBase;
use Wotu\BaseService;
use Wotu\dto\idCard\CertifyIdCardDto;


class IdCardCertify extends AuthBase{

    /**
     * @param $params
     * @return mixed|string
     * @throws \ErrorException
     *批量验证身份证二要素
     */
    public function certifyIdCard($params){
        $url = $this->domainUrl . '/auth/user/v1/batch_certify_id_card';
        $requestDto = new CertifyIdCardDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }









}