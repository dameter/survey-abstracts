<?php

namespace dameter\abstracts\models;


use dameter\abstracts\DActiveRecord;

/**
 * Class WithLanguageSettingsModel
 * @property BaseLanguageSetting[] $languageSettings
 *
 * @package dameter\abstracts\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class WithLanguageSettingsModel extends DActiveRecord
{

    /** @var string */
    public static $settingsClass;

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguageSettings() {
        return $this->hasMany(self::$settingsClass);
    }

}