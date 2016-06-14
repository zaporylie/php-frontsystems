<?php

namespace Frontsystems;

class Address implements ResultInterface {

  protected $client;

  protected $result;

  protected $addressId;

  public function __construct(Client $client, $addressID = null) {
    $this->client = $client;
    $this->addressId = $addressID;
  }

  /**
   * @return mixed
   */
  public function getResult() {
    return $this->result;
  }

  /**
   * @param \Frontsystems\Entity\Address $address
   * @return $this
   * @throws \Frontsystems\ClientException
   */
  public function save(\Frontsystems\Entity\Address $address) {
    $address->setAddressId($this->addressId);
    $data = [
      'address' => json_decode(json_encode($address), TRUE)
    ];
    $result = $this->client->call('InsertAddress', $data);
    $this->result = $result->InsertAddressResult;
    $this->validateResponse($this->result);
    $this->setAddressId($this->result);
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

  protected function validateResponse($id)
  {
    if ($id > 0) {
      return;
    }
    switch ($id) {
      case 0:
        throw new NotFoundException();

      case -1:
        throw new NotCreatedException();

      default:
        throw new \UnexpectedValueException();
    }
  }
}
