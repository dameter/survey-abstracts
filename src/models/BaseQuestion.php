<?php

namespace dameter\abstracts\models;

use dameter\abstracts\interfaces\Conditionable;
use dameter\abstracts\validators\VariableNameValidator;
use dameter\abstracts\WithLanguageSettingsModel;
use dameter\abstracts\interfaces\Sortable;

/**
 * Class BaseQuestion
 * @property integer $question_id
 * @property integer $survey_id
 * @property integer $order
 * @property integer $question_type_id
 *
 * @property string $code Question code is like eg a variable name in SPSS. A relatively short no-spaces survey-wide unique identifier
 *
 * @property BaseAnswer[] $answers
 * @property QuestionText[] $questionTexts in current language
 * @property QuestionText[] $questionHelps in current language
 * @property ModelCondition $modelCondition
 * @property Condition $condition
 * @property QuestionType $questionType
 *
 * @package dameter\abstracts\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class BaseQuestion extends WithLanguageSettingsModel implements Sortable, Conditionable
{
    public static $settingsClass = QuestionText::class;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return "{{question}}";
    }

    /**
     * {@inheritdoc}
     */
    public static function primaryKey()
    {
        return ["question_id"];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['code', 'order', 'question_type_id'], 'required'],
            [['code'], VariableNameValidator::class],
            [['order', 'question_type_id'], 'integer'],
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

    /**
     * @return Condition
     */
    public function getCondition()
    {
        if (!empty($this->modelCondition)) {
            return $this->modelCondition->child;
        }
        return null;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModelCondition()
    {
        return $this->hasOne(ModelCondition::class);
    }

    /**
     * @return QuestionType
     */
    public function getQuestionType()
    {
        return (new QuestionType())->findByKey($this->question_type_id);
    }

}