<?php

include __DIR__ . '/../vendor/autoload.php';

$yaml = new \Symfony\Component\Yaml\Parser();
$credentials = $yaml->parse(file_get_contents(__DIR__.'/config.yml'));

try {
  $client = new \Frontsystems\Client($credentials['username'], $credentials['password']);
  $product = new \Frontsystems\Product($client);
  var_dump($product->getCategories()->getLastResult());
}
catch (\Exception $e) {
  var_dump($e);
}
