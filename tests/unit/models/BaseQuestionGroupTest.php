<?php

namespace dameter\abstracts\tests\unit\models;

require_once __DIR__ . "/TestBase.php";

use common\modules\abstracts\tests\unit\models\TestBase;
use dameter\abstracts\models\BaseQuestionGroup;
use yii\db\ActiveQuery;

class BaseQuestionGroupTest extends TestBase
{

    /** @var BaseQuestionGroup */
    protected $model;

    protected $modelClass = BaseQuestionGroup::class;

    public function testGetQuestions() {
        $this->assertInstanceOf(ActiveQuery::class, $this->model->getQuestions());
    }

    public function testGetModelCondition() {
        $this->assertInstanceOf(ActiveQuery::class, $this->model->getModelCondition());
    }

    public function baseModelAttributes()
    {
        return [
            'question_group_id' => 1,
            'order' => 0,
            'survey_id' => 1,
        ];
    }

}