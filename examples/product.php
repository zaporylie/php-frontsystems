<?php

include __DIR__ . '/../vendor/autoload.php';

$yaml = new \Symfony\Component\Yaml\Parser();
$credentials = $yaml->parse(file_get_contents(__DIR__.'/config.yml'));

try {
    $client = new \Frontsystems\Client($credentials['username'], $credentials['password']);
    $product_service = new \Frontsystems\Product($client);
    var_dump($product_service->getProductsByPage(1, 10));
    var_dump($product_service->getBrands());
    var_dump($product_service->getColours());
    var_dump($product_service->getCategories());
} catch (\Exception $e) {
    var_dump($e);
}
