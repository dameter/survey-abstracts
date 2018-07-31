<?php

namespace dameter\abstracts;


use yii\base\NotSupportedException;
use yii\db\ActiveRecord;

/**
 * Class DActiveRecord
 * @package dameter\abstracts
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
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
        if (count(static::primaryKey()) === 1) {
            return static::tableName() . "_id";
        }
        throw new NotSupportedException('Not supported for multi-column primary keys');
    }



    /** {@inheritdoc} */
    public function hasMany($class, $link = null)
    {
        if (empty($link)) {
            $link = [static::primaryKeySingle() => static::primaryKeySingle()];
        }
        return parent::hasMany($class, $link);
    }

    /** {@inheritdoc} */
    public function hasOne($class, $link = null)
    {
        if (empty($link)) {
            $link = [static::primaryKeySingle() => static::primaryKeySingle()];
        }
        return parent::hasOne($class, $link);
    }
}