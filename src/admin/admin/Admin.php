<?php

namespace Wotu\admin\admin;


use Wotu\admin\AdminBase;
use Wotu\BaseService;
use Wotu\dto\admin\RolePermissionCheckDto;

class Admin extends AdminBase
{
    public function getListByCodes($params)
    {
        if (!is_array($params) || empty($params)) {
            throw new \Exception('缺少管理员编码');
        }
        $data['codeList'] = $params;
        $url = $this->gatewayDomainUrl . '/admin/v1.1/list';
        return BaseService::sendNormalRequest('POST', $url, $data, true);
    }

    public function getAdminIfo()
    {
        $url = $this->gatewayDomainUrl . '/admin/v1.1/detail_current';
        return BaseService::sendNormalRequest('GET', $url, [], true);
    }

    public function checkPermission($params)
    {
        $url = $this->gatewayDomainUrl . '/admin/v1.1/role_permission/authz_phpsdk';
        $requestDto = new RolePermissionCheckDto();
        return BaseService::sendNormalRequest('POST', $url, $requestDto->getRequestParam($params), true);
    }

    /**
     * 根据authorization获取登陆信息
     *
     * @author lichang
     * @param array $header
     * @return array|mixed|string
     */
    public function getAdminInfo(array $header = [])
    {
        $url = $this->gatewayDomainUrl . '/admin/v1.1/detail_current';
        return BaseService::sendNormalRequest('GET', $url, [], true, $header);
    }

    /**
     * 获取相应的的业务权限(https://api.cloud.wozp.cn/doc.html#/%E7%AE%A1%E7%90%86%E5%91%98%E6%9C%8D%E5%8A%A1/%E7%AE%A1%E7%90%86%E5%91%98%E8%A7%92%E8%89%B2%E6%9D%83%E9%99%90API/permissionConfigUsingGET)
     *
     * @author lichang
     * @return array|mixed|string
     */
    public function getAuthority(array $header, array $params = [])
    {
        $url = $this->gatewayDomainUrl . '/admin/v1.1/permission_config';
        return BaseService::sendNormalRequest('GET', $url, $params, true,$header);
    }

    /**
     * 创建管理员(https://api.cloud.wozp.cn/doc.html#/%E7%AE%A1%E7%90%86%E5%91%98%E6%9C%8D%E5%8A%A1/%E7%AE%A1%E7%90%86%E5%91%98API/saveUsingPOST)
     *
     * @author lichang
     * @param array $header
     * @param array $params
     * @return array|mixed|string
     */
    public function createManager(array $header, array $params)
    {
        $url = $this->gatewayDomainUrl . '/admin/v1.1/save';
        return BaseService::sendNormalRequest('POST', $url, $params, true, $header);
    }

    public function permissionList()
    {
        $url = $this->gatewayDomainUrl . '/admin/v1.1/permission_list';
        return BaseService::sendNormalRequest('GET', $url, [], true);
    }

    public function permissionAuth($header, $route)
    {
        $url = $this->gatewayDomainUrl . '/admin/v1.1/role_permission/authz_phpsdk';
        return BaseService::sendNormalRequest('POST', $url, ['apiRoute' => $route], true, $header);
    }
}
