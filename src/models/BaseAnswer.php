<?php

namespace dameter\abstracts\models;

use dameter\abstracts\WithLanguageSettingsModel;
use dameter\abstracts\interfaces\Sortable;


/**
 * Class BaseAnswer
 * @property integer $answer_id
 * @property integer $question_id
 * @property integer $order
 *
 * @property   BaseQuestion $question
 *
 * @package dameter\abstracts\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class BaseAnswer extends WithLanguageSettingsModel implements Sortable
{

    public static $settingsClass = AnswerText::class;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['question_id', 'code', 'order'], 'required'],
            [['question_id', 'order'], 'integer'],
            [['code'], 'string', 'max' => 64],
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(BaseQuestion::class);
    }


}