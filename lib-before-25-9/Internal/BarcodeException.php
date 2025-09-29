<?php

namespace Aspose\Barcode\Internal;

use Exception;
use Throwable;

/**
 * Class BarcodeException
 */
class BarcodeException extends Exception
{
    const MAX_LINES = 34;
    private $stackTrace;
    private $kind;

    /**
     * BarcodeException constructor.
     * @param  $exc exception's instance
     */
    public function __construct($inputMessage = "", $file = "", $line = "", $code = 0, Throwable $previous = null)
    {
        if (!empty($inputMessage) && is_string($inputMessage)) {
            $formatted_message = "Exception occurred -> " . $inputMessage;
            if (!empty($file)) {
                $formatted_message .= ", file: " . $file;
            }
            if (!empty($line)) {
                $formatted_message .= ", line: " . $line;
            }

            parent::__construct($formatted_message, $code, $previous);
            return;
        }

        $line = $this->getLine();
        $file = $this->getFile();
        $exc_message = "Exception occurred in $file:$line" . PHP_EOL;
        $details = $this->getDetails($inputMessage);

        if (empty($details)) {
            parent::__construct($exc_message, $code, $previous);
            return;
        }

        $lines = explode("\n", $details);
        $counter = 0;
        foreach ($lines as $line) {
            if ($counter >= self::MAX_LINES) {
                break;
            }
            $counter++;
            $exc_message .= $line . PHP_EOL;
        }

        parent::__construct($exc_message, $code, $previous);
    }

    private function getDetails($exc)
    {
        $details = "";
        if (is_string($exc)) {
            return $exc;
        }
        if (get_class($exc) != null) {
            $details = "exception type : " . get_class($exc) . "\n";
        }
        if (method_exists($exc, "__toString")) {
            $details .= $exc->__toString();
        }
        if (method_exists($exc, "getMessage")) {
            $details .= $exc->getMessage();
        }
        if (method_exists($exc, "getCause")) {
            $details .= $exc->getCause();
        }
        return $details;
    }

    public function setMessage($message): void
    {
        $this->message = $message;
    }

    public function setStackTrace($stackTrace): void
    {
        $this->stackTrace = $stackTrace;
    }

    /**
     * @return mixed
     */
    public function getStackTrace()
    {
        return $this->stackTrace;
    }

    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    /**
     * @return mixed
     */
    public function getKind()
    {
        return $this->kind;
    }


}