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
        return BaseService::sendNormalRequest('POST', $url, $data,true);
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
     * 获取相应的的业务权限
     *
     * @author lichang
     * @return array|mixed|string
     */
    public function getAuthority(array $header, array $params = [])
    {
        $url = $this->gatewayDomainUrl . '/admin/v1.1/permission_config';
        return BaseService::sendNormalRequest('GET', $url, $params, true,$header);
    }
}
