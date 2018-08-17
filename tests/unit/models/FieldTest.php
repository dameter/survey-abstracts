<?php

namespace dameter\abstracts\tests\unit\models;

require_once __DIR__ . "/TestBase.php";

use common\modules\abstracts\tests\unit\models\TestBase;
use dameter\abstracts\models\BaseQuestion;
use dameter\abstracts\models\Condition;
use dameter\abstracts\models\Field;
use dameter\abstracts\models\QuestionType;
use yii\db\ActiveQuery;
use Codeception\Stub;

class FieldTest extends TestBase
{

    /** @var Field */
    protected $model;

    protected $modelClass = Field::class;


    public function baseModelAttributes()
    {
        return [
            'id' => 1,
            'systemFieldName' => 'id',
        ];
    }
    /**
     * Returns a good working LimeSurvey collector
     * @return DActiveRecord
     */
    public function baseObject()
    {
        /** @var BaseQuestion $question */
        $question = Stub::make(BaseQuestion::class, ['attributes' => ['code', 'question_type_id']]);
        $question->setAttributes(['code' => 'Q1', 'question_type_id' => QuestionType::TYPE_SINGLE_CHOICE]);

        /** @var Field $model */
        $model = Stub::make($this->modelClass, array_merge($this->baseModelAttributes(), [
            'attributes' => array_keys($this->baseModelAttributes()),
            'question' => $question,
            'getDriverName' => 'mysql',
        ]));
        $model->setAttributes($this->baseModelAttributes());

        return $model;
    }

    /**
     * @expectedException yii\base\InvalidConfigException
     */
    public function testInitThrowsException() {
        $model = new Field();
    }

    /**
     * @expectedException \Exception
     */
    public function testGetTypeNoConfigThrowsException() {
        $this->model->systemFieldName = 'not-existing';
        $this->model->question = null;
        $this->model->getType();
    }

    /**
     * @expectedException \Exception
     */
    public function testGetNameNoConfigThrowsException() {
        $this->model->question = null;
        $this->model->systemFieldName = null;
        $this->model->getName();
    }

    public function testGetNameIsSystemFieldNameIfNoQuestion() {
        $this->model->question = null;
        $this->assertEquals('id', $this->model->getName());
    }

    public function testGetNameIsQuestionCode() {
        $this->assertEquals('Q1', $this->model->getName());
    }

    public function testInit() {
        // no exception thrown
        $this->model->init();
    }

    public function testGetTypeTextForCommentField() {
        $this->model->isCommentField = true;
        $this->assertEquals('text', $this->model->getType());
    }

    public function testGetTypeTextForOtherField() {
        $this->model->isOtherField = true;
        $this->assertEquals('text', $this->model->getType());
    }

    public function testGetTypeFromQuestion() {
        $this->assertEquals('string(5)', $this->model->getType());
    }


    public function provideSystemFieldTypes() {
        return [
            [Field::SYSFIELD_ID, 'pk'],
            [Field::SYSFIELD_SEED, 'string(31)'],
            [Field::SYSFIELD_STARTLANGUAGE, 'string(20) NOT NULL'],
            [Field::SYSFIELD_STARTDATE, 'datetime NOT NULL'],
            [Field::SYSFIELD_DATESTAMP, 'datetime NOT NULL'],
            [Field::SYSFIELD_SUBMITDATE, 'datetime'],
            [Field::SYSFIELD_LASTPAGE, 'integer'],
            [Field::SYSFIELD_TOKEN, "string(36)  COLLATE 'utf8mb4_bin'"],
            [Field::SYSFIELD_REFURL, "text"],
            [Field::SYSFIELD_IP_ADDRESS, "string(45)"],
        ];
    }

    /**
     * @dataProvider provideSystemFieldTypes
     * @param $fieldName
     * @param $expected
     */
    public function testSyestemFieldTypes($fieldName, $expected) {
        $this->model->systemFieldName = $fieldName;
        $this->assertEquals($expected, $this->invokeMethod($this->model, 'systemFieldType'));
    }


    /**
     * @expectedException \Exception
     */
    public function testGetInvalidSystemFieldThrowsException() {
        $this->model->systemFieldName = 'no-such-thing';
        $this->invokeMethod($this->model, 'systemFieldType');
    }



    public function provideTokenFieldCollations() {
        return [
            ['mysql', " COLLATE 'utf8mb4_bin'"],
            ['sqlsrv', " COLLATE 'SQL_Latin1_General_CP1_CS_AS'"],
            ['dblib', " COLLATE 'SQL_Latin1_General_CP1_CS_AS'"],
            ['mssql', " COLLATE 'SQL_Latin1_General_CP1_CS_AS'"],
        ];
    }

    /**
     * @dataProvider provideTokenFieldCollations
     * @param $engineType
     * @param $expected
     */
    public function testGetTokenFieldCollation($engineType, $expected) {
        /** @var Field $model */
        $model = Stub::make($this->modelClass, array_merge($this->baseModelAttributes(), [
            'attributes' => array_keys($this->baseModelAttributes()),
            'getDriverName' => $engineType,
        ]));
        $model->setAttributes($this->baseModelAttributes());
        $this->model = $model;
        $this->assertEquals($expected, $this->model->tokenFieldCollation);
    }

    /**
     * @expectedException \Exception
     */
    public function testGetTokenFieldCollationInvalidThrowsException()
    {
        /** @var Field $model */
        $model = Stub::make($this->modelClass, array_merge($this->baseModelAttributes(), [
            'attributes' => array_keys($this->baseModelAttributes()),
            'getDriverName' => 'invalid-type',
        ]));
        $model->setAttributes($this->baseModelAttributes());
        $this->model = $model;
        $this->model->tokenFieldCollation;
    }

}