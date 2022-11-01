<?php
namespace Wotu\auth\commonData;
use Wotu\auth\AuthBase;
use Wotu\auth\CommonDataBase;
use Wotu\BaseService;



class Category extends CommonDataBase {

    /**
     * @param array $param
     * @return mixed|string
     * @throws \ErrorException
     *分类列表
     *https://api.cloud.wozp.cn/doc.html#/%E7%94%A8%E6%88%B7%E6%9C%8D%E5%8A%A1/%E5%85%AC%E5%85%B1%E6%95%B0%E6%8D%AEAPI/categoryUsingGET_1
     */
    public  function list($alias){
        if(empty($alias)){
            throw new \ErrorException("别名不能为空");
        }
        $url = $this->domainUrl . '/common_data/category_feign/'.$alias;
        return BaseService::sendNormalRequest('GET', $url );
    }




}