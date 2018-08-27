<?php

namespace dameter\abstracts\tests\unit\models;

require_once __DIR__ . "/TestBase.php";

use common\modules\abstracts\tests\unit\models\TestBase;
use dameter\abstracts\models\QuestionTypeGroup;

class QuestionTypeGroupTest extends TestBase
{

    /** @var QuestionTypeGroup */
    protected $model;

    protected $modelClass = QuestionTypeGroup::class;


    public function baseModelAttributes()
    {
        return [
            'id' => 1,
            'order' => 0,
            'label' => 'label',
        ];
    }

    public function testFindByKey() {
        $model = $this->model->findByKey(1);
        $this->assertInstanceOf($this->modelClass, $model);
    }


}