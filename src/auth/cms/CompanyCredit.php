<?php
namespace Wotu\auth\cms;
use Wotu\auth\AuthBase;
use Wotu\BaseService;
use Wotu\dto\cms\CreateCompanyCreditDto;
use Wotu\dto\cms\DeleteCompanyCreditDto;


class CompanyCredit extends AuthBase{
    /**
     * @param $params
     * @return mixed|string
     * @throws \ErrorException
     * 添加工商信息库
     */
    public function addCompanyCredit($params){
        $url = $this->domainUrl . '/auth/backend/company_credit/add';
        $requestDto = new CreateCompanyCreditDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    /**
     * @param $params
     * @return mixed|string
     * @throws \ErrorException
     * 编辑工商信息库
     */
    public function editCompanyCredit($params){
        $url = $this->domainUrl . '/auth/backend/company_credit/edit_php';
        $requestDto = new CreateCompanyCreditDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    /**
     * @param $params
     * @return mixed|string
     * @throws \ErrorException
     * 删除工商信息库
     */
    public function delete($params){
        $url = $this->domainUrl . '/auth/backend/company_credit/delete_php';
        $requestDto = new DeleteCompanyCreditDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    public function queryInfo($params){
        $url = $this->domainUrl . '/auth/backend/company_credit/info_php';
        $requestDto = new DeleteCompanyCreditDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }
}