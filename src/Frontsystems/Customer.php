<?php

namespace Frontsystems;

class Customer implements ServiceInterface
{
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

  /**
   * @param $email
   * @return $this
   * @throws \Frontsystems\ClientException
   */
  public function getCustomer($email) {
    $result = $this->client->call('GetCustomer', [
      'email' => $email,
    ]);
    $this->lastResult = $result->GetCustomerResult;
    return $this;
  }

  public function getCustomerByID($id) {
    $result = $this->client->call('GetCustomerByID', [
      'id' => $id,
    ]);
    $this->lastResult = $result->GetCustomerByIDResult;
    return $this;
  }
}
