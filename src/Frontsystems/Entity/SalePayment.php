<?php

namespace Frontsystems\Entity;

class SalePayment implements \JsonSerializable {

  /**
   * decimal?
   * @var float
   */
  protected $Amount;
  /**
   * string?
   * @var string
   */
  protected $CardType;
  /**
   * string?
   * @var string
   */
  protected $Currency;
  /**
   * string?
   * @var string
   */
  protected $ExtRef;
  /**
   * string?
   * @var string
   */
  protected $LastCompletedStep;
  /**
   * string?
   * @var string
   */
  protected $PaymentType;
  /**
   * string?
   * @var string
   */
  protected $ResponseBody;

  public function __construct(
    $Amount,
    $CardType,
    $Currency,
    $ExtRef,
    $LastCompletedStep,
    $PaymentType,
    $ResponseBody
  ) {
    $this->Amount = $Amount;
    $this->CardType = $CardType;
    $this->Currency = $Currency;
    $this->ExtRef = $ExtRef;
    $this->LastCompletedStep = $LastCompletedStep;
    $this->PaymentType = $PaymentType;
    $this->ResponseBody = $ResponseBody;
  }

  public function jsonSerialize() {
    return array_filter(get_object_vars($this));
  }
}
