<?php
namespace Wotu\auth\user;
use Wotu\auth\AuthBase;
use Wotu\BaseService;
use Wotu\dto\user\AddUserGroupDto;
use Wotu\dto\user\CreateGroupDto;
use Wotu\dto\user\DeleteGroupDto;
use Wotu\dto\user\DeleteUserGroupDto;
use Wotu\dto\user\EditGroupDto;
use Wotu\dto\user\GetGroupDto;

class UserGroup extends AuthBase {

    /**
     * @param $params
     * @return mixed|string
     * @throws \ErrorException
     * sdk 创建用户组
     * https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E7%94%A8%E6%88%B7%E7%BB%84API/createUsingPOST_2
     */
    public function create($params){
        $url = $this->domainUrl . '/auth/user_group/create';
        $requestDto = new CreateGroupDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    /**
     * @param $params
     * @return mixed|string
     * @throws \ErrorException
     * 编辑用户组
     * https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E7%94%A8%E6%88%B7%E7%BB%84API/editUsingPOST
     */
    public function edit($params){
        $url = $this->domainUrl . '/auth/user_group/edit';
        $requestDto = new EditGroupDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    /**
     * @param $params
     * @return mixed|string
     * @throws \ErrorException
     * 删除用户组
     * https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E7%94%A8%E6%88%B7%E7%BB%84API/deleteUsingPOST_2
     */
    public function deleteById($params){
        $url = $this->domainUrl . '/auth/user_group/delete';
        $requestDto = new DeleteGroupDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    /**
     * @param $params
     * @return mixed|string
     * @throws \ErrorException
     * 添加用户的 用户组
     * https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E7%94%A8%E6%88%B7%E7%BB%84API/addUserGroupUsingPOST
     */
    public function addUserGroup($params){
        $url = $this->domainUrl . '/auth/user_group/add_user_group';
        $requestDto = new AddUserGroupDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    /**
     * @param $params
     * @return mixed|string
     * @throws \ErrorException
     * 删除用户的 用户组
     * https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E7%94%A8%E6%88%B7%E7%BB%84API/addUserGroupUsingPOST_1
     */
    public function deleteUserGroup($params){
        $url = $this->domainUrl . '/auth/user_group/delete_user_group';
        $requestDto = new DeleteUserGroupDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    /**
     * @param $params
     * @return mixed|string
     * @throws \ErrorException
     * 用户组列表
     */
    public function groupList($params){
        $url = $this->domainUrl . '/auth/user_group/group_list';
        $requestDto = new GetGroupDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

}