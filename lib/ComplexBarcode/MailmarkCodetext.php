<?php

namespace Aspose\Barcode\ComplexBarcode;

use Aspose\Barcode\Bridge\IComplexCodetextDTO;
use Aspose\Barcode\ComplexBarcode\ComplexCodetextType;
use Aspose\Barcode\ComplexBarcode\IComplexCodetext;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * Class for encoding and decoding the text embedded in the 4-state Royal Mailmark code.
 */
final class MailmarkCodetext extends IComplexCodetext
{
    /**
     * Initializes a new instance of the {@code MailmarkCodetext} class.
     */
    public function __construct()
    {
        $this->setIComplexCodetextDTO($this->obtainDto());
        $this->getIComplexCodetextDTO()->complexCodetextType = ComplexCodetextType::MailmarkCodetext;
        $this->initFieldsFromDto();
    }

    public function initFieldsFromDto()
    {
    }

    public function obtainDto(...$args): IComplexCodetextDTO
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $dtoRef = $client->MailmarkCodetext_ctor();
        $thriftConnection->closeConnection();

        return $dtoRef;
    }

    /**
     * "0" – Null or Test
     * "1" – Letter
     * "2" – Large Letter
     */
    public function getFormat(): int
    {
        return $this->getIComplexCodetextDTO()->format;
    }

    /**
     * "0" – Null or Test
     * "1" – LetterN
     * "2" – Large Letter
     */
    public function setFormat(int $value)
    {
        $this->getIComplexCodetextDTO()->format = $value;
    }

    /**
     * Currently 1 – For Mailmark barcode (0 and 2 to 9 and A to Z spare for future use)
     */
    public function getVersionID(): int
    {
        return $this->getIComplexCodetextDTO()->versionID;
    }

    /**
     * Currently 1 – For Mailmark barcode (0 and 2 to 9 and A to Z spare for future use)
     */
    public function setVersionID(int $value)
    {
        $this->getIComplexCodetextDTO()->versionID = $value;
    }

    /**
     * "0" - Null or Test
     * "1" - 1C (Retail)
     * "2" - 2C (Retail)
     * "3" - 3C (Retail)
     * "4" - Premium (RetailPublishing Mail) (for potential future use)
     * "5" - Deferred (Retail)
     * "6" - Air (Retail) (for potential future use)
     * "7" - Surface (Retail) (for potential future use)
     * "8" - Premium (Network Access)
     * "9" - Standard (Network Access)
     */
    public function getClass_(): string
    {
        return $this->getIComplexCodetextDTO()->class_;
    }

    /**
     * "0" - Null or Test
     * "1" - 1C (Retail)
     * "2" - 2C (Retail)
     * "3" - 3C (Retail)
     * "4" - Premium (RetailPublishing Mail) (for potential future use)
     * "5" - Deferred (Retail)
     * "6" - Air (Retail) (for potential future use)
     * "7" - Surface (Retail) (for potential future use)
     * "8" - Premium (Network Access)
     * "9" - Standard (Network Access)
     */
    public function setClass_(string $value)
    {
        $this->getIComplexCodetextDTO()->class_ = $value;
    }

    /**
     * Maximum values are 99 for Barcode C and 999999 for Barcode L.
     */
    public function getSupplyChainID(): int
    {
        return $this->getIComplexCodetextDTO()->supplyChainID;
    }

    /**
     * Maximum values are 99 for Barcode C and 999999 for Barcode L.
     */
    public function setSupplyChainID(int $value)
    {
        $this->getIComplexCodetextDTO()->supplyChainID = $value;
    }

    /**
     * Maximum value is 99999999.
     */
    public function getItemID(): int
    {
        return $this->getIComplexCodetextDTO()->itemID;
    }

    /**
     * Maximum value is 99999999.
     */
    public function setItemID(int $value)
    {
        $this->getIComplexCodetextDTO()->itemID = $value;
    }

    /**
     * The PC and DP must comply with a PAF format.
     * Nine character string denoting international "XY11     " (note the 5 trailing spaces) or a pattern
     * of characters denoting a domestic sorting code.
     * A domestic sorting code consists of an outward postcode, an inward postcode, and a Delivery Point Suffix.
     */
    public function getDestinationPostCodePlusDPS(): string
    {
        return $this->getIComplexCodetextDTO()->destinationPostCodePlusDPS;
    }

    /**
     * The PC and DP must comply with a PAF format.
     * Nine character string denoting international "XY11     " (note the 5 trailing spaces) or a pattern
     * of characters denoting a domestic sorting code.
     * A domestic sorting code consists of an outward postcode, an inward postcode, and a Delivery Point Suffix.
     */
    public function setDestinationPostCodePlusDPS(string $value)
    {
        $this->getIComplexCodetextDTO()->destinationPostCodePlusDPS = $value;
    }

    /**
     * Construct codetext from Mailmark data.
     *
     * @return string Constructed codetext
     */
    public function getConstructedCodetext(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $constructedCodetext = $client->MailmarkCodetext_getConstructedCodetext($this->getIComplexCodetextDTO());
        $thriftConnection->closeConnection();
        return $constructedCodetext;
    }

    /**
     * Initializes Mailmark data from constructed codetext.
     *
     * @param string $constructedCodetext Constructed codetext.
     */
    public function initFromString($constructedCodetext): void
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $this->setIComplexCodetextDTO($client->MailmarkCodetext_initFromString($this->getIComplexCodetextDTO(), $constructedCodetext));
        $thriftConnection->closeConnection();
        $this->initFieldsFromDto();
    }

    /**
     * Gets barcode type.
     *
     * @return int Barcode type.
     */
    public function getBarcodeType(): int
    {
        $barcode_type = $this->getIComplexCodetextDTO()->barcodeType;
        return $barcode_type;
    }
}