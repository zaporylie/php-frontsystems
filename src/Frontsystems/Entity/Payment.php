<?php

namespace Frontsystems\Entity;

use Frontsystems\Data\PaymentStepEnum;
use Frontsystems\Data\PaymentTypeEnum;

class Payment extends EntityBase implements \JsonSerializable {

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
    $ExtRef,
    $LastCompletedStep,
    $PaymentType,
    $ResponseBody
  ) {
    $this->Amount = $Amount;
    $this->ExtRef = $ExtRef;
    $this->ResponseBody = $ResponseBody;

    PaymentStepEnum::exists($LastCompletedStep);
    $this->LastCompletedStep = $LastCompletedStep;
    PaymentTypeEnum::exists($PaymentType);
    $this->PaymentType = $PaymentType;
  }
}
