<?php

namespace Frontsystems\Entity;

use Frontsystems\Data\DateTime;

class Shipment implements \JsonSerializable {

  /**
   * @var string
   */
  protected $ExtID;
  /**
   * @var float
   */
  protected $Price;
  /**
   * @var string
   */
  protected $Provider;
  /**
   * @var DateTime
   */
  protected $RegisteredDateTime;
  /**
   * >[base64Binary?]
   * @var
   */
  protected $ReturnLabel;
  /**
   * >[base64Binary?]
   * @var
   */
  protected $ShipmentLabel;
  /**
   * @var string
   */
  protected $TrackingURL;

  public function __construct(
    $ExtID,
    $Price,
    $Provider,
    DateTime $RegisteredDateTime,
    $ReturnLabel = NULL,
    $ShipmentLabel = NULL,
    $TrackingURL = NULL
  ) {
    $this->ExtID = $ExtID;
    $this->Price = $Price;
    $this->Provider = $Provider;
    $this->RegisteredDateTime = $RegisteredDateTime;
    $this->ReturnLabel = $ReturnLabel;
    $this->ShipmentLabel = $ShipmentLabel;
    $this->TrackingURL = $TrackingURL;
  }

  public function jsonSerialize() {
    return array_filter(get_object_vars($this));
  }
}
