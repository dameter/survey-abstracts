<?php

namespace dameter\abstracts\models;

use dameter\abstracts\DActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * Class BaseSurvey
 *
 * @property int $survey_id
 * @property string $name Survey name. Primarily meant for back-end usage.
 *
 * @property BaseQuestion[] $questions
 * @property Language[] $languages
 * @property Language $language
 *
 * @package dameter\abstracts\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
abstract class BaseSurvey extends DActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
             [['name'], 'string', 'max' => 254],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getQuestions()
    {
        return $this->hasMany(BaseQuestion::class);
    }

    /**
     * @return \yii\db\ActiveQuery
     * @throws \yii\base\NotSupportedException
     */
    public function getLanguages()
    {
        $relations = $this->surveyLanguages();
        $ids = ArrayHelper::getColumn($relations, SurveyLanguage::primaryKeySingle());
        return Language::find()->andWhere(['in', Language::primaryKeySingle(), $ids]);
    }

    /**
     * @return SurveyLanguage[]
     * @throws \yii\base\NotSupportedException
     */
    private function surveyLanguages()
    {
        return SurveyLanguage::getChildren($this);
    }

}