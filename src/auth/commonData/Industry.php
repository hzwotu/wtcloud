<?php
namespace Wotu\auth\commonData;
use Wotu\auth\AuthBase;
use Wotu\auth\CommonDataBase;
use Wotu\BaseService;



class Industry extends CommonDataBase {

    /**
     * @param array $param
     * @return mixed|string
     * @throws \ErrorException
     *行业列表
     *https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E5%85%AC%E5%85%B1%E6%95%B0%E6%8D%AEAPI/industryDataUsingGET
     */
    public  function list($parentCode = '0'){
        $parentCode = $parentCode ?? '0';
        $url = $this->domainUrl . '/common_data/industry/industry_php/'.$parentCode;
        return BaseService::sendNormalRequest('GET', $url );
    }


    /**
     * @param array $param
     * @return mixed|string
     * @throws \ErrorException
     *根据pid获取下级行业列表
     *https://api.cloud.wozp.cn/doc.html#/%E5%85%AC%E5%85%B1%E6%95%B0%E6%8D%AE%E6%9C%8D%E5%8A%A1/%E8%A1%8C%E4%B8%9A/industryDataUsingGET_1
     */
    public  function listById($pid = '0'){
        $pid = $pid ?? '0';
        $url = $this->domainUrl . '/common_data/industry/list_by_pid/'.$pid;
        return BaseService::sendNormalRequest('GET', $url );
    }

    /**
     * @param array $param
     * @return mixed|string
     * @throws \ErrorException
     *根据id获取行业完整链路名称
     *https://api.cloud.wozp.cn/doc.html#/%E5%85%AC%E5%85%B1%E6%95%B0%E6%8D%AE%E6%9C%8D%E5%8A%A1/%E8%A1%8C%E4%B8%9A/industryDataPHPUsingGET
     */
    public  function industryChainById($id = '0'){
        $id = $id ?? '0';
        $url = $this->domainUrl . '/common_data/industry/industry_chain/'.$id;
        return BaseService::sendNormalRequest('GET', $url );
    }






}