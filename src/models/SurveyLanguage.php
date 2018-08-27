<?php

namespace dameter\abstracts\models;

use dameter\abstracts\ManyToManyModel;
use dameter\abstracts\interfaces\Sortable;

/**
 * Class SurveyLanguage
 * @property integer $survey_language_id
 *
 * @package modules\abstracts\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class SurveyLanguage extends ManyToManyModel implements Sortable
{
    public static  $parentClass = BaseSurvey::class;
    public static  $childClass = Language::class;

    /** {@inheritdoc} */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['survey_id', 'language_id'], 'integer'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return "survey_language";
    }

    /**
     * {@inheritdoc}
     */
    public static function primaryKey()
    {
        return ["survey_language_id"];
    }


}