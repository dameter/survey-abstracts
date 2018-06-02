<?php

namespace dameter\abstracts\src\models;


use dameter\abstracts\ManyToManyModel;

/**
 * Class ModelCondition
 * @package dameter\abstracts\src\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 *
 * @property integer $order
 *
 * @property Condition $child
 */
class ModelCondition extends ManyToManyModel
{
    public static $childClass = Condition::class;


}