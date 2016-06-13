<?php

namespace Frontsystems\Entity;

use Frontsystems\Data\DateTime;

class Sale extends EntityBase implements \JsonSerializable {

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
   * @var Payment[]
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
    $CustomerID,
    $DeliveryAddressID,
    $InvoiceAddressID,
    array $PaymentLines,
    DateTime $SaleDateTime,
    array $SalesLines,
    array $Shipments,
    $IsComplete,
    $IsVoided,
    $ExtRef,
    $Receipt,
    $Comment
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
    $this->SalesLines = $SalesLines;
    $this->Shipments = $Shipments;
  }

  public function setGuid($guid)
  {
    $this->SaleGuid = $guid;
  }
}
