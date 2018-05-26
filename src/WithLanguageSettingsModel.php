<?php

namespace dameter\abstracts;

use dameter\abstracts\models\BaseLanguageSetting;
use dameter\abstracts\models\Language;

/**
 * Class WithLanguageSettingsModel
 * @property BaseLanguageSetting[] $languageSettings
 *
 * @package dameter\abstracts
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class WithLanguageSettingsModel extends WithSurveyModel
{

    /** @var string */
    public static $settingsClass;

    /** @var Language */
    public $language;

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        if (empty($this->language)) {
            $this->language = $this->survey->language;
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguageSettings() {
        return $this->hasMany(self::$settingsClass);
    }

    /**
     * @return \yii\db\ActiveQuery
     * @throws \yii\base\NotSupportedException
     */
    public function getTexts()
    {
        $query = $this->hasMany(static::$settingsClass, ['parent_id' => 'question_id']);
        return $query->andWhere(['language_id' => $this->language->primaryKey])->indexBy(Language::primaryKeySingle());
    }

}