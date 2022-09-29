<?php

namespace Wotu\dto\organization;
use Wotu\dto\NormalBaseDto;

class DeleteDepartmentDto extends NormalBaseDto{
    protected $param = array(
        'code' => "",
    );

    public function __construct()
    {
        $parentColumn = $this->column;;
        $this->param = array_merge($parentColumn, $this->param);
    }

    public function getRequestParam($params)
    {
        if(empty($params['code'])){
            throw new \ErrorException('组织不能为空');
        }

        return $this->formatParam($params,$this->param );
    }
}