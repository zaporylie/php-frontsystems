<?php

namespace Frontsystems;

class Sale implements ResultInterface
{

    protected $client;

    protected $result;

    protected $guid;

    public function __construct(Client $client, $guid = null)
    {
        $this->client = $client;
        $this->guid = $guid;
    }

  /**
   * @return mixed
   */
    public function getResult()
    {
        return $this->result;
    }

    public function save(\Frontsystems\Entity\Sale $sale)
    {
        $data = [
            'sale' => json_decode(json_encode($sale), true),
        ];
        $result = $this->client->call('NewSale', $data);
        $this->result = $result->NewSaleResult;
        $this->validateResponse($this->result);
        $this->guid = $sale->getGuid();
        return $this;
    }

    public function status()
    {
        $this->validateRequest();
        $result = $this->client->call('GetSaleStatus', [
            'saleGuid' => $this->guid,
        ]);
        $this->result = $result;
        return $this;
    }

    public function cancelSale()
    {
        $this->validateRequest();
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

    /**
     * @param null $guid
     */
    public function setGuid($guid) {
        $this->guid = $guid;
        return $this;
    }

    protected function validateRequest()
    {
        if (!isset($this->guid)) {
            throw new UndefinedArgumentException('Guid');
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
