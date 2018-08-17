<?php

namespace common\modules\abstracts\tests\unit\models;

require_once __DIR__ . "/../../_support/traits/ModelTestTrait.php";

use Codeception\Stub;
use dameter\abstracts\DActiveRecord;
use dameter\abstracts\models\BaseAnswer;
use Helper\ModelTestTrait;

abstract class TestBase extends \Codeception\Test\Unit
{
    use ModelTestTrait;

    /**
     * @var \UnitTester
     */
    protected $tester;

    /** @var BaseAnswer */
    protected $model;

    /** @var string */
    protected $modelClass;

    /**
     * @var array methods to inject into sub
     */
    protected $methods = [];


    protected function _before()
    {
        $this->model = $this->baseObject();
    }

    protected function _after()
    {
    }

    /**
     * Returns a good working LimeSurvey collector
     * @return DActiveRecord
     */
    public function baseObject()
    {
        /** @var DActiveRecord $model */
        $model = Stub::make($this->modelClass, array_merge($this->methods, [
            'attributes' => array_keys($this->baseModelAttributes()),
        ]));
        $model->setAttributes($this->baseModelAttributes());
        return $model;
    }

    /**
     * @return array
     */
    abstract public function baseModelAttributes();

}