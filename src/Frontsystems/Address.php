<?php

namespace Frontsystems;

class Address implements ServiceInterface {

  protected $client;

  protected $lastResult;

  protected $addressId;

  public function __construct(Client $client, $addressId = null) {
    $this->client = $client;
    $this->addressId = $addressId;
  }

  /**
   * @return mixed
   */
  public function getLastResult() {
    return $this->lastResult;
  }

  /**
   * @param \Frontsystems\Entity\Address $address
   * @return $this
   * @throws \Frontsystems\ClientException
   */
  public function save(\Frontsystems\Entity\Address $address) {
    if (isset($this->addressId)) {
      $address->setAddressId($this->addressId);
    }
    $data = [
      'address' => json_decode(json_encode($address), TRUE)
    ];
    $result = $this->client->call('InsertAddress', $data);
    $result = $result->InsertAddressResult;
    $this->setAddressId($result);
    $this->lastResult = $result;
    return $this;
  }

  /**
   * @param null $addressId
   */
  public function setAddressId($addressId) {
    $this->addressId = $addressId;
  }

  /**
   * @return null
   */
  public function getAddressId() {
    return $this->addressId;
  }
}
