<?php

namespace Frontsystems\Entity;

class SaleLine implements \JsonSerializable {

  /**
   * string?
   * @var string
   */
  protected $Identitiy;
  /**
   * decimal?
   * @var float
   */
  protected $Price;
  /**
   * decimal?
   * @var float
   */
  protected $Qty;
  /**
   * string?
   * @var string
   */
  protected $ShipmentExtId;
  /**
   * int?
   * @var int
   */
  protected $StockID;
  /**
   * string?
   * @var string
   */
  protected $Text;

  public function __construct(
    $Identitiy,
    $Price,
    $Qty,
    $ShipmentExtId,
    $StockID,
    $Text
  )
  {
    $this->Identitiy = $Identitiy;
    $this->Price = $Price;
    $this->Qty = $Qty;
    $this->ShipmentExtId = $ShipmentExtId;
    $this->StockID = $StockID;
    $this->Text = $Text;
  }

  public function jsonSerialize() {
    return array_filter(get_object_vars($this));
  }
}
