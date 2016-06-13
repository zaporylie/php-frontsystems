<?php

namespace Frontsystems\Entity;

use Frontsystems\Data\DateTime;

class Shipment extends EntityBase implements \JsonSerializable {

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
    DateTime $RegisteredDateTime
  ) {
    $this->ExtID = $ExtID;
    $this->Price = $Price;
    $this->Provider = $Provider;
    $this->RegisteredDateTime = $RegisteredDateTime;
  }

  public function setReturnLabel($ReturnLabel)
  {
    $this->ReturnLabel = $ReturnLabel;
  }

  public function setShipmentLabel($ShipmentLabel)
  {
    $this->ShipmentLabel = $ShipmentLabel;
  }

  public function setTrackingURL($TrackingURL)
  {
    $this->TrackingURL = $TrackingURL;
  }
}
