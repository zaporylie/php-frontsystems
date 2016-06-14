<?php

namespace Frontsystems;

use Frontsystems\Data\DateTime;

class Stock  implements ResultInterface
{
    protected $client;

    protected $result;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    public function getStocks() {
        $result = $this->client->call('GetStocks');
        return $this->result = $result->GetStocksResult;
    }

    public function getStockCountByProductID($productId) {
        $result = $this->client->call('GetStockCountByProductID', ['productid' => $productId]);
        return $this->result = $result->GetStockCountByProductIDResult;
    }

    public function getStockCountByIdentity($sku) {
        $result = $this->client->call('GetStockCountByIdentity', ['Identity' => $sku]);
        return $this->result = $result->GetStockCountByIdentityResult->StockCount;
    }

    public function getStockCountByTimestamp(DateTime $dateTime) {
        $result = $this->client->call('GetStockCountByTimestamp', ['fromdatetime' => $dateTime->jsonSerialize()]);
        return $this->result = $result->GetStockCountByTimestampResult->StockCount;
    }


}
