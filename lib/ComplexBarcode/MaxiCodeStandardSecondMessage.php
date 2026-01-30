<?php

namespace Aspose\Barcode\ComplexBarcode;

use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * Class for encoding and decoding standart second message for MaxiCode barcode.
 */
class MaxiCodeStandardSecondMessage extends MaxiCodeSecondMessage
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

    static function _construct($dtoObj)
    {
        try
        {
            $obj = new MaxiCodeStandardSecondMessage();
            $obj->setMaxiCodeSecondMessageDto($dtoObj);
            $obj->initFieldsFromDto();
            return $obj;
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
        $maxiCodeStandardSecondMessageDTO = $client->MaxiCodeStandardSecondMessage_ctor();
        $thriftConnection->closeConnection();
        return $maxiCodeStandardSecondMessageDTO;
    }

    public function initFieldsFromDto()
    {
    }

    /**
     * Sets second message
     */
    public function setMessage(string $value)
    {
        $this->getMaxiCodeSecondMessageDto()->message = $value;
    }

    /**
     * Gets constructed second message
     * @return string Constructed second message
     */
    public function getMessage(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $message = $client->MaxiCodeStandartSecondMessage_getMessage($this->getMaxiCodeSecondMessageDto());
        $thriftConnection->closeConnection();
        return $message;
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified MaxiCodeStandartSecondMessage value.
     * @param object obj An MaxiCodeStandartSecondMessage value to compare to this instance
     * @return bool <b>true</b> if obj has the same value as this instance; otherwise, <b>false</b>.
     */
    public function equals($obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEqual = $client->MaxiCodeStandartSecondMessage_equals($this->getMaxiCodeSecondMessageDto(), $obj->getMaxiCodeSecondMessageDto());
        $thriftConnection->closeConnection();
        return $isEqual;
    }
}