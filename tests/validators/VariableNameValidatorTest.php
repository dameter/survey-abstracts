<?php


namespace dameter\abstracts\tests\validators;

use dameter\abstracts\validators\VariableNameValidator;
use PHPUnit\Framework\TestCase;

/**
 * Class VariableNameValidatorTest
 * @package dameter\abstracts\tests\validators
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class VariableNameValidatorTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    public function testValidateValue()
    {
        $val = new VariableNameValidator();

        $this->assertFalse($val->validate(['not a string']));
        $this->assertFalse($val->validate('String with spaces'));
        $this->assertFalse($val->validate(true));
        $this->assertFalse($val->validate(false));
    }

}
