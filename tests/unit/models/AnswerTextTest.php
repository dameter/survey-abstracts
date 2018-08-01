<?php

namespace dameter\abstracts\tests\unit\models;

require_once __DIR__ . "/TestBase.php";

use common\modules\abstracts\tests\unit\models\TestBase;
use dameter\abstracts\models\AnswerText;

class AnswerTextTest extends TestBase
{

    /** @var AnswerText */
    protected $model;

    protected $modelClass = AnswerText::class;

    public function baseModelAttributes()
    {
        return [
            'answer_text_id' => 1,
            'answer_id' => 1,
            'value' => 'value',
        ];
    }

}