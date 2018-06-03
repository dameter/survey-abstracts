<?php

namespace dameter\abstracts\models;


use dameter\abstracts\ManyToManyModel;
use yii\base\NotSupportedException;

/**
 * Class ModelCondition
 * @package dameter\abstracts\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 *
 * @property integer $condition_id
 * @property integer $survey_id
 * @property integer $question_id
 * @property integer $question_group_id
 * @property integer $answer_id
 *
 * @property BaseSurvey $survey
 * @property BaseQuestionGroup $questionGroup
 * @property BaseQuestion $question
 * @property BaseAnswer $answer
 *
 * @property Condition $child
 */
class ModelCondition extends ManyToManyModel
{
    public static $childClass = Condition::class;

    /** {@inheritdoc} */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['survey_id', 'question_group_id', 'question_id', 'answer_id'], 'integer'],
            [['survey_id'], 'exist', 'skipOnError' => true, 'targetClass' => BaseSurvey::class, 'targetAttribute' => ['survey_id' => 'survey_id']],
            [['question_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => BaseQuestionGroup::class, 'targetAttribute' => ['question_group_id' => 'question_group_id']],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => BaseQuestion::class, 'targetAttribute' => ['question_id' => 'question_id']],
            [['answer_id'], 'exist', 'skipOnError' => true, 'targetClass' => BaseAnswer::class, 'targetAttribute' => ['answer_id' => 'answer_id']],
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurvey()
    {
        return $this->hasOne(BaseSurvey::class);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestionGroup()
    {
        return $this->hasOne(BaseQuestionGroup::class);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(BaseQuestion::class);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswer()
    {
        return $this->hasOne(BaseAnswer::class);
    }

    public function getParent()
    {
        throw new NotSupportedException();
    }



}