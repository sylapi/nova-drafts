<?php

namespace Sylapi\NovaDrafts\Traits;

trait HasDrafts
{
    public function childDraft()
    {
        return $this->hasOne($this, 'draft_parent_id', 'id');
    }
}
