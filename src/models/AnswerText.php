<?php

namespace dameter\abstracts\models;

/**
 * Class AnswerText
 * @property integer $answer_text_id
 * @property integer $answer_id
 *
 * @package dameter\abstracts\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class AnswerText extends BaseLanguageSetting
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return "answer_text";
    }

    /**
     * {@inheritdoc}
     */
    public static function primaryKey()
    {
        return ["answer_text_id"];
    }

    /** {@inheritdoc} */
    public static $parentClass = BaseAnswer::class;
}