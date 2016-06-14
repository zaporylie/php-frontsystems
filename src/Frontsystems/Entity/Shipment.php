<?php

namespace Frontsystems\Entity;

use Frontsystems\Data\DateTime;
use Frontsystems\Data\ShipmentProviderEnum;

class Shipment extends EntityBase implements \JsonSerializable
{

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

  /**
   * Shipment constructor.
   * @param float $Price
   * @param string $Provider
   * @param \Frontsystems\Data\DateTime $RegisteredDateTime
   */
    public function __construct(
        $Price,
        $Provider,
        DateTime $RegisteredDateTime
    ) {
        $this->Price = $Price;
        ShipmentProviderEnum::assertExists($Provider);
        $this->Provider = $Provider;
        $this->RegisteredDateTime = $RegisteredDateTime;
    }

  /**
   * @param string $ExtID
   */
    public function setExtID($ExtID)
    {
        $this->ExtID = $ExtID;
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
