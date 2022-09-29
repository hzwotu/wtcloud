<?php

namespace Wotu\dto\site;

use Wotu\dto\NormalBaseDto;

class CreateSiteDto extends NormalBaseDto
{

    protected $param = array(
        'baseInfo' => [],//$baseInfo  必填
        "configList" => [],//$configList 非必填
        "moduleList" => [],//$moduleList  非必填
    );
    //辅助信息+附加信息
    protected $configList = array(
            "description" => "",//配置描述
            "key" => "",//键
            "value" => ""//值
        );
    //一级模块, 已开启的模块
    protected $moduleList = array(
        "alias" => "",//别名
        "id" => "",//id   /*必填*/
        "name" => "",//名称
        "type" => ""//产品线	1 "平台",2 "职业培训",3 "考试评价", 4 "创培",
    );
    //基础信息
    protected $baseInfo = array(
        "adminDomain" => "",//管理系统域名
        "alias" => "",//别名   /*必填*/
        "area" => 0,//区编码
        "city" => 0,//市编码
        "contactDept" => "",//联系人部门
        "contactMobile" => "",//联系人手机
        "contactName" => "",//联系人
        "contactPost" => "",//联系人职位
        "expireTime" => null,//到期时间, 13位时间戳
        "name" => "",//名称
        "padDomain" => "",//	pad域名
        "pcDomain" => "",//pc域名
        "province" => 0,//省编码
        "shortName" => "",//简称
        "status" => 0,//状态，0正常1禁用
        "wapDomain" => ""//移动端域名
    );



    public function __construct()
    {
        $parentColumn = $this->column;
        $this->param = array_merge($parentColumn, $this->param);
    }


    public function getRequestParam($baseInfo,$configs,$module)
    {
        $resultParam = array();
        $resultParam['configList'] = array();
        $resultParam['moduleList'] = array();
        if(!empty($configs)  ){
            if(!is_array($configs) || !count($configs)){
                throw new \ErrorException('站点配置参数错误');
            }
            foreach ($configs as $item){
                $resultParam['configList'][] = $this->formatParam($item,$this->configList);
            }
        }
        if(!empty($module)){
            if(!is_array($module) || !count($module) ){
                throw new \ErrorException('站点模块参数错误');
            }
            foreach ($module as $items){
                $resultParam['moduleList'][] = $this->formatParam($items,$this->moduleList);
            }
        }
        $resultParam['baseInfo'] = $this->formatParam($baseInfo,$this->baseInfo);
        return $resultParam;
    }
}