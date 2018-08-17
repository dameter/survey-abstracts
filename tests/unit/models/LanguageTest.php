<?php

namespace dameter\abstracts\tests\unit\models;

require_once __DIR__ . "/TestBase.php";

use common\modules\abstracts\tests\unit\models\TestBase;
use dameter\abstracts\models\Language;

class LanguageTest extends TestBase
{

    /** @var Language */
    protected $model;

    protected $modelClass = Language::class;


    public function baseModelAttributes()
    {
        return [
            'language_id' => 1,
            'code' => 'et',
            'name' => 'estonian'
        ];
    }

    public function testPrimaryKey() {
        $this->assertEquals(['language_id'], $this->model->primaryKey());
    }

    public function testTableName() {
        $this->assertEquals('language', $this->model->tableName());
    }


}