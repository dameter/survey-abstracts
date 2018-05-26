<?php

namespace dameter\abstracts\models;

use dameter\abstracts\interfaces\WithLanguageSettingInterface;
use dameter\abstracts\WithLanguageSettingsModel;
use modules\abstracts\src\interfaces\Sortable;


/**
 * Class BaseAnswer
 * @property integer $answer_id
 * @property integer $question_id
 * @property integer $survey_id
 * @property integer $order
 *
 * @property   BaseQuestion $question
 *
 * @package dameter\abstracts\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class BaseAnswer extends WithLanguageSettingsModel implements Sortable
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['question_id', 'code'], 'required'],
            [['question_id', 'order'], 'integer'],
            [['code'], 'string', 'max' => 64],
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function getQuestion()
    {
        return $this->hasOne(BaseQuestion::class);
    }

    /**
     * {@inheritdoc}
     */
    public function getTexts()
    {
        return $this->hasMany(AnswerText::class);
    }

}