<?php

namespace dameter\abstracts\tests\unit\models;

require_once __DIR__ . "/TestBase.php";

use common\modules\abstracts\tests\unit\models\TestBase;
use dameter\abstracts\models\BaseAnswer;
use yii\db\ActiveQuery;

class BaseAnswerTest extends TestBase
{

    /** @var BaseAnswer */
    protected $model;

    protected $modelClass = BaseAnswer::class;

    public function testGetModelCondition() {
        $this->assertInstanceOf(ActiveQuery::class, $this->model->getModelCondition());
    }

    public function testGetQuestion() {
        $this->assertInstanceOf(ActiveQuery::class, $this->model->getQuestion());
    }

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