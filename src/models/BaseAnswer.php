<?php

namespace dameter\abstracts\models;

use dameter\abstracts\DActiveRecord;

/**
 * Class BaseAnswer
 * @property integer $answer_id
 * @property integer $question_id
 * @property integer $survey_id
 *
 * @method  BaseSurvey $survey
 * @method  BaseQuestion $question
 *
 * @package dameter\abstracts\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
abstract class BaseAnswer extends DActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['answer_id', 'question_id', 'survey_id', 'code'], 'required'],
            [['answer_id', 'question_id','survey_id'], 'integer'],
            [['code'], 'string', 'max' => 64],
        ];
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
    public function getQuestion()
    {
        return $this->hasOne(BaseQuestion::class);
    }

}