<?php

namespace Frontsystems;

class MissingKeyException extends RequestException
{

    /**
     * @var string
     */
    protected $key;

    public function __construct($key, $message = '', $code = 0, \Exception $previous = null)
    {
        // Set key.
        $this->key = $key;

        // Set default message.
        if (empty($message)) {
            $message = "Missing key $key";
        }

        parent::__construct($message, $code, $previous);
    }

    public function getKey()
    {
        return $this->key;
    }
}
