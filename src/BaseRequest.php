<?php
namespace Wotu;
class BaseRequest{

    public static function formatParam($param,$requestDto){
        foreach ($requestDto as $key=>$value){
            if(isset($param[$key])){
                $requestDto[$key] = $param[$key];
            }
        }
        return $requestDto;
    }
}
