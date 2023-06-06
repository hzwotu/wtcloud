<?php
/**
 * Created By
 * User : miao933
 * Date : 2023/06/05
 * Time : 19:17
 */

namespace Wotu\dto\questionnaire;

use Wotu\dto\PageBaseDto;

class QuestionnaireListDto extends PageBaseDto
{
    protected $param = array(
        'name' => '', // 问卷名称
        'organizationCode' => '', // 机构编码
    );

    public function __construct()
    {
        parent::__construct();
        $parentColumn = $this->column;
        $this->param = array_merge($parentColumn, $this->param);
    }

    public function getRequestParam($params)
    {
        return $this->formatParam($params, $this->param);
    }

}