<?php

namespace dameter\abstracts\tests\unit\models;

require_once __DIR__ . "/TestBase.php";

use Codeception\Stub;
use common\modules\abstracts\tests\unit\models\TestBase;
use dameter\abstracts\models\Quota;

class QuotaTest extends TestBase
{

    /** @var Quota */
    protected $model;

    protected $modelClass = Quota::class;


    public function baseModelAttributes()
    {
        return [
            'quota_id' => 1,
            'survey_id' => 1,
            'language_id' => 1,
            'type_id' => 1,
        ];
    }
}