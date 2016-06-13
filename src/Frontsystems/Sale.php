<?php

namespace Frontsystems;

class Sale implements ResultInterface {

  protected $client;

  protected $result;

  protected $guid;

  public function __construct(Client $client, $guid = null) {
    $this->client = $client;
    $this->guid = $guid;
  }

  /**
   * @return mixed
   */
  public function getResult() {
    return $this->result;
  }

  public function save(\Frontsystems\Entity\Sale $sale) {
    $data = json_decode(json_encode($sale), TRUE);
    $result = $this->client->call('NewSale', $data);
    $this->result = $result;
    return $this;
  }

  public function getSaleStatus() {
    $this->validate();
    $result = $this->client->call('GetSaleStatus', [
      'saleGuid' => $this->guid,
    ]);
    $this->result = $result;
    return $this;
  }

  public function cancelSale() {
    $this->validate();
    $result = $this->client->call('CancelSale', [
      'saleGuid' => $this->guid,
    ]);
    $this->result = $result;
    return $this;
  }

  public function getGuid()
  {
    return $this->guid;
  }

  protected function validate() {
    if (!isset($this->guid)) {
      throw new MissingKeyException('Guid');
    }
  }


}
