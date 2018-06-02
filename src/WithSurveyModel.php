<?php

namespace dameter\abstracts;

use dameter\abstracts\models\BaseSurvey;

/**
 * Class WithSurveyModel
 * @property integer $survey_id
 *
 * @package dameter\abstracts
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
            [['survey_id'], 'required'],
            [['survey_id'], 'integer'],
            [['survey_id'], 'exist', 'skipOnError' => true, 'targetClass' => BaseSurvey::class, 'targetAttribute' => ['survey_id' => 'survey_id']],
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