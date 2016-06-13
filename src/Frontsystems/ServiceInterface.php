<?php

namespace Frontsystems;

interface ServiceInterface {

  public function __construct(Client $client);

  public function getLastResult();
}
