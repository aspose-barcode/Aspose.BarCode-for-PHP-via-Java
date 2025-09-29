<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\DotCodeParametersDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * DotCode parameters.
 */
class DotCodeParameters implements Communicator
{
    private $dotCodeParametersDto;

    private function getDotCodeParametersDto(): DotCodeParametersDTO
    {
        return $this->dotCodeParametersDto;
    }

    private function setDotCodeParametersDto(DotCodeParametersDTO $dotCodeParametersDto): void
    {
        $this->dotCodeParametersDto = $dotCodeParametersDto;
    }

    function __construct(DotCodeParametersDTO $dotCodeParametersDto)
    {
        $this->dotCodeParametersDto = $dotCodeParametersDto;
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
     * <p>
     * Identifies DotCode encode mode.
     * Default value: Auto.
     * </p>
     */
    public function getDotCodeEncodeMode(): int
    {
        return $this->getDotCodeParametersDto()->dotCodeEncodeMode;
    }

    /**
     * <p>
     * Identifies DotCode encode mode.
     * Default value: Auto.
     * </p>
     */
    public function setDotCodeEncodeMode(int $value): void
    {
        $this->getDotCodeParametersDto()->dotCodeEncodeMode = $value;
    }

    /**
     * <p>
     * Indicates whether code is used for instruct reader to interpret the following data as instructions for initialization or reprogramming of the bar code reader.
     * Default value is false.
     * </p>
     */
    public function isReaderInitialization(): bool
    {
        return $this->getDotCodeParametersDto()->isReaderInitialization;
    }

    /**
     * <p>
     * Indicates whether code is used for instruct reader to interpret the following data as instructions for initialization or reprogramming of the bar code reader.
     * Default value is false.
     * </p>
     */
    public function setReaderInitialization(bool $value): void
    {
        $this->getDotCodeParametersDto()->isReaderInitialization = $value;
    }

    /**
     * <p>
     * Identifies the ID of the DotCode structured append mode barcode. ID starts from 1 and must be less or equal to barcodes count. Default value is -1.
     * </p>
     */
    public function getDotCodeStructuredAppendModeBarcodeId(): int
    {
        return $this->getDotCodeParametersDto()->dotCodeStructuredAppendModeBarcodeId;
    }

    /**
     * <p>
     * Identifies the ID of the DotCode structured append mode barcode. ID starts from 1 and must be less or equal to barcodes count. Default value is -1.
     * </p>
     */
    public function setDotCodeStructuredAppendModeBarcodeId(int $value)
    {
        $this->getDotCodeParametersDto()->dotCodeStructuredAppendModeBarcodeId = $value;
    }

    /**
     * <p>
     * Identifies DotCode structured append mode barcodes count. Default value is -1. Count must be a value from 1 to 35.
     * </p>
     */
    public function getDotCodeStructuredAppendModeBarcodesCount(): int
    {
        return $this->getDotCodeParametersDto()->dotCodeStructuredAppendModeBarcodesCount;
    }

    /**
     * <p>
     * Identifies DotCode structured append mode barcodes count. Default value is -1. Count must be a value from 1 to 35.
     * </p>
     */
    public function setDotCodeStructuredAppendModeBarcodesCount(int $value): void
    {
        $this->getDotCodeParametersDto()->dotCodeStructuredAppendModeBarcodesCount = $value;
    }

    /**
     * <p>
     * Identifies ECI encoding. Used when DotCodeEncodeMode is Auto.
     * Default value: ISO-8859-1
     * </p>
     */
    public function getECIEncoding(): int
    {
        return $this->getDotCodeParametersDto()->eCIEncoding;
    }

    /**
     * <p>
     * Identifies ECI encoding. Used when DotCodeEncodeMode is Auto.
     * Default value: ISO-8859-1
     * </p>
     */
    public function setECIEncoding(int $value): void
    {
        $this->getDotCodeParametersDto()->eCIEncoding = $value;
    }

    /**
     * <p>
     * Identifies rows count. Sum of the number of rows plus the number of columns of a DotCode symbol must be odd. Number of rows must be at least 5.
     * Default value: -1
     * </p>
     */
    public function getRows(): int
    {
        return $this->getDotCodeParametersDto()->rows;
    }

    /**
     * <p>
     * Identifies rows count. Sum of the number of rows plus the number of columns of a DotCode symbol must be odd. Number of rows must be at least 5.
     * Default value: -1
     * </p>
     */
    public function setRows(int $value): void
    {
        $this->getDotCodeParametersDto()->rows = $value;
    }

    /**
     * <p>
     * Identifies columns count. Sum of the number of rows plus the number of columns of a DotCode symbol must be odd. Number of columns must be at least 5.
     * Default value: -1
     * </p>
     */
    public function getColumns(): int
    {
        return $this->getDotCodeParametersDto()->columns;
    }

    /**
     * <p>
     * Identifies columns count. Sum of the number of rows plus the number of columns of a DotCode symbol must be odd. Number of columns must be at least 5.
     * Default value: -1
     * </p>
     */
    public function setColumns(int $value): void
    {
        $this->getDotCodeParametersDto()->columns = $value;
    }

    /**
     * Height/Width ratio of 2D BarCode module.
     */
    public function getAspectRatio(): float
    {
        try
        {
            return $this->getDotCodeParametersDto()->aspectRatio;
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
            $this->getDotCodeParametersDto()->aspectRatio = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this DotCodeParameters.
     *
     * @return string that represents this DotCodeParameters.
     */
    public function toString(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $str = $client->DotCodeParameters_toString($this->getDotCodeParametersDto());
        $thriftConnection->closeConnection();

        return $str;
    }
}