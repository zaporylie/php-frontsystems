<?php

namespace Frontsystems\Entity;

use Frontsystems\Data\DateTime;
use Ramsey\Uuid\Uuid;

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
    $Comment
  )
  {
    $this->Comment = $Comment;
    $this->CustomerID = $CustomerID;
    $this->DeliveryAddressID = $DeliveryAddressID;
    $this->InvoiceAddressID = $InvoiceAddressID;
    $this->IsComplete = $IsComplete;
    $this->IsVoided = $IsVoided;
    $this->PaymentLines = $PaymentLines;
    $this->SaleDateTime = $SaleDateTime;
    $this->SalesLines = $SalesLines;
    $this->Shipments = $Shipments;
  }

  /**
   * @param string $ExtRef
   */
  public function setExtRef($ExtRef) {
    $this->ExtRef = $ExtRef;
  }

  /**
   * @param mixed $Receipt
   */
  public function setReceipt($Receipt) {
    $this->Receipt = $Receipt;
  }

  public function setGuid($guid)
  {
    $this->SaleGuid = $guid;
    return $this;
  }

  static public function generateGuid($reference = null)
  {
    if (isset($reference)) {
      $uuid = Uuid::uuid5(Uuid::NAMESPACE_OID, $reference);
    }
    else {
      $uuid = Uuid::uuid4();
    }
    return '{' . $uuid->toString() . '}';
  }
}
