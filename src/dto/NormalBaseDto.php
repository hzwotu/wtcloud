<?php
namespace Wotu\dto;
class NormalBaseDto{
    protected $column = [

    ];

    public function __construct(){
    }


    public  function formatParam($params,$requestDto,$needValid = false , $validFields = []){
        if($needValid && is_array($validFields) && count($validFields)){
            foreach ($requestDto as $key=>$value){
                if(in_array($key,$validFields) && empty($params[$key])){
                    throw new \ErrorException($key .'  不能为空');
                }
                if(isset($params[$key]) && (in_array(gettype($value),['string','integer']) || gettype($params[$key]) == gettype($value) ) ){
                    $requestDto[$key] = $params[$key];
                }
            }
        }else{
            foreach ($requestDto as $key=>$value){
                if(isset($params[$key])){
                    $requestDto[$key] = $params[$key];
                }
            }
        }

        return $requestDto;
    }
}