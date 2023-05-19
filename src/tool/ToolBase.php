<?php
/**
 * @desc ToolBase.php 描述信息
 * @author Tinywan(ShaoBo Wan)
 * @date 2023/5/19 10:01
 */
declare(strict_types=1);


namespace Wotu\tool;


use Wotu\BaseRequest;
use Wotu\BaseService;
use Wotu\Config;
use Wotu\dto\NormalBaseDto;

abstract class ToolBase extends BaseRequest
{

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
        $this->gatewayDomainUrl =  (new Config('gateway'))->getServiceDomain();
    }

    /**
     * @param string $method
     * @param array $data
     * @param false $needToken
     * @return array|mixed|string
     */
    public function sendNormalRequest(string $method, array $data = [], bool $needToken = false)
    {
        return BaseService::sendNormalRequest($method, $this->gatewayDomainUrl, $this->dto->getRequestParam($data));
    }
}