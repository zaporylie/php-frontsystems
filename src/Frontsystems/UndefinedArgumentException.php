<?php

namespace Frontsystems;

class UndefinedArgumentException extends \InvalidArgumentException
{

    /**
     * @var string
     */
    protected $argument;

    public function __construct($argument, $message = '', $code = 0, \Exception $previous = null)
    {
        // Set key.
        $this->argument = $argument;

        // Set default message.
        if (empty($message)) {
            $message = "Missing argument $argument";
        }

        parent::__construct($message, $code, $previous);
    }

    public function getArgument()
    {
        return $this->argument;
    }
}
