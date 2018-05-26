<?php

namespace dameter\abstracts;

use dameter\abstracts\models\BaseSurvey;

/**
 * Class WithSurveyModel
 * @property integer $survey_id
 *
 * @package dameter\abstracts\models
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