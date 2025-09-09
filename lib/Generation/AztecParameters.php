<?php

namespace Aspose\Barcode\Generation;

use Aspose\Barcode\Bridge\AztecParametersDTO;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * Aztec parameters.
 */
class AztecParameters implements Communicator
{
    private $aztecParametersDto;

    private function getAztecParametersDto(): AztecParametersDTO
    {
        return $this->aztecParametersDto;
    }

    private function setAztecParametersDto(AztecParametersDTO $aztecParametersDto): void
    {
        $this->aztecParametersDto = $aztecParametersDto;
    }

    function __construct(AztecParametersDTO $aztecParametersDto)
    {
        $this->aztecParametersDto = $aztecParametersDto;
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
     * Gets a Aztec encode mode.
     * Default value: Auto.
     * </p>
     */
    public function getAztecEncodeMode(): int
    {
        return $this->getAztecParametersDto()->aztecEncodeMode;
    }

    /**
     * <p>
     * Sets a Aztec encode mode.
     * Default value: Auto.
     * </p>
     */
    public function setAztecEncodeMode(int $value): void
    {
        $this->getAztecParametersDto()->aztecEncodeMode = $value;
    }

    /**
     * <p>
     * Gets ECI encoding. Used when AztecEncodeMode is Auto.
     * Default value: ISO-8859-1
     * </p>
     */
    public function getECIEncoding(): int
    {
        return $this->getAztecParametersDto()->ECIEncoding;
    }

    /**
     * <p>
     * Gets ECI encoding. Used when AztecEncodeMode is Auto.
     * Default value: ISO-8859-1
     * </p>
     */
    public function setECIEncoding(int $value): void
    {
        $this->getAztecParametersDto()->ECIEncoding = $value;
    }

    /**
     * <p>
     * Barcode ID for Structured Append mode of Aztec barcode. Barcode ID should be in range from 1 to barcodes count.
     * Default value: 0
     * </p>
     */
    public function getStructuredAppendBarcodeId(): int
    {
        return $this->getAztecParametersDto()->structuredAppendBarcodeId;
    }

    /**
     * <p>
     * Barcode ID for Structured Append mode of Aztec barcode. Barcode ID should be in range from 1 to barcodes count.
     * Default value: 0
     * </p>
     */
    public function setStructuredAppendBarcodeId(int $value): void
    {
        $this->getAztecParametersDto()->structuredAppendBarcodeId = $value;
    }

    /**
     * <p>
     * Barcodes count for Structured Append mode of Aztec barcode. Barcodes count should be in range from 1 to 26.
     * Default value: 0
     * </p>
     */
    public function getStructuredAppendBarcodesCount(): int
    {
        return $this->getAztecParametersDto()->structuredAppendBarcodesCount;
    }

    /**
     * <p>
     * Barcodes count for Structured Append mode of Aztec barcode. Barcodes count should be in range from 1 to 26.
     * Default value: 0
     * </p>
     */
    public function setStructuredAppendBarcodesCount(int $value): void
    {
        $this->getAztecParametersDto()->structuredAppendBarcodesCount = $value;
    }

    /**
     * <p>
     * File ID for Structured Append mode of Aztec barcode (optional field). File ID should not contain spaces.
     * Default value: empty string
     * </p>
     */
    public function getStructuredAppendFileId(): string
    {
        return $this->getAztecParametersDto()->structuredAppendFileId;
    }

    /**
     * <p>
     * File ID for Structured Append mode of Aztec barcode (optional field). File ID should not contain spaces.
     * Default value: empty string
     * </p>
     */
    public function setStructuredAppendFileId(string $value): void
    {
        $this->getAztecParametersDto()->structuredAppendFileId = $value;
    }

    /**
     * <p>
     * Level of error correction of Aztec types of barcode.
     * Value should between 5 to 95.
     * </p>
     */
    public function getAztecErrorLevel(): int
    {
        return $this->getAztecParametersDto()->aztecErrorLevel;
    }

    /**
     * <p>
     * Level of error correction of Aztec types of barcode.
     * Value should between 5 to 95.
     * </p>
     */
    public function setAztecErrorLevel(int $value): void
    {
        $this->getAztecParametersDto()->aztecErrorLevel = $value;
    }

    /**
     * <p>
     * Gets a Aztec Symbol mode.
     * Default value: AztecSymbolMode.Auto.
     * </p>
     */
    public function getAztecSymbolMode(): int
    {
        return $this->getAztecParametersDto()->aztecSymbolMode;
    }

    /**
     * <p>
     * Sets a Aztec Symbol mode.
     * Default value: AztecSymbolMode.Auto.
     * </p>
     */
    public function setAztecSymbolMode(int $value): void
    {
        $this->getAztecParametersDto()->aztecSymbolMode = $value;
    }

    /**
     * <p>
     * Gets layers count of Aztec symbol. Layers count should be in range from 1 to 3 for Compact mode and
     * in range from 1 to 32 for Full Range mode.
     * Default value: 0 (auto).
     * </p>
     */
    public function getLayersCount(): int
    {
        return $this->getAztecParametersDto()->layersCount;
    }

    /**
     * <p>
     * Sets layers count of Aztec symbol. Layers count should be in range from 1 to 3 for Compact mode and
     * in range from 1 to 32 for Full Range mode.
     * Default value: 0 (auto).
     * </p>
     */
    public function setLayersCount(int $value): void
    {
        $this->getAztecParametersDto()->layersCount = $value;
    }

    /**
     * <p>
     * Used to instruct the reader to interpret the data contained within the symbol
     * as programming for reader initialization.
     * </p>
     */
    public function isReaderInitialization(): bool
    {
        return $this->getAztecParametersDto()->isReaderInitialization;
    }

    /**
     * <p>
     * Used to instruct the reader to interpret the data contained within the symbol
     * as programming for reader initialization.
     * </p>
     */
    public function setReaderInitialization(bool $value): void
    {
        $this->getAztecParametersDto()->isReaderInitialization = $value;
    }

    /**
     * <p>
     * Height/Width ratio of 2D BarCode module.
     * </p>
     */
    public function getAspectRatio(): float
    {
        return $this->getAztecParametersDto()->aspectRatio;
    }

    /**
     * <p>
     * Height/Width ratio of 2D BarCode module.
     * </p>
     */
    public function setAspectRatio(float $value): void
    {
        $this->getAztecParametersDto()->aspectRatio = $value;
    }

    /**
     * <p>
     * Returns a human-readable string representation of this {@code AztecParameters}.
     * </p>
     * @return string that represents this {@code AztecParameters}.
     */
    public function toString(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $str = $client->AztecParameters_toString($this->getAztecParametersDto());
        $thriftConnection->closeConnection();

        return $str;
    }
}