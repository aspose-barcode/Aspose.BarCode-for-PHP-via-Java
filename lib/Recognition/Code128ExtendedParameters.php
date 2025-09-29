<?php

namespace Aspose\Barcode\Recognition;

use Aspose\Barcode\Bridge\Code128ExtendedParametersDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 *
 * Stores special data of Code128 recognized barcode
 * Represents the recognized barcode's region and barcode angle
 *
 * This sample shows how to get code128 raw values
 * @code
 * $generator = new BarcodeGenerator(EncodeTypes::CODE_128, "12345");
 * $generator->save("test.png");
 * $reader = new BarCodeReader("test.png", DecodeType::CODE_128);
 * foreach($reader->readBarCodes() as $result)
 * {
 *    print("BarCode Type: ".$result->getCodeTypeName());
 *    print("BarCode CodeText: ".$result->getCodeText());
 *    print("Code128 Data Portions: ".$result->getExtended()->getCode128());
 * }
 * @endcode
 */
final class Code128ExtendedParameters implements Communicator
{
    private array $code128DataPortions;
    private Code128ExtendedParametersDTO $code128ExtendedParametersDTO;

    /**
     * @return Code128ExtendedParametersDTO instance
     */
    private function getCode128ExtendedParametersDTO(): Code128ExtendedParametersDTO
    {
        return $this->code128ExtendedParametersDTO;
    }

    /**
     * @param Code128ExtendedParametersDTO $code128ExtendedParametersDTO
     */
    private function setCode128ExtendedParametersDTO(Code128ExtendedParametersDTO $code128ExtendedParametersDTO): void
    {
        $this->code128ExtendedParametersDTO = $code128ExtendedParametersDTO;
    }

    function __construct(Code128ExtendedParametersDTO $code128ExtendedParametersDTO)
    {
        $this->code128ExtendedParametersDTO = $code128ExtendedParametersDTO;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
        // TODO: Implement obtainDto() method.
    }

    public function initFieldsFromDto(): void
    {
        try
        {
            $this->code128DataPortions = self::convertCode128DataPortions($this->getCode128ExtendedParametersDTO()->code128DataPortions);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    private static function convertCode128DataPortions($javaCode128DataPortions): array
    {
        $code128DataPortions = array();
        for ($i = 0; $i < sizeof($javaCode128DataPortions); $i++)
        {
            $code128DataPortions[] = new Code128DataPortion($javaCode128DataPortions[$i]);
        }
        return $code128DataPortions;
    }

    /**
     *  Gets Code128DataPortion array of recognized Code128 barcode Value: Array of the Code128DataPortion.
     */
    public function getCode128DataPortions(): array
    {
        return $this->code128DataPortions;
    }

    public function isEmpty(): bool
    {
        try
        {
            return $this->getCode128ExtendedParametersDTO()->empty;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified Code128ExtendedParameters value.
     *
     * @param Code128ExtendedParameters obj An System.Object value to compare to this instance.
     * @return bool true if obj has the same value as this instance; otherwise, false.
     */
    public function equals(Code128ExtendedParameters $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->Code128ExtendedParameters_equals($this->getCode128ExtendedParametersDTO(), $obj->getCode128ExtendedParametersDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }

    /**
     * Returns a human-readable string representation of this Code128ExtendedParameters.
     *
     * @return string A string that represents this Code128ExtendedParameters.
     */
    public function toString(): string
    {
        try
        {
            return $this->getCode128ExtendedParametersDTO()->toString;// TODO need to implement
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}