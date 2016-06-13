<?php

namespace Frontsystems\Data;

use CommerceGuys\Enum\AbstractEnum;

final class PaymentTypeEnum extends AbstractEnum
{
    const INVOICE = 'Invoice';
    const PAYEX = 'PayEx';
    const NETS = 'NetAxept';
    const COLLECTOR = 'Collector';
    const DIBS = 'Dibs';
    const KLARNAFAKTURA = 'KlarnaFaktura';
    const KLARNAKONTO = 'KlarnaKonto';
    const UNKNOWN = 'Unknown';
}
