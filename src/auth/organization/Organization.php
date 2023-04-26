<?php
namespace Wotu\auth\organization;
use Wotu\auth\AuthBase;
use Wotu\auth\OrganizationBase;
use Wotu\BaseService;
use Wotu\dto\organization\CheckPermissionsDto;
use Wotu\dto\organization\CreateDepartmentDto;
use Wotu\dto\organization\CreateOrganizationDto;
use Wotu\dto\organization\CreateStaffDto;
use Wotu\dto\organization\DeleteOrganizationDto;
use Wotu\dto\organization\DeleteStaffDto;
use Wotu\dto\organization\EditDepartmentDto;
use Wotu\dto\organization\EditModulesDto;
use Wotu\dto\organization\EditOrganizationDto;

class Organization extends OrganizationBase {

    /**
     * @param $organizationCode
     * @return mixed|string
     * @throws \ErrorException
     * 组织详情
     * https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E7%BB%84%E7%BB%87API/organizationDetailUsingGET
     */
    public  function getOrganizationInfo($organizationCode){
        if(empty($organizationCode)){
            throw new \ErrorException('组织编码不能为空');
        }
        $url = $this->domainUrl . '/organization/organization/organization_detail/'.$organizationCode;
        return BaseService::sendNormalRequest('GET', $url ,[]);
    }

    /**
     * @param $params
     * @return mixed|string
     * @throws \ErrorException
     * 创建组织
     * https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E7%BB%84%E7%BB%87API/createPHPSdkUsingPOST
     */
    public function create($params){
        $url = $this->domainUrl . '/organization/organization/create_php';
        $requestDto = new CreateOrganizationDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    /**
     * @param $params
     * @return mixed|string
     * @throws \ErrorException
     * 编辑组织
     *https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E7%BB%84%E7%BB%87API/editUsingPOST
     */
    public function edit($params){
        $url = $this->domainUrl . '/organization/organization/edit';
        $requestDto = new EditOrganizationDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    /**
     * @param $organizationCode
     * @return mixed|string
     * @throws \ErrorException
     * 删除组织
     *https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E7%BB%84%E7%BB%87API/deleteOrganizationUsingPOST
     */
    public function deleteOrganization($organizationCode){
        $url = $this->domainUrl . '/organization/organization/delete_organization';
        $requestDto = new DeleteOrganizationDto();
        $params = array(
            'code' => $organizationCode
        );
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    /**
     * @param $organizationCode
     * @return mixed|string
     * @throws \ErrorException
     * 组织 部门树
     * https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E7%BB%84%E7%BB%87API/departmentTreeUsingGET
     */
    public function departmentTree($organizationCode){
        if(empty($organizationCode)){
            throw new \ErrorException('组织编码不能为空');
        }
        $url = $this->domainUrl . '/organization/department/tree/'.$organizationCode;
        return BaseService::sendNormalRequest('GET', $url ,[]);
    }

    /**
     * @param $params
     * @return mixed|string
     * @throws \ErrorException
     * 创建部门
     * https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E7%BB%84%E7%BB%87API/createDepartmentUsingPOST_1
     */
    public function createDepartment($params){
        $url = $this->domainUrl . '/organization/department/create_department';
        $requestDto = new CreateDepartmentDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    /**
     * @param $params
     * @return mixed|string
     * @throws \ErrorException
     * 编辑部门
     * https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E7%BB%84%E7%BB%87API/createDepartmentUsingPOST
     */
    public function editDepartment($params){
        $url = $this->domainUrl . '/organization/department/edit_department';
        $requestDto = new EditDepartmentDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    /**
     * @param $departmentCode
     * @return mixed|string
     * @throws \ErrorException
     * 删除部门
     * https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E7%BB%84%E7%BB%87API/deleteDepartmentUsingPOST
     */
    public function deleteDepartment($departmentCode){
        $url = $this->domainUrl . '/organization/department/delete_department';
        $requestDto = new DeleteOrganizationDto();
        $params = array(
            'code' => $departmentCode
        );
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    /**
     * @param $params
     * @return mixed|string
     * @throws \ErrorException
     * 批量创建组织成员
     * https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E7%BB%84%E7%BB%87API/createStaffPHPUsingPOST
     */
    public function createStaff($params){
        $url = $this->domainUrl . '/organization/staff/create_staff_php';
        $requestDto = new CreateStaffDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    /**
     * @param $params
     * @return mixed|string
     * @throws \ErrorException
     * 批量删除组织成员
     * https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E7%BB%84%E7%BB%87API/deleteStaffPHPUsingPOST
     */
    public function deleteStaff($params){
        $url = $this->domainUrl . '/organization/staff/delete_staff_php';
        $requestDto = new DeleteStaffDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    /**
     * @param $params
     * @return mixed|string
     * @throws \ErrorException
     * 编辑站点下组织私有模块
     * https://api.cloud.wozp.cn/doc.html#/用户服务/组织API/editOrganizationSiteModuleUsingPOST
     */
    public function editModules($params){
        $url = $this->domainUrl . '/organization/organization/edit_modules';
        $requestDto = new EditModulesDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    /**
     * @param $params
     * @return mixed|string
     * @throws \ErrorException
     * 权限校验
     * https://api.cloud.wozp.cn/doc.html#/用户服务/组织API/checkPermissionUsingPOST
     */
    public function checkPermissions($params){
        $url = $this->domainUrl . '/organization/organization/check_permissions';
        $requestDto = new CheckPermissionsDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }



    /**
     * @param array $param
     * @return mixed|string
     * @throws ErrorException
     *我的组织
     * https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E7%94%A8%E6%88%B7API/organizationListUsingGET
     */
    public  function getMyOrganization(){
        $url = $this->gatewayDomainUrl . '/organization/organization/organization_list';
        return BaseService::sendNormalRequest('GET', $url ,[],true);
    }

    /**
     * @return array|mixed|string
     * @throws ErrorException
     * 用户组织
     */
    public  function getUserOrganization($userCode){
        if(empty($userCode)){
            throw new ErrorException('用户编码不能为空');
        }
        $url = $this->domainUrl . '/organization/organization/user_organization_list/'.$userCode;
        return BaseService::sendNormalRequest('GET', $url ,[]);
    }




}