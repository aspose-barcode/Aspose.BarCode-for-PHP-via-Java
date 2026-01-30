<?php

namespace Aspose\Barcode\Recognition;

use Aspose\Barcode\Bridge\QRExtendedParametersDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 *
 * Stores a QR Structured Append information of recognized barcode
 *
 * This sample shows how to get QR Structured Append data
 * @code
 * $reader = new BarCodeReader("test.png", DecodeType::QR);
 * foreach($reader->readBarCodes() as $result)
 * {
 *    print("BarCode Type: ".$result->getCodeTypeName());
 *    print("BarCode CodeText: ".$result->getCodeText());
 *    print("QR Structured Append Quantity: ".$result->getExtended()->getQR()->getQRStructuredAppendModeBarCodesQuantity());
 *    print("QR Structured Append Index: ".$result->getExtended()->getQR()->getQRStructuredAppendModeBarCodeIndex());
 *    print("QR Structured Append ParityData: ".$result->getExtended()->getQR()->getQRStructuredAppendModeParityData());
 * }
 * @endcode
 */
final class QRExtendedParameters implements Communicator
{
    private QRExtendedParametersDTO $qrExtendedParametersDTO;

    /**
     * @return QRExtendedParametersDTO instance
     */
    private function getQRExtendedParametersDTO(): QRExtendedParametersDTO
    {
        return $this->qrExtendedParametersDTO;
    }

    /**
     * @param $qrExtendedParametersDTO
     */
    private function setQRExtendedParametersDTO($qrExtendedParametersDTO): void
    {
        $this->qrExtendedParametersDTO = $qrExtendedParametersDTO;
    }

    function __construct(QRExtendedParametersDTO $qrExtendedParametersDTO)
    {
        $this->qrExtendedParametersDTO = $qrExtendedParametersDTO;
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
     * <p>Gets the QR structured append mode barcodes quantity. Default value is -1.</p>
     * Value: The quantity of the QR structured append mode barcode.
     * @return the QR structured append mode barcodes quantity.
     */
    public function getStructuredAppendModeBarCodesQuantity(): int
    {
        return $this->getQRExtendedParametersDTO()->structuredAppendModeBarCodesQuantity;
    }

    /**
     * Gets the QR structured append mode barcodes quantity. Default value is -1.Value: The quantity of the QR structured append mode barcode.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getStructuredAppendModeBarCodesQuantity().
     */
    public function getQRStructuredAppendModeBarCodesQuantity(): int
    {
        try
        {
            return $this->getQRExtendedParametersDTO()->structuredAppendModeBarCodesQuantity;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>Gets the index of the QR structured append mode barcode. Index starts from 0. Default value is -1.</p>
     * Value: The quantity of the QR structured append mode barcode.
     * @return the index of the QR structured append mode barcode.
     */
    public function getStructuredAppendModeBarCodeIndex(): int
    {
        return $this->getQRExtendedParametersDTO()->structuredAppendModeBarCodeIndex;
    }

    /**
     * Gets the index of the QR structured append mode barcode. Index starts from 0. Default value is -1.Value: The quantity of the QR structured append mode barcode.
     *
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getStructuredAppendModeBarCodeIndex().
     */
    public function getQRStructuredAppendModeBarCodeIndex(): int
    {
        try
        {
            return $this->getQRExtendedParametersDTO()->structuredAppendModeBarCodeIndex;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>Gets the QR structured append mode parity data. Default value is -1.</p>
     * Value: The index of the QR structured append mode barcode.
     * @return the QR structured append mode parity data.
     */
    public function getStructuredAppendModeParityData(): int
    {
        return $this->getQRExtendedParametersDTO()->structuredAppendModeParityData;
    }

    /**
     * Version of recognized QR Code. From Version1 to Version40.
     * return recognized QR Code
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getVersion().
     */
    public function getQRVersion(): int
    {
        return $this->getQRExtendedParametersDTO()->version;
    }

    /**
     * Version of recognized MicroQR Code. From M1 to M4.
     * return recognized MicroQR Code. From M1 to M4.
     */
    public function getMicroQRVersion(): int
    {
        return $this->getQRExtendedParametersDTO()->microQRVersion;
    }

    /**
     * Version of recognized RectMicroQR Code. From R7x43 to R17x139.
     * @return int of recognized RectMicroQR Code
     */
    public function getRectMicroQRVersion(): int
    {
        return $this->getQRExtendedParametersDTO()->rectMicroQRVersion;
    }

    /**
     * <p>
     * Reed-Solomon error correction level of recognized barcode. From low to high: LevelL, LevelM, LevelQ, LevelH.
     * </p>
     */
    public function getErrorLevel(): int
    {
        return $this->getQRExtendedParametersDTO()->errorLevel;
    }

    /**
     * Reed-Solomon error correction level of recognized barcode. From low to high: LevelL, LevelM, LevelQ, LevelH.
     * @return int error correction level of recognized barcode.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getErrorLevel().
     */
    public function getQRErrorLevel(): int
    {
        return $this->getQRExtendedParametersDTO()->errorLevel;
    }


    /**
     * Gets the QR structured append mode parity data. Default value is -1.Value: The index of the QR structured append mode barcode.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getStructuredAppendModeParityData().
     */
    public function getQRStructuredAppendModeParityData(): int
    {
        try
        {
            return $this->getQRExtendedParametersDTO()->structuredAppendModeParityData;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     * Version of recognized QR Code. From Version1 to Version40.
     * </p>
     */
    public function getVersion() : int
    {
        return $this->getQRExtendedParametersDTO()->version;
    }

    public function isEmpty(): bool
    {
        try
        {
            return $this->getQRExtendedParametersDTO()->empty;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified QRExtendedParameters value.
     *
     * @param QRExtendedParameters $obj An object value to compare to this instance.
     * @return bool true if obj has the same value as this instance; otherwise, false.
     */
    public function equals(QRExtendedParameters $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->QRExtendedParameters_equals($this->getQRExtendedParametersDTO(), $obj->getQRExtendedParametersDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }

    /**
     * Returns a human-readable string representation of this QRExtendedParameters.
     *
     * @return string A string that represents this QRExtendedParameters.
     */
    public function toString(): string
    {
        try
        {
            return $this->getQRExtendedParametersDTO()->toString;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}