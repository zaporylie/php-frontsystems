<?php

namespace Frontsystems\Entity;

use Frontsystems\Data\PaymentStepEnum;
use Frontsystems\Data\PaymentTypeEnum;

class Payment extends EntityBase implements \JsonSerializable
{

  /**
   * @var float
   */
    protected $Amount;
  /**
   * @var string
   */
    protected $CardType;
  /**
   * @var string
   */
    protected $Currency;
  /**
   * @var string
   */
    protected $ExtRef;
  /**
   * @var string
   */
    protected $LastCompletedStep;
  /**
   * @var string
   */
    protected $PaymentType;
  /**
   * @var string
   */
    protected $ResponseBody;

    public function __construct(
        $Amount,
        $LastCompletedStep,
        $PaymentType
    ) {
        $this->Amount = $Amount;

        PaymentStepEnum::assertExists($LastCompletedStep);
        $this->LastCompletedStep = $LastCompletedStep;
        PaymentTypeEnum::assertExists($PaymentType);
        $this->PaymentType = $PaymentType;
    }

  /**
   * @param string $ExtRef
   */
    public function setExtRef($ExtRef)
    {
        $this->ExtRef = $ExtRef;
        return $this;
    }

  /**
   * @param string $ResponseBody
   */
    public function setResponseBody($ResponseBody)
    {
        $this->ResponseBody = $ResponseBody;
    }
}
