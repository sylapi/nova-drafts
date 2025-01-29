<?php

namespace Sylapi\NovaDrafts;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Fields\SupportsDependentFields;

class SimpleText extends Field
{

    use SupportsDependentFields;

    public $component = 'simple-text'; // Nazwa komponentu Vue

    /**
     * Ustaw tekst dla komponentu.
     *
     * @param  string  $text
     * @return $this
     */
    public function text(string $text)
    {
        return $this->withMeta(['text' => $text]);
    }

    /**
     * Uniemożliwia zapisanie wartości w bazie danych.
     *
     * @param  callable  $callback
     * @return $this
     */
    public function fillUsing($callback = null)
    {
        return $this; // Nova nie spróbuje zapisać wartości tego pola.
    }
}
