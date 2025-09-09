<?php

namespace Aspose\Barcode\Recognition;

use Aspose\Barcode\Bridge\OneDExtendedParametersDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 *
 * Stores special data of 1D recognized barcode like separate codetext and checksum
 *
 * This sample shows how to get 1D barcode value and checksum
 * @code
 * $generator = new BarcodeGenerator(EncodeTypes::EAN_13, "1234567890128");
 * $generator->save("test.png");
 * $reader = new BarCodeReader("test.png", DecodeType::EAN_13);
 * foreach($reader->readBarCodes() as $result)
 * {
 *    print("BarCode Type: ".$result->getCodeTypeName());
 *    print("BarCode CodeText: ".$result->getCodeText());
 *    print("BarCode Value: ".$result->getExtended()->getOneD()->getValue());
 *    print("BarCode Checksum: ".$result->getExtended()->getOneD()->getCheckSum());
 * }
 * @endcode
 */
final class OneDExtendedParameters implements Communicator
{
    private OneDExtendedParametersDTO $oneDExtendedParametersDTO;

    /**
     * @return OneDExtendedParametersDTO instance
     */
    private function getOneDExtendedParametersDTO(): OneDExtendedParametersDTO
    {
        return $this->oneDExtendedParametersDTO;
    }

    /**
     * @param $oneDExtendedParametersDTO
     */
    private function setOneDExtendedParametersDTO($oneDExtendedParametersDTO): void
    {
        $this->oneDExtendedParametersDTO = $oneDExtendedParametersDTO;
    }

    function __construct(OneDExtendedParametersDTO $oneDExtendedParametersDTO)
    {
        $this->oneDExtendedParametersDTO = $oneDExtendedParametersDTO;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
        // TODO: Implement obtainDto() method.
    }

    public function initFieldsFromDto(): void
    {
    }

    /**
     * Gets the codetext of 1D barcodes without checksum. Value: The codetext of 1D barcodes without checksum.
     */
    public function getValue(): string
    {
        try
        {
            return $this->getOneDExtendedParametersDTO()->value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the checksum for 1D barcodes. Value: The checksum for 1D barcode.
     */
    public function getCheckSum(): string
    {
        try
        {
            return $this->getOneDExtendedParametersDTO()->checkSum;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Tests whether all parameters has only default values
     * @return bool Returns { <b>true</b>} if all parameters has only default values; otherwise, { <b>false</b>}.
     * @throws BarcodeException
     */
    public function isEmpty(): bool
    {
        try
        {
            return $this->getOneDExtendedParametersDTO()->empty;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified OneDExtendedParameters value.
     *
     * @param OneDExtendedParameters obj An System.Object value to compare to this instance.
     * @return bool true if obj has the same value as this instance; otherwise, false.
     */
    public function equals(OneDExtendedParameters $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->OneDExtendedParameters_equals($this->getOneDExtendedParametersDTO(), $obj->getOneDExtendedParametersDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }

    /**
     * Returns a human-readable string representation of this OneDExtendedParameters.
     *
     * @return string A string that represents this OneDExtendedParameters.
     */
    public function toString(): string
    {
        try
        {
            return $this->getOneDExtendedParametersDTO()->toString;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}