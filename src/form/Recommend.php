<?php

/**
 * @desc 推荐位管理
 * @author Tinywan(ShaoBo Wan)
 * @email 756684177@qq.com
 * @date 2022/12/27 15:35
 */

declare(strict_types=1);

namespace Wotu\form;


use ErrorException;
use Wotu\BaseService;
use Wotu\dto\cms\CreateRecommendDto;
use Wotu\dto\cms\UpdateRecommendDto;

class Recommend extends FormBase
{
    /**
     * @desc: 推荐位新增
     * @param array $params
     * @return mixed|string
     * @throws ErrorException
     * @author Tinywan(ShaoBo Wan)
     */
    public function create(array $params)
    {
        $url = $this->domainUrl . '/form/recommend/create';
        $requestDto = new CreateRecommendDto();
        return BaseService::sendNormalRequest('POST', $url, $requestDto->getRequestParam($params));
    }

    /**
     * @desc: 编辑
     * @param array $params
     * @return mixed|string
     * @throws ErrorException
     * @author Tinywan(ShaoBo Wan)
     */
    public function update(array $params)
    {
        $url = $this->domainUrl . '/form/recommend/modify';
        $requestDto = new UpdateRecommendDto();
        return BaseService::sendNormalRequest('POST', $url, $requestDto->getRequestParam($params));
    }

    /**
     * @desc: 详情
     * @param string $code
     * @return mixed|string
     * @throws ErrorException
     * @author Tinywan(ShaoBo Wan)
     */
    public function detail(string $code)
    {
        $url = $this->domainUrl . '/form/recommend/delete/' . $code;
        $requestDto = new CreateRecommendDto();
        return BaseService::sendNormalRequest('POST', $url, $requestDto->getRequestParam($params));
    }

    /**
     * @desc: 删除
     * @param string $code
     * @return mixed|string
     * @throws ErrorException
     * @author Tinywan(ShaoBo Wan)
     */
    public function delete(string $code)
    {
        $url = $this->domainUrl . '/form/recommend/delete/' . $code;
        $requestDto = new CreateRecommendDto();
        return BaseService::sendNormalRequest('POST', $url, $requestDto->getRequestParam($code));
    }
}
