<?php

namespace Wotu;

use GuzzleHttp\Client;
use http\Header;
use Zipkin\Propagation\Map;

class BaseService
{
    private static $openZipkin = true;

    /**
     * @param $method
     * @param $url
     * @param array $data
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * 发送服务请求
     */
    public static function sendRequest($method, $url, $data = [], $needToken = false,$headers = [])
    {
        if (ZipKin::$tracer) {
            $zipKin = ZipKin::getInstance();
            //在一个请求的初试位置 开启一个链路追踪
            $tracing = $zipKin->getTracing();
            $injector = $tracing->getPropagation()->getInjector(new Map());
            $zipKin->addChild(json_encode($data), '服务调用');
            $childSpan = $zipKin->getChildSpan();
            $injector($childSpan->getContext(), $headers);
        }

        $headers['Content-Type'] = 'application/json';
        $headers['accept'] = 'application/json, text/plain, */*';

        $result = self::send($method,$url,$data,$needToken,$headers);
        if (isset($childSpan)) {
            $childSpan->finish();
        }
        return $result;
    }


    public static function getHeader()
    {
        $headers = array();
        foreach ($_SERVER as $key => $value) {
            if ('HTTP_' == substr($key, 0, 5)) {
                $headers[str_replace('_', '-', substr($key, 5))] = $value;
            }
            if (isset($_SERVER['HTTP_AUTHORIZATION_PLATFORM'])) {
                $headers['AUTHORIZATION'] = $_SERVER['HTTP_AUTHORIZATION_PLATFORM'];
            } elseif (isset($_SERVER['PHP_AUTH_DIGEST'])) {
                $headers['AUTHORIZATION'] = $_SERVER['PHP_AUTH_DIGEST'];
            } elseif (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
                $headers['AUTHORIZATION'] = base64_encode($_SERVER['PHP_AUTH_USER'] . ':' . $_SERVER['PHP_AUTH_PW']);
            }
            if (isset($_SERVER['CONTENT_LENGTH'])) {
                $headers['CONTENT-LENGTH'] = $_SERVER['CONTENT_LENGTH'];
            }
            if (isset($_SERVER['CONTENT_TYPE'])) {
                $headers['CONTENT-TYPE'] = $_SERVER['CONTENT_TYPE'];
            }
        }
        return $headers;
    }

    public static function sendDirectRequest($method, $url, $data = [], $needToken = false, $header = [])
    {
        return Http::get($url, $data, $header);
    }


    public static function sendNormalRequest($method, $url, $data = [], $needToken = false, $header = [])
    {
        if(self::$openZipkin){
            return self::sendRequest($method, $url, $data, $needToken ,$header );
        }else{
            return self::send($method, $url, $data, $needToken , $header);
        }

    }

    private static function send($method, $url, $data = [], $needToken = false, $header = []){
        $resultHeader = [];
        if(!empty($header)){
            foreach ($header as $key=>$value){
                if(!in_array($key,['AUTHORIZATION','X-SITE-ALIAS'])){
                    $resultHeader[] = $key .':' . $value;
                }

            }
        }
        $headers = self::getHeader();
        $headers = array_merge($headers,$header);
        if (!empty($headers['AUTHORIZATION']) && $needToken) {
            $resultHeader[] = 'Authorization:' . $headers['AUTHORIZATION'];
            if(isset($headers['X-SITE-ALIAS'])) $resultHeader[] = 'X-Site-Alias:' . $headers['X-SITE-ALIAS'];
        } else {
            $resultHeader[] = 'Authorization:php-sdk';
            $resultHeader[] = 'userCode:php-sdk';
        }
        $resultHeader[] = "Content-Type:application/json";
        if ('get' == strtolower($method)) {
            $result = Http::get($url, $data, $resultHeader,1);
        } else {
            $result = Http::send($url, $method, [], json_encode($data), $resultHeader,1);
        }
        $resultData = json_decode($result, true);
        if (!empty($resultData['httpCode']) && $resultData['httpCode'] == 401) {
            http_response_code(401);exit;
        }
        if (empty($resultData['messageCode'])) {
            $errorMessage = $resultData['message'] ?? '请求失败';
            throw new \ErrorException($errorMessage);
        } elseif ($resultData['messageCode'] == 9997) {
            return [];
        } elseif ($resultData['messageCode'] != 200) {
            $errorMessage = $resultData['message'] ?? '请求失败';
            throw new \ErrorException($errorMessage);
        }

        return $resultData['data'] ?? 'success';
    }


}
