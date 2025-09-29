<?php

namespace Aspose\Barcode\Recognition;

use Aspose\Barcode\Bridge\DataBarExtendedParametersDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * Stores a DataBar additional information of recognized barcode
 *
 * @code
 * $reader = new BarCodeReader("test.png", DecodeType::DATABAR_OMNI_DIRECTIONAL);
 *
 * foreach($reader->readBarCodes() as $result)
 * {
 *    print("BarCode Type: ".result->getCodeTypeName());
 *    print("BarCode CodeText: ".result->getCodeText());
 *    print("QR Structured Append Quantity: ".result->getExtended()->getQR()->getQRStructuredAppendModeBarCodesQuantity());
 * }
 * @endcode
 */
class DataBarExtendedParameters implements Communicator
{
    private DataBarExtendedParametersDTO $dataBarExtendedParametersDTO;

    /**
     * @return DataBarExtendedParametersDTO instance
     */
    private function getDataBarExtendedParametersDTO(): DataBarExtendedParametersDTO
    {
        return $this->dataBarExtendedParametersDTO;
    }

    /**
     * @param $dataBarExtendedParametersDTO
     */
    private function setQRExtendedParametersDTO($dataBarExtendedParametersDTO): void
    {
        $this->dataBarExtendedParametersDTO = $dataBarExtendedParametersDTO;
    }

    function __construct(DataBarExtendedParametersDTO $dataBarExtendedParametersDTO)
    {
        $this->dataBarExtendedParametersDTO = $dataBarExtendedParametersDTO;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
        // TODO: Implement obtainDto() method.
    }

    public function initFieldsFromDto(): void
    {
        // TODO: Implement init() method.
    }

    /**
     * Gets the DataBar 2D composite component flag. Default value is false.
     * @return bool The DataBar 2D composite component flag.
     */
    public function is2DCompositeComponent(): bool
    {
        try
        {
            return $this->getDataBarExtendedParametersDTO()->is2DCompositeComponent;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified DataBarExtendedParameters value.
     * @param DataBarExtendedParameters $obj An System.Object value to compare to this instance.
     * @return bool true if obj has the same value as this instance; otherwise, <b>false</b>.
     */
    public function equals(DataBarExtendedParameters $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->DataBarExtendedParameters_equals($this->getDataBarExtendedParametersDTO(), $obj->getDataBarExtendedParametersDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }

    /**
     * Returns a human-readable string representation of this DataBarExtendedParameters.
     * @return string A string that represents this DataBarExtendedParameters.
     */
    public function toString(): string
    {
        try
        {
            return $this->getDataBarExtendedParametersDTO()->toString;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}