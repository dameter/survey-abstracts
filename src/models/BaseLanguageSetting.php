<?php
namespace dameter\abstracts\models;

use dameter\abstracts\DActiveRecord;

/**
 * Class BaseLanguageSetting
 * @property integer $language_id PK
 * @property string $value the translation text
 *
 * @property Language $language
 * @property DActiveRecord[] $parents
 *
 * @package dameter\abstracts\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class BaseLanguageSetting extends DActiveRecord
{
    /** @var string */
    public static $parentClass;

    /** {@inheritdoc} */
    public function rules()
    {
        return [
            [['value'], 'required'],
            [['value'], 'string'],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Language::class);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParents() {
        return $this->hasMany($this->parentClass);
    }

}