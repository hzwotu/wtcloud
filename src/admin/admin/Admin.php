<?php
namespace Wotu\admin\admin;


use Wotu\admin\AdminBase;
use Wotu\BaseService;

class Admin extends AdminBase {
    public  function getListByCodes($params){
        if(!is_array($params) || empty($params)){
            throw new \Exception('缺少管理员编码');
        }
        $data['codeList'] = $params;
        $url = $this->domainUrl . '/admin/v1.1/list';
        return BaseService::sendNormalRequest('POST', $url ,$data,true);
    }
}