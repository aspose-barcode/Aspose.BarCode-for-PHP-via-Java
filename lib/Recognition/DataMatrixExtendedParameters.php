<?php

namespace Aspose\Barcode\Recognition;

use Aspose\Barcode\Bridge\DataMatrixExtendedParametersDTO;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * <p>
 * Stores special data of DataMatrix recognized barcode
 * </p><p><hr><blockquote><pre>
 * This sample shows how to get DataMatrix raw values
 * <pre>
 * $generator = new BarcodeGenerator(EncodeTypes.DATA_MATRIX, "12345"))
 * $generator->save("c:\\test.png", BarcodeImageFormat::PNG);
 *
 * $reader = new BarCodeReader("c:\\test.png", null, DecodeType::DATA_MATRIX))
 * foreach($reader->readBarCodes() as $result)
 * {
 *    echo("BarCode type: " . $result->getCodeTypeName());
 *    echo("BarCode codetext: " . $result->getCodeText());
 *    echo("DataMatrix barcode ID: " . $result->getExtended()->getDataMatrix()->getStructuredAppendBarcodeId());
 *    echo("DataMatrix barcodes count: " . $result->getExtended()->getDataMatrix()->getStructuredAppendBarcodesCount());
 *    echo("DataMatrix file ID: " . $result->getExtended()->getDataMatrix()->getStructuredAppendFileId());
 *    echo("DataMatrix is reader programming: " . $result->getExtended()->getDataMatrix()->isReaderProgramming());
 * }
 * </pre>
 * </pre></blockquote></hr></p>
 */
class DataMatrixExtendedParameters implements Communicator
{
    private DataMatrixExtendedParametersDTO $dataMatrixExtendedParametersDTO;

    /**
     * @return DataMatrixExtendedParametersDTO instance
     */
    private function getDataMatrixExtendedParametersDTO(): DataMatrixExtendedParametersDTO
    {
        return $this->dataMatrixExtendedParametersDTO;
    }

    /**
     * @param $dataMatrixExtendedParametersDTO
     */
    private function setDataMatrixExtendedParametersDTO($dataMatrixExtendedParametersDTO): void
    {
        $this->dataMatrixExtendedParametersDTO = $dataMatrixExtendedParametersDTO;
    }

    function __construct(DataMatrixExtendedParametersDTO $dataMatrixExtendedParametersDTO)
    {
        $this->dataMatrixExtendedParametersDTO = $dataMatrixExtendedParametersDTO;
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
     * <p>Gets the DataMatrix structured append mode barcodes count. Default value is -1. Count must be a value from 1 to 35.</p>Value: The count of the DataMatrix structured append mode barcode.
     */
    public function getStructuredAppendBarcodesCount(): int
    {
        return $this->getDataMatrixExtendedParametersDTO()->structuredAppendBarcodesCount;
    }

    /**
     * <p>Gets the ID of the DataMatrix structured append mode barcode. ID starts from 1 and must be less or equal to barcodes count. Default value is -1.</p>Value: The ID of the DataMatrix structured append mode barcode.
     */
    public function getStructuredAppendBarcodeId(): int
    {
        return $this->getDataMatrixExtendedParametersDTO()->structuredAppendBarcodeId;
    }

    /**
     * <p>Gets the ID of the DataMatrix structured append mode barcode. ID starts from 1 and must be less or equal to barcodes count. Default value is -1.</p>Value: The ID of the DataMatrix structured append mode barcode.
     */
    public function getStructuredAppendFileId(): int
    {
        return $this->getDataMatrixExtendedParametersDTO()->structuredAppendFileId;
    }

    /**
     * <p>
     * Indicates whether code is used for instruct reader to interpret the following data as instructions for initialization or reprogramming of the bar code reader.
     * Default value is false.
     * </p>
     */
    public function isReaderProgramming(): bool
    {
        return $this->getDataMatrixExtendedParametersDTO()->readerProgramming;
    }

    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code DataMatrixExtendedParameters} value.
     * </p>
     * @param DataMatrixExtendedParameters $obj
     * @return bool ```php
     */
    public function equals(DataMatrixExtendedParameters $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->DataMatrixExtendedParameters_equals($this->getDataMatrixExtendedParametersDTO(), $obj->getDataMatrixExtendedParametersDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }

    /**
     * <p>
     * Returns a human-readable string representation of this {@code DataMatrixExtendedParameters}.
     * </p>
     * @return string that represents this {@code DataMatrixExtendedParameters}.
     */
    public function toString(): string
    {
        return $this->getDataMatrixExtendedParametersDTO()->toString;
    }
}