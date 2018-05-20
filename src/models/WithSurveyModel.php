<?php

namespace dameter\abstracts\models;

use dameter\abstracts\DActiveRecord;

/**
 * Class WithSurveyModel
 * @package dameter\abstracts\models
 *
 * @property BaseSurvey $survey
 *
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class WithSurveyModel extends DActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['survey_id', 'code'], 'required'],
            [['survey_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getSurvey()
    {
        return $this->hasOne(BaseSurvey::class);
    }

}