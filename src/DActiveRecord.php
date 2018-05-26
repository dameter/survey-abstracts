<?php

namespace dameter\abstracts;


use yii\base\NotSupportedException;
use yii\db\ActiveRecord;

class DActiveRecord extends ActiveRecord
{
    /** in case we would need to customize stuff */

    /**
     * Get the primary key column as string if the one-column PK
     * NB! Always use single column Primary-keys!
     * @return string
     * @throws NotSupportedException if multi-column PrimaryKey is used
     */
    public static function primaryKeySingle()
    {
        if (count(self::primaryKey()) === 1) {
            return static::tableName() . "_id";
        }
        throw new NotSupportedException('Not supported for multi-column primary keys');
    }

    /**
     * @return string[]|void
     * @throws NotSupportedException
     */
    public static function primaryKey()
    {
        throw new NotSupportedException('use primaryKeySingle() instead');
    }


    /** {@inheritdoc} */
    public function hasMany($class, $link = null)
    {

        if (empty($link)) {
            /** @var DActiveRecord $class */
            $link = [$class::primaryKeySingle() => $class::primaryKeySingle()];
        }
        return parent::hasMany($class, $link);
    }

    /** {@inheritdoc} */
    public function hasOne($class, $link = null)
    {
        if (empty($link)) {
            /** @var DActiveRecord $class */
            $link = [$class::primaryKeySingle() => $class::primaryKeySingle()];
        }
        return parent::hasOne($class, $link);
    }
}