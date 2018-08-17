<?php

namespace dameter\abstracts;


/**
 * Class StaticModel

 * @package dameter\abstracts
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
abstract class TypeModel extends StaticModel
{
    /** @var integer $id primary key*/
    public $id;
    /** @var string $label */
    public $label;
    /** @var integer $order */
    public $order;

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