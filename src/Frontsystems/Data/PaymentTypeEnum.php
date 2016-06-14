<?php

namespace Frontsystems\Data;

use CommerceGuys\Enum\AbstractEnum;

final class PaymentTypeEnum extends AbstractEnum
{
    const INVOICE = 'Invoice'; // = 6
    const PAYEX = 'PayEx'; // = 7
    const NETAXEPT = 'NetAxept'; // = 115
    const DIBS = 'Dibs'; // = 116
    const COD = 'COD'; // = 117 (Cash on Delivery)
    const KLARNAFAKTURA = 'KlarnaFaktura'; // = 124
    const KLARNAKONTO = 'KlarnaKonto'; // = 125
    const COLLECTOR = 'Collector'; // = 141
    const GIFTCARD = 'GiftCard'; // = 5
    const BONUSPOINTS = 'BonusPoints'; // = 128
}
