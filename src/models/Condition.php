<?php

namespace dameter\abstracts\src\models;

use dameter\abstracts\DActiveRecord;
use dameter\abstracts\validators\VariableNameValidator;

/**
 * Class Condition
 * @package dameter\abstracts\src\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 *
 * @property integer $condition_id
 * @property string $name
 * @property string $rules
 */
class Condition extends DActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'rules'], 'required'],
            [['name'], VariableNameValidator::class],
            [['rules'], 'string']
        ];
    }


}