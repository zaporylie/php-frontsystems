<?php

namespace Frontsystems\Entity;

class SaleLine extends EntityBase implements \JsonSerializable
{

  /**
   * @var string
   */
    protected $Identitiy;
  /**
   * @var float
   */
    protected $Price;
  /**
   * @var float
   */
    protected $Qty;
  /**
   * @var string
   */
    protected $ShipmentExtId;
  /**
   * @var int
   */
    protected $StockID = 0;
  /**
   * @var string
   */
    protected $Text;

    public function __construct(
        $Identitiy,
        $Price,
        $Qty,
        $Text
    ) {
    
        $this->Identitiy = $Identitiy;
        $this->Price = $Price;
        $this->Qty = $Qty;
        $this->Text = $Text;
    }

    public function setStockID($StockID)
    {
        $this->StockID = $StockID;
    }

    public function setShipmentExtId($ShipmentExtId)
    {
        $this->ShipmentExtId = $ShipmentExtId;
    }
}
