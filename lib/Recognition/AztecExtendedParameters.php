<?php

namespace Aspose\Barcode\Recognition;

use Aspose\Barcode\Bridge\AztecExtendedParametersDTO;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * Stores special data of Aztec recognized barcode *
 * This sample shows how to get Aztec raw values
 *
 * @code
 * $generator = new BarcodeGenerator(EncodeTypes::AZTEC, "12345");
 * $generator->save("test.png", BarcodeImageFormat::PNG);
 *
 * $reader = new BarCodeReader("test.png", null, DecodeType::AZTEC);
 * foreach($reader->readBarCodes() as $result)
 * {
 *     echo("BarCode type: " . $result->getCodeTypeName());
 *     echo("BarCode codetext: " . $result->getCodeText());
 *     echo("Aztec barcode ID: " . $result->getExtended()->getAztec()->getStructuredAppendBarcodeId());
 *     echo("Aztec barcodes count: " . $result->getExtended()->getAztec()->getStructuredAppendBarcodesCount());
 *     echo("Aztec file ID: " . $result->getExtended()->getAztec()->getStructuredAppendFileId());
 *     echo("Aztec is reader initialization: " . $result->getExtended()->getAztec()->isReaderInitialization());
 * }
 * @endcode
 */
class AztecExtendedParameters implements Communicator
{
    private AztecExtendedParametersDTO $aztecExtendedParametersDTO;

    /**
     * @return AztecExtendedParametersDTO instance
     */
    private function getAztecExtendedParametersDTO(): AztecExtendedParametersDTO
    {
        return $this->aztecExtendedParametersDTO;
    }

    /**
     * @param $aztecExtendedParametersDTO
     */
    private function setAztecExtendedParametersDTO($aztecExtendedParametersDTO): void
    {
        $this->aztecExtendedParametersDTO = $aztecExtendedParametersDTO;
    }

    function __construct(AztecExtendedParametersDTO $aztecExtendedParametersDTO)
    {
        $this->aztecExtendedParametersDTO = $aztecExtendedParametersDTO;
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
     * <p>Gets the Aztec structured append mode barcodes count. Default value is 0. Count must be a value from 1 to 26.</p>Value: The barcodes count of the Aztec structured append mode.
     */
    public function getStructuredAppendBarcodesCount(): int
    {
        return $this->getAztecExtendedParametersDTO()->structuredAppendBarcodesCount;
    }

    /**
     * <p>Gets the ID of the Aztec structured append mode barcode. ID starts from 1 and must be less or equal to barcodes count. Default value is 0.</p>Value: The barcode ID of the Aztec structured append mode.
     */
    public function getStructuredAppendBarcodeId(): int
    {
        return $this->getAztecExtendedParametersDTO()->structuredAppendBarcodeId;
    }

    /**
     * <p>Gets the File ID of the Aztec structured append mode. Default value is empty string</p>Value: The File ID of the Aztec structured append mode.
     */
    public function getStructuredAppendFileId(): string
    {
        return $this->getAztecExtendedParametersDTO()->structuredAppendFileId;
    }

    /**
     * <p>
     * Indicates whether code is used for instruct reader to interpret the following data as instructions for initialization or reprogramming of the bar code reader.
     * Default value is false.
     * </p>
     */
    public function isReaderInitialization(): bool
    {
        return $this->getAztecExtendedParametersDTO()->readerInitialization;
    }

    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code AztecExtendedParameters} value.
     * </p>
     * @param AztecExtendedParameters $obj
     * @return bool ```php
     */
    public function equals(AztecExtendedParameters $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->AztecExtendedParameters_equals($this->getAztecExtendedParametersDTO(), $obj->getAztecExtendedParametersDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }

    /**
     * <p>
     * Returns a human-readable string representation of this {@code AztecExtendedParameters}.
     * </p>
     * @return string that represents this {@code AztecExtendedParameters}.
     */
    public function toString(): string
    {
        return $this->getAztecExtendedParametersDTO()->toString;
    }
}