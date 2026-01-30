<?php

namespace Aspose\Barcode\Recognition;

use Aspose\Barcode\Bridge\DotCodeExtendedParametersDTO;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * <p>
 * Stores special data of DotCode recognized barcode
 * </p><p><hr><blockquote><pre>
 * This sample shows how to get DotCode raw values
 * <pre>
 *
 * $generator = new BarcodeGenerator(EncodeTypes::DOT_CODE, "12345");
 * {
 *     $generator->save("c:\\test.png", BarCodeImageFormat::PNG);
 * }
 * $reader = new BarCodeReader("c:\\test.png", null, DecodeType::DOT_CODE);
 * {
 *     foreach($reader->readBarCodes() as $result)
 *     {
 *         print("BarCode type: " . $result->getCodeTypeName());
 *         print("BarCode codetext: " . $result->getCodeText());
 *         print("DotCode barcode ID: " . $result->getExtended()->getDotCode()->getDotCodeStructuredAppendModeBarcodeId());
 *         print("DotCode barcodes count: " . $result->getExtended()->getDotCode()->getDotCodeStructuredAppendModeBarcodesCount());
 *     }
 * }
 * </pre>
 * </pre></blockquote></hr></p>
 */
class DotCodeExtendedParameters implements Communicator
{
    private DotCodeExtendedParametersDTO $dotCodeExtendedParametersDTO;

    /**
     * @return DotCodeExtendedParametersDTO instance
     */
    private function getDotCodeExtendedParametersDTO(): DotCodeExtendedParametersDTO
    {
        return $this->dotCodeExtendedParametersDTO;
    }

    /**
     * @param $dotCodeExtendedParametersDTO
     */
    private function setDotCodeExtendedParametersDTO($dotCodeExtendedParametersDTO): void
    {
        $this->dotCodeExtendedParametersDTO = $dotCodeExtendedParametersDTO;
    }

    function __construct(DotCodeExtendedParametersDTO $dotCodeExtendedParametersDTO)
    {
        $this->dotCodeExtendedParametersDTO = $dotCodeExtendedParametersDTO;
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
     * <p>Gets the DotCode structured append mode barcodes count. Default value is -1. Count must be a value from 1 to 35.</p>
     * Value: The count of the DotCode structured append mode barcode.
     * @return the DotCode structured append mode barcodes count.
     */
    public function getStructuredAppendModeBarcodesCount(): int
    {
        return $this->getDotCodeExtendedParametersDTO()->structuredAppendModeBarcodesCount;
    }

    /**
     * <p>Gets the DotCode structured append mode barcodes count. Default value is -1. Count must be a value from 1 to 35.</p>Value: The count of the DotCode structured append mode barcode.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getStructuredAppendModeBarcodesCount().
     */
    public function getDotCodeStructuredAppendModeBarcodesCount(): int
    {
        return $this->getDotCodeExtendedParametersDTO()->structuredAppendModeBarcodesCount;
    }

    /**
     * <p>Gets the ID of the DotCode structured append mode barcode. ID starts from 1 and must be less or equal to barcodes count. Default value is -1.</p>
     * Value: The ID of the DotCode structured append mode barcode.
     * @return the ID of the DotCode structured append mode barcode.
     */
    public function getStructuredAppendModeBarcodeId(): int
    {
        return $this->getDotCodeExtendedParametersDTO()->structuredAppendModeBarcodeId;
    }

    /**
     * <p>Gets the ID of the DotCode structured append mode barcode. ID starts from 1 and must be less or equal to barcodes count. Default value is -1.</p>Value: The ID of the DotCode structured append mode barcode.
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the getStructuredAppendModeBarcodeId().
     */
    public function getDotCodeStructuredAppendModeBarcodeId(): int
    {
        return $this->getDotCodeExtendedParametersDTO()->structuredAppendModeBarcodeId;
    }

    /**
     * <p>
     * Indicates whether code is used for instruct reader to interpret the following data as instructions for initialization or reprogramming of the bar code reader.
     * Default value is false.
     * </p>
     */
    public function isReaderInitialization(): bool
    {
        return $this->getDotCodeExtendedParametersDTO()->isReaderInitialization;
    }

    /**
     * <p>
     * Indicates whether code is used for instruct reader to interpret the following data as instructions for initialization or reprogramming of the bar code reader.
     * Default value is false.
     * </p>
     * @deprecated This property is obsolete and will be removed in future releases. Instead, use the isReaderInitialization().
     */
    public function getDotCodeIsReaderInitialization(): bool
    {
        return $this->getDotCodeExtendedParametersDTO()->isReaderInitialization;
    }

    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code DotCodeExtendedParameters} value.
     * </p>
     * @param DotCodeExtendedParameters $obj
     * @return bool ```php
     */
    public function equals(DotCodeExtendedParameters $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->DotCodeExtendedParameters_equals($this->getDotCodeExtendedParametersDTO(), $obj->getDotCodeExtendedParametersDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }

    /**
     * <p>
     * Returns a human-readable string representation of this {@code DotCodeExtendedParameters}.
     * </p>
     * @return string that represents this {@code DotCodeExtendedParameters}.
     */
    public function toString(): string
    {
        return $this->getDotCodeExtendedParametersDTO()->toString;
    }
}