<?php

include __DIR__ . '/../vendor/autoload.php';

$yaml = new \Symfony\Component\Yaml\Parser();
$credentials = $yaml->parse(file_get_contents(__DIR__.'/config.yml'));

try {
    $client = new \Frontsystems\Client($credentials['username'], $credentials['password']);
    var_dump($client);
} catch (\Exception $e) {
    var_dump($e);
}
