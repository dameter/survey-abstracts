<?php

namespace dameter\abstracts\models;
use dameter\abstracts\WithLanguageSettingsModel;
use modules\abstracts\src\interfaces\Sortable;


/**
 * Class QuestionGroup
 * @property integer $question_group_id
 * @property integer $order
 *
 * @property BaseQuestion[] $questions
 *
 * @package dameter\abstracts\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
abstract class BaseQuestionGroup extends WithLanguageSettingsModel implements Sortable
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['order'], 'required'],
            [['order'], 'integer'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getQuestions()
    {
        return $this->hasMany(BaseQuestion::class);
    }


}