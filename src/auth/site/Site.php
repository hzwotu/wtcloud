<?php
namespace Wotu\auth\site;
use Wotu\auth\AuthBase;
use Wotu\BaseService;
use Wotu\dto\site\CreateSiteDto;
use Wotu\dto\site\SiteListPageDto;
use Wotu\dto\site\UpdateSiteDto;


class Site extends AuthBase {

    /**
     * @param array $param
     * @return mixed|string
     * @throws \ErrorException
     *站点列表分页
     * https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E7%AE%A1%E7%90%86%E5%90%8E%E5%8F%B0-%E7%AB%99%E7%82%B9%E7%AE%A1%E7%90%86API/siteListUsingPOST
     */
    public  function getSiteList($params = []){
        $url = $this->domainUrl . '/auth/backend/site/name_page';
        $requestDto = new SiteListPageDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($params));
    }

    /**
     * @param $baseInfo
     * @param $configs
     * @param $module
     * @return mixed|string
     * @throws \ErrorException
     * 创建站点
     * https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E7%AE%A1%E7%90%86%E5%90%8E%E5%8F%B0-%E7%AB%99%E7%82%B9%E7%AE%A1%E7%90%86API/saveUsingPOST
     */
    public function createSite($baseInfo,$configs = [],$module = []){
        $url = $this->domainUrl . '/auth/backend/site/save';
        $requestDto = new CreateSiteDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($baseInfo,$configs,$module));
    }

    /**
     * @param $sid
     * @param $baseInfo
     * @param array $configs
     * @param array $module
     * @return mixed|string
     * @throws \ErrorException
     * 编辑站点
     * https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E7%AE%A1%E7%90%86%E5%90%8E%E5%8F%B0-%E7%AB%99%E7%82%B9%E7%AE%A1%E7%90%86API/saveUsingPOST
     */
    public function updateSite($sid,$baseInfo,$configs = [],$module = []){
        $url = $this->domainUrl . '/auth/backend/site/save';
        $requestDto = new UpdateSiteDto();
        return BaseService::sendNormalRequest('POST', $url ,$requestDto->getRequestParam($sid,$baseInfo,$configs,$module));
    }


}