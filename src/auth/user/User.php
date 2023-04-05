<?php
namespace Wotu\auth\user;
use Wotu\auth\AuthBase;
use Wotu\BaseService;
use Wotu\dto\user\CreateSsoUserDto;
use Wotu\dto\user\CreateUserDto;
use Wotu\dto\user\UserLoginDto;


class User extends AuthBase {

    /**
     * @param array $param
     * @return mixed|string
     * @throws \ErrorException
     *当前用户信息
     * https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E7%94%A8%E6%88%B7API/queryByCodeUsingGET
     */
    public  function getUserInfo(){
        $url = $this->gatewayDomainUrl . '/auth/user/v1/info';
        return BaseService::sendNormalRequest('GET', $url ,[],true);
    }


    public  function getUserInfoByCode($userCode){
        if(empty($userCode)){
            throw new \ErrorException('用户编码不能为空');
        }
        $url = $this->domainUrl . '/auth/user/v1/user_info/'.$userCode;
        return BaseService::sendNormalRequest('GET', $url ,[]);
    }

    /**
     * @param $params
     * @return mixed|string
     * @throws \ErrorException
     * sdk 创建用户
     * https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E7%94%A8%E6%88%B7API/createUserUsingPOST
     */
    public function create($params){
        $url = $this->domainUrl . '/auth/user/v1/create';
        $requestDto = new CreateUserDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    /**
     * @param array $param
     * @return mixed|string
     * @throws \ErrorException
     *我的组织
     * https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E7%94%A8%E6%88%B7API/organizationListUsingGET
     */
    public  function getMyOrganization(){
        $url = $this->gatewayDomainUrl . '/auth/user/v1/organization_list';
        return BaseService::sendNormalRequest('GET', $url ,[],true);
    }

    /**
     * @return array|mixed|string
     * @throws \ErrorException
     * 用户组织
     */
    public  function getUserOrganization($userCode){
        if(empty($userCode)){
            throw new \ErrorException('用户编码不能为空');
        }
        $url = $this->domainUrl . '/auth/user/v1/user_organization_list/'.$userCode;
        return BaseService::sendNormalRequest('GET', $url ,[]);
    }

    /**
     * @param array $param
     * @return mixed|string
     * @throws \ErrorException
     *我的用户组
     * https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E7%94%A8%E6%88%B7API/groupListUsingGET
     */
    public  function getMyGroup(){
        $url = $this->gatewayDomainUrl . '/auth/user/v1/group_list';
        return BaseService::sendNormalRequest('GET', $url ,[],true);
    }

    /**
     * @return array|mixed|string
     * @throws \ErrorException
     * 用户的用户组
     */
    public  function getUserGroup($userCode){
        if(empty($userCode)){
            throw new \ErrorException('用户编码不能为空');
        }
        $url = $this->domainUrl . '/auth/user/v1/user_group_list/'.$userCode;
        return BaseService::sendNormalRequest('GET', $url ,[]);
    }

    /**
     * @param $params
     * @return mixed|string
     * @throws \ErrorException
     * sdk 用户登陆
     * https://api.cloud.wozp.cn/doc.html#/用户服务/用户API/loginUsingPOST
     */
    public function login($params){
        $url = $this->gatewayDomainUrl . '/auth/user/v1/login';
        $requestDto = new UserLoginDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    /**
     * @param $params
     * @return mixed|string
     * @throws \ErrorException
     * sdk 第三方单点登录创建用户
     * https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E7%94%A8%E6%88%B7API/ssoCreateUserUsingPOST
     */
    public function ssoCreate($params)
    {
        $url = $this->gatewayDomainUrl . '/auth/user/v1/sso_create';
        $requestDto = new CreateSsoUserDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

}