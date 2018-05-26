<?php

namespace dameter\abstracts;

use yii\base\InvalidConfigException;

/**
 * Class ManyToManyModel
 * @property integer $order
 * @property DActiveRecord $parent
 * @property DActiveRecord $child
 *
 * @package dameter\abstracts
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
class ManyToManyModel extends DActiveRecord
{
    public static $parentClass;
    public static $childClass;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order'], 'required'],
            [['order'], 'integer'],
        ];
    }

    /**
     * @return string
     */
    public static function primaryKeySingle()
    {
        /** @var DActiveRecord $parent */
        $parent = static::$parentClass;
        /** @var DActiveRecord $child */
        $child = static::$childClass;
        return $parent::tableName() . '_' . $child::tableName() . "_id";
    }

    /**
     * {@inheritdoc}
     * @throws InvalidConfigException
     */
    public function init()
    {
        parent::init();
        if (is_null($this->parentModel) or is_null($this->childModel)) {
            throw new InvalidConfigException('Parent & Child class name must be defined for ' . static::class);
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent() {
        /** @var DActiveRecord $className */
        $className = static::$parentClass;
        return $this->hasOne($className);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChild() {
        /** @var DActiveRecord $className */
        $className = static::$parentClass;
        return $this->hasOne($className);
    }

    /**
     * @param DActiveRecord $child
     * @return array|DActiveRecord[]|\yii\db\ActiveRecord[]
     * @throws \yii\base\NotSupportedException
     */
    public static function getParents($child)
    {
        /** @var DActiveRecord $className */
        $className = static::$parentClass;
        return $className::find()->andWhere([$className::primaryKeySingle() => $child::primaryKeySingle()])->all();
    }

    /**
     * @param DActiveRecord $parent
     * @return array|DActiveRecord[]|\yii\db\ActiveRecord[]
     * @throws \yii\base\NotSupportedException
     */
    public static function getChildren($parent)
    {
        /** @var DActiveRecord $className */
        $className = static::$childClass;
        return $className::find()->andWhere([$className::primaryKeySingle() => $parent::primaryKeySingle()])->all();
    }

}