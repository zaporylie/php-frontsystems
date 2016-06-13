<?php

include __DIR__ . '/../vendor/autoload.php';

$yaml = new \Symfony\Component\Yaml\Parser();
$credentials = $yaml->parse(file_get_contents(__DIR__.'/config.yml'));

try {
  $client = new \Frontsystems\Client($credentials['username'], $credentials['password']);

  $customer_service = new \Frontsystems\Customer($client);
  $customer_id = $customer_service->getCustomerByEmail($credentials['email'])->getCustomerId();
  $address = new \Frontsystems\Entity\Address(
    $customer_id,
    'Name',
    'Address',
    'Zip',
    'City',
    'Country',
    false,
    'Phone',
    'Comment'
  );

  $address_service = new \Frontsystems\Address($client);
  var_dump($address_service->save($address)->getResult());
  var_dump($address_service->getAddressId());
}
catch (\Exception $e) {
  var_dump($e);
}
