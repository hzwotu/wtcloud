<?php
namespace Wotu\id\id;
use Wotu\BaseService;
use Wotu\id\IdBase;

class Id extends IdBase {
    public function nextId(){
        $url = $this->domainUrl . '/id/next_id';
        return BaseService::sendDirectRequest('GET', $url ,[]);
    }
}