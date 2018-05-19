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

    /** @var string $containsSpacesMsg A message if the value contains spaces */
    public $containsSpacesMsg;

    /** @var string $invalidFirstLetterMsg A message if invalid first letter */
    public $invalidFirstLetterMsg;
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        $this->containsSpacesMsg = \Yii::t('dmabstract', "{attribute} must not contain spaces!");
        $this->containsSpacesMsg = \Yii::t('dmabstract', "The first character of {attribute} must be a letter!");
    }


    /**
     * {@inheritdoc}
     */
    public function validateAttribute($model, $attribute)
    {
        parent::validateAttribute($model, $attribute);

        if (strpos($model->{$attribute}, ' ') !== false) {
            $this->addError($model, $attribute, $this->containsSpacesMsg);
        }

        if (!ctype_alpha($model->{$attribute}[0])) {
            $this->addError($model, $attribute, $this->invalidFirstLetterMsg);
        }
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
            return [$this->invalidFirstLetterMsg, []];
        }
        return null;
    }


}