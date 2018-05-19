<?php

namespace dameter\abstracts\validators;

use Yii;


/**
 * Class VariableNameValidator
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class VariableNameValidator extends \yii\validators\StringValidator
{
    public $max = 64;

}