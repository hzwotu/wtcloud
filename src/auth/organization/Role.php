<?php
namespace Wotu\auth\organization;
use Wotu\auth\AuthBase;
use Wotu\BaseService;
use Wotu\dto\organization\CreateRoleDto;
use Wotu\dto\organization\EditRoleDto;
use Wotu\dto\organization\RoleListDto;

class Role extends AuthBase{
    /**
     * @param $params
     * @return mixed|string
     * @throws \ErrorException
     * 创建组织角色
     * https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E8%A7%92%E8%89%B2API/createUsingPOST_1
     */
    public function createRole($params){
        $url = $this->domainUrl . '/auth/role/create';
        $requestDto = new CreateRoleDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    /**
     * @param $params
     * @return mixed|string
     * @throws \ErrorException
     * 编辑角色
     *https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E8%A7%92%E8%89%B2API/modifyUsingPOST
     */
    public function editRole($params){
        $url = $this->domainUrl . '/auth/role/modify';
        $requestDto = new EditRoleDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    /**
     * @param $roleCode
     * @return mixed|string
     * @throws \ErrorException
     * 删除角色
     * https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E8%A7%92%E8%89%B2API/deleteUsingPOST_1
     */
    public function deleteRole($roleCode){
        $url = $this->domainUrl . '/auth/role/delete/'.$roleCode;
        return BaseService::sendNormalRequest('POST', $url ,[]);
    }

    /**
     * @param $organizationCode
     * @return mixed|string
     * @throws \ErrorException
     * 角色列表
     * https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E8%A7%92%E8%89%B2API/roleListUsingGET
     */
    public function roleList($organizationCode){
        $url = $this->domainUrl . '/auth/role/role_list/'.$organizationCode;
        return BaseService::sendNormalRequest('GET', $url ,[]);
    }

    /**
     * @param $params
     * @return mixed|string
     * @throws \ErrorException
     * 角色权限列表
     *https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E8%A7%92%E8%89%B2API/permissionListUsingPOST
     */
    public function rolePermissionList($params){
        $url = $this->domainUrl . '/auth/role/permissions_list';
        $requestDto = new RoleListDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }


}