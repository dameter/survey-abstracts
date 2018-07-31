<?php

namespace dameter\abstracts\tests\unit\models;

require_once __DIR__ . "/TestBase.php";

use common\modules\abstracts\tests\unit\models\TestBase;
use dameter\abstracts\models\BaseAnswer;

class BaseAnswerTest extends TestBase
{

    /** @var BaseAnswer */
    protected $model;

    protected $modelClass = BaseAnswer::class;

    public function baseModelAttributes()
    {
        return [
            'answer_id' => 1,
            'survey_id' => 1,
            'question_id' => 1,
            'order' => 0,
            'code' => "Q1",
        ];
    }

}