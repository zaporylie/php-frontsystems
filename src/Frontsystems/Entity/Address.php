<?php

namespace Frontsystems\Entity;

class Address implements \JsonSerializable {

  /**
   * int?
   * @var int
   */
  protected $ADDRESSID;
  /**
   * string?
   * @var string
   */
  protected $Address;
  /**
   * string?
   * @var string
   */
  protected $City;
  /**
   * string?
   * @var string
   */
  protected $Comment;
  /**
   * string?
   * @var string
   */
  protected $Country;
  /**
   * int?
   * @var int
   */
  protected $CustomerID;
  /**
   * boolean?
   * @var bool
   */
  protected $IsDefaultDeliveryAddress;
  /**
   * string?
   * @var string
   */
  protected $Name;
  /**
   * string?
   * @var string
   */
  protected $Phone;
  /**
   * string?
   * @var string
   */
  protected $Zip;

  public function __construct(
    $Address,
    $City,
    $Comment,
    $Country,
    $CustomerID,
    $IsDefaultDeliveryAddress,
    $Name,
    $Phone,
    $Zip
  ) {
    $this->Address = $Address;
    $this->City = $City;
    $this->Comment = $Comment;
    $this->Country = $Country;
    $this->CustomerID = $CustomerID;
    $this->IsDefaultDeliveryAddress = $IsDefaultDeliveryAddress;
    $this->Name = $Name;
    $this->Phone = $Phone;
    $this->Zip = $Zip;
  }

  /**
   * @param int $addressId
   */
  public function setAddressId($addressId) {
    $this->ADDRESSID = $addressId;
  }

  public function jsonSerialize() {
    return array_filter(get_object_vars($this));
  }
}
