<?php
namespace Wotu\admin\role;
use Wotu\admin\AdminBase;
use Wotu\BaseService;

class Role extends AdminBase {
    public function rolePermission($roleCode){
        $url = $this->domainUrl . '/admin/v1.1/role/'.$roleCode;
        return BaseService::sendNormalRequest('GET', $url ,[]);
    }


}