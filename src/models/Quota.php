<?php

namespace dameter\abstracts\models;

use dameter\abstracts\WithLanguageSettingsModel;


/**
 * Class Quota
 * @property integer $quota_id
 * @property string $conditions
 *
 * @property QuotaText[] $endMessages
 * @property QuotaText[] $endUrls
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEndMessages()
    {
        $query = $this->getTexts();
        return $query->andWhere(['type_id' => QuotaText::TYPE_END_MESSAGE]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEndUrls()
    {
        $query = $this->getTexts();
        return $query->andWhere(['type_id' => QuotaText::TYPE_END_URL]);
    }


}