<?php

namespace Aspose\Barcode\Recognition;

use Aspose\Barcode\Exception;

class RecognitionAbortedException extends Exception
{
    private ?int $executionTime;

    /**
     * Gets the execution time of current recognition session
     * @return int The execution time of current recognition session
     */
    public function getExecutionTime(): int
    {
        return $this->executionTime;
    }

    /**
     * Sets the execution time of current recognition session
     * @param int $value The execution time of current recognition session
     */
    public function setExecutionTime(int $value): void
    {
        $this->executionTime = $value;
    }

    /**
     * Initializes a new instance of the <see cref="RecognitionAbortedException" /> class with specified recognition abort message.
     * @param $message null|string The error message of the exception.
     * @param $executionTime null|int The execution time of current recognition session.
     */
    public function __construct(?string $message, ?int $executionTime)
    {
        parent::__construct($message);
        $this->executionTime = $executionTime;
    }
}