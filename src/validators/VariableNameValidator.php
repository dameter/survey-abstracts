<?php

namespace dameter\abstracts\validators;

/**
 * Class VariableNameValidator
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class VariableNameValidator extends \yii\validators\StringValidator
{
    public $max = 64;

}