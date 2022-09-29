<?php

namespace Wotu;


use http\Exception\BadMessageException;
use Zipkin\Endpoint;
use Zipkin\Propagation\Map;
use Zipkin\Samplers\BinarySampler;
use Zipkin\TracingBuilder;

class ZipKin {
    private static $tracer;
    private static $rootSpan;
    private static $appName = '';
    private static $instance = null;
    private static $tracing;
    private static $span = null;
    private static $childSpan = null;
    // 禁止被实例化
    private function __construct()
    {

    }

    // 禁止clone
    private function __clone()
    {

    }

    public static function getInstance($httpReporterURL = '',$appName = 'default'){

        if (self::$tracer === null ) {
            if(empty($httpReporterURL)) throw new \Exception('链路错误');
            self::$appName = $appName ;
            $tracing = self::createTracing(self::$appName, $_SERVER["REMOTE_ADDR"],$httpReporterURL);
            self::$tracing = $tracing;

            $request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
            $carrier = array_map(function ($header) {
                return $header[0];
            }, $request->headers->all());
            $extractor = $tracing->getPropagation()->getExtractor(new Map());
            $extractedContext = $extractor($carrier);

            self::$tracer = $tracing->getTracer();
//            $rootSpan = self::$tracer->newTrace();
            self::$rootSpan = self::$tracer->nextSpan($extractedContext);
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @param $uri
     * @param $params
     * 开始一个根span
     */
    public  function startAction($uri, $method ,$params){
        self::$rootSpan->setName($uri);
        self::$rootSpan->start();
        self::$rootSpan->tag('http.method', $method);
        self::$rootSpan->tag('params',json_encode($params));
        $origin = $_SERVER['HTTP_ORIGIN'] ?? 'default';
        self::$rootSpan->tag('site',$origin);
        $host = $_SERVER['HTTP_HOST'] ?? 'default';
        self::$rootSpan->tag('host',$host);
    }

    /**
     *结束整个程序
     */
    public  function endAction($tagArr = []){
        if ($tagArr !== []) {
            foreach ($tagArr as $key => $val) {
                self::$rootSpan->tag($key, $val);
            }
        }
        self::$rootSpan->finish();
        $tracers = self::$tracer;
        register_shutdown_function(function () use ($tracers) {
            $tracers->flush();
        });
    }

    /**
     * @param $executeStr
     * @param string $type
     * 新增一个子span
     */
    public function addChild($executeStr,$type = 'mysql-select'){
        if(self::$span===null){
            self::$span = self::$rootSpan;
        }
        $childSpan = self::$tracer->newChild(self::$span->getContext());

        $childSpan->start();
        if(is_array($type)){
            foreach ($type as $key => $val) {
                $childSpan->tag($key, $val);
            }
            $childSpan->setName($executeStr);
        }else{
            $tag = 'data';
            if(in_array($type,['mysql-select','mysql-execute'])){
                $tag = 'db.statement';
            }
            $childSpan->tag($tag,$executeStr);
            $childSpan->setName($type);
        }

        self::$childSpan = $childSpan;
    }

    /**
     *
     *结束子span
     */
    public function finishChild(array $tagArr = []) {
        if (!empty($tagArr)) {
            foreach ($tagArr as $key => $val) {
                self::$childSpan->tag($key, $val);
            }
        }
        self::$childSpan->finish();
    }

    /**
     * @return mixed
     * 获取链路的唯一标识
     */
    public function getTraceId(){
        return self::$rootSpan->getContext()->getTraceId();
    }


    public static function createTracing($localServiceName, $localServiceIPv4,$httpReporterURL , $localServicePort = null){
        $endpoint = Endpoint::create($localServiceName, $localServiceIPv4, null, $localServicePort);
        $reporter = new \Zipkin\Reporters\Http(['endpoint_url' => $httpReporterURL]);
        $sampler = BinarySampler::createAsAlwaysSample();
        $tracing = TracingBuilder::create()
            ->havingLocalEndpoint($endpoint)
            ->havingSampler($sampler)
            ->havingReporter($reporter)
            ->build();
        return $tracing;
    }

    public function getTracing(){
        return self::$tracing;
    }

    public function getChildSpan(){
        if(empty(self::$childSpan)) {
            self::$childSpan = self::$rootSpan;
        }
        return self::$childSpan;
    }


}