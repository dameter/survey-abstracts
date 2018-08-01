<?php

namespace dameter\abstracts\models;

use dameter\abstracts\DActiveRecord;
use dameter\abstracts\interfaces\Translatable;
use yii\helpers\ArrayHelper;

/**
 * Class BaseSurvey
 *
 * @property int $survey_id
 * @property string $name Survey name. Primarily meant for back-end usage.
 * @property int $language_id base language id
 *
 * @property BaseQuestion[] $questions
 * @property Language[] $languages Survey base Language
 * @property Language $language
 * @property Condition[] $conditions All survey conditions
 *
 * @package dameter\abstracts\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class BaseSurvey extends DActiveRecord implements Translatable
{
    /** @var Language $runLanguage The language survey is being filled */
    public $runLanguage;

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        if (empty($this->runLanguage)) {
            $this->runLanguage = $this->language;
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return "survey";
    }

    /**
     * {@inheritdoc}
     */
    public static function primaryKey()
    {
        return ["survey_id"];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 254],
            [['language_id'], 'integer'],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::class, 'targetAttribute' => ['language_id' => 'language_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getLanguage()
    {
        return $this->hasMany(Language::class);
    }

    /**
     * @return \yii\db\ActiveQuery
     * @throws \yii\base\NotSupportedException
     */
    public function getLanguages()
    {
        $relations = $this->surveyLanguages();
        $ids = ArrayHelper::getColumn($relations, SurveyLanguage::primaryKeySingle());
        return Language::find()->andWhere(['in', Language::primaryKeySingle(), $ids]);
    }

    /**
     * {@inheritdoc}
     */
    public function getQuestions()
    {
        return $this->hasMany(BaseQuestion::class);
    }

    /**
     * {@inheritdoc}
     */
    public function getConditions()
    {
        return $this->hasMany(Condition::class);
    }


    /**
     * @return SurveyLanguage[]
     * @throws \yii\base\NotSupportedException
     */
    private function surveyLanguages()
    {
        return SurveyLanguage::getChildren($this);
    }

    /**
     * {@inheritdoc}
     */
    public function getTexts()
    {
        $query = $this->hasMany(SurveyText::class, ['parent_id' => static::primaryKeySingle()]);
        return $query->andWhere(['language_id' => $this->runLanguage->primaryKey])->indexBy(Language::primaryKeySingle());
    }
}