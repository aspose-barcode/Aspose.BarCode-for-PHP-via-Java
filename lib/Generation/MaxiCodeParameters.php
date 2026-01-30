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
     * <p>
     * Gets a MaxiCode encode mode.
     * </p>
     * @return a MaxiCode encode mode.
     */
    public function getMode(): int
    {
        return $this->getMaxiCodeParametersDto()->mode;
    }

    /**
     * <p>
     * Sets a MaxiCode encode mode.
     * </p>
     * @param value a MaxiCode encode mode.
     */
    public function setMode(int $value): void
    {
        $this->getMaxiCodeParametersDto()->mode = $value;
    }

    /**
     * Gets a MaxiCode encode mode.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getMode().
     */
    public function getMaxiCodeMode(): int
    {
        return $this->getMaxiCodeParametersDto()->mode;
    }

    /**
     * Sets a MaxiCode encode mode.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setMode().
     */
    public function setMaxiCodeMode(int $maxiCodeMode): void
    {
        $this->getMaxiCodeParametersDto()->mode = $maxiCodeMode;
    }

    /**
     * <p>
     * Gets a MaxiCode encode mode.
     * Default value: Auto.
     * </p>
     * @return a MaxiCode encode mode.
     */
    public function getEncodeMode(): int
    {
        return $this->getMaxiCodeParametersDto()->encodeMode;
    }

    /**
     * <p>
     * Sets a MaxiCode encode mode.
     * Default value: Auto.
     * </p>
     * @param value a MaxiCode encode mode.
     */
    public function setEncodeMode(int $value): void
    {
        $this->getMaxiCodeParametersDto()->encodeMode = $value;
    }

    /**
     * Gets a MaxiCode encode mode.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getEncodeMode().
     */
    public function getMaxiCodeEncodeMode(): int
    {
        try
        {
            return $this->getMaxiCodeParametersDto()->encodeMode;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets a MaxiCode encode mode.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setEncodeMode().
     */
    public function setMaxiCodeEncodeMode(int $value): void
    {
        try
        {
            $this->getMaxiCodeParametersDto()->encodeMode = $value;
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
        return $this->getMaxiCodeParametersDto()->eciEncoding;
    }

    /**
     * Sets ECI encoding. Used when MaxiCodeEncodeMode is AUTO.
     * Default value: ISO-8859-1
     */
    public function setECIEncoding(int $ECIEncoding): void
    {
        $this->getMaxiCodeParametersDto()->eciEncoding = $ECIEncoding;
    }

    /**
     * Gets a MaxiCode barcode id in structured append mode.
     * ID must be a value between 1 and 8.
     * Default value: 0
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getStructuredAppendModeBarcodeId().
     */
    public function getMaxiCodeStructuredAppendModeBarcodeId(): int
    {
        return $this->getMaxiCodeParametersDto()->structuredAppendModeBarcodeId;
    }

    /**
     * <p>
     * Gets a MaxiCode barcode id in structured append mode.
     * ID must be a value between 1 and 8.
     * Default value: 0
     * </p>
     * @return a MaxiCode barcode id in structured append mode.
     */
    public function getStructuredAppendModeBarcodeId(): int
    {
        return $this->getMaxiCodeParametersDto()->structuredAppendModeBarcodeId;
    }

    /**
     * <p>
     * Sets a MaxiCode barcode id in structured append mode.
     * ID must be a value between 1 and 8.
     * Default value: 0
     * </p>
     * @param value a MaxiCode barcode id in structured append mode.
     */
    public function setStructuredAppendModeBarcodeId(int $value): void
    {
        $this->getMaxiCodeParametersDto()->structuredAppendModeBarcodeId = $value;
    }

    /**
     * Sets a MaxiCode barcode id in structured append mode.
     * ID must be a value between 1 and 8.
     * Default value: 0
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setStructuredAppendModeBarcodeId().
     */
    public function setMaxiCodeStructuredAppendModeBarcodeId(int $maxiCodeStructuredAppendModeBarcodeId): void
    {
        $this->getMaxiCodeParametersDto()->maxiCodeStructuredAppendModeBarcodeId = $maxiCodeStructuredAppendModeBarcodeId;
    }

    /**
     * <p>
     * Gets a MaxiCode barcodes count in structured append mode.
     * Count number must be a value between 2 and 8 (maximum barcodes count).
     * Default value: -1
     * </p>
     * @return a MaxiCode barcodes count in structured append mode.
     */
    public function getStructuredAppendModeBarcodesCount(): int
    {
        return $this->getMaxiCodeParametersDto()->structuredAppendModeBarcodesCount;
    }

    /**
     * <p>
     * Sets a MaxiCode barcodes count in structured append mode.
     * Count number must be a value between 2 and 8 (maximum barcodes count).
     * Default value: -1
     * </p>
     * @param value a MaxiCode barcodes count in structured append mode.
     */
    public function setStructuredAppendModeBarcodesCount(int $value): void
    {
        $this->getMaxiCodeParametersDto()->structuredAppendModeBarcodesCount = $value;
    }

    /**
     * Gets a MaxiCode barcodes count in structured append mode.
     * Count number must be a value between 2 and 8 (maximum barcodes count).
     * Default value: -1
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getStructuredAppendModeBarcodesCount().
     */
    public function getMaxiCodeStructuredAppendModeBarcodesCount(): int
    {
        return $this->getMaxiCodeParametersDto()->structuredAppendModeBarcodesCount;
    }

    /**
     * Sets a MaxiCode barcodes count in structured append mode.
     * Count number must be a value between 2 and 8 (maximum barcodes count).
     * Default value: -1
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the setStructuredAppendModeBarcodesCount().
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