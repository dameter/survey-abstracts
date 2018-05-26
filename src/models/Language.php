<?php

namespace dameter\abstracts\models;

use dameter\abstracts\DActiveRecord;

/**
 * This is the model class for table "language".
 *
 * @property integer $language_id
 * @property string $code
 * @property string $name
 *
 * @package andmemasin\language\models
 * @author Tonis Ormisson <tonis@andmemasin.eu>
 */
abstract class Language extends DActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'required'],
            [['code'], 'string', 'max' => 16],
            [['name'], 'string', 'max' => 255]
        ];
    }


    /**
     * @param string $code
     * @return static
     */
    public abstract function findByCode($code);
}
