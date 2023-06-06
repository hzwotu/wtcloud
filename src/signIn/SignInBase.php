<?php
/**
 * 签到中心请求
 * User : liudengwei
 * Date : 2023/3/9
 * Time : 17:37
 */

namespace Wotu\signIn;


use Wotu\BaseRequest;
use Wotu\Config;

class SignInBase extends BaseRequest
{
    public string $domainUrl;

    public function __construct(){
        $this->domainUrl =  (new Config('sign-in'))->getServiceDomain();
    }

}