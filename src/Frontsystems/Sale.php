<?php

namespace Frontsystems;

class Sale implements ServiceInterface {

  protected $client;

  protected $lastResult;

  public function __construct(Client $client) {
    $this->client = $client;
  }

  /**
   * @return mixed
   */
  public function getLastResult() {
    return $this->lastResult;
  }

  public function newSale(\Frontsystems\Entity\Sale $sale) {
    $data = json_decode(json_encode($sale), TRUE);
    $result = $this->client->call('NewSale', $data);
    $this->lastResult = $result;
    return $this;
  }

  public function getSaleStatus($guid) {
    $result = $this->client->call('GetSaleStatus', [
      'saleGuid' => $guid,
    ]);
    $this->lastResult = $result;
    return $this;
  }

  public function cancelSale($guid) {
    $result = $this->client->call('CancelSale', [
      'saleGuid' => $guid,
    ]);
    $this->lastResult = $result;
    return $this;
  }


}
