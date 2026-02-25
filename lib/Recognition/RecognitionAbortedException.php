<?php

namespace Aspose\Barcode\Recognition;

use Exception;

class RecognitionAbortedException extends Exception
{
    private ?int $executionTime;

    /**
     * Gets the execution time of current recognition session.
     * @return int The execution time of current recognition session.
     */
    public function getExecutionTime(): int
    {
        return $this->executionTime;
    }

    /**
     * Sets the execution time of current recognition session.
     * @param int $value The execution time of current recognition session.
     */
    public function setExecutionTime(int $value): void
    {
        $this->executionTime = $value;
    }

    /**
     * Initializes a new instance of the RecognitionAbortedException class.
     * @param string|null $message The error message of the exception.
     * @param int|null $executionTime The execution time of current recognition session.
     */
    public function __construct(?string $message, ?int $executionTime)
    {
        parent::__construct($message);
        $this->executionTime = $executionTime;
    }

    /**
     * Returns a string representation of the exception.
     *
     * @return string
     */
    public function __toString(): string
    {
        $message = $this->getMessage() ?? 'Recognition aborted';

        if ($this->executionTime !== null) {
            return sprintf(
                '%s: %s (execution time: %d ms)',
                static::class,
                $message,
                $this->executionTime
            );
        }

        return sprintf(
            '%s: %s',
            static::class,
            $message
        );
    }
}