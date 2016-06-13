<?php

include __DIR__ . '/../vendor/autoload.php';

$yaml = new \Symfony\Component\Yaml\Parser();
$credentials = $yaml->parse(file_get_contents(__DIR__.'/config.yml'));

try {
  $client = new \Frontsystems\Client($credentials['username'], $credentials['password']);
  $product = new \Frontsystems\Product($client);

  $customer_service = new \Frontsystems\Customer($client);
  $customer_id = $customer_service->getCustomerByEmail($credentials['email'])->getCustomerId();

  $product_service = new \Frontsystems\Product($client);
  $products = $product_service->getProductsByPage(0, 1);
  $product_sku = $products[0]->IDENTITY;

  $address_service = new \Frontsystems\Address($client);
  $address_id = $address_service->save(new \Frontsystems\Entity\Address(
    $customer_id,
    'Name',
    'Address',
    'Zip',
    'City',
    'Country',
    false,
    'Phone',
    'Comment'
  ))->getAddressId();

  $payment = new \Frontsystems\Entity\Payment(
    10,
    '',
    \Frontsystems\Data\PaymentStepEnum::AUTH,
    \Frontsystems\Data\PaymentTypeEnum::COLLECTOR,
    null
  );
  $sale_line = new \Frontsystems\Entity\SaleLine(
    $product_sku,
    10,
    1,
    12345
  );
  $shipment = new \Frontsystems\Entity\Shipment(
    '',
    0,
    \Frontsystems\Data\ShipmentProviderEnum::INSTORE,
    new \Frontsystems\Data\DateTime()
  );

  $sale = new \Frontsystems\Entity\Sale(
    $customer_id,
    $address_id,
    $address_id,
    array($payment),
    new \Frontsystems\Data\DateTime(),
    array($sale_line),
    array($shipment),
    false,
    false,
    12345,
    null,
    'Comment'
  );
  $sale_service = new \Frontsystems\Sale($client);
  $sale_service->save($sale);


  var_dump($product->newSale($sale)->getLastResult());
}
catch (\Exception $e) {
  var_dump($e);
}
