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
    /** {@inheritdoc} */
    public static $parentClass = BaseAnswer::class;
}