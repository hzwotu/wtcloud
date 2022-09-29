<?php
namespace Wotu\auth\cms;
use Wotu\auth\AuthBase;
use Wotu\BaseService;
use Wotu\dto\cms\CreateIdCardDto;
use Wotu\dto\cms\DeleteIdCardDto;

class IdCard extends AuthBase{
    /**
     * @param $params
     * @return mixed|string
     * @throws \ErrorException
     * 添加实名信息库
     */
    public function addIdCard($params){
        $url = $this->domainUrl . '/auth/backend/id_card/add';
        $requestDto = new CreateIdCardDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    /**
     * @param $params
     * @return mixed|string
     * @throws \ErrorException
     * 编辑实名信息库
     */
    public function editIdCard($params){
        $url = $this->domainUrl . '/auth/backend/id_card/edit_php';
        $requestDto = new CreateIdCardDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    /**
     * @param $params
     * @return mixed|string
     * @throws \ErrorException
     * 删除实名信息库
     */
    public function delete($params){
        $url = $this->domainUrl . '/auth/backend/id_card/delete_php';
        $requestDto = new DeleteIdCardDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    public function queryInfo($params){
        $url = $this->domainUrl . '/auth/backend/id_card/info_php';
        $requestDto = new DeleteIdCardDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }
}