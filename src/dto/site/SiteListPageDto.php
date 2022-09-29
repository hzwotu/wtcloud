<?php
namespace Wotu\dto\site;
use Wotu\dto\PageBaseDto;

class SiteListPageDto extends PageBaseDto {
    protected $param = [
        'name' =>  ''//站点名
    ];

    public function __construct(){
        $parentColumn = $this->column;
        $this->param = array_merge($parentColumn,$this->param);
    }


    public function getRequestParam($params){
        return $this->formatParam($params,$this->param);
    }

}