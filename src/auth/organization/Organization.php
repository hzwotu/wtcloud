<?php
namespace Wotu\auth\organization;
use Wotu\auth\AuthBase;
use Wotu\BaseService;
use Wotu\dto\organization\CreateDepartmentDto;
use Wotu\dto\organization\CreateOrganizationDto;
use Wotu\dto\organization\CreateStaffDto;
use Wotu\dto\organization\DeleteOrganizationDto;
use Wotu\dto\organization\DeleteStaffDto;
use Wotu\dto\organization\EditDepartmentDto;
use Wotu\dto\organization\EditOrganizationDto;

class Organization extends AuthBase{

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
        $url = $this->domainUrl . '/auth/organization/organization_detail/'.$organizationCode;
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
        $url = $this->domainUrl . '/auth/organization/create_php';
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
        $url = $this->domainUrl . '/auth/organization/edit';
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
        $url = $this->domainUrl . '/auth/organization/delete_organization';
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
        $url = $this->domainUrl . '/auth/organization/department/tree/'.$organizationCode;
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
        $url = $this->domainUrl . '/auth/organization/create_department';
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
        $url = $this->domainUrl . '/auth/organization/edit_department';
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
        $url = $this->domainUrl . '/auth/organization/delete_department';
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
        $url = $this->domainUrl . '/auth/organization/create_staff_php';
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
        $url = $this->domainUrl . '/auth/organization/delete_staff_php';
        $requestDto = new DeleteStaffDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }








}