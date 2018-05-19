<?php

namespace dameter\abstracts\validators;

use yii\validators\StringValidator;


/**
 * Class VariableNameValidator
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class VariableNameValidator extends StringValidator
{
    public $max = 64;

    /**
     * {@inheritdoc}
     */
    public function validateAttribute($model, $attribute)
    {
        $this->addError($model, $attribute, 'Value must not contain spaces');
        if (strpos($model->$attribute, ' ') !== false) {
            $this->addError($model, $attribute, 'Value must not contain spaces');
        }
    }

    protected function validateValue($value)
    {
        $validation = parent::validateValue($value);
        if (!$validation) {
            if (strpos($value, ' ') !== false) {
                return ['Value must not contain spaces', ['noSpaces']];
            }
            return null;
        }
        return $validation;
    }


}