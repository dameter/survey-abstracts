<?php

namespace dameter\abstracts\models;


/**
 * Class BaseAnswer
 * @property integer $answer_id
 * @property integer $question_id
 * @property integer $survey_id
 *
 * @property   BaseQuestion $question
 *
 * @package dameter\abstracts\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class BaseAnswer extends WithSurveyModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['question_id', 'code'], 'required'],
            [['question_id'], 'integer'],
            [['code'], 'string', 'max' => 64],
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function getQuestion()
    {
        return $this->hasOne(BaseQuestion::class);
    }

}