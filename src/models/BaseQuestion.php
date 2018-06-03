<?php

namespace dameter\abstracts\models;

use dameter\abstracts\validators\VariableNameValidator;
use dameter\abstracts\WithLanguageSettingsModel;
use dameter\abstracts\interfaces\Sortable;

/**
 * Class BaseQuestion
 * @property integer $question_id
 * @property integer $survey_id
 * @property integer $order
 *
 * @property string $code Question code is like eg a variable name in SPSS. A relatively short no-spaces survey-wide unique identifier
 *
 * @property BaseAnswer[] $answers
 * @property QuestionText[] $questionTexts in current language
 * @property QuestionText[] $questionHelps in current language
 *
 * @package dameter\abstracts\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class BaseQuestion extends WithLanguageSettingsModel implements Sortable
{
    public static $settingsClass = QuestionText::class;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['code', 'order'], 'required'],
            [['code'], VariableNameValidator::class],
            [['order'], 'integer'],
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(BaseSurvey::class);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestionTexts()
    {
        $query = $this->getTexts();
        return $query->andWhere(['type_id' => QuestionText::TYPE_QUESTION]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestionHelps()
    {
        $query = $this->getTexts();
        return $query->andWhere(['type_id' => QuestionText::TYPE_HELP]);
    }


}