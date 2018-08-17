<?php

namespace dameter\abstracts\tests\unit\models;

require_once __DIR__ . "/TestBase.php";

use common\modules\abstracts\tests\unit\models\TestBase;
use dameter\abstracts\models\ModelCondition;
use yii\db\ActiveQuery;

class ModelConditionTest extends TestBase
{

    /** @var ModelCondition */
    protected $model;

    protected $modelClass = ModelCondition::class;


    public function baseModelAttributes()
    {
        return [
            'model_condition_id' => 1,
            'condition_id' => 1,
            'question_id' => 1,
            'question_group_id' => 1,
            'answer_id' => 1,
            'order' => 0,
        ];
    }

    public function testPrimaryKey() {
        $this->assertEquals(['model_condition_id'], $this->model->primaryKey());
    }

    public function testTableName() {
        $this->assertEquals('model_condition', $this->model->tableName());
    }

    public function testGetQuestion() {
        $this->assertInstanceOf(ActiveQuery::class, $this->model->getQuestion());
    }

    public function testGetQuestionGroup() {
        $this->assertInstanceOf(ActiveQuery::class, $this->model->getQuestionGroup());
    }

    public function testGetQuestionAnswer() {
        $this->assertInstanceOf(ActiveQuery::class, $this->model->getAnswer());
    }
    /**
     * @expectedException \Exception
     */
    public function testGetParentThrowsException()
    {
        $this->model->getParent();
    }

}