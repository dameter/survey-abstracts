<?php

namespace dameter\abstracts\models;

use dameter\abstracts\DActiveRecord;

/**
 * Class WIthSurveyModel
 * @package dameter\abstracts\models
 *
 * @property BaseSurvey $survey
 *
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class WithSurveyModel extends DActiveRecord
{
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSurvey()
    {
        return $this->hasOne(BaseSurvey::class);
    }

}