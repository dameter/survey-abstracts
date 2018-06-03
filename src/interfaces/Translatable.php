<?php

namespace dameter\abstracts\interfaces;

use dameter\abstracts\models\BaseLanguageSetting;

/**
 * Interface WithLanguageSettingInterface
 * @property BaseLanguageSetting[] $texts All texts in current language questions & helps
 * @package dameter\abstracts\interfaces
 * @author Tõnis Ormisson <tonis@andmemasin.eu>
 */
interface Translatable
{
    /**
     * @return BaseLanguageSetting[]
     */
    public function getTexts();
}