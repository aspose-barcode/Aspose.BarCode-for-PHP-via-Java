<?php
namespace assist;

class BarcodeTestException extends \Exception
{
    public function __construct($message = "Test Exception", $code = 0, \Throwable $previous = null)
    {
        if ($message instanceof \Throwable) {
            $previous = $message;
            $message = $message->getMessage();
        }
        parent::__construct($message, $code, $previous);
    }
}

