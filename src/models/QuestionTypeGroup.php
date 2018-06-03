<?php

namespace dameter\abstracts\models;


use dameter\abstracts\TypeModel;

/**
 * Class QuestionTypeGroup
 * @package dameter\abstracts\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class QuestionTypeGroup extends TypeModel
{

    const TYPE_SINGLE = 1;

    /**
     * {@inheritdoc}
     */
    public function modelsAttributes()
    {
        return [
            self::TYPE_SINGLE => [
                'id' => self::TYPE_SINGLE,
                'order' => 0,
                'label' => \Yii::t('dmadmin', "Single choice questions"),
            ],
        ];
    }
}