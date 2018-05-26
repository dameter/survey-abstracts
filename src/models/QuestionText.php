<?php

namespace dameter\abstracts\models;

/**
 * Class QuestionText
 * @property integer $question_text_id
 * @property integer $question_id
 * @property integer $type_id
 *
 * @package dameter\abstracts\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class QuestionText extends BaseLanguageSetting
{
    const TYPE_QUESTION = 1;
    const TYPE_HELP = 2;

    /** {@inheritdoc} */
    public static $parentClass = BaseQuestion::class;

    /** {@inheritdoc} */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['type_id'], 'integer'],
        ]);
    }
}