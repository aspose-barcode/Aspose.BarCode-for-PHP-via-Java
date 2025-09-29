<?php

namespace Aspose\Barcode\ComplexBarcode;

use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * Class for encoding and decoding structured second message for MaxiCode barcode.
 */
class MaxiCodeStructuredSecondMessage extends MaxiCodeSecondMessage
{
    function __construct()
    {
        try
        {
            $this->setMaxiCodeSecondMessageDto($this->obtainDto());
            $this->initFieldsFromDto();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    public function obtainDto(...$args)
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $maxiCodeStructuredSecondMessage = $client->MaxiCodeStructuredSecondMessage_ctor();
        $thriftConnection->closeConnection();
        return $maxiCodeStructuredSecondMessage;
    }

    public function initFieldsFromDto()
    {
    }

    static function _construct($dtoObj)
    {
        try
        {
            $obj = new MaxiCodeStructuredSecondMessage();
            $obj->setMaxiCodeSecondMessageDto($dtoObj);
            $obj->initFieldsFromDto();
            return $obj;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     *  Gets year. Year must be 2 digit integer value.
     */
    public function getYear(): int
    {
        return $this->getMaxiCodeSecondMessageDto()->year;
    }

    /**
     *  Sets year. Year must be 2 digit integer value.
     */
    public function setYear(int $value): void
    {
        $this->getMaxiCodeSecondMessageDto()->year = $value;
    }

    /**
     * Gets identifiers list
     * @return array List of identifiers
     */
    public function getIdentifiers(): array
    {
        return $this->getMaxiCodeSecondMessageDto()->identifiers;
    }

    /**
     * Adds new identifier
     * @param string $identifier Identifier to be added
     */
    public function add(string $identifier): void
    {
        array_push($this->getMaxiCodeSecondMessageDto()->identifiers, $identifier);
    }

    /**
     * Clear identifiers list
     */
    public function clear(): void
    {
        $this->getMaxiCodeSecondMessageDto()->identifiers = array();
    }

    /**
     * Gets constructed second message
     * @return string Constructed second message
     */
    public function getMessage(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $message = $client->MaxiCodeStructuredSecondMessage_getMessage($this->getMaxiCodeSecondMessageDto());
        $thriftConnection->closeConnection();
        return $message;
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified <see cref="MaxiCodeStructuredSecondMessage"/> value.
     * @param object $obj An <see cref="MaxiCodeStructuredSecondMessage"/> value to compare to this instance.
     * @return bool <b>true</b> if obj has the same value as this instance; otherwise, <b>false</b>.
     */
    public function equals($obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $message = $client->MaxiCodeStructuredSecondMessage_equals($this->getMaxiCodeSecondMessageDto(), $obj->getMaxiCodeSecondMessageDto());
        $thriftConnection->closeConnection();
        return $message;
    }
}