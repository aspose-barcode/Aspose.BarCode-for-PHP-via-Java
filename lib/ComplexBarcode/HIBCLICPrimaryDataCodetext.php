<?php

namespace Aspose\Barcode\ComplexBarcode;

use Aspose\Barcode\ComplexBarcode\ComplexCodetextType;
use Aspose\Barcode\ComplexBarcode\HIBCLICComplexCodetext;
use Aspose\Barcode\Internal\ThriftConnection;
use Aspose\Barcode\ComplexBarcode\PrimaryData;

/**
 * <p>
 * Class for encoding and decoding the text embedded in the HIBC LIC code which stores primary data.
 * </p><p><hr><blockquote><pre>
 * This sample shows how to encode and decode HIBC LIC using HIBCLICPrimaryCodetext.
 * <pre>
 * $complexCodetext  = new HIBCLICPrimaryCodetext();
 * $complexCodetext->setBarcodeType(EncodeTypes::HIBCQRLIC);
 * $complexCodetext->setData(new PrimaryData());
 * $complexCodetext->getData()->setProductOrCatalogNumber("12345");
 * $complexCodetext->getData()->setLabelerIdentificationCode("A999");
 * $complexCodetext->getData()->setUnitOfMeasureID(1);
 * $generator = new ComplexBarcodeGenerator($complexCodetext);
 * {
 *     $image = $generator->generateBarCodeImage(BarCodeImageFormat::PNG);
 *     $reader = new BarCodeReader($image, null, DecodeType::HIBCQRLIC);
 *     {
 *         $reader->readBarCodes();
 *         $codetext = $reader->getFoundBarCodes()[0]->getCodeText();
 *         $result = ComplexCodetextReader::tryDecodeHIBCLIC($codetext) ;
 *         print("Product or catalog number: " . $result->getData()->getProductOrCatalogNumber());
 *         print("Labeler identification code: " . $result->getData()->getLabelerIdentificationCode());
 *         print("Unit of measure ID: " . $result->getData()->getUnitOfMeasureID());
 *     }
 * }
 * </pre>
 * </pre></blockquote></hr></p>
 */
class HIBCLICPrimaryDataCodetext extends HIBCLICComplexCodetext
{

    function __construct()
    {
        $this->setIComplexCodetextDTO($this->obtainDto());
        $this->getIComplexCodetextDTO()->complexCodetextType = ComplexCodetextType::HIBCLICPrimaryDataCodetext;
        $this->initFieldsFromDto();
    }

    static function construct($HIBCLICPrimaryDataCodetextDto): HIBCLICPrimaryDataCodetext
    {
        $obj = new HIBCLICPrimaryDataCodetext();
        $obj->setIComplexCodetextDTO($HIBCLICPrimaryDataCodetextDto);
        return $obj;
    }

    public function obtainDto(...$args)
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $complexCodetextDTO = $client->HIBCLICPrimaryDataCodetext_ctor();
        $thriftConnection->closeConnection();
        return $complexCodetextDTO;
    }

    public function initFieldsFromDto()
    {
        $this->primaryData = PrimaryData::construct($this->getIComplexCodetextDTO()->primaryData);
    }

    private $primaryData;

    /**
     * <p>
     * Identifies primary data.
     * </p>
     */
    public function getData(): PrimaryData
    {
        return $this->primaryData;
    }

    /**
     * <p>
     * Identifies primary data.
     * </p>
     */
    public function setData(PrimaryData $value): void
    {
        $this->getIComplexCodetextDTO()->primaryData = $value->getPrimaryDataDto();
        $this->primaryData = $value;
    }

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
        $constructedCodetext = $client->HIBCLICPrimaryDataCodetext_getConstructedCodetext($this->getIComplexCodetextDTO());
        $thriftConnection->closeConnection();
        return $constructedCodetext;
    }

    /**
     * <p>
     * Initializes instance from constructed codetext.
     * </p>
     *
     * @param string constructedCodetext Constructed codetext.
     */
    public function initFromString(string $constructedCodetext): void
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $HIBCLICPrimaryDataCodetextDTO = $client->HIBCLICPrimaryDataCodetext_initFromString($this->getIComplexCodetextDTO(), $constructedCodetext);
        $this->setIComplexCodetextDTO($HIBCLICPrimaryDataCodetextDTO);
        $thriftConnection->closeConnection();
        $this->initFieldsFromDto();
    }

    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code HIBCLICPrimaryDataCodetext} value.
     * </p>
     *
     * @param bool obj An {@code HIBCLICPrimaryDataCodetext} value to compare to this instance.
     * @return {@code <b>true</b>} if obj has the same value as this instance; otherwise, {@code <b>false</b>}.
     */
    function equals(HIBCLICPrimaryDataCodetext $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEqual = $client->HIBCLICPrimaryDataCodetext_equals($this->getIComplexCodetextDTO(), $obj->getIComplexCodetextDTO());
        $thriftConnection->closeConnection();
        return $isEqual;
    }
}