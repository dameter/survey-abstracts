<?php

namespace dameter\abstracts\models;

use dameter\abstracts\DActiveRecord;


/**
 * Class BaseQuestion
 * @property BaseAnswer[] $answers
 * @package dameter\abstracts\models
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
abstract class BaseQuestion extends DActiveRecord
{
    /**
     * @return BaseAnswer[]
     */
    public abstract function getAnswers();

}