<?php
namespace Aspose\Barcode\ComplexBarcode;

use Aspose\Barcode\Bridge\MandatoryFieldsDTO;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;
use DateTimeImmutable;

/**
* <p>
    * Mandatory elements (fields) of the card
    * </p>
*/
class MandatoryFields implements Communicator
{
    private $mandatoryFieldsDto;

    /**
     * @return mixed
     */
    public function getMandatoryFieldsDto(): \Aspose\Barcode\Bridge\MandatoryFieldsDTO
    {
        return $this->mandatoryFieldsDto;
    }

    /**
     * @param mixed $dataElementDto
     */
    public function setMandatoryFieldsDto(\Aspose\Barcode\Bridge\MandatoryFieldsDTO $mandatoryFieldsDto): void
    {
        $this->mandatoryFieldsDto = $mandatoryFieldsDto;
    }

    public function __construct()
    {
        $this->mandatoryFieldsDto = $this->obtainDto();
    }

    public static function _internal_construct($nativeObject)
    {
        $obj = new MandatoryFields();
        $obj->mandatoryFieldsDto = $nativeObject;

        return $obj;
    }

    public function obtainDto(...$args)
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $mandatoryFieldsDTO = $client->MandatoryFields_ctor();
        $thriftConnection->closeConnection();
        return $mandatoryFieldsDTO;
    }

    public function initFieldsFromDto()
    {
        // TODO: Implement initFieldsFromDto() method.
    }
    // Mandatory elements in DL/ID subfiles
    // Types of data / field lengths are encoded as
    // (A = alpha A-Z, N = numeric 0-9, S = special, F = fixed length, V = variable length).
    // Use of padding for variable length fields is optional.
    /**
    * <p>
        * DCA, Jurisdiction-specific vehicle class / group code, DL, V6ANS
        * </p>
    */

    public function getVehicleClass() : string
    {
        return $this->getMandatoryFieldsDto()->vehicleClass;
    }
    // Mandatory elements in DL/ID subfiles
    // Types of data / field lengths are encoded as
    // (A = alpha A-Z, N = numeric 0-9, S = special, F = fixed length, V = variable length).
    // Use of padding for variable length fields is optional.
    /**
    * <p>
        * DCA, Jurisdiction-specific vehicle class / group code, DL, V6ANS
        * </p>
    */

    public function setVehicleClass(string $value) : void
    {
        $this->getMandatoryFieldsDto()->vehicleClass = $value;
    }

    /**
    * <p>
        * DCB, Jurisdiction-specific restrictions codes, DL, V12ANS
        * </p>
    */
    public function getRestrictionCodes() : string
    {
        return $this->getMandatoryFieldsDto()->restrictionCodes;
    }
    /**
    * <p>
        * DCB, Jurisdiction-specific restrictions codes, DL, V12ANS
        * </p>
    */
    public function setRestrictionCodes(string $value) : void
    {
        $this->getMandatoryFieldsDto()->restrictionCodes = $value;
    }
    /**
    * <p>
        * DCD, Jurisdiction specific endorsement codes, DL, V5ANS
        * </p>
    */
    public function getEndorsementCodes() : string
    {
        return $this->getMandatoryFieldsDto()->endorsementCodes;
    }
    /**
    * <p>
        * DCD, Jurisdiction specific endorsement codes, DL, V5ANS
        * </p>
    */
    public function setEndorsementCodes(string $value) : void
    {
        $this->getMandatoryFieldsDto()->endorsementCodes = $value;
    }


    /**
    * <p>
        * DCS, Family name of the cardholder, DL/ID, V40ANS
        * </p>
    */
    public function getFamilyName() : string
    {
        return $this->getMandatoryFieldsDto()->familyName;
    }
    /**
    * <p>
        * DCS, Family name of the cardholder, DL/ID, V40ANS
        * </p>
    */
    public function setFamilyName(string $value) : void
    {
        $this->getMandatoryFieldsDto()->familyName = $value;
    }

    /**
    * <p>
        * DAC, First name of the cardholder, DL/ID, V40ANS
        * </p>
    */
    public function getFirstName() : string
    {
        return $this->getMandatoryFieldsDto()->firstName;
    }
    /**
    * <p>
        * DAC, First name of the cardholder, DL/ID, V40ANS
        * </p>
    */
    public function setFirstName(string $value) : void
    {
        $this->getMandatoryFieldsDto()->firstName = $value;
    }

    /**
    * <p>
        * DAD, Middle name(s) of the cardholder. In the case of multiple middle names they shall be
        * separated by a comma ",". , DL/ID, V40ANS
        * </p>
    */
    public function getMiddleName() : string
    {
        return $this->getMandatoryFieldsDto()->middleName;
    }
    /**
    * <p>
        * DAD, Middle name(s) of the cardholder. In the case of multiple middle names they shall be
        * separated by a comma ",". , DL/ID, V40ANS
        * </p>
    */
    public function setMiddleName(string $value) : void
    {
        $this->getMandatoryFieldsDto()->middleName = $value;
    }

    /**
    * <p>
        * DBB, Date on which the document was issued, MMDDCCYY for U.S., CCYYMMDD for Canada, DL/ID, F8N
        * </p>
    */
    public function getDateOfBirth() : DateTimeImmutable
    {
        return new DateTimeImmutable($this->getMandatoryFieldsDto()->dateOfBirth);
    }
    /**
    * <p>
        * DBB, Date on which the document was issued, MMDDCCYY for U.S., CCYYMMDD for Canada, DL/ID, F8N
        * </p>
    */
    public function setDateOfBirth(DateTimeImmutable $value) : void
    {
        $this->getMandatoryFieldsDto()->dateOfBirth = ($value->format('Y-m-d'));
    }

    /**
    * <p>
        * DBC, Gender of the cardholder. 1 = male, 2 = female, 9 = not specified, DL/ID, F1N
        * </p>
    */
    public function getSex() : int
    {
        return $this->getMandatoryFieldsDto()->sex;
    }

    /**
    * <p>
        * DBC, Gender of the cardholder. 1 = male, 2 = female, 9 = not specified, DL/ID, F1N
        * </p>
    */
    public function setSex(int $value) : void
    {
        $this->getMandatoryFieldsDto()->sex = $value;
    }

    /**
    * <p>
        * DAY, Color of cardholder's eyes. (ANSI D-20 codes). DL/ID, F3A
        * </p>
    */
    public function getEyeColor() : int
    {
        return $this->getMandatoryFieldsDto()->eyeColor;
    }
    /**
    * <p>
        * DAY, Color of cardholder's eyes. (ANSI D-20 codes). DL/ID, F3A
        * </p>
    */
    public function setEyeColor(int $value) : void
    {
        $this->getMandatoryFieldsDto()->eyeColor = $value;
    }

    /**
    * <p>
        * DAU, Height of cardholder.
        * Inches (in): number of inches followed by " in"
        * ex. 6'1'' =  "073 in"
        * Centimeters(cm) : number of centimeters followed by " cm"
        * ex. 181 centimeters="181 cm" , DL/ID, F6ANS
        * </p>
    */
    public function getHeight() : string
    {
        return $this->getMandatoryFieldsDto()->height;
    }
    /**
    * <p>
        * DAU, Height of cardholder.
        * Inches (in): number of inches followed by " in"
        * ex. 6'1'' =  "073 in"
        * Centimeters(cm) : number of centimeters followed by " cm"
        * ex. 181 centimeters="181 cm" , DL/ID, F6ANS
        * </p>
    */
    public function setHeight(string $value) : void
    {
        $this->getMandatoryFieldsDto()->height = $value;
    }

    /**
    * <p>
        * DAG, Street portion of the cardholder address, DL/ID, V35ANS
        * </p>
    */
    public function getAddressStreet1(): string
    {
        return $this->getMandatoryFieldsDto()->addressStreet1;
    }
    /**
    * <p>
        * DAG, Street portion of the cardholder address, DL/ID, V35ANS
        * </p>
    */
    public function setAddressStreet1(string $value) : void
    {
        $this->getMandatoryFieldsDto()->addressStreet1 = $value;
    }

    /**
    * <p>
        * DAI, City portion of the cardholder address, DL/ID, V20ANS
        * </p>
    */
    public function getAddressCity(): string
    {
        return $this->getMandatoryFieldsDto()->addressCity;
    }
    /**
    * <p>
        * DAI, City portion of the cardholder address, DL/ID, V20ANS
        * </p>
    */
    public function setAddressCity(string $value) : void
    {
        $this->getMandatoryFieldsDto()->addressCity = $value;
    }

    /**
    * <p>
        * DAJ, State portion of the cardholder address, DL/ID, F2A
        * </p>
    */
    public function getAddressState(): string
    {
        return $this->getMandatoryFieldsDto()->addressState;
    }
    /**
    * <p>
        * DAJ, State portion of the cardholder address, DL/ID, F2A
        * </p>
    */
    public function setAddressState(string $value) : void
    {
        $this->getMandatoryFieldsDto()->addressState = $value;
    }

    /**
    * <p>
        * DAK, Postal code portion of the cardholder address in the U.S.and Canada.
        * If the trailing portion of the postal code in the U.S. is not known,
        * zeros will be used to fill the trailing set of numbers up to 9 digits, DL/ID, F11ANS
        * </p>
    */
    public function getAddressPostalCode(): string
    {
        return $this->getMandatoryFieldsDto()->addressPostalCode;
    }
    /**
    * <p>
        * DAK, Postal code portion of the cardholder address in the U.S.and Canada.
        * If the trailing portion of the postal code in the U.S. is not known,
        * zeros will be used to fill the trailing set of numbers up to 9 digits, DL/ID, F11ANS
        * </p>
    */
    public function setAddressPostalCode(string $value) : void
    {
        $this->getMandatoryFieldsDto()->addressPostalCode = $value;
    }

    /**
    * <p>
        * DAQ, The number assigned or calculated by the issuing authority, DL/ID, V25ANS
        * </p>
    */
    public function getCustomerIDNumber() : string
    {
        return $this->getMandatoryFieldsDto()->customerIDNumber;
    }
    /**
    * <p>
        * DAQ, The number assigned or calculated by the issuing authority, DL/ID, V25ANS
        * </p>
    */
    public function setCustomerIDNumber(string $value) : void
    {
        $this->getMandatoryFieldsDto()->customerIDNumber = $value;
    }

    /**
    * <p>
        * DCF, Number must uniquely identify a particular document issued to that customer
        * from others that may have been issued in the past. This number may serve multiple
        * purposes of document discrimination, audit information number, and/or inventory control, DL/ID, V25ANS
        * </p>
    */
    public function getDocumentDiscriminator() : string
    {
        return $this->getMandatoryFieldsDto()->documentDiscriminator;
    }
    /**
    * <p>
        * DCF, Number must uniquely identify a particular document issued to that customer
        * from others that may have been issued in the past. This number may serve multiple
        * purposes of document discrimination, audit information number, and/or inventory control, DL/ID, V25ANS
        * </p>
    */
    public function setDocumentDiscriminator(string $value) : void
    {
        $this->getMandatoryFieldsDto()->documentDiscriminator = $value;
    }

    /**
    * <p>
        * DCG, Country in which DL/ID is issued. U.S. = USA, Canada = CAN, DL/ID, F3A
        * </p>
    */
    public function getCountryIdentification() : int
    {
        return $this->getMandatoryFieldsDto()->countryIdentification;
    }
    /**
    * <p>
        * DCG, Country in which DL/ID is issued. U.S. = USA, Canada = CAN, DL/ID, F3A
        * </p>
    */
    public function setCountryIdentification(int $value) : void
    {
        $this->getMandatoryFieldsDto()->countryIdentification = $value;
    }


    /**
    * <p>
        * DDE, A code that indicates whether a field has been truncated(T), has not been truncated(N),
        * or unknown whether truncated(U), DL/ID, F1A
        * </p>
    */
    public function getFamilyNameTruncation() : string
    {
        return $this->getMandatoryFieldsDto()->familyNameTruncation;
    }
    /**
    * <p>
        * DDE, A code that indicates whether a field has been truncated(T), has not been truncated(N),
        * or unknown whether truncated(U), DL/ID, F1A
        * </p>
    */
    public function setFamilyNameTruncation(string $value) : void
    {
        $this->getMandatoryFieldsDto()->familyNameTruncation = $value;
    }

    /**
    * <p>
        * DDF, A code that indicates whether a field has been truncated(T), has not been truncated(N),
        * or unknown whether truncated(U), DL/ID, F1A
        * </p>
    */
    public function getFirstNameTruncation() : string
    {
        return $this->getMandatoryFieldsDto()->firstNameTruncation;
    }
    /**
    * <p>
        * DDF, A code that indicates whether a field has been truncated(T), has not been truncated(N),
        * or unknown whether truncated(U), DL/ID, F1A
        * </p>
    */
    public function setFirstNameTruncation(string $value) : void
    {
        $this->getMandatoryFieldsDto()->firstNameTruncation = $value;
    }

    /**
    * <p>
        * DDG, A code that indicates whether a field has been truncated(T), has not been truncated(N),
        * or unknown whether truncated(U), DL/ID, F1A
        * </p>
    */
    public function getMiddleNameTruncation() : string
    {
        return $this->getMandatoryFieldsDto()->middleNameTruncation;
    }
    /**
    * <p>
        * DDG, A code that indicates whether a field has been truncated(T), has not been truncated(N),
        * or unknown whether truncated(U), DL/ID, F1A
        * </p>
    */
    public function setMiddleNameTruncation(string $value) : void
    {
        $this->getMandatoryFieldsDto()->middleNameTruncation = $value;
    }
}