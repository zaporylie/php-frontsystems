<?php

namespace Frontsystems\Entity;

class Customer extends EntityBase implements \JsonSerializable {

  /**
   * @var bool
   */
  protected $AgreedSendEmail;
  /**
   * @var bool
   */
  protected $AgreedSendSMS;
  /**
   * @var int
   */
  protected $CUSTOMERID;
  /**
   * @var float
   */
  protected $StdDiscount;
  /**
   * @var string
   */
  protected $Address;
  /**
   * @var string
   */
  protected $CardNo;
  /**
   * @var string
   */
  protected $City;
  /**
   * @var string
   */
  protected $Comment;
  /**
   * @var string
   */
  protected $Country;
  /*
   * @var string
   */
  protected $Email;
  /**
   * @var string
   */
  protected $FirstName;
  /**
   * @var string
   */
  protected $LastName;
  /**
   * @var string
   */
  protected $Phone;
  /**
   * @var string
   */
  protected $Zip;
  /**
   * @var string
   */
  protected $DlvAddress;
  /**
   * @var string
   */
  protected $DlvCity;
  /**
   * @var string
   */
  protected $DlvComment;
  /**
   * @var string
   */
  protected $DlvName;
  /**
   * @var string
   */
  protected $DlvPhone;
  /**
   * @var string
   */
  protected $DlvZip;

  /**
   * Customer constructor.
   * @param float $StdDiscount
   * @param string $Address
   * @param string $City
   * @param string $Comment
   * @param string $Country
   * @param string $Email
   * @param string $FirstName
   * @param string $LastName
   * @param string $Phone
   * @param string $Zip
   * @param string $DlvAddress
   * @param string $DlvCity
   * @param string $DlvComment
   * @param string $DlvName
   * @param string $DlvPhone
   * @param string $DlvZip
   */
  public function __construct(
    $StdDiscount,
    $Address,
    $City,
    $Comment,
    $Country,
    $Email,
    $FirstName,
    $LastName,
    $Phone,
    $Zip,
    $DlvAddress,
    $DlvCity,
    $DlvComment,
    $DlvName,
    $DlvPhone,
    $DlvZip
  ) {
    $this->Address = $Address;
    $this->City = $City;
    $this->Comment = $Comment;
    $this->Country = $Country;
    $this->DlvAddress = $DlvAddress;
    $this->DlvCity = $DlvCity;
    $this->DlvComment = $DlvComment;
    $this->DlvName = $DlvName;
    $this->DlvPhone = $DlvPhone;
    $this->DlvZip = $DlvZip;
    $this->Email = $Email;
    $this->FirstName = $FirstName;
    $this->LastName = $LastName;
    $this->Phone = $Phone;
    $this->StdDiscount = $StdDiscount;
    $this->Zip = $Zip;
  }

  public function setCustomerId($customerId)
  {
    $this->CUSTOMERID = $customerId;
  }
}
