<?php

namespace dameter\abstracts\models;

use dameter\abstracts\DActiveRecord;

/**
 * Class BaseSurvey
 *
 * @property int $survey_id
 * @property string $name Survey name. Primarily meant for back-end usage.
 *
 * @property BaseQuestion[] $questions
 *
 * @package dameter\abstracts\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
abstract class BaseSurvey extends DActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

        ];
    }

    /**
     * @return BaseQuestion[]
     */
    public abstract function getQuestions();

}