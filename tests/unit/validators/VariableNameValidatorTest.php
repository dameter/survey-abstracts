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

    public function provideValues()
    {
        return [
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
            ["Щ", false], // cyrillic
            ["漢", false], // chinese

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
     * @dataProvider provideValues
     */
    public function testValidateValue($value, $isValid)
    {
        $val = new VariableNameValidator();

        $message = "Failed with value " . is_string($value) ? $value : serialize($value);
        if ($isValid) {
            $this->assertTrue($val->validate($value, $message));
        } else {
            $this->assertFalse($val->validate($value, $message));
        }
    }

    /**
     * @dataProvider provideValues
     */
    public function testValidateAttribute($value, $isValid)
    {
        $val = new VariableNameValidator();

        $model = new DynamicModel(['myAttribute' => $value]);
        $model->addRule('myAttribute', VariableNameValidator::class)->validate();
        $val->validateAttribute($model, 'myAttribute');
        $message = "Failed with value " . serialize($value);
        if ($isValid) {
            $this->assertEmpty($model->errors, $message);
        } else {
            $this->assertNotEmpty($model->errors, $message);
        }
    }


}
