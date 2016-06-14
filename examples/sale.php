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
    $products = $product_service->getProductsByPage(1, 1);
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
        \Frontsystems\Data\PaymentStepEnum::AUTH,
        \Frontsystems\Data\PaymentTypeEnum::COLLECTOR
    );
    $sale_line = new \Frontsystems\Entity\SaleLine(
        $product_sku,
        10,
        1,
        'Comment'
    );
    $shipment = new \Frontsystems\Entity\Shipment(
        0,
        \Frontsystems\Data\ShipmentProviderEnum::POSTEN,
        new \Frontsystems\Data\DateTime()
    );

    $sale = new \Frontsystems\Entity\Sale(
        $customer_id,
        $address_id,
        $address_id,
        [$sale_line, $sale_line],
        [$shipment],
        [$payment],
        new \Frontsystems\Data\DateTime(),
        false,
        false,
        'Comment'
    );
    $sale->setGuid($sale->generateGuid());
    $sale_service = new \Frontsystems\Sale($client);
    var_dump(json_decode(json_encode($sale), true));
    $sale_service->save($sale);
    var_dump($sale_service->getResult());
} catch (\Exception $e) {
    var_dump($e);
}
