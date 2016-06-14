<?php

namespace Frontsystems\Data;

use CommerceGuys\Enum\AbstractEnum;

final class PaymentStepEnum extends AbstractEnum
{
    const INIT = 'Init';
    const AUTH = 'Auth';
    const CAPTURE = 'Capture';
    const SALE = 'Sale';
    const CANCEL = 'Cancel';
    const CREDIT = 'Credit';
}
