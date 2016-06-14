<?php

namespace Frontsystems;

class Customer implements ResultInterface
{
    protected $client;

    protected $result;

    protected $customerId;

    public function __construct(Client $client, $customerId = null)
    {
        $this->client = $client;
        $this->customerId = $customerId;
    }

  /**
   * @return mixed
   */
    public function getResult()
    {
        return $this->result;
    }

    public function save(\Frontsystems\Entity\Customer $customer)
    {
        $customer->setCustomerId($this->customerId);
        $data = [
        'customer' => json_decode(json_encode($customer), true)
        ];
        $result = $this->client->call('InsertCustomer', $data);
        $this->result = $result->InsertCustomerResult;
        $this->validateResponse($this->result);
        $this->setCustomerId($this->result);
        return $this;
    }

  /**
   * @param $email
   * @return $this
   * @throws \Frontsystems\ClientException
   */
    public function getCustomerByEmail($email)
    {
        $result = $this->client->call('GetCustomer', [
        'email' => $email,
        ]);
        $this->result = $result->GetCustomerResult;
        $this->validateResponse($result->GetCustomerResult->CUSTOMERID);
        $this->setCustomerId($result->GetCustomerResult->CUSTOMERID);
        return $this;
    }

    public function getCustomer()
    {
        $this->validateRequest();
        $result = $this->client->call('GetCustomerByID', [
        'id' => $this->customerId,
        ]);
        $this->result = $result->GetCustomerByIDResult;
        $this->validateResponse($result->GetCustomerByIDResult->CUSTOMERID);
        return $this->result;
    }

    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
        return $this;
    }

    public function getCustomerId()
    {
        return $this->customerId;
    }

    protected function validateRequest()
    {
        if (!isset($this->customerId)) {
            throw new UndefinedArgumentException('customerId');
        }
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
