<?php

namespace dameter\abstracts\models;

use dameter\abstracts\WithLanguageSettingsModel;


/**
 * Class Quota
 * @property integer $quota_id
 * @property string $conditions
 *
 * @package dameter\abstract\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class Quota extends WithLanguageSettingsModel
{
    public static $settingsClass = QuotaText::class;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['conditions'], 'string'],
        ]);
    }

}