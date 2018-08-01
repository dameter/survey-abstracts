<?php

namespace dameter\abstracts\models;

use dameter\abstracts\interfaces\Conditionable;
use dameter\abstracts\WithLanguageSettingsModel;
use dameter\abstracts\interfaces\Sortable;


/**
 * Class QuestionGroup
 * @property integer $question_group_id
 * @property integer $order
 *
 * @property BaseQuestion[] $questions
 * @property ModelCondition $modelCondition
 * @property Condition $condition
 *
 * @package dameter\abstracts\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class BaseQuestionGroup extends WithLanguageSettingsModel implements Sortable, Conditionable
{
    public static $settingsClass = QuestionGroupText::class;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return "question_group";
    }

    /**
     * {@inheritdoc}
     */
    public static function primaryKey()
    {
        return ["question_group_id"];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['order'], 'required'],
            [['order'], 'integer'],
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(BaseQuestion::class);
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
}