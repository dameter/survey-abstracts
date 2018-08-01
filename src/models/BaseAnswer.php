<?php

namespace dameter\abstracts\models;

use dameter\abstracts\interfaces\Conditionable;
use dameter\abstracts\WithLanguageSettingsModel;
use dameter\abstracts\interfaces\Sortable;


/**
 * Class BaseAnswer
 * @property integer $answer_id
 * @property integer $question_id
 * @property integer $order
 *
 * @property BaseQuestion $question
 * @property ModelCondition $modelCondition
 * @property Condition $condition
 *
 * @package dameter\abstracts\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class BaseAnswer extends WithLanguageSettingsModel implements Sortable, Conditionable
{

    public static $settingsClass = AnswerText::class;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return "answer";
    }

    /**
     * {@inheritdoc}
     */
    public static function primaryKey()
    {
        return ["answer_id"];
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['question_id', 'code', 'order'], 'required'],
            [['question_id', 'order'], 'integer'],
            [['code'], 'string', 'max' => 64],
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(BaseQuestion::class);
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