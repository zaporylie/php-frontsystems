<?php

include __DIR__ . '/../vendor/autoload.php';

$yaml = new \Symfony\Component\Yaml\Parser();
$credentials = $yaml->parse(file_get_contents(__DIR__.'/config.yml'));

try {
  $client = new \Frontsystems\Client($credentials['username'], $credentials['password']);

  $customer = new \Frontsystems\Entity\Customer(
    0.0,
    'Address',
    'City',
    'Comment',
    'Country',
    'Email',
    'FirstName',
    'LastName',
    'Phone',
    'Zip',
    'DlvAddress',
    'DlvCity',
    'DlvComment',
    'DlvName',
    'DlvPhone',
    'DlvZip'
  );

  $customer_service = new \Frontsystems\Customer($client);
//  $customer_service->save($customer);
//  var_dump($customer_service->getLastResult());
//  var_dump($result = $customer_service->getCustomerByEmail($credentials['email'])->getLastResult());
  var_dump($customer_service->getCustomerId());
  var_dump($customer_service->setCustomerId(123)->getCustomer());
}
catch (\Exception $e) {
  var_dump($e);
}
