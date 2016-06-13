<?php

namespace Frontsystems;

class Product implements ServiceInterface
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

  public function getAllProducts() {
    $result = $this->client->call('GetAllProducts', []);
    $this->lastResult = $result;
    return $this;
  }

  public function getAllProductsCount() {
    $result = $this->client->call('GetAllProductsCount', []);
    $result = $result->GetAllProductsCountResult;
    $this->lastResult = $result;
    return $this;
  }

  public function getBrands() {
    $result = $this->client->call('GetBrands', []);
    $result = $result->GetBrandsResult->WebBrand;
    $this->lastResult = $result;
    return $this;
  }

  public function getCategories() {
    $result = $this->client->call('GetCategories', []);
    $result = $result->GetCategoriesResult;
    $this->lastResult = $result;
    return $this;
  }

  public function getColours() {
    $result = $this->client->call('GetColours', []);
    $result = $result->GetColoursResult->WebColour;
    $this->lastResult = $result;
    return $this;
  }

  public function getFullProductInfo($productId) {
    $result = $this->client->call('GetFullProductInfo', [
      'productid' => $productId,
    ]);
    $this->lastResult = $result;
    return $this;
  }

  public function getProductsByPage($page = 0, $pageSize = 50) {
    $result = $this->client->call('GetProductsByPage', [
      'page' => $page,
      'pagesize' => $pageSize,
    ]);
    $result = $result->GetProductsByPageResult->Product;
    $this->lastResult = $result;
    return $this;
  }
}
