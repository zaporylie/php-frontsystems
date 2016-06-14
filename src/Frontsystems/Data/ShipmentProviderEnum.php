<?php

namespace Frontsystems\Data;

use CommerceGuys\Enum\AbstractEnum;

final class ShipmentProviderEnum extends AbstractEnum
{
    const POSTEN = 'Posten';
    const INSTORE = 'InStore';
    const MYPACK = 'MyPack';
    const PICKUPPOINT = 'PickupPoint';
}
