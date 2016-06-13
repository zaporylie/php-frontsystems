<?php

namespace Frontsystems\Data;

use CommerceGuys\Enum\AbstractEnum;

final class PaymentStepEnum extends AbstractEnum
{
    const AUTH = 'Auth';
    const CAPTURE = 'Capture';
    const UNDEFINED = 'Undefined';
}
