<?php

namespace dameter\abstracts\tests\unit\models;

require_once __DIR__ . "/TestBase.php";

use common\modules\abstracts\tests\unit\models\TestBase;
use dameter\abstracts\models\Condition;
use yii\db\ActiveQuery;

class ConditionTest extends TestBase
{

    /** @var Condition */
    protected $model;

    protected $modelClass = Condition::class;

    public function baseModelAttributes()
    {
        return [
            'condition_id' => 1,
            'name' => 'fake',
            'rules' => 'fake',
            'survey_id' => 1,
        ];
    }

}