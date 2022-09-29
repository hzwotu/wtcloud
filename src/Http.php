<?php

namespace Wotu;

class Http
{
    /**
     * curl封装
     * @param $url
     * @param $method
     * @param array $get
     * @param array $post
     * @param array $header
     * @return mixed
     */
    public static function send($url, $method, $get = [], $post = [], $header = [], $getCode = false, $cookie = '', $time = 0)
    {



        if ($get) $url .= "?" . http_build_query($get);
        //curl
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method); //请求类型
        curl_setopt($curl, CURLOPT_URL, $url);  //请求url
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);   //设置HTTP header
        curl_setopt($curl, CURLOPT_FAILONERROR, false); //显示HTTP状态码
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);   //以文件流的形式返回而不是直接输出
        curl_setopt($curl, CURLOPT_HEADER, false);  //将头文件的信息作为数据流输出
        // 超时
        if ($time) {
            curl_setopt($curl, CURLOPT_TIMEOUT, $time);
        }
        if (!empty($cookie)) {
            curl_setopt($curl, CURLOPT_COOKIE, $cookie); //设置发送的cookie
        }

        if (strpos($url, "https://") === 0) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
        if (!empty($post)) curl_setopt($curl, CURLOPT_POSTFIELDS, $post);  //POST字段
        $rs = curl_exec($curl); //执行CURL
        if ($rs === false && $time) {
            if (curl_errno($curl) == CURLE_OPERATION_TIMEDOUT) {
                return 504;
            }
        }

        if ($getCode) {
            $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            $rs = json_decode($rs, true);
            $rs['httpCode'] = $httpCode;
            $rs = json_encode($rs);
        }

        curl_close($curl);  //关闭CURL


        return $rs;
    }

    public static function sendNoJson($url, $method, $get = [], $post = [], $header = [], $getCode = false, $cookie = '', $time = 0)
    {
        if ($get) $url .= "?" . http_build_query($get);
        //curl
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method); //请求类型
        curl_setopt($curl, CURLOPT_URL, $url);  //请求url
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);   //设置HTTP header
        curl_setopt($curl, CURLOPT_FAILONERROR, false); //显示HTTP状态码
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);   //以文件流的形式返回而不是直接输出
        curl_setopt($curl, CURLOPT_HEADER, false);  //将头文件的信息作为数据流输出
        // 超时
        if ($time) {
            curl_setopt($curl, CURLOPT_TIMEOUT, $time);
        }
        if (!empty($cookie)) {
            curl_setopt($curl, CURLOPT_COOKIE, $cookie); //设置发送的cookie
        }

        if (strpos($url, "https://") === 0) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
        if (!empty($post)) curl_setopt($curl, CURLOPT_POSTFIELDS, $post);  //POST字段
        $rs = curl_exec($curl); //执行CURL

        curl_close($curl);  //关闭CURL
        return $rs;
    }

    /**
     * 设置为HTTP请求为异步请求，
     * php提前响应，
     *
     * @param $response 响应内容
     * @return void
     */
    public static function setAsyncHttp(array $response = [])
    {
        //apache 模式
        ob_end_clean(); //清除之前的缓冲内容，这是必需的，如果之前的缓存不为空的话，里面可能有http头或者其它内容，导致后面的内容不能及时的输出
        header("Connection: close"); //告诉浏览器，连接关闭了，这样浏览器就不用等待服务器的响应
        header("HTTP/1.1 200 OK"); //可以发送200状态码，以这些请求是成功的，要不然可能浏览器会重试，特别是有代理的情况下
        header("Content-Type: application/json");
        ob_start(); //开始当前代码缓冲
        echo json_encode($response);
        //下面输出http的一些头信息
        $size = ob_get_length();
        header("Content-Length: $size");
        ob_end_flush(); //输出当前缓冲
        flush(); //输出PHP缓冲

        //nginx+fpm 退出请求
        if(function_exists('fastcgi_finish_request')){
            fastcgi_finish_request();
        }

        //下面代码的任何输出都不会输出给浏览器，因为http连接已经关了，
        //所以下面的代码的执行属于后台运行的
        ignore_user_abort(true); //后台运行，这个只是运行浏览器关闭，并不是直接就中止返回200状态。
        set_time_limit(0); //取消脚本运行时间的超时上限
    }

    public static function get($url, $data = [], $header = [], $getCode = false, $cookie = '', $time = 0)
    {
        return self::send($url, 'GET', $data, [], $header, $getCode, $cookie='', $time);
    }

    public static function post($url, $data = [], $header = [])
    {
        return self::send($url, 'POST', [], http_build_query($data), $header);
    }

    public static function json($url, $data = [], $header = ['Content-Type' => 'application/json;charset=UTF-8'])
    {
        return self::send($url, 'POST', [], json_encode($data), $header);
    }
}
