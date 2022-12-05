<?php

namespace Wotu;


use Zipkin\DefaultTracing;
use Zipkin\Endpoint;
use Zipkin\Propagation\Map;
use Zipkin\Samplers\BinarySampler;
use Zipkin\Tracer;
use Zipkin\TracingBuilder;

class ZipKin {

    /**
     * @var Tracer
     */
    public static $tracer;

    private static $rootSpan;

    private static $appName = '';

    /**
     * @var ZipKin|null
     */
    private static ?ZipKin $instance = null;

    /**
     * @var DefaultTracing
     */
    private static DefaultTracing $tracing;

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

    /**
     * @desc: getInstance 描述
     * @param string $httpReporterURL
     * @param string $appName
     * @return ZipKin|null
     * @throws \Exception
     * @author Tinywan(ShaoBo Wan)
     */
    public static function getInstance(string $httpReporterURL = '', string $appName = 'default'): ?ZipKin
    {
        if (self::$tracer === null ) {
            if(empty($httpReporterURL)) throw new \Exception('链路错误');
            self::$appName = $appName ;
            $localIp = $_SERVER["REMOTE_ADDR"] ?? getHostByName(getHostName());
            $tracing = self::createTracing(self::$appName, $localIp,$httpReporterURL);
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
     * @param $method
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
     * @desc: 结束整个程序
     * @param array $tagArr
     */
    public  function endAction(array $tagArr = []){
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
     * @desc: 新增一个子span
     * @param $executeStr
     * @param $type
     * @author Tinywan(ShaoBo Wan)
     */
    public function addChild($executeStr, $type = 'mysql-select'){
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
     * @desc: 结束子span
     * @param array $tagArr
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
     * @desc: 获取链路的唯一标识
     * @return mixed
     * @author Tinywan(ShaoBo Wan)
     */
    public function getTraceId(){
        return self::$rootSpan->getContext()->getTraceId();
    }

    /**
     * @desc: 创建一个新链路
     * @param $localServiceName
     * @param $localServiceIPv4
     * @param $httpReporterURL
     * @param null $localServicePort
     * @return DefaultTracing|\Zipkin\Tracing
     */
    public static function createTracing($localServiceName, $localServiceIPv4,$httpReporterURL , $localServicePort = null){
        $endpoint = Endpoint::create($localServiceName, $localServiceIPv4, null, $localServicePort);
        $reporter = new \Zipkin\Reporters\Http(['endpoint_url' => $httpReporterURL]);
        $sampler = BinarySampler::createAsAlwaysSample();
        return TracingBuilder::create()
            ->havingLocalEndpoint($endpoint)
            ->havingSampler($sampler)
            ->havingReporter($reporter)
            ->build();
    }

    /**
     * @desc: getTracing 描述
     * @return DefaultTracing
     * @author Tinywan(ShaoBo Wan)
     */
    public function getTracing(): DefaultTracing
    {
        return self::$tracing;
    }

    public function getChildSpan(){
        if(empty(self::$childSpan)) {
            self::$childSpan = self::$rootSpan;
        }
        return self::$childSpan;
    }


}