<?php

include __DIR__ . '/../vendor/autoload.php';

$yaml = new \Symfony\Component\Yaml\Parser();
$credentials = $yaml->parse(file_get_contents(__DIR__.'/config.yml'));

try {
  $client = new \Frontsystems\Client($credentials['username'], $credentials['password']);
  $product_service = new \Frontsystems\Product($client);
  var_dump($product_service->getProductsByPage(1, 10)->getResult());
  var_dump($product_service->getBrands()->getResult());
  var_dump($product_service->getColours()->getResult());
  var_dump($product_service->getCategories()->getResult());
}
catch (\Exception $e) {
  var_dump($e);
}
