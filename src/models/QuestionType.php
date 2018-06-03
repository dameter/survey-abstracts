<?php

namespace dameter\abstracts\models;


use dameter\abstracts\TypeModel;

/**
 * Class QuestionType
 *
 * @property string $fieldType The type of field question needs for storing data
 * @property boolean $isText Whether the type is text (string longer than char)
 * @property boolean $isChar Whether the type is char (one-character-string)
 * @property boolean $isString Whether the type is string (text or char)
 * @property boolean $isNumeric Whether the type numeric (integer, double)
 * @property boolean $isInteger Whether the type integer
 * @property boolean $isDouble Whether the type double
 * @property boolean $hasSubSets Whether type has any sub-question sets
 * @property boolean $hasComment Whether type has additional comment field
 *
 * @package dameter\abstracts\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class QuestionType extends TypeModel
{


    const TYPE_NO_DATA = 0;
    const TYPE_SINGLE_CHOICE = 1;
    const TYPE_MULTIPLE_CHOICE = 2;
    const TYPE_STRING = 3;
    const TYPE_DATETIME = 5;

    /**
     * {@inheritdoc}
     */
    public function modelsAttributes()
    {
        return [
            self::TYPE_NO_DATA => [
                'id' => self::TYPE_NO_DATA,
                'order' => 0,
                'label' => \Yii::t('dmadmin', "Text display"),
            ],
            self::TYPE_SINGLE_CHOICE => [
                'id' => self::TYPE_SINGLE_CHOICE,
                'order' => 1,
                'label' => \Yii::t('dmadmin', "Single choice question"),
            ],
            self::TYPE_MULTIPLE_CHOICE => [
                'id' => self::TYPE_MULTIPLE_CHOICE,
                'order' => 2,
                'label' => \Yii::t('dmadmin', "Multiple choice question"),
            ],
            self::TYPE_STRING => [
                'id' => self::TYPE_STRING,
                'order' => 3,
                'label' => \Yii::t('dmadmin', "String question"),
            ],
        ];
    }


    /**
     * @return string
     */
    public function getFieldType()
    {
        if ($this->isDouble) {
            return "decimal(" . Field::DEFAULT_DOUBLE_LENGTH . "," . Field::DEFAULT_DOUBLE_DECIMALS . ")";
        }

        if ($this->isText) {
            return "text";
        }
        if ($this->isChar) {
            return "string(1)";
        }

        if ($this->id === self::TYPE_DATETIME) {
            return "datetime";
        }

        if ($this->id === self::TYPE_NO_DATA) {
            return null;
        }


        return "string(" . Field::DEFAULT_STRING_LENGTH . ")";
    }


    /**
     * @return bool
     */
    public function getIsText()
    {
        return in_array($this->id, self::textCodes());
    }

    /**
     * Get all type codes of that represent data in text (string longer than char)
     * @return array
     */
    public static function textCodes()
    {
        // TODO
        return [
        ];
    }
    /**
     * Get all type codes of that represent data in char (one-character-string)
     * @return string[]
     */
    public static function charCodes()
    {
        // TODO
        return [
        ];
    }

    /**
     * Get all type codes of that represent data in string (text and char)
     * @return string[]
     */
    public static function stringCodes()
    {
        return array_merge(self::textCodes(), self::charCodes());
    }


    /**
     * Get all type codes of that represent data as integer
     * @return string[]
     */
    public static function integerCodes()
    {
        // TODO
        return [
        ];

    }

    /**
     * Get all type codes of that represent data as double
     * @return string[]
     */
    public static function doubleCodes()
    {
        // TODO
        return [
        ];
    }

    /**
     * Get all type codes of that represent data as double
     * @return string[]
     */
    public static function numericCodes()
    {
        return array_merge(self::integerCodes(), self::doubleCodes());
    }

    /**
     * get Codes of question Types that have additional comment field
     * @return array
     */
    public static function withCommentCodes()
    {
        // TODO
        return [
        ];
    }

    /**
     * @return bool
     */
    public function getHasComment()
    {
        return in_array($this->id, self::withCommentCodes());
    }

    /**
     * @return bool
     */
    public function getIsChar()
    {
        return in_array($this->id, self::charCodes());
    }

    /**
     * @return bool
     */
    public function getIsString()
    {
        return in_array($this->id, self::charCodes());
    }

    /**
     * @return bool
     */
    public function getIsInteger()
    {
        return in_array($this->id, self::integerCodes());
    }

    /**
     * @return bool
     */
    public function getIsDouble()
    {
        return in_array($this->id, self::doubleCodes());
    }

    /**
     * @return bool
     */
    public function getIsNumeric()
    {
        return in_array($this->id, self::numericCodes());
    }


}