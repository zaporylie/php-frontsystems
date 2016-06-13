<?php

namespace Frontsystems\Entity;

abstract class EntityBase
{
    public function jsonSerialize() {
        return array_filter(get_object_vars($this), function ($value) {
            return !is_null($value);
        });
    }
}
