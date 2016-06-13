<?php

include __DIR__ . '/../vendor/autoload.php';

$yaml = new \Symfony\Component\Yaml\Parser();
$credentials = $yaml->parse(file_get_contents(__DIR__.'/config.yml'));

try {
  $client = new \Frontsystems\Client($credentials['username'], $credentials['password']);
  $customer = new \Frontsystems\Customer($client);
  var_dump($result = $customer->getCustomer($credentials['email'])->getLastResult());
  var_dump($result->CUSTOMERID);
  var_dump($customer->getCustomerByID($result->CUSTOMERID)->getLastResult());
}
catch (\Exception $e) {
  var_dump($e);
}
