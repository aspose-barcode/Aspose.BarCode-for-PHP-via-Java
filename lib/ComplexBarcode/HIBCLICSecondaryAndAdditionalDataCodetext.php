<?php

namespace Aspose\Barcode\ComplexBarcode;

use Aspose\Barcode\Internal\ThriftConnection;


/**
 * Class for encoding and decoding the text embedded in the HIBC LIC code which stores seconday data.
 * @example
 * This sample shows how to encode and decode HIBC LIC using HIBCLICSecondaryAndAdditionalDataCodetext.
 *
 * @code
 * $complexCodetext = new HIBCLICSecondaryAndAdditionalDataCodetext();
 * $complexCodetext->setBarcodeType(EncodeTypes::HIBCQRLIC);
 * $complexCodetext->setLinkCharacter('L');
 * $complexCodetext->setData(new SecondaryAndAdditionalData());
 * $complexCodetext->getData()->setExpiryDate(new Date());
 * $complexCodetext->getData()->setExpiryDateFormat(HIBCLICDateFormat.MMDDYY);
 * $complexCodetext->getData()->setQuantity(30);
 * $complexCodetext->getData()->setLotNumber("LOT123");
 * $complexCodetext->getData()->setSerialNumber("SERIAL123");
 * $complexCodetext->getData()->setDateOfManufacture(new Date());
 * $generator = new ComplexBarcodeGenerator($complexCodetext);
 * $image = $generator->generateBarCodeImage(BarcodeImageFormat::PNG);
 * $reader = new BarCodeReader($image, null, DecodeType::HIBCQRLIC);
 * $reader->readBarCodes();
 * $codetext = $reader->getFoundBarCodes()[0]->getCodeText();
 * $result = ComplexCodetextReader::tryDecodeHIBCLIC($codetext);
 * print("Expiry date: " . $result->getData()->getExpiryDate());
 * print("Quantity: " . $result->getData()->getQuantity());
 * print("Lot number: " . $result->getData()->getLotNumber());
 * print("Serial number: " . $result->getData()->getSerialNumber());
 * print("Date of manufacture: " . $result->getData()->getDateOfManufacture());
 * </code>
 * </example>
 */
class HIBCLICSecondaryAndAdditionalDataCodetext extends HIBCLICComplexCodetext
{
    private $data;

    function __construct()
    {
        $this->setIComplexCodetextDTO($this->obtainDto());
        $this->getIComplexCodetextDTO()->complexCodetextType = ComplexCodetextType::HIBCLICSecondaryAndAdditionalDataCodetext;
        $this->initFieldsFromDto();
    }

    static function construct($java_class): HIBCLICSecondaryAndAdditionalDataCodetext
    {
        $obj = new HIBCLICSecondaryAndAdditionalDataCodetext();
        $obj->setIComplexCodetextDTO($java_class);
        $obj->initFieldsFromDto();
        return $obj;
    }

    public function obtainDto(...$args)
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $HIBCLICSecondaryAndAdditionalDataCodetextDTO = $client->HIBCLICSecondaryAndAdditionalDataCodetext_ctor();
        $thriftConnection->closeConnection();
        return $HIBCLICSecondaryAndAdditionalDataCodetextDTO;
    }

    public function initFieldsFromDto()
    {
        $this->data = SecondaryAndAdditionalData::construct($this->getIComplexCodetextDTO()->secondaryAndAdditionalData);
    }

    /**
     * <p>
     * Identifies secodary and additional supplemental data.
     * </p>
     */
    public function getData(): SecondaryAndAdditionalData
    {
        return $this->data;
    }

    /**
     * <p>
     * Identifies secodary and additional supplemental data.
     * </p>
     */
    public function setData(SecondaryAndAdditionalData $value): void
    {
        $this->getIComplexCodetextDTO()->secondaryAndAdditionalData = ($value->getSecondaryAndAdditionalDataDto());
        $this->data = $value;
    }

    /**
     * <p>
     * Identifies link character.
     * </p>
     */
    public function getLinkCharacter(): string
    {
        return $this->getIComplexCodetextDTO()->linkCharacter;
    }

    /**
     * <p>
     * Identifies link character.
     * </p>
     */
    public function setLinkCharacter(string $value): void
    {
        $this->getIComplexCodetextDTO()->linkCharacter = $value;
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
        $constructedCodetext = $client->HIBCLICSecondaryAndAdditionalDataCodetext_getConstructedCodetext($this->getIComplexCodetextDTO());
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
    function initFromString(string $constructedCodetext): void
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $HIBCLICSecondaryAndAdditionalDataCodetext = $client->HIBCLICSecondaryAndAdditionalDataCodetext_initFromString($this->getIComplexCodetextDTO(), $constructedCodetext);
        $this->setIComplexCodetextDTO($HIBCLICSecondaryAndAdditionalDataCodetext);
        $thriftConnection->closeConnection();
        $this->initFieldsFromDto();
    }

    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code HIBCLICSecondaryAndAdditionalDataCodetext} value.
     * </p>
     *
     * @param obj An {@code HIBCLICSecondaryAndAdditionalDataCodetext} value to compare to this instance.
     * @return bool true if obj has the same value as this instance; otherwise, false
     */
    public function equals(HIBCLICSecondaryAndAdditionalDataCodetext $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEqual = $client->HIBCLICSecondaryAndAdditionalDataCodetext_equals($this->getIComplexCodetextDTO(), $obj->getIComplexCodetextDTO());
        $thriftConnection->closeConnection();
        return $isEqual;
    }
}