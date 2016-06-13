<?php

include __DIR__ . '/../vendor/autoload.php';

$yaml = new \Symfony\Component\Yaml\Parser();
$credentials = $yaml->parse(file_get_contents(__DIR__.'/config.yml'));

try {
  $client = new \Frontsystems\Client($credentials['username'], $credentials['password']);
  $product = new \Frontsystems\Sale($client);
  var_dump($product->getSaleStatus($guid)->getLastResult());
}
catch (\Exception $e) {
  var_dump($e);
}
