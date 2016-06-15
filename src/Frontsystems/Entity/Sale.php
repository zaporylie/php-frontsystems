<?php

namespace Frontsystems\Entity;

use Frontsystems\Data\DateTime;
use Ramsey\Uuid\Uuid;

class Sale extends EntityBase implements \JsonSerializable
{

    /**
    * @var string
    */
    protected $Comment;
    /**
    * @var int
    */
    protected $CustomerID;
    /**
    * @var int
    */
    protected $DeliveryAddressID;
    /**
    * @var string
    */
    protected $ExtRef;
    /**
    * @var int
    */
    protected $InvoiceAddressID;
    /**
    * @var bool
    */
    protected $IsComplete;
    /**
    * @var bool
    */
    protected $IsVoided;
    /**
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
    * @var string
    */
    protected $SaleGuid;
    /**
    * @var SaleLine[]
    */
    protected $SalesLines;
    /**
    * @var Shipment[]
    */
    protected $Shipments;

    public function __construct(
        $CustomerID,
        $DeliveryAddressID,
        $InvoiceAddressID,
        array $SalesLines,
        array $PaymentLines,
        DateTime $SaleDateTime,
        $IsComplete,
        $IsVoided,
        $Comment
    ) {
        $this->Comment = $Comment;
        $this->CustomerID = $CustomerID;
        $this->DeliveryAddressID = $DeliveryAddressID;
        $this->InvoiceAddressID = $InvoiceAddressID;
        $this->IsComplete = $IsComplete;
        $this->IsVoided = $IsVoided;
        $this->SaleDateTime = $SaleDateTime;
        $this->SalesLines = $SalesLines;
        $this->PaymentLines = $PaymentLines;
    }

    /**
     * @param \Frontsystems\Entity\SaleLine[] $SalesLines
     */
    public function setSalesLines($SalesLines) {
        $this->SalesLines = $SalesLines;
        return $this;
    }

    /**
     * @param \Frontsystems\Entity\Shipment[] $Shipments
     */
    public function setShipments($Shipments) {
        $this->Shipments = $Shipments;
        return $this;
    }

    /**
     * @param \Frontsystems\Entity\Payment[] $PaymentLines
     */
    public function setPaymentLines($PaymentLines) {
        $this->PaymentLines = $PaymentLines;
        return $this;
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
   * @param mixed $Receipt
   */
    public function setReceipt($Receipt)
    {
        $this->Receipt = $Receipt;
        return $this;
    }

    public function setGuid($guid)
    {
        $this->SaleGuid = $guid;
        return $this;
    }

    /**
     * @return string
     */
    public function getGuid() {
        return $this->SaleGuid;
    }

    public static function generateGuid($reference = null)
    {
        if (isset($reference)) {
            $uuid = Uuid::uuid5(Uuid::NAMESPACE_OID, $reference);
        } else {
            $uuid = Uuid::uuid4();
        }
        return '{' . $uuid->toString() . '}';
    }
}
