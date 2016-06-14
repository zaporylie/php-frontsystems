<?php

include __DIR__ . '/../vendor/autoload.php';

$yaml = new \Symfony\Component\Yaml\Parser();
$credentials = $yaml->parse(file_get_contents(__DIR__.'/config.yml'));

try {
    $client = new \Frontsystems\Client($credentials['username'], $credentials['password']);
    $stock_service = new \Frontsystems\Stock($client);

    $product_service = new \Frontsystems\Product($client);
    $products = $product_service->getProductsByPage(1, 1);
    $product_sku = $products[0]->IDENTITY;
    $product_id = $products[0]->PRODUCTID;

    var_dump($stock_service->getStocks());
    var_dump($stock_service->getStockCountByProductID($product_id));
    var_dump($stock_service->getStockCountByIdentity($product_sku));
    var_dump($stock_service->getStockCountByTimestamp(new \Frontsystems\Data\DateTime('- 1 day')));
} catch (\Exception $e) {
    var_dump($e);
}
