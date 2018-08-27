<?php

namespace dameter\abstracts\tests\unit\models;

require_once __DIR__ . "/TestBase.php";

use Codeception\Stub;
use common\modules\abstracts\tests\unit\models\TestBase;
use dameter\abstracts\models\QuotaText;

class QuotaTextTest extends TestBase
{

    /** @var QuotaText */
    protected $model;

    protected $modelClass = QuotaText::class;


    public function baseModelAttributes()
    {
        return [
            'quota_text_id' => 1,
            'quota_id' => 1,
            'language_id' => 1,
            'type_id' => 1,
            'value' => 'value',
        ];
    }
}