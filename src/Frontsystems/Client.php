<?php

namespace Frontsystems;

class Client {

  const TEST = 'https://integrationtest.frontsystems.no/webshop/WebshopIntegration.svc?wsdl';
  const LIVE = 'https://integration.frontsystems.no/webshop/WebshopIntegration.svc?singleWsdl';

  /**
   * @var array
   */
  public $options = [
    'trace' => true,
    'features' => SOAP_SINGLE_ELEMENT_ARRAYS,
    'connection_timeout' => 2,
  ];

  /**
   * @var string
   */
  protected $username;
  /**
   * @var string
   */
  protected $password;
  /**
   * @var string
   */
  protected $environment;
  /**
   * @var
   */
  protected $accessKey;

  /**
   * Client constructor.
   *
   * @param string $username
   * @param string $password
   * @param string $environment
   */
  public function __construct($username, $password, $environment = self::TEST)
  {
    ini_set('default_socket_timeout', 30);
    $this->username = $username;
    $this->password = $password;
    $this->environment = $environment;
    $this->login();
  }

  public function login() {
    $results = $this->call('Logon', [
      'username' => $this->username,
      'password' => $this->password
    ]);
    $this->accessKey = $results->LogonResult;

    return $this;
  }

  /**
   * @return mixed
   */
  public function call($method, array $data = [])
  {
    $client = new \SoapClient($this->environment, $this->options);
    if (isset($this->accessKey)) {
      $data += [
        'key' => $this->accessKey,
      ];
    }
    try {
      $results = $client->{$method}($data);
    } catch (\Exception $e) {
      throw new ClientException($e->getMessage(), $e->getCode(), $e);
    }
    return $results;
  }
}
