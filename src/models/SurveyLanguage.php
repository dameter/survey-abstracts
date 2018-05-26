<?php

namespace dameter\abstracts\models;

use dameter\abstracts\ManyToManyModel;
use modules\abstracts\src\interfaces\Sortable;

/**
 * Class SurveyLanguage
 * @property integer $survey_language_id
 * @property integer $order
 *
 * @package modules\abstracts\src\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class SurveyLanguage extends ManyToManyModel implements Sortable
{
    public static  $parentClass = BaseSurvey::class;
    public static  $childClass = Language::class;

}