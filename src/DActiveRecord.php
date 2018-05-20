<?php

namespace dameter\abstracts;


use yii\db\ActiveRecord;

class DActiveRecord extends ActiveRecord
{
    /** in case we would need to customize stuff */

    /**
     * @return string
     */
    public static function primaryKey()
    {
        return static::tableName() . "_id";
    }


    /** {@inheritdoc} */
    public function hasMany($class, $link = null)
    {
        if (empty($link)) {
            /** @var DActiveRecord $class */
            $link = [$class::primaryKey() => $class::primaryKey()];
        }
        return parent::hasMany($class, $link);
    }

    /** {@inheritdoc} */
    public function hasOne($class, $link = null)
    {
        if (empty($link)) {
            /** @var DActiveRecord $class */
            $link = [$class::primaryKey() => $class::primaryKey()];
        }
        return parent::hasOne($class, $link);
    }
}