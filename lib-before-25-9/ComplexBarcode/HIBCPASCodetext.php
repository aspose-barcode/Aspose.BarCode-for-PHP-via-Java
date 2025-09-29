<?php

namespace Aspose\Barcode\ComplexBarcode;

use Aspose\Barcode\ComplexBarcode\ComplexCodetextType;
use Aspose\Barcode\ComplexBarcode\IComplexCodetext;
use Aspose\Barcode\ComplexBarcode\HIBCPASRecord;
use Aspose\Barcode\Internal\ThriftConnection;
use Aspose\Barcode\List;

/**
 * <p>
 *  Class for encoding and decoding the text embedded in the HIBC PAS code.
 *  </p><p><hr><blockquote><pre>
 *  This sample shows how to encode and decode HIBC PAS using HIBCPASCodetext.
 *  <pre>
 *
 *  $complexCodetext = new HIBCPASComplexCodetext();
 *  $complexCodetext->setDataLocation(HIBCPASDataLocation::PATIENT);
 *  $complexCodetext->addRecord(HIBCPASDataType::LABELER_IDENTIFICATION_CODE, "A123");
 *  $complexCodetext->addRecord(HIBCPASDataType::MANUFACTURER_SERIAL_NUMBER, "SERIAL123");
 *  $complexCodetext->setBarcodeType(EncodeTypes::HIBC_DATA_MATRIX_PAS);
 *  $generator = new ComplexBarcodeGenerator($complexCodetext);
 *  {
 *      BarCodeReader reader = new BarCodeReader($generator->generateBarCodeImage(BarCodeImageFormat::PNG), null, DecodeType::HIBC_DATA_MATRIX_PAS);
 *      {
 *          $reader->readBarCodes();
 *          $codetext = $reader->getFoundBarCodes()[0]->getCodeText();
 *            $readCodetext = ComplexCodetextReader::tryDecodeHIBCPAS($codetext);
 *        print("Data location: " . $readCodetext->getDataLocation());
 *          print("Data type: " . $readCodetext->getRecords()[0]->getDataType());
 *          print("Data: " . $readCodetext->getRecords()[0]->getData());
 *          print("Data type: " . $readCodetext->getRecords()[1]->getDataType());
 *          print("Data: " . $readCodetext->getRecords()[1]->getData());
 *      }
 *  }
 *  </pre>
 *  </pre></blockquote></hr></p>
 */
class HIBCPASCodetext extends IComplexCodetext
{
    private $_recordsList;

    function __construct()
    {
        $this->setIComplexCodetextDTO($this->obtainDto());
        $this->initFieldsFromDto();
    }

    /**
     * <p>
     * HIBCPASRecord constructor
     * </p>
     */
    static function construct($HIBCPASCodetextDto): HIBCPASCodetext
    {
        $obj = new HIBCPASCodetext();
        $obj->setIComplexCodetextDTO($HIBCPASCodetextDto);
        $obj->initFieldsFromDto();
        return $obj;
    }

    public function obtainDto(...$args)
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $dtoRef = $client->HIBCPASCodetext_ctor();
        $thriftConnection->closeConnection();
        return $dtoRef;
    }

    public function initFieldsFromDto()
    {
        $this->_recordsList = array();
        foreach ($this->getIComplexCodetextDTO()->records as $recordDTO)
            array_push($this->_recordsList, HIBCPASRecord::construct($recordDTO));
        $this->getIComplexCodetextDTO()->complexCodetextType = ComplexCodetextType::HIBCPASCodetext;
    }

    /**
     * <p>
     * Gets or sets barcode type. HIBC PAS codetext can be encoded using HIBCCode39PAS, HIBCCode128PAS, HIBCAztec:PAS, HIBCDataMatrixPAS and HIBCQRPAS encode types.
     * Default value: HIBCCode39PAS.
     * </p>
     * @param int $value Barcode type.
     * @return void
     */
    public function setBarcodeType(int $value): void
    {
        $this->getIComplexCodetextDTO()->barcodeType = $value;
    }

    /**
     * <p>
     * Identifies data location.
     * </p>
     */
    public function getDataLocation(): int
    {
        return $this->getIComplexCodetextDTO()->dataLocation;
    }

    /**
     * <p>
     * Identifies data location.
     * </p>
     */
    public function setDataLocation(int $value): void
    {
        $this->getIComplexCodetextDTO()->dataLocation = $value;
    }

    /**
     * <p>
     * Gets records list
     * </p>
     * @return List of records
     */
    function getRecords(): array
    {
        return $this->_recordsList;
    }

    /**
     * <p>
     * Adds new record
     * </p>
     * @param int dataType Type of data
     * @param string data Data string
     */
    public function addRecord(int $dataType, string $data): void
    {
        $hibcPASRecord = new HIBCPASRecord($dataType, $data);

        array_push($this->_recordsList, $hibcPASRecord);
        array_push($this->getIComplexCodetextDTO()->records, $hibcPASRecord->getHIBCPASRecordDto());
    }

    /**
     * <p>
     * Adds new record
     * </p>
     * @param HIBCPASRecord record Record to be added
     * @return void
     */
    public function addHIBCPASRecord(HIBCPASRecord $record): void
    {
        array_push($this->_recordsList, $record);
        array_push($this->getIComplexCodetextDTO()->records, $record->getHIBCPASRecordDto());
    }

    /**
     * <p>
     * Clears records list
     * </p>
     */
    public function clear(): void
    {
        $this->_recordsList = array();
    }

    /**
     * <p>
     * Gets barcode type.
     * </p>
     * @return int Barcode type.
     */
    public function getBarcodeType(): int
    {
        return $this->getIComplexCodetextDTO()->barcodeType;
    }

    /**
     * <p>
     * Constructs codetext
     * </p>
     * @return string Constructed codetext
     */
    public function getConstructedCodetext(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $constructedCodetext = $client->HIBCPASCodetext_getConstructedCodetext($this->getIComplexCodetextDTO());
        $thriftConnection->closeConnection();
        return $constructedCodetext;
    }

    /**
     * <p>
     * Initializes instance from constructed codetext.
     * </p>
     * @param string constructedCodetext Constructed codetext.
     * @return void
     */
    public function initFromString(string $constructedCodetext): void
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $hibcPASCodetextDTO = $client->HIBCPASCodetext_initFromString($this->getIComplexCodetextDTO(), $constructedCodetext);
        $this->setIComplexCodetextDTO($hibcPASCodetextDTO);
        $thriftConnection->closeConnection();
        $this->initFieldsFromDto();
    }

    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code HIBCPASCodetext} value.
     * </p>
     * @param HIBCPASCodetext obj An {@code HIBCPASCodetext} value to compare to this instance.
     * @return bool true if obj has the same value as this instance; otherwise, false.
     */
    public function equals(HIBCPASCodetext $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->HIBCPASCodetext_equals($this->getIComplexCodetextDTO(), $obj->getIComplexCodetextDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }
}