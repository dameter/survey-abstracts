<?php

namespace dameter\abstracts\tests\unit\models;

require_once __DIR__ . "/TestBase.php";

use common\modules\abstracts\tests\unit\models\TestBase;
use dameter\abstracts\models\QuestionType;

class QuestionTypeTest extends TestBase
{

    /** @var QuestionType */
    protected $model;

    protected $modelClass = QuestionType::class;


    public function baseModelAttributes()
    {
        return [
            'id' => 1,
            'label' => 'duh',
            'order' => 0,
        ];
    }

    public function provideFieldTypes()
    {
        return [
            ['getIsDouble', "decimal(30,10)", null],
            ['getIsText', "text", null],
            ['getIsChar', "string(1)", null],
            [null, "datetime", QuestionType::TYPE_DATETIME],
            [null, null, QuestionType::TYPE_NO_DATA],
        ];
    }

    /**
     * @dataProvider provideFieldTypes
     * @param string $trueMethodName
     * @param string $expected
     */
    public function testGetFieldTypes($trueMethodName, $expected, $typeId)
    {
        if (!empty($trueMethodName)) {
            $this->methods = [$trueMethodName => true];
        }

        /** @var QuestionType $model */
        $model = $this->baseObject();
        if (!is_null($typeId)) {
            $model->id = $typeId;
        }
        $this->assertEquals($expected, $model->getFieldType());
    }


    public function provideNumericTypes()
    {
        return [
            // FIXME WIP
            [false, QuestionType::TYPE_NO_DATA],
            [false, QuestionType::TYPE_DATETIME],
        ];
    }

    /**
     * @dataProvider provideNumericTypes
     * @param string $expected
     * @param string $code
     */
    public function testGetIsNumeric($expected, $code) {
        $this->model->id = $code;
        $this->assertEquals($expected, $this->model->isNumeric);

    }

}