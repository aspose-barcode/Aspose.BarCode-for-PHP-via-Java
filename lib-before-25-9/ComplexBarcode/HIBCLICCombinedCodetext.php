<?php

namespace Aspose\Barcode\ComplexBarcode;

use Aspose\Barcode\ComplexBarcode\ComplexCodetextType;
use Aspose\Barcode\ComplexBarcode\HIBCLICComplexCodetext;
use Aspose\Barcode\Internal\ThriftConnection;
use Aspose\Barcode\obj;
use Aspose\Barcode\ComplexBarcode\PrimaryData;
use Aspose\Barcode\ComplexBarcode\SecondaryAndAdditionalData;

/**
 * <p>
 * Class for encoding and decoding the text embedded in the HIBC LIC code which stores primary and secodary data.
 * </p><p><hr><blockquote><pre>
 * This sample shows how to encode and decode HIBC LIC using HIBCLICCombinedCodetext.
 * <pre>
 *
 * $combinedCodetext = new HIBCLICCombinedCodetext();
 * $combinedCodetext->setBarcodeType(EncodeTypes::HIBCQRLIC);
 * $combinedCodetext->setPrimaryData(new PrimaryData());
 * $combinedCodetext->getPrimaryData()->setProductOrCatalogNumber("12345");
 * $combinedCodetext->getPrimaryData()->setLabelerIdentificationCode("A999");
 * $combinedCodetext->getPrimaryData()->setUnitOfMeasureID(1);
 * $combinedCodetext->setSecondaryAndAdditionalData(new SecondaryAndAdditionalData());
 * $combinedCodetext->getSecondaryAndAdditionalData()->setExpiryDate(new Date());
 * $combinedCodetext->getSecondaryAndAdditionalData()->setExpiryDateFormat(HIBCLICDateFormat.MMDDYY);
 * $combinedCodetext->getSecondaryAndAdditionalData()->setQuantity(30);
 * $combinedCodetext->getSecondaryAndAdditionalData()->setLotNumber("LOT123");
 * $combinedCodetext->getSecondaryAndAdditionalData()->setSerialNumber("SERIAL123");
 * $combinedCodetext->getSecondaryAndAdditionalData()->setDateOfManufacture(new Date());
 * ComplexBarcodeGenerator generator = new ComplexBarcodeGenerator(combinedCodetext);
 * {
 *     $image = $generator->generateBarCodeImage(BarCodeImageFormat::PNG);
 *     $reader = new BarCodeReader($image, null, DecodeType::HIBCQRLIC);
 *     {
 *         $reader->readBarCodes();
 *         $codetext = $reader->getFoundBarCodes()[0]->getCodeText();
 *         $result = ComplexCodetextReader::tryDecodeHIBCLIC($codetext) ;
 *         print("Product or catalog number: " . $result->getPrimaryData()->getProductOrCatalogNumber());
 *         print("Labeler identification code: " . $result->getPrimaryData()->getLabelerIdentificationCode());
 *         print("Unit of measure ID: " . $result->getPrimaryData()->getUnitOfMeasureID());
 *         print("Expiry date: " . $result->getSecondaryAndAdditionalData()->getExpiryDate());
 *         print("Quantity: " . $result->getSecondaryAndAdditionalData()->getQuantity());
 *         print("Lot number: " . $result->getSecondaryAndAdditionalData()->getLotNumber());
 *         print("Serial number: " . $result->getSecondaryAndAdditionalData()->getSerialNumber());
 *         print("Date of manufacture: " . $result->getSecondaryAndAdditionalData()->getDateOfManufacture());
 *     }
 * }
 * </pre>
 * </pre></blockquote></hr></p>
 */
class HIBCLICCombinedCodetext extends HIBCLICComplexCodetext
{
    function __construct()
    {
        $this->setIComplexCodetextDTO($this->obtainDto());
        $this->getIComplexCodetextDTO()->complexCodetextType = ComplexCodetextType::HIBCLICCombinedCodetext;
        $this->initFieldsFromDto();
    }

    static function construct($javaClass): HIBCLICCombinedCodetext
    {
        $obj = new HIBCLICCombinedCodetext();
        $obj->setIComplexCodetextDTO($javaClass);
        $obj->initFieldsFromDto();
        return $obj;
    }

    public function obtainDto(...$args)
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $complexCodetextDTO = $client->HIBCLICCombinedCodetext_ctor();
        $thriftConnection->closeConnection();
        return $complexCodetextDTO;
    }

    public function initFieldsFromDto()
    {
        $this->auto_PrimaryData = PrimaryData::construct($this->getIComplexCodetextDTO()->primaryData);
        $this->auto_SecondaryAndAdditionalData = SecondaryAndAdditionalData::construct($this->getIComplexCodetextDTO()->secondaryAndAdditionalData);
    }

    /**
     * <p>
     * Identifies primary data.
     * </p>
     */
    public function getPrimaryData(): PrimaryData
    {
        return $this->auto_PrimaryData;
    }

    /**
     * <p>
     * Identifies primary data.
     * </p>
     */
    public function setPrimaryData(PrimaryData $value): void
    {
        $this->getIComplexCodetextDTO()->primaryData = ($value->getPrimaryDataDto());
        $this->auto_PrimaryData = $value;
    }

    private $auto_PrimaryData;

    /**
     * <p>
     * Identifies secondary and additional supplemental data.
     * </p>
     */
    public function getSecondaryAndAdditionalData(): SecondaryAndAdditionalData
    {
        return $this->auto_SecondaryAndAdditionalData;
    }

    /**
     * <p>
     * Identifies secondary and additional supplemental data.
     * </p>
     */
    public function setSecondaryAndAdditionalData(SecondaryAndAdditionalData $value): void
    {
        $this->getIComplexCodetextDTO()->secondaryAndAdditionalData = ($value->getSecondaryAndAdditionalDataDto());
        $this->auto_SecondaryAndAdditionalData = $value;
    }

    private $auto_SecondaryAndAdditionalData;

    /**
     * <p>
     * Constructs codetext
     * </p>
     *
     * @return string Constructed codetext
     */
    public function getConstructedCodetext(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $constructedCodetext = $client->HIBCLICCombinedCodetext_getConstructedCodetext($this->getIComplexCodetextDTO());
        $thriftConnection->closeConnection();
        return $constructedCodetext;
    }

    /**
     * <p>
     * Initializes instance from constructed codetext.
     * </p>
     *
     * @param string constructedCodetext Constructed codetext.
     * @return void
     */
    public function initFromString(string $constructedCodetext): void
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $HIBCLICCombinedCodetextDTO = $client->HIBCLICCombinedCodetext_initFromString($this->getIComplexCodetextDTO(), $constructedCodetext);
        $this->setIComplexCodetextDTO($HIBCLICCombinedCodetextDTO);
        $thriftConnection->closeConnection();
        $this->initFieldsFromDto();
    }

    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code HIBCLICCombinedCodetext} value.
     * </p>
     *
     * @param obj An {@code HIBCLICCombinedCodetext} value to compare to this instance.
     * @return {@code <b>true</b>} if obj has the same value as this instance; otherwise, {@code <b>false</b>}.
     */
    public function equals(HIBCLICCombinedCodetext $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEqual = $client->HIBCLICCombinedCodetext_equals($this->getIComplexCodetextDTO(), $obj->getIComplexCodetextDTO());
        $thriftConnection->closeConnection();
        return $isEqual;
    }
}