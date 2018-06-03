<?php

namespace dameter\abstracts;


/**
 * Class StaticModel
 * @property integer $id primary key
 * @property string $label
 * @property integer $order
 *
 * @package dameter\abstracts
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
abstract class TypeModel extends StaticModel
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'label', 'order'], 'required'],
            [['label'], 'string', 'max' => 255],
            [['order'], 'integer'],
        ];
    }

}