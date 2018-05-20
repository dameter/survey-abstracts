<?php

namespace dameter\abstracts\validators;

use yii\validators\StringValidator;
use Yii;

/**
 * Class VariableNameValidator
 * Validates the variable name based mainly on SPSS variable name limitations
 * @link https://www.ibm.com/support/knowledgecenter/en/SSLVMB_23.0.0/spss/base/syn_variables_variable_names.html
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class VariableNameValidator extends StringValidator
{
    public $max = 64;

    /** @var string $containsSpacesMsg A message if the value contains spaces */
    public $containsSpacesMsg;

    /** @var string $invalidFirstChrMsg A message if invalid first letter */
    public $invalidFirstChrMsg;

    /** @var string $invalidCharsMsg A message if contains invalid characters */
    public $invalidCharsMsg;

    /** @var string $endsWithInvalidMsg A message if ends with an invaid character */
    public $endsWithInvalidMsg;

    const ALLOWED_NON_ALPHA_CHARACTERS = ['.', '-', '_'];

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        $this->containsSpacesMsg = Yii::t('dmabstract', "{attribute} must not contain spaces!");
        $this->invalidFirstChrMsg = Yii::t('dmabstract', "The first character of {attribute} must be a letter!");
        $this->invalidCharsMsg = Yii::t('dmabstract', "{attribute} contains invalid characters!");
        $this->endsWithInvalidMsg = Yii::t('dmabstract', "{attribute} ends with an invalid character!");
    }


    /**
     * {@inheritdoc}
     */
    public function validateAttribute($model, $attribute)
    {
        parent::validateAttribute($model, $attribute);

        $value = $model->{$attribute};

        if (!is_string($value)) {
            $this->addError($model, $attribute, $this->message);
            return null;
        }

        if (strpos($value, ' ') !== false) {
            $this->addError($model, $attribute, $this->containsSpacesMsg);
        }

        if (!ctype_alpha($value[0])) {
            $this->addError($model, $attribute, $this->invalidFirstChrMsg);
        }

        if (in_array(substr($value, -1), self::ALLOWED_NON_ALPHA_CHARACTERS)) {
            $this->addError($model, $attribute, $this->endsWithInvalidMsg);
        }

        if ($this->containsInvalidCharacters($value)) {
            $this->addError($model, $attribute, $this->invalidCharsMsg);
        }

        return null;

    }

    /**
     * {@inheritdoc}
     */
    protected function validateValue($value)
    {

        $validation = parent::validateValue($value);

        if (!is_null($validation)) {
            return $validation;
        }
        if (strpos($value, ' ') !== false) {
            return [$this->containsSpacesMsg, []];
        }
        if (!ctype_alpha($value[0])) {
            return [$this->invalidFirstChrMsg, []];
        }
        if (in_array(substr($value, -1), self::ALLOWED_NON_ALPHA_CHARACTERS)) {
            return [$this->endsWithInvalidMsg, []];
        }
        if ($this->containsInvalidCharacters($value)) {
            return [$this->invalidCharsMsg, []];
        }
        return null;
    }

    /**
     * @param string $value
     * @return bool
     */
    private function containsInvalidCharacters($value)
    {
        if (!ctype_alnum($value) && is_string($value)) {
            $array = str_split($value);
            foreach ($array as $char) {
                // allowed non-alpha must not be in teh end of value
                if (!ctype_alnum($char) && $char === end($array) && in_array($char, self::ALLOWED_NON_ALPHA_CHARACTERS)) {
                    return true;
                }
                if (!ctype_alnum($char) && !in_array($char, self::ALLOWED_NON_ALPHA_CHARACTERS)) {
                    return true;
                }
            }
            // allowed chars only
            return false;
        }
        return false;
    }



}