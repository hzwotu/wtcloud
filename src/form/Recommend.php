<?php

/**
 * @desc 推荐位管理
 * @author Tinywan(ShaoBo Wan)
 * @email 756684177@qq.com
 * @date 2022/12/27 15:35
 */

declare(strict_types=1);

namespace Wotu\form;


use Wotu\BaseService;

class Recommend extends FormBase
{
    /**
     * @desc: 通过sid查询推荐位详情信息
     * @param int $siteId
     * @return array|mixed|string
     * @author Tinywan(ShaoBo Wan)
     */
    public function detailBySiteId(int $siteId)
    {
        $url = $this->domainUrl.'/form/recommend/detail_by_sid/'.$siteId;
        return BaseService::sendNormalRequest('GET',$url);
    }

}
