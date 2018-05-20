<?php

namespace dameter\abstracts\models;


/**
 * Class QuestionGroup
 * @property integer $question_group_id
 * @property integer $survey_id
 *
 * @property BaseQuestion[] $questions
 *
 * @package dameter\abstracts\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
abstract class BaseQuestionGroup extends WithSurveyModel
{
    /**
     * {@inheritdoc}
     */
    public function getQuestions()
    {
        return $this->hasMany(BaseQuestion::class);
    }

}