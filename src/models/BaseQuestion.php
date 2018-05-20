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
        return array_merge(parent::rules(), [
            [['code'], 'required'],
            [['code'], VariableNameValidator::class],
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function getAnswers()
    {
        return $this->hasMany(BaseSurvey::class);
    }


}