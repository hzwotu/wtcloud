<?php
namespace Wotu\dto;
class PageBaseDto extends NormalBaseDto {
    protected $column = [
        'order' => '',//排序
        'orderBy' => '',//排序字段
        'pageNo' => 1,//页码
        'pageSize' => 10,//每页数量
    ];
}