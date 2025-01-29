<?php

namespace Sylapi\NovaDrafts;

use Laravel\Nova\Fields\Field;

class UnpublishButton extends Field
{
    public $component = 'nova-unpublish-button';
    public $showOnIndex = false;

    public function resolve($resource, $attribute = null)
    {
        parent::resolve($resource, $attribute);

        $this->withMeta([
            'asHtml' => true,
            'class' => get_class($resource),
            'isUnpublishable' => $this->isUnpublishable($resource),
        ]);
    }

    protected function isUnpublishable($resource)
    {
        if ($resource->published) return true;
        if (isset($resource->draft_parent_id)) {
            $draftParent = $resource::find($resource->draft_parent_id);
            if (isset($draftParent) && $draftParent->published) return true;
        }
        return false;
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
