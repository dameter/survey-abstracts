<?php
/**
 * User: tonis_o
 * Date: 26.05.18
 * Time: 21:02
 */

namespace dameter\abstracts\models;

/**
 * Class QuotaText
 * @property integer $quota_text_id
 *
 * @package dameter\abstracts\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class QuotaText extends BaseLanguageSetting
{
    public static $parentClass = Quota::class;

}