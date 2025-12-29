<?php
namespace Aspose\Barcode\ComplexBarcode;

use Aspose\Barcode\Internal\ThriftConnection;

/**
* <p>
    * Class for encoding and decoding the text embedded in the USA Driving License PDF417 code.
    * </p>
*/
class USADriveIdCodetext extends IComplexCodetext
{

    public function __construct()
    {
        $this->setIComplexCodetextDTO($this->obtainDto());
        $this->getIComplexCodetextDTO()->complexCodetextType = ComplexCodetextType::USADriveIdCodetext;
        $this->initFieldsFromDto();
    }

    public static function _internal_construct($nativeObject)
    {
        $obj = new USADriveIdCodetext();
        $obj->setIComplexCodetextDTO($nativeObject);
        $obj->initFieldsFromDto();

        return $obj;
    }

    public function obtainDto(...$args)
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $usaDriveIdCodetextDTO = $client->USADriveIdCodetext_ctor();
        $thriftConnection->closeConnection();
        return $usaDriveIdCodetextDTO;
    }

    public function initFieldsFromDto()
    {
        $this->auto_JurisdictionSpecificSubfile = USADriveIdJurisdSubfile::_internal_construct($this->getIComplexCodetextDTO()->jurisdictionSpecificSubfile);
        $this->auto_OptionalElements = OptionalFields::_internal_construct($this->getIComplexCodetextDTO()->optionalElements);
        $this->auto_MandatoryElements = MandatoryFields::_internal_construct($this->getIComplexCodetextDTO()->mandatoryElements);
        $this->auto_MandatoryElements = MandatoryFields::_internal_construct($this->getIComplexCodetextDTO()->mandatoryElements);
    }

    /**
    * <p>
        * This number uniquely identifies
        * the issuing jurisdiction and can be obtained by contacting the ISO
        * Issuing Authority(AAMVA).  The full 6-digit IIN should be encoded.
        * </p>
    */
    public function getIssuerIdentificationNumber() : string
    {
        return $this->getIComplexCodetextDTO()->issuerIdentificationNumber;
    }
    /**
    * <p>
        * This number uniquely identifies
        * the issuing jurisdiction and can be obtained by contacting the ISO
        * Issuing Authority(AAMVA).  The full 6-digit IIN should be encoded.
        * </p>
    */
    public function setIssuerIdentificationNumber(string $value) : void
    {
        $this->getIComplexCodetextDTO()->issuerIdentificationNumber = $value;
    }
    /**
    * <p>
        * AAMVA Version Number 00-99
        * </p>
    */
    public function getAAMVAVersionNumber() : string
    {
        return $this->getIComplexCodetextDTO()->aAMVAVersionNumber;
    }
    /**
    * <p>
        * AAMVA Version Number 00-99
        * </p>
    */
    public function setAAMVAVersionNumber(string $value) : void
    {
        $this->getIComplexCodetextDTO()->aAMVAVersionNumber = $value;
    }
    /**
    * <p>
        * Jurisdiction Version Number 00-99
        * </p>
    */
    public function getJurisdictionVersionNumber() : string
    {
        return $this->getIComplexCodetextDTO()->jurisdictionVersionNumber;
    }
    /**
    * <p>
        * Jurisdiction Version Number 00-99
        * </p>
    */
    public function setJurisdictionVersionNumber(string $value) : void
    {
        $this->getIComplexCodetextDTO()->jurisdictionVersionNumber = $value;
    }
    /**
    * <p>
        * Number 00-99 of subfiles
        * </p>
    */
    public function getNumberOfEntries() : string
    {
        return $this->getIComplexCodetextDTO()->numberOfEntries;
    }
    /**
    * <p>
        * Number 00-99 of subfiles
        * </p>
    */
    public function setNumberOfEntries(string $value) : void
    {
        $this->getIComplexCodetextDTO()->numberOfEntries = $value;
    }
    /**
    * <p>
        * Contains information about following subfiles, types, offsets and lengths.
        * Important: set only type, offset and length will be set automatically.
        * </p>
    */
    public function getSubfileDesignator() : array
    {
        $subfileDesignator = [];
        foreach ($this->getIComplexCodetextDTO()->subfileDesignator as $item)
        {
            array_push($subfileDesignator, SubfileProperties::_internal_construct($item));
        }
        return $subfileDesignator;
    }
    /**
    * <p>
        * Contains information about following subfiles, types, offsets and lengths.
        * Important: set only type, offset and length will be set automatically.
        * </p>
    */
    public function addSubfileDesignator(SubfileProperties $value) : void
    {
        array_push($this->getIComplexCodetextDTO()->subfileDesignator, $value->getSubfilePropertiesDto());
    }

    /**
    * <p>
        * Contains information about following subfiles, types, offsets and lengths.
        * Important: set only type, offset and length will be set automatically.
        * </p>
    */
    public function setSubfileDesignator(array $value) : void
    {
        foreach($value as $item)
            array_push($this->getIComplexCodetextDTO()->subfileDesignator, $item);
    }

    /**
    * <p>
        * Mandatory elements (fields) of the card
        * </p>
    */
    public function getMandatoryElements() : MandatoryFields
    {
        return $this->auto_MandatoryElements;
    }
    /**
    * <p>
        * Mandatory elements (fields) of the card
        * </p>
    */
    public function setMandatoryElements(MandatoryFields $value) : void
    {
        $this->auto_MandatoryElements = $value;
        $this->getIComplexCodetextDTO()->MandatoryElements($value->getIComplexCodetextDTO());
    }

    /**
    * <p>
        * Optional elements (fields) of the card
        * </p>
    */
    public function getOptionalElements() : OptionalFields
    {
        return $this->auto_OptionalElements;
    }
    /**
    * <p>
        * Optional elements (fields) of the card
        * </p>
    */
    public function setOptionalElements(OptionalFields $value) : void
    {
        $this->auto_OptionalElements = $value;
        $this->$this->getIComplexCodetextDTO()->OptionalElements = $value->getIComplexCodetextDTO();
    }

    /**
    * <p>
        * Jurisdiction Specific Fields
        * </p>
    */
    public function getJurisdictionSpecificSubfile() : USADriveIdJurisdSubfile
    {
        return $this->auto_JurisdictionSpecificSubfile;
    }
    /**
    * <p>
        * Jurisdiction Specific Fields
        * </p>
    */
    public function setJurisdictionSpecificSubfile(USADriveIdJurisdSubfile $value) : void
    {
        $this->auto_JurisdictionSpecificSubfile = $value;
        $this->$this->getIComplexCodetextDTO()->jurisdictionSpecificSubfile = $value->getIComplexCodetextDTO();
    }

    /**
    * <p>
        * Construct codetext from USA DL data
        * </p>
    * @return Constructed codetext
    */
    public function getConstructedCodetext() : string
    {
        return $this->getIComplexCodetextDTO()->ConstructedCodetext;
    }

    /**
    * <p>
        * Initialize USA DL object from codetext
        * </p>
    * @param constructedCodetext Constructed codetext
    */
    public function initFromString(string $constructedCodetext) : void
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $this->setIComplexCodetextDTO($client->USADriveIdCodetext_initFromString($this->getIComplexCodetextDTO(), $constructedCodetext));
        $thriftConnection->closeConnection();
        $this->initFieldsFromDto();
    }

    /**
    * <p>
        * Returns barcode type of USA DL (Pdf417)
        * </p>
    * @return Barcode type (Pdf417)
    */
    public function getBarcodeType() : int
    {
        return $this->getIComplexCodetextDTO()->barcodeType;
    }

    public function saveToXml() : string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $xmlString = base64_decode( $client->USADriveIdCodetext_saveToXml($this->getIComplexCodetextDTO()), true);
        if ($xmlString === false) {
            throw new \Exception('Invalid base64 string');
        }
        $thriftConnection->closeConnection();
        return $xmlString;
    }
}