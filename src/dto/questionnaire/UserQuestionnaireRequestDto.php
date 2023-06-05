<?php
/**
 * Created By
 * User : miao933
 * Date : 2023/06/05
 * Time : 19:17
 */

namespace Wotu\dto\questionnaire;

use Wotu\dto\NormalBaseDto;

class UserQuestionnaireRequestDto extends NormalBaseDto
{
    protected $param = array(
        'questionnaireCode' => '', // 问卷code
        'userCode' => '' // 用户code
    );

    public function __construct()
    {
        parent::__construct();
        $parentColumn = $this->column;
        $this->param = array_merge($parentColumn, $this->param);
    }

    public function getRequestParam($params)
    {
        return $this->formatParam($params, $this->param, true, ['questionnaireCode', 'userCode']);
    }

}