<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\MaxiCodeParametersDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * MaxiCode parameters.
 */
class MaxiCodeParameters implements Communicator
{
    private $maxiCodeParametersDto;

    private function getMaxiCodeParametersDto(): MaxiCodeParametersDTO
    {
        return $this->maxiCodeParametersDto;
    }

    private function setMaxiCodeParametersDto(MaxiCodeParametersDTO $maxiCodeParametersDto): void
    {
        $this->maxiCodeParametersDto = $maxiCodeParametersDto;
    }

    function __construct(MaxiCodeParametersDTO $maxiCodeParametersDto)
    {
        $this->maxiCodeParametersDto = $maxiCodeParametersDto;
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
     * Gets a MaxiCode encode mode.
     */
    public function getMaxiCodeMode(): int
    {
        return $this->getMaxiCodeParametersDto()->maxiCodeMode;
    }

    /**
     * Sets a MaxiCode encode mode.
     */
    public function setMaxiCodeMode(int $maxiCodeMode): void
    {
        $this->getMaxiCodeParametersDto()->maxiCodeMode = $maxiCodeMode;
    }

    /**
     * Gets a MaxiCode encode mode.
     */
    public function getMaxiCodeEncodeMode(): int
    {
        try
        {
            return $this->getMaxiCodeParametersDto()->maxiCodeEncodeMode;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets a MaxiCode encode mode.
     */
    public function setMaxiCodeEncodeMode(int $value): void
    {
        try
        {
            $this->getMaxiCodeParametersDto()->maxiCodeEncodeMode = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets ECI encoding. Used when MaxiCodeEncodeMode is AUTO.
     * Default value: ISO-8859-1
     */
    public function getECIEncoding(): int
    {
        return $this->getMaxiCodeParametersDto()->eCIEncoding;
    }

    /**
     * Sets ECI encoding. Used when MaxiCodeEncodeMode is AUTO.
     * Default value: ISO-8859-1
     */
    public function setECIEncoding(int $ECIEncoding): void
    {
        $this->getMaxiCodeParametersDto()->eCIEncoding = $ECIEncoding;
    }

    /**
     * Gets a MaxiCode barcode id in structured append mode.
     * ID must be a value between 1 and 8.
     * Default value: 0
     */
    public function getMaxiCodeStructuredAppendModeBarcodeId(): int
    {
        return $this->getMaxiCodeParametersDto()->maxiCodeStructuredAppendModeBarcodeId;
    }

    /**
     * Sets a MaxiCode barcode id in structured append mode.
     * ID must be a value between 1 and 8.
     * Default value: 0
     */
    public function setMaxiCodeStructuredAppendModeBarcodeId(int $maxiCodeStructuredAppendModeBarcodeId): void
    {
        $this->getMaxiCodeParametersDto()->maxiCodeStructuredAppendModeBarcodeId = $maxiCodeStructuredAppendModeBarcodeId;
    }

    /**
     * Gets a MaxiCode barcodes count in structured append mode.
     * Count number must be a value between 2 and 8 (maximum barcodes count).
     * Default value: -1
     */
    public function getMaxiCodeStructuredAppendModeBarcodesCount(): int
    {
        return $this->getMaxiCodeParametersDto()->maxiCodeStructuredAppendModeBarcodesCount;
    }

    /**
     * Sets a MaxiCode barcodes count in structured append mode.
     * Count number must be a value between 2 and 8 (maximum barcodes count).
     * Default value: -1
     */
    public function setMaxiCodeStructuredAppendModeBarcodesCount(int $maxiCodeStructuredAppendModeBarcodesCount): void
    {
        $this->getMaxiCodeParametersDto()->maxiCodeStructuredAppendModeBarcodesCount = $maxiCodeStructuredAppendModeBarcodesCount;
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function getAspectRatio(): float
    {
        try
        {
            return $this->getMaxiCodeParametersDto()->aspectRatio;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function setAspectRatio(float $value): void
    {
        try
        {
            $this->getMaxiCodeParametersDto()->aspectRatio = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this MaxiCodeParameters.
     *
     * @return string that represents this MaxiCodeParameters.
     */
    public function toString(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $str = $client->MaxiCodeParameters_toString($this->getMaxiCodeParametersDto());
        $thriftConnection->closeConnection();

        return $str;
    }
}