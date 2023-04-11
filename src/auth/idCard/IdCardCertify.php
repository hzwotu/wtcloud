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

    /**
     * 校验护照-其他证件
     * @param $params
     * @return array|mixed|string|null
     * @throws \ErrorException
     * author summer
     * date 2023/4/10 10:37
     */
    public function auditCertificate($params)
    {
        $url = $this->domainUrl . '/auth/user/v1/audit_certificate';
        return BaseService::sendNormalRequest('POST', $url ,$params);
    }








}
