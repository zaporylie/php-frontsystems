<?php

namespace Frontsystems\Entity;

class Address extends EntityBase implements \JsonSerializable
{

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
        $CustomerID,
        $Name,
        $Address,
        $Zip,
        $City,
        $Country,
        $IsDefaultDeliveryAddress,
        $Phone,
        $Comment
    ) {
        $this->CustomerID = $CustomerID;
        $this->Address = $Address;
        $this->City = $City;
        $this->Comment = $Comment;
        $this->Country = $Country;
        $this->IsDefaultDeliveryAddress = $IsDefaultDeliveryAddress;
        $this->Name = $Name;
        $this->Phone = $Phone;
        $this->Zip = $Zip;
    }

  /**
   * @param int $addressId
   */
    public function setAddressId($addressId)
    {
        $this->ADDRESSID = $addressId;
    }
}
