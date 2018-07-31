<?php

namespace dameter\abstracts\tests\unit\models;

require_once __DIR__ . "/TestBase.php";

use common\modules\abstracts\tests\unit\models\TestBase;
use dameter\abstracts\models\BaseAnswer;
use dameter\abstracts\models\BaseQuestion;
use dameter\abstracts\models\Language;
use dameter\abstracts\models\QuestionType;
use yii\db\ActiveQuery;
use Codeception\Stub;

class BaseQuestionTest extends TestBase
{

    /** @var BaseQuestion */
    protected $model;

    protected $modelClass = BaseQuestion::class;

    public function baseModelAttributes()
    {
        return [
            'question_id' => 1,
            'survey_id' => 1,
            'order' => 0,
            'code' => "Q1",
            'question_type_id' => QuestionType::TYPE_SINGLE_CHOICE,
        ];
    }

    public function testGetAnswers() {
        $this->assertInstanceOf(ActiveQuery::class, $this->model->getAnswers());
    }

    /**
     * Returns a good working LimeSurvey collector
     * @return BaseQuestion
     */
    public function baseObject()
    {
        /** @var BaseQuestion $model */
        $model = Stub::make($this->modelClass, [
            'attributes' => array_keys($this->baseModelAttributes()),
        ]);
        $model->setAttributes($this->baseModelAttributes());
        return $model;
    }
}