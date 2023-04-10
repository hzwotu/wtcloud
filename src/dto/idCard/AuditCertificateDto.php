<?php

namespace Wotu\dto\idCard;

use Wotu\dto\NormalBaseDto;

class AuditCertificateDto extends NormalBaseDto
{
    protected $param = array(
        "list" => [],
    );

    protected $idCardItem = array(
        "certificateImage" => "",
        "certificateNo" => "",
        "certificateType" => 0,
        "name" => "",
        "remark" => "",
        "sid" => 0,
        "userCode" => "",
    );

    public function __construct()
    {
        $parentColumn = $this->column;
        $this->param = array_merge($parentColumn, $this->param);
    }

    public function getRequestParam($params)
    {
        if (empty($params['list'])) {
            throw new \ErrorException('信息不能为空');
        }
        $resultParam = [];
        foreach ($params['list'] as $item){
            $itemData = $this->formatParam($item, $this->idCardItem, true, ["certificateNo", "certificateType","name", "sid"]);
            if(empty($itemData)){
                throw new \ErrorException('入参数据格式异常');
            }
            $resultParam['list'][] = $itemData;
        }
        return $resultParam;
    }
}
