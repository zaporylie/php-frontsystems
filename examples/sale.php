<?php

include __DIR__ . '/../vendor/autoload.php';

$yaml = new \Symfony\Component\Yaml\Parser();
$credentials = $yaml->parse(file_get_contents(__DIR__.'/config.yml'));

try {
  $client = new \Frontsystems\Client($credentials['username'], $credentials['password']);
  $product = new \Frontsystems\Sale($client);

  $customer = new \Frontsystems\Customer($client);
  $person = $customer->getCustomerByEmail($credentials['email']);
  $customer_id = $person->CUSTOMERID;

  $address = new \Frontsystems\Address($client);
  $address_id = $address->save(new \Frontsystems\Entity\Address(
    'test',
    'Trondheim',
    'Comment',
    'Norway',
    $customer_id,
    false,
    'Test',
    '98765432',
    '7040'
  ))->getAddressId();

  $sale = new \Frontsystems\Entity\Sale(
    'Comment',
    $customer_id,
    $address_id,
    12345,
    $address_id,
    false,
    false,
    array($payment),
    null,
    new \Frontsystems\Data\DateTime(),
    $guid,
    array($sale_line),
    array($shipment)
  );


  var_dump($product->newSale($sale)->getLastResult());
}
catch (\Exception $e) {
  var_dump($e);
}
