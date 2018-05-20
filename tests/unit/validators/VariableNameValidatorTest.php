<?php


namespace dameter\abstracts\tests\unit\validators;

use dameter\abstracts\validators\VariableNameValidator;
use yii\base\DynamicModel;

/**
 * Class VariableNameValidatorTest
 * @package dameter\abstracts\tests\validators
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class VariableNameValidatorTest extends \Codeception\Test\Unit
{

    /**
     * @return array [value, isValid, skipPrivateMethods]
     */
    public function provideValues()
    {
        return array_merge($this->provideContainsInvalidValues(), [
            [['an array'], false],
            ["String with spaces", false],
            [true, false],
            [false, false],

            ["Q1", true],
            ["with-dashes", true],
            ["with_underscores", true],
            ["with.fullstop", true],

            // value with exactly 64 characters
            ["CCDD1598CA2E0A715818561E49F2FBF9DADACBF1F5E75951956CBE0F3AE14393", true],
            // value with exactly 64+1 characters
            ["CCDD1598CA2E0A715818561E49F2FBF9DADACBF1F5E75951956CBE0F3AE143931", false],
            // value with exactly 64-1 characters
            ["CCDD1598CA2E0A715818561E49F2FBF9DADACBF1F5E75951956CBE0F3AE1439", true],

            // non alpha first letters
            ["1", false],
            ["@", false], // allowed by SPSS, but not this
            ["#", false], // allowed by SPSS, but not this
            ['$', false], // allowed by SPSS, but not this
            ["Ä", false],
            ["-", false],
            ["_", false],
            [".", false],
            ["Щ", false], // cyrillic
            ["漢", false], // chinese

            // don't end with non alphanum character
            ["var.", false],
            ["var-", false],
            ["var_", false],

            // reserved  randomly upper &lowercases
            ["all", false],
            ["AND", false],
            ["by", false],
            ["eq", false],
            ["GE", false],
            ["gt", false],
            ["le", false],
            ["lt", false],
            ["NE", false],
            ["not", false],
            ["OR", false],
            ["to", false],
            ["WITH", false],

        ]);

    }

    public function provideContainsInvalidValues() {
        return [
            // contains invalid chars
            ["some,punctuation", false],
            ["some%punctuation", false],
            ["some*punctuation", false],
            ["some\punctuation", false],
            ["good是一个在中国的字符串", false], // chinese
            ["goodданные", false], // cyrillic

        ];
    }

    /**
     * @param mixed $value
     * @param boolean $isValid
     * @dataProvider provideValues
     * @return null
     */
    public function testValidateValue($value, $isValid)
    {
        $validator = new VariableNameValidator();

        $message = "Failed with value " . serialize($value);
        if ($isValid) {
            $this->assertTrue($validator->validate($value), $message);
            return null;
        }
        $this->assertFalse($validator->validate($value), $message);
        return null;

    }

    /**
     * @param mixed $value
     * @param boolean $isValid
     * @dataProvider provideValues
     * @return null
     */
    public function testValidateAttribute($value, $isValid)
    {
        $validator = new VariableNameValidator();

        $model = new DynamicModel(['myAttribute' => $value]);
        $model->addRule('myAttribute', VariableNameValidator::class)->validate();
        $validator->validateAttribute($model, 'myAttribute');
        $message = "Failed with value " . serialize($value);
        if ($isValid) {
            $this->assertEmpty($model->errors, $message);
            return null;
        }
        $this->assertNotEmpty($model->errors, $message);
        return null;
    }

    /**
     * @param mixed $value
     * @param boolean $isValid
     * @dataProvider provideContainsInvalidValues
     * @return null
     * @throws \ReflectionException
     */
    public function testContainsInvalidCharacters($value, $isValid){


        $validator = new VariableNameValidator();

        $method = new \ReflectionMethod(VariableNameValidator::class, 'containsInvalidCharacters');
        $method->setAccessible(true);
        $message = "Failed with value " . serialize($value);

        $result = $method->invokeArgs($validator, [$value]);
        if ($isValid) {
            $this->assertFalse($result, $message);
            return null;
        }
        $this->assertTrue($result, $message);
        return null;
    }


}
