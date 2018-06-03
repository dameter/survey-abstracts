<?php

namespace dameter\abstracts\interfaces;

use dameter\abstracts\models\Condition;

/**
 * Interface Conditionable
 * @package dameter\abstracts\interfaces
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
interface Conditionable
{

    /**
     * @return Condition
     */
    public function getCondition();

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModelCondition();

}