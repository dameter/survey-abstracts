<?php

namespace dameter\abstracts\src\models;

use dameter\abstracts\validators\VariableNameValidator;
use dameter\abstracts\WithSurveyModel;

/**
 * Class Condition
 * @package dameter\abstracts\src\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 *
 * @property integer $condition_id
 * @property string $name
 * @property string $rules
 * @property boolean $isMet whether the condition rules result in true
 */
class Condition extends WithSurveyModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['name', 'rules'], 'required'],
            [['name'], VariableNameValidator::class],
            [['rules'], 'string'],
        ]);
    }

    /**
     * @return bool
     */
    public function getIsMet()
    {
        // TODO
        return true;
    }


}