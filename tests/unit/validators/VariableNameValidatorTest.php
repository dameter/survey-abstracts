<?php


namespace dameter\abstracts\tests\unit\validators;

use dameter\abstracts\validators\VariableNameValidator;

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

            // value with exactly 64 characters
            ["CCDD1598CA2E0A715818561E49F2FBF9DADACBF1F5E75951956CBE0F3AE14393", true],
            // value with exactly 64+1 characters
            ["CCDD1598CA2E0A715818561E49F2FBF9DADACBF1F5E75951956CBE0F3AE143931", false],
            // value with exactly 64-1 characters
            ["CCDD1598CA2E0A715818561E49F2FBF9DADACBF1F5E75951956CBE0F3AE1439", true],

            // non alpha first letters
            ["1", false],
            ["@", false], // allowed by SPSS, but not this
            ['$', false],
            ["Ä", false],
            ["#", false],
            ["-", false],
            ["_", false],
            ["Щ", false], // cyrillic
            ["漢", false], // chinese


        ];

    }


    /**
     * @dataProvider provideValues
     */
    public function testValidateValue($value, $isValid)
    {
        $val = new VariableNameValidator();
        if ($isValid) {
             $this->assertTrue($val->validate($value));
        } else {
            $this->assertFalse($val->validate($value));
        }
    }


}
