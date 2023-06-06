<?php
/**
 * @desc 国密SM4
 * @author Tinywan(ShaoBo Wan)
 * @date 2023/5/19 10:00
 */
declare(strict_types=1);


namespace Wotu\tool\crypto\utils;


use ErrorException;
use Wotu\BaseService;
use Wotu\dto\tool\SM4Dto;
use Wotu\tool\ToolBase;

class SM4 extends ToolBase
{
    /**
     * @desc: 加密
     * @param array $params
     * @return array|mixed|string
     * @throws ErrorException
     * @author Tinywan(ShaoBo Wan)
     */
    public  function encryptBase64(array $params)
    {
        $requestDto = new SM4Dto();
        return BaseService::sendNormalRequest('POST',$this->domainUrl.'/tool/sm/sm4/encrypt', $requestDto->getRequestParam($params));
    }

    /**
     * @desc: 解密
     * @param array $params
     * @return array|mixed|string
     * @throws ErrorException
     * @author Tinywan(ShaoBo Wan)
     */
    public function decryptBase64(array $params)
    {
        $requestDto = new SM4Dto();
        return BaseService::sendNormalRequest('POST',$this->domainUrl.'/tool/sm/sm4/decrypt', $requestDto->getRequestParam($params));
    }
}