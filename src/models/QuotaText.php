<?php

namespace dameter\abstracts\models;

/**
 * Class QuotaText
 * @property integer $quota_text_id
 * @property integer $type_id
 *
 * @package dameter\abstracts\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class QuotaText extends BaseLanguageSetting
{
    const TYPE_END_MESSAGE = 1;
    const TYPE_END_URL = 2;

    public static $parentClass = Quota::class;

    /** {@inheritdoc} */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['type_id'], 'integer'],
        ]);
    }
}