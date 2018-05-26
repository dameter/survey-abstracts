<?php

namespace dameter\abstracts\models;

/**
 * Class QuestionGroupText
 * @property integer $question_group_text_id
 * @property integer $question_group_id
 *
 * @package dameter\abstracts\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class QuestionGroupText extends BaseLanguageSetting
{
    /** {@inheritdoc} */
    public static $parentClass = BaseQuestionGroup::class;
}