<?php

namespace dameter\abstracts;

use yii\base\Model;

abstract class StaticModel extends Model
{

    /**
     * @return array
     */
    abstract function modelAttributes();

    /**
     * @return static[]
     */
    public function models() {
        $models = [];
        foreach ($this->modelAttributes() as $key => $attributes) {
            $models[$key] = new static($attributes);
        }
        return $models;
    }

    /**
     * @param string $key
     * @return static
     */
    public function findByKey($key) {
        $models = $this->modelAttributes();
        if (isset($models[$key])) {
            return new static($models[$key]);
        }
        return null;
    }

}