<?php

namespace Frontsystems\Entity;

use Frontsystems\Data\DateTime;

class Sale implements \JsonSerializable {

  /**
   * >[string?]
   * @var string
   */
  protected $Comment;
  /**
   * >[int?]
   * @var int
   */
  protected $CustomerID;
  /**
   * >[int?]
   * @var int
   */
  protected $DeliveryAddressID;
  /**
   * >[string?]
   * @var string
   */
  protected $ExtRef;
  /**
   * >[int?]
   * @var int
   */
  protected $InvoiceAddressID;
  /**
   * >[boolean?]
   * @var bool
   */
  protected $IsComplete;
  /**
   * >[boolean?]
   * @var bool
   */
  protected $IsVoided;
  /**
   *
   * @var SalePayment[]
   */
  protected $PaymentLines;
  /**
   * >[base64Binary?]
   * @var
   */
  protected $Receipt;
  /**
   * >[dateTime?]
   * @var DateTime
   */
  protected $SaleDateTime;
  /**
   * >[string?]
   * @var
   */
  protected $SaleGuid;
  /**
   *
   * @var
   */
  protected $SalesLines;
  /**
   *
   * @var
   */
  protected $Shipments;

  public function __construct(
    $Comment,
    $CustomerID,
    $DeliveryAddressID,
    $ExtRef,
    $InvoiceAddressID,
    $IsComplete,
    $IsVoided,
    array $PaymentLines,
    $Receipt,
    DateTime $SaleDateTime,
    $SaleGuid,
    array $SalesLines,
    array $Shipments
  )
  {
    $this->Comment = $Comment;
    $this->CustomerID = $CustomerID;
    $this->DeliveryAddressID = $DeliveryAddressID;
    $this->ExtRef = $ExtRef;
    $this->InvoiceAddressID = $InvoiceAddressID;
    $this->IsComplete = $IsComplete;
    $this->IsVoided = $IsVoided;
    $this->PaymentLines = $PaymentLines;
    $this->Receipt = $Receipt;
    $this->SaleDateTime = $SaleDateTime;
    $this->SaleGuid = $SaleGuid;
    $this->SalesLines = $SalesLines;
    $this->Shipments = $Shipments;
  }

  public function jsonSerialize() {
    return array_filter(get_object_vars($this));
  }
}
