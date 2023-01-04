<?php
/**
 * @desc 推荐位新增
 * @author Tinywan(ShaoBo Wan)
 * @email 756684177@qq.com
 * @date 2022/12/27 15:40
 */

declare(strict_types=1);

namespace Wotu\dto\form;


use ErrorException;
use Wotu\dto\NormalBaseDto;

class ListRecommendDto extends NormalBaseDto
{
    /**
     * @var array|string[]
     */
    protected array $param = [
        "sid" => "",   // 编码，编辑时必传
    ];

    /**
     * CreateRecommendDto constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $parentColumn = $this->column;
        $this->param = array_merge($parentColumn, $this->param);
    }

    /**
     * @param $params
     * @return mixed
     * @throws ErrorException
     */
    public function getRequestParam($params)
    {
        return $this->formatParam($params, $this->param);
    }
}