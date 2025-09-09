<?php

namespace Aspose\Barcode\ComplexBarcode;

use Aspose\Barcode\ComplexBarcode\ComplexCodetextType;
use Aspose\Barcode\ComplexBarcode\IComplexCodetext;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\ThriftConnection;

/**
 * Class for encoding and decoding the text embedded in the Royal Mail 2D Mailmark code.
 */
final class Mailmark2DCodetext extends IComplexCodetext
{
    /**
     * Create default instance of Mailmark2DCodetext class.
     */
    public function __construct()
    {
        try
        {
            $this->setIComplexCodetextDTO($this->obtainDto());
            $this->getIComplexCodetextDTO()->complexCodetextType = ComplexCodetextType::Mailmark2DCodetext;
            $this->initFieldsFromDto();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    static function construct($complexCodetextDTO)
    {
        try
        {
            $class = new Mailmark2DCodetext();
            $class->setIComplexCodetextDTO($complexCodetextDTO);
            $class->initFieldsFromDto();
            return $class;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    public function obtainDto(...$args)
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $dtoRef = $client->Mailmark2DCodetext_ctor();
        $thriftConnection->closeConnection();

        return $dtoRef;
    }

    public function initFieldsFromDto()
    {
    }

    /**
     * Identifies the UPU Country ID.Max length: 4 characters.
     * @return string Country ID
     */
    public function getUPUCountryID(): string
    {
        return $this->getIComplexCodetextDTO()->UPUCountryID;
    }

    /**
     * Identifies the UPU Country ID.Max length: 4 characters.
     * @param string $value Country ID
     */
    public function setUPUCountryID(string $value): void
    {
        try
        {
            $this->getIComplexCodetextDTO()->UPUCountryID = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Identifies the Royal Mail Mailmark barcode payload for each product type.
     * Valid Values:
     *
     * "0" - Domestic Sorted &amp; Unsorted
     * "A" - Online Postage
     * "B" - Franking
     * "C" - Consolidation
     *
     * @return string Information type ID
     */
    public function getInformationTypeID(): string
    {
        try
        {
            return $this->getIComplexCodetextDTO()->informationTypeID;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Identifies the Royal Mail Mailmark barcode payload for each product type.
     * Valid Values:
     *
     * "0" - Domestic Sorted &amp; Unsorted
     * "A" - Online Postage
     * "B" - Franking
     * "C" - Consolidation
     *
     * @param string $value Information type ID
     */
    public function setInformationTypeID(string $value): void
    {
        try
        {
            $this->getIComplexCodetextDTO()->informationTypeID = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Identifies the  barcode version as relevant to each Information Type ID.
     * Valid Values:
     *
     * Currently "1".
     * "0" &amp; "2" to "9" and "A" to "Z" spare reserved for potential future use.
     *
     * @return string Version ID
     */
    public function getVersionID(): string
    {
        return (string)$this->getIComplexCodetextDTO()->versionID;
    }

    /**
     * Identifies the  barcode version as relevant to each Information Type ID.
     * Valid Values:
     *
     * Currently "1".
     * "0" &amp; "2" to "9" and "A" to "Z" spare reserved for potential future use.
     *
     * @param string $value Version ID
     */
    public function setVersionID(string $value): void
    {
        try
        {
            $this->getIComplexCodetextDTO()->versionID = (int)$value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Identifies the class of the item.
     *
     * Valid Values:
     * "1" - 1C (Retail)
     * "2" - 2C (Retail)
     * "3" - Economy (Retail)
     * "5" - Deffered (Retail)
     * "8" - Premium (Network Access)
     * "9" - Standard (Network Access)
     *
     * @return string class of the item
     */
    public function getClass_(): string
    {
        try
        {
            return $this->getIComplexCodetextDTO()->class_;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Identifies the class of the item.
     *
     * Valid Values:
     * "1" - 1C (Retail)
     * "2" - 2C (Retail)
     * "3" - Economy (Retail)
     * "5" - Deffered (Retail)
     * "8" - Premium (Network Access)
     * "9" - Standard (Network Access)
     *
     * @param string $value class of the item
     */
    public function setClass_(string $value): void
    {
        try
        {
            $this->getIComplexCodetextDTO()->class_ = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Identifies the unique group of customers involved in the mailing.
     * Max value: 9999999.
     *
     * @return int Supply chain ID
     */
    public function getSupplyChainID(): int
    {
        try
        {
            return $this->getIComplexCodetextDTO()->supplyChainID;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Identifies the unique group of customers involved in the mailing.
     * Max value: 9999999.
     *
     * @param int $value Supply chain ID
     */
    public function setSupplyChainID(int $value): void
    {
        try
        {
            $this->getIComplexCodetextDTO()->supplyChainID = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Identifies the unique item within the Supply Chain ID.
     * Every Mailmark barcode is required to carry an ID
     * so it can be uniquely identified for at least 90 days.
     * Max value: 99999999.
     *
     * @return int item within the Supply Chain ID
     */
    public function getItemID(): int
    {
        try
        {
            return $this->getIComplexCodetextDTO()->itemID;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Identifies the unique item within the Supply Chain ID.
     * Every Mailmark barcode is required to carry an ID
     * so it can be uniquely identified for at least 90 days.
     * Max value: 99999999.
     *
     * @param int $value item within the Supply Chain ID
     */
    public function setItemID(int $value): void
    {
        try
        {
            $this->getIComplexCodetextDTO()->itemID = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Contains the Postcode of the Delivery Address with DPS
     * If inland the Postcode/DP contains the following number of characters.
     * Area (1 or 2 characters) District(1 or 2 characters)
     * Sector(1 character) Unit(2 characters) DPS (2 characters).
     * The Postcode and DPS must comply with a valid PAF® format.
     *
     * @return string the Postcode of the Delivery Address with DPS
     */
    public function getDestinationPostCodeAndDPS(): string
    {
        try
        {
            return $this->getIComplexCodetextDTO()->destinationPostCodeAndDPS;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Contains the Postcode of the Delivery Address with DPS
     * If inland the Postcode/DP contains the following number of characters.
     * Area (1 or 2 characters) District(1 or 2 characters)
     * Sector(1 character) Unit(2 characters) DPS (2 characters).
     * The Postcode and DPS must comply with a valid PAF® format.
     *
     * @param string $value the Postcode of the Delivery Address with DPS
     */
    public function setDestinationPostCodeAndDPS(string $value): void
    {
        try
        {
            $this->getIComplexCodetextDTO()->destinationPostCodeAndDPS = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Flag which indicates what level of Return to Sender service is being requested.
     *
     * @return string RTS Flag
     */
    public function getRTSFlag(): string
    {
        try
        {
            return $this->getIComplexCodetextDTO()->RTSFlag;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Flag which indicates what level of Return to Sender service is being requested.
     *
     * @param string $value RTS Flag
     */
    public function setRTSFlag(string $value): void
    {
        try
        {
            $this->getIComplexCodetextDTO()->RTSFlag = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Contains the Return to Sender Post Code but no DPS.
     * The PC(without DPS) must comply with a PAF® format.
     *
     * @return string Return to Sender Post Code but no DPS
     */
    public function getReturnToSenderPostCode(): string
    {
        try
        {
            return $this->getIComplexCodetextDTO()->returnToSenderPostCode;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Contains the Return to Sender Post Code but no DPS.
     * The PC(without DPS) must comply with a PAF® format.
     *
     * @param string $value Return to Sender Post Code but no DPS
     */
    public function setReturnToSenderPostCode(string $value): void
    {
        try
        {
            $this->getIComplexCodetextDTO()->returnToSenderPostCode = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Optional space for use by customer.
     *
     * Max length by Type:
     * Type 7: 6 characters
     * Type 9: 45 characters
     * Type 29: 25 characters
     *
     * @return string Customer content
     */
    public function getCustomerContent(): string
    {
        try
        {
            return $this->getIComplexCodetextDTO()->customerContent;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Optional space for use by customer.
     *
     * Max length by Type:
     * Type 7: 6 characters
     * Type 9: 45 characters
     * Type 29: 25 characters
     *
     * @param string $value Customer content
     */
    public function setCustomerContent(string $value): void
    {
        try
        {
            $this->getIComplexCodetextDTO()->customerContent = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Encode mode of Datamatrix barcode.
     * Default value: DataMatrixEncodeMode.C40.
     *
     * @return int Encode mode of Datamatrix barcode.
     */
    public function getCustomerContentEncodeMode(): int
    {
        try
        {
            return $this->getIComplexCodetextDTO()->customerContentEncodeMode;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Encode mode of Datamatrix barcode.
     * Default value: DataMatrixEncodeMode.C40.
     *
     * @param int $value Encode mode of Datamatrix barcode.
     */
    public function setCustomerContentEncodeMode(int $value): void
    {
        try
        {
            $this->getIComplexCodetextDTO()->customerContentEncodeMode = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * 2D Mailmark Type defines size of Data Matrix barcode.
     *
     * @return int Size of Data Matrix barcode
     */
    public function getDataMatrixType(): int
    {
        try
        {
            return $this->getIComplexCodetextDTO()->dataMatrixType;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * 2D Mailmark Type defines size of Data Matrix barcode.
     *
     * @param int $value Size of Data Matrix barcode
     */
    public function setDataMatrixType(int $value): void
    {
        try
        {
            $this->getIComplexCodetextDTO()->dataMatrixType = $value;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Construct codetext from Mailmark data.
     * @return string Constructed codetext
     */
    public function getConstructedCodetext(): string
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $constructedCodetext = $client->Mailmark2DCodetext_getConstructedCodetext($this->getIComplexCodetextDTO());
            $thriftConnection->closeConnection();
            return $constructedCodetext;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Initializes Mailmark data from constructed codetext.
     * @param string $constructedCodetext Constructed codetext.
     */
    public function initFromString($constructedCodetext): void
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $this->setIComplexCodetextDTO($client->Mailmark2DCodetext_initFromString($this->getIComplexCodetextDTO(), $constructedCodetext));
            $thriftConnection->closeConnection();
            $this->initFieldsFromDto();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets barcode type.
     * @return int Barcode type.
     */
    public function getBarcodeType(): int
    {
        $barcode_type = $this->getIComplexCodetextDTO()->barcodeType;
        return $barcode_type;
    }
}