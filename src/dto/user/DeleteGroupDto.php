<?php

namespace Wotu\dto\user;
use Wotu\dto\NormalBaseDto;

class DeleteGroupDto extends NormalBaseDto{
    protected $param = array(
        'id' => 0,
    );

    public function __construct()
    {
        $parentColumn = $this->column;;
        $this->param = array_merge($parentColumn, $this->param);
    }

    public function getRequestParam($params)
    {
        if(empty($params['id'])){
            throw new \ErrorException('用户组id不能为空');
        }

        return $this->formatParam($params,$this->param );
    }
}