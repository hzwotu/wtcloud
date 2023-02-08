<?php

/**
 * @desc FormBase
 * @author Tinywan(ShaoBo Wan)
 * @email 756684177@qq.com
 * @date 2022/12/27 17:57
 */

declare(strict_types=1);

namespace Wotu\form;


use Wotu\BaseRequest;
use Wotu\BaseService;
use Wotu\Config;
use Wotu\dto\NormalBaseDto;

abstract class FormBase extends BaseRequest
{
    /**
     * 服务地址
     * @var string
     */
    public string $domainUrl;

    /**
     * 网关地址
     * @var string
     */
    public string $gatewayDomainUrl;

    /**
     * @var NormalBaseDto
     */
    public NormalBaseDto $dto;

    /**
     * FormBase constructor.
     */
    public function __construct()
    {
        $this->domainUrl =  (new Config('form'))->getServiceDomain();
        $this->gatewayDomainUrl =  (new Config('gateway'))->getServiceDomain();
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array $data
     * @param false $needToken
     * @param array $header
     * @return array|mixed|string
     */
    public function sendNormalRequest(string $method, string $uri, array $data = [], $needToken = false, $header = [])
    {
        return BaseService::sendNormalRequest($method, $this->domainUrl .$uri, $this->dto->getRequestParam($data));
    }
}
