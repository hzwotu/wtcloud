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
use Wotu\Config;

class FormBase extends BaseRequest
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
     * FormBase constructor.
     */
    public function __construct()
    {
        $this->domainUrl =  (new Config('form'))->getServiceDomain();
        $this->gatewayDomainUrl =  (new Config('gateway'))->getServiceDomain();
    }
}
