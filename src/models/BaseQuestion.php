<?php

namespace dameter\abstracts\models;

use dameter\abstracts\validators\VariableNameValidator;


/**
 * Class BaseQuestion
 * @property integer $question_id
 * @property integer $survey_id
 * @property string $code Question code is like eg a variable name in SPSS. A relatively short no-spaces survey-wide unique identifier
 *
 * @property BaseAnswer[] $answers
 *
 * @package dameter\abstracts\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
abstract class BaseQuestion extends WithSurveyModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['question_id', 'survey_id', 'code'], 'required'],
            [['question_id','survey_id'], 'integer'],
            [['code'], VariableNameValidator::class],
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(BaseSurvey::class);
    }


}