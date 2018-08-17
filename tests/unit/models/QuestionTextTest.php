<?php

namespace dameter\abstracts\tests\unit\models;

require_once __DIR__ . "/TestBase.php";

use common\modules\abstracts\tests\unit\models\TestBase;
use dameter\abstracts\models\ModelCondition;
use dameter\abstracts\models\QuestionText;
use yii\db\ActiveQuery;

class QuestionTextTest extends TestBase
{

    /** @var QuestionText */
    protected $model;

    protected $modelClass = QuestionText::class;


    public function baseModelAttributes()
    {
        return [
            'question_text_id' => 1,
            'condition_id' => 1,
            'question_id' => 1,
            'type_id' => 1,
            'language_id' => 1,
            'value' => 'thsis is a question',
        ];
    }


}