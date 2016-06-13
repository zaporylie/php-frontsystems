<?php

namespace Frontsystems\Data;

class DateTime extends \DateTime implements \JsonSerializable
{
  const FORMAT = 'c';

  public function jsonSerialize() {
    return $this->format(self::FORMAT);
  }
}
