<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\QrStructuredAppendParametersDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;

/**
 * QR structured append parameters.
 */
class QrStructuredAppendParameters implements Communicator
{
    private $qrStructuredAppendParametersDto;

    function getQrStructuredAppendParametersDto(): QrStructuredAppendParametersDTO
    {
        return $this->qrStructuredAppendParametersDto;
    }

    private function setQrStructuredAppendParametersDto(QrStructuredAppendParametersDTO $qrStructuredAppendParametersDto): void
    {
        $this->qrStructuredAppendParametersDto = $qrStructuredAppendParametersDto;
    }

    function __construct(QrStructuredAppendParametersDTO $qrStructuredAppendParametersDto)
    {
        $this->qrStructuredAppendParametersDto = $qrStructuredAppendParametersDto;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
    }

    public function initFieldsFromDto(): void
    {
    }

    /**
     *  Gets the QR structured append mode parity data.
     */
    public function getParityByte(): int
    {
        try
        {
            return $this->getQrStructuredAppendParametersDto()->parityByte;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     *  Sets the QR structured append mode parity data.
     */
    public function setParityByte(int $value)
    {
        try
        {
            $this->getQrStructuredAppendParametersDto()->parityByte = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the index of the QR structured append mode barcode. Index starts from 0.
     */
    public function getSequenceIndicator(): int
    {
        try
        {
            return $this->getQrStructuredAppendParametersDto()->sequenceIndicator;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the index of the QR structured append mode barcode. Index starts from 0.
     */
    public function setSequenceIndicator(int $value)
    {
        try
        {
            $this->getQrStructuredAppendParametersDto()->sequenceIndicator = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the QR structured append mode barcodes quantity. Max value is 16.
     */
    public function getTotalCount(): int
    {
        try
        {
            return $this->getQrStructuredAppendParametersDto()->totalCount;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the QR structured append mode barcodes quantity. Max value is 16.
     */
    public function setTotalCount(int $value)
    {
        try
        {
            $this->getQrStructuredAppendParametersDto()->totalCount = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}