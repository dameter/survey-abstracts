<?php

namespace dameter\abstracts\tests\unit\models;

require_once __DIR__ . "/TestBase.php";

use common\modules\abstracts\tests\unit\models\TestBase;
use dameter\abstracts\models\BaseAnswer;
use dameter\abstracts\models\BaseQuestion;
use dameter\abstracts\models\BaseSurvey;
use dameter\abstracts\models\Language;
use dameter\abstracts\models\QuestionType;
use dameter\abstracts\models\SurveyLanguage;
use yii\db\ActiveQuery;
use Codeception\Stub;

class BaseSurveyTest extends TestBase
{

    /** @var BaseSurvey */
    protected $model;

    protected $modelClass = BaseSurvey::class;

    public function baseModelAttributes()
    {
        return [
            'survey_id' => 1,
            'name' => "survey-name",
            'language_id' => 1,
        ];
    }

    public function testGetLanguage() {
        $this->assertInstanceOf(ActiveQuery::class, $this->model->getLanguage());
    }

    public function testGetQuestions() {
        $this->assertInstanceOf(ActiveQuery::class, $this->model->getQuestions());
    }

    public function testGetConditions() {
        $this->assertInstanceOf(ActiveQuery::class, $this->model->getConditions());
    }


    /**
     * Returns a good working LimeSurvey collector
     * @return BaseSurvey
     */
    public function baseObject()
    {
        /** @var BaseSurvey $model */
        $model = Stub::make($this->modelClass, [
            'attributes' => array_keys($this->baseModelAttributes()),
        ]);
        $model->setAttributes($this->baseModelAttributes());
        return $model;
    }
}