<?php

namespace dameter\abstracts\tests\unit\models;

require_once __DIR__ . "/TestBase.php";

use Codeception\Stub;
use common\modules\abstracts\tests\unit\models\TestBase;
use dameter\abstracts\models\Quota;
use dameter\abstracts\models\SurveyLanguage;

class SurveyLanguageTest extends TestBase
{

    /** @var SurveyLanguage */
    protected $model;

    protected $modelClass = SurveyLanguage::class;


    public function baseModelAttributes()
    {
        return [
            'survey_language_id' => 1,
            'survey_id' => 1,
            'language_id' => 1,
            'order' => 1,
        ];
    }

    public function testPrimaryKey() {
        $this->assertEquals(["survey_language_id"], $this->model::primaryKey());
    }

    public function testTableName() {
        $this->assertEquals("survey_language", $this->model::tableName());
    }
}