<?php

namespace dameter\abstracts\models;

use dameter\abstracts\ManyToManyModel;

/**
 * Class SurveyLanguage
 * @property integer $survey_language_id
 *
 * @package modules\abstracts\src\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class SurveyLanguage extends ManyToManyModel
{
    public static  $parentClass = BaseSurvey::class;
    public static  $childClass = Language::class;

}