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
     * 服务地址
     * @var string
     */
    public string $domainUrl;

    /**
     * @var NormalBaseDto
     */
    public NormalBaseDto $dto;

    /**
     * FormBase constructor.
     */
    public function __construct()
    {
        $this->domainUrl =  (new Config('tool'))->getServiceDomain();
    }

    /**
     * @param string $method
     * @param array $data
     * @return array|mixed|string
     */
    public function sendNormalRequest(string $method, array $data = [])
    {
        return BaseService::sendNormalRequest($method, $this->domainUrl, $this->dto->getRequestParam($data));
    }
}