<?php

namespace Frontsystems;

class Product implements ResultInterface
{

  protected $client;

  protected $result;

  public function __construct(Client $client) {
    $this->client = $client;
  }

  /**
   * @return mixed
   */
  public function getResult() {
    return $this->result;
  }

  public function getAllProducts() {
    $result = $this->client->call('GetAllProducts');
    return $this->result = $result->GetAllProductsResult;
  }

  public function getAllProductsCount() {
    $result = $this->client->call('GetAllProductsCount');
    return $this->result = $result->GetAllProductsCountResult;
  }

  public function getBrands() {
    $result = $this->client->call('GetBrands');
    return $this->result = $result->GetBrandsResult->WebBrand;
  }

  public function getCategories() {
    $result = $this->client->call('GetCategories');
    return $this->result = $result->GetCategoriesResult;
  }

  public function getColours() {
    $result = $this->client->call('GetColours');
    return $this->result = $result->GetColoursResult->WebColour;
  }

  public function getFullProductInfo($productId) {
    $result = $this->client->call('GetFullProductInfo', [
      'productid' => $productId,
    ]);
    return $this->result = $result;
  }

  public function getProductsByPage($page = 0, $pageSize = 50) {
    $result = $this->client->call('GetProductsByPage', [
      'page' => $page,
      'pagesize' => $pageSize,
    ]);
    return $this->result = $result->GetProductsByPageResult->Product;
  }
}
