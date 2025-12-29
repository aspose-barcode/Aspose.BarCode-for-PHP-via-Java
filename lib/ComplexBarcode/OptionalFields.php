<?php
namespace Aspose\Barcode\ComplexBarcode;

use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\ThriftConnection;

/**
* <p>
    * Optional elements (fields) of the card
    * </p>
*/
class OptionalFields implements Communicator
{

    private $optionalFieldsDto;

    /**
     * @return mixed
     */
    public function getOptionalFieldsDto(): \Aspose\Barcode\Bridge\OptionalFieldsDTO
    {
        return $this->optionalFieldsDto;
    }

    /**
     * @param mixed $dataElementDto
     */
    public function setOptionalFieldsDto(\Aspose\Barcode\Bridge\OptionalFieldsDTO $optionalFieldsDto): void
    {
        $this->optionalFieldsDto = $optionalFieldsDto;
    }
    
    public function __construct()
    {
        $this->optionalFieldsDto = $this->obtainDto();
    }

    public static function _internal_construct($nativeObject)
    {
        $optionalFields = new OptionalFields();
        $optionalFields->setOptionalFieldsDto($nativeObject);
        return $optionalFields;
    }

    public function obtainDto(...$args)
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $optionalFieldsDTO = $client->OptionalFields_ctor();
        $thriftConnection->closeConnection();
        return $optionalFieldsDTO;
    }

    public function initFieldsFromDto()
    {
        // TODO: Implement initFieldsFromDto() method.
    }

    public function getAddressStreet2() : string
    {
        return $this->optionalFieldsDto->addressStreet2;
    }
    
    // Optional elements in DL/ID subfiles
    // Rules are same as for mandatory elements
    /**
    * <p>
        * DAH, Second line of street portion of the cardholder address, DL/ID, V35ANS
        * </p>
    */

    public function setAddressStreet2(string $value) : void
    {
        $this->optionalFieldsDto->addressStreet2 = $value;
    }

    /**
    * <p>
        * DAZ, Bald, black, blonde, brown, gray, red/auburn, sandy, white, unknown. If the issuing
        * jurisdiction wishes to abbreviate colors, the three-character codes provided in AAMVA D20
        * must be used, DL/ID, V12A
        * </p>
    */
    public function getHairColor() : int
    {
        return $this->optionalFieldsDto->hairColor;
    }
    /**
    * <p>
        * DAZ, Bald, black, blonde, brown, gray, red/auburn, sandy, white, unknown. If the issuing
        * jurisdiction wishes to abbreviate colors, the three-character codes provided in AAMVA D20
        * must be used, DL/ID, V12A
        * </p>
    */
    public function setHairColor(int $value) : void
    {
        $this->optionalFieldsDto->hairColor = $value;
    }

    /**
    * <p>
        * DCI, Country and municipality and/or state/province, DL/ID, V33A
        * </p>
    */
    public function getPlaceOfBirth() : string
    {
        return $this->optionalFieldsDto->placeOfBirth;
    }
    /**
    * <p>
        * DCI, Country and municipality and/or state/province, DL/ID, V33A
        * </p>
    */
    public function setPlaceOfBirth(string $value) : void
    {
        $this->optionalFieldsDto->placeOfBirth = $value;
    }
    /**
    * <p>
        * DCJ, A string of letters and/or numbers that identifies when, where, and by whom
        * a driver license/ID card was made. If audit information is not used on the card or the MRT,
        * it must be included in the driver record, DL/ID, V25ANS
        * </p>
    */
    public function getAuditInformation() : string
    {
        return $this->optionalFieldsDto->auditInformation;
    }
    /**
    * <p>
        * DCJ, A string of letters and/or numbers that identifies when, where, and by whom
        * a driver license/ID card was made. If audit information is not used on the card or the MRT,
        * it must be included in the driver record, DL/ID, V25ANS
        * </p>
    */
    public function setAuditInformation(string $value) : void
    {
        $this->optionalFieldsDto->auditInformation = $value;
    }
    /**
    * <p>
        * DCK, A string of letters and/or numbers that is affixed to the raw materials(card stock, laminate, etc.)
        * used in producing driver licenses and ID cards. (DHS recommended field), DL/ID, V25ANS
        * </p>
    */
    public function getInventoryControlNumber() : string
    {
        return $this->optionalFieldsDto->inventoryControlNumber;
    }
    /**
    * <p>
        * DCK, A string of letters and/or numbers that is affixed to the raw materials(card stock, laminate, etc.)
        * used in producing driver licenses and ID cards. (DHS recommended field), DL/ID, V25ANS
        * </p>
    */
    public function setInventoryControlNumber(string $value) : void
    {
        $this->optionalFieldsDto->inventoryControlNumber = $value;
    }
    /**
    * <p>
        * DBN, Other family name by which cardholder is known, DL/ID, V10ANS
        * </p>
    */
    public function getAliasAKAFamilyName() : string
    {
        return $this->optionalFieldsDto->aliasAKAFamilyName;
    }
    /**
    * <p>
        * DBN, Other family name by which cardholder is known, DL/ID, V10ANS
        * </p>
    */
    public function setAliasAKAFamilyName(string $value) : void
    {
        $this->optionalFieldsDto->aliasAKAFamilyName = $value;
    }
    /**
    * <p>
        * DBG, Other given name by which cardholder is known, DL/ID, V15ANS
        * </p>
    */
    public function getAliasAKAGivenName() : string
    {
        return $this->optionalFieldsDto->aliasAKAGivenName;
    }
    /**
    * <p>
        * DBG, Other given name by which cardholder is known, DL/ID, V15ANS
        * </p>
    */
    public function setAliasAKAGivenName(string $value) : void
    {
        $this->optionalFieldsDto->aliasAKAGivenName = $value;
    }
    /**
    * <p>
        * DBS, Other suffix by which cardholder is known, DL/ID, V5ANS
        * </p>
    */
    public function getAliasAKASuffixName() : string
    {
        return $this->optionalFieldsDto->aliasAKASuffixName;
    }
    /**
    * <p>
        * DBS, Other suffix by which cardholder is known, DL/ID, V5ANS
        * </p>
    */
    public function setAliasAKASuffixName(string $value) : void
    {
        $this->optionalFieldsDto->aliasAKASuffixName = $value;
    }
    /**
    * <p>
        * DCU, Name Suffix (If jurisdiction participates in systems requiring name suffix (PDPS, CDLIS, etc.),
        * the suffix must be collected and displayed on the DL/ID and in the MRT).
        * JR(Junior), SR(Senior), 1ST or I(First), up to 9TH or IX (Ninth), DL/ID, V5ANS
        * </p>
    */
    public function getNameSuffix() : string
    {
        return $this->optionalFieldsDto->nameSuffix;
    }
    /**
    * <p>
        * DCU, Name Suffix (If jurisdiction participates in systems requiring name suffix (PDPS, CDLIS, etc.),
        * the suffix must be collected and displayed on the DL/ID and in the MRT).
        * JR(Junior), SR(Senior), 1ST or I(First), up to 9TH or IX (Ninth), DL/ID, V5ANS
        * </p>
    */
    public function setNameSuffix(string $value) : void
    {
        $this->optionalFieldsDto->nameSuffix = $value;
    }
    /**
    * <p>
        * DCE, Indicates the approximate weight range of the cardholder: 0 = up to 31 kg(up to 70 lbs),
        * 1 = 32 – 45 kg(71 – 100 lbs), 2 = 46 - 59 kg(101 – 130 lbs), 3 = 60 - 70 kg(131 – 160 lbs),
        * 4 = 71 - 86 kg(161 – 190 lbs), 5 = 87 - 100 kg(191 – 220 lbs), 6 = 101 - 113 kg(221 – 250 lbs),
        * 7 = 114 - 127 kg(251 – 280 lbs), 8 = 128 – 145 kg(281 – 320 lbs), 9 = 146+ kg(321+ lbs), DL/ID, F1N
        * </p>
    */
    public function getWeightRange() : string
    {
        return $this->optionalFieldsDto->weightRange;
    }
    /**
    * <p>
        * DCE, Indicates the approximate weight range of the cardholder: 0 = up to 31 kg(up to 70 lbs),
        * 1 = 32 – 45 kg(71 – 100 lbs), 2 = 46 - 59 kg(101 – 130 lbs), 3 = 60 - 70 kg(131 – 160 lbs),
        * 4 = 71 - 86 kg(161 – 190 lbs), 5 = 87 - 100 kg(191 – 220 lbs), 6 = 101 - 113 kg(221 – 250 lbs),
        * 7 = 114 - 127 kg(251 – 280 lbs), 8 = 128 – 145 kg(281 – 320 lbs), 9 = 146+ kg(321+ lbs), DL/ID, F1N
        * </p>
    */
    public function setWeightRange(string $value) : void
    {
        $this->optionalFieldsDto->weightRange = $value;
    }
    /**
    * <p>
        * DCL, Codes for race or ethnicity of the cardholder, as defined in AAMVA D20, DL/ID, V3A
        * </p>
    */
    public function getRaceEthnicity() : string
    {
        return $this->optionalFieldsDto->raceEthnicity;
    }
    /**
    * <p>
        * DCL, Codes for race or ethnicity of the cardholder, as defined in AAMVA D20, DL/ID, V3A
        * </p>
    */
    public function setRaceEthnicity(string $value) : void
    {
        $this->optionalFieldsDto->raceEthnicity = $value;
    }
    /**
    * <p>
        * DCM, Standard vehicle classification code(s) for cardholder. This data element is a placeholder for
        * future efforts to standardize vehicle classifications, DL, F4AN
        * </p>
    */
    public function getStandardVehClassification() : string
    {
        return $this->optionalFieldsDto->standardVehClassification;
    }
    /**
    * <p>
        * DCM, Standard vehicle classification code(s) for cardholder. This data element is a placeholder for
        * future efforts to standardize vehicle classifications, DL, F4AN
        * </p>
    */
    public function setStandardVehClassification(string $value) : void
    {
        $this->optionalFieldsDto->standardVehClassification = $value;
    }
    /**
    * <p>
        * DCN, Standard endorsement code(s) for cardholder. See codes in D20.This data element is a placeholder
        * for future efforts to standardize endorsement codes, DL, F5AN
        * </p>
    */
    public function getStandardEndorsementCode() : string
    {
        return $this->optionalFieldsDto->standardEndorsementCode;
    }
    /**
    * <p>
        * DCN, Standard endorsement code(s) for cardholder. See codes in D20.This data element is a placeholder
        * for future efforts to standardize endorsement codes, DL, F5AN
        * </p>
    */
    public function setStandardEndorsementCode(string $value) : void
    {
        $this->optionalFieldsDto->standardEndorsementCode = $value;
    }
    /**
    * <p>
        * DCO, Standard restriction code(s) for cardholder. See codes in D20.This data element is a placeholder
        * for future efforts to standardize restriction codes, DL, F12AN
        * </p>
    */
    public function getStandardRestrictionCode() : string
    {
        return $this->optionalFieldsDto->standardRestrictionCode;
    }
    /**
    * <p>
        * DCO, Standard restriction code(s) for cardholder. See codes in D20.This data element is a placeholder
        * for future efforts to standardize restriction codes, DL, F12AN
        * </p>
    */
    public function setStandardRestrictionCode(string $value) : void
    {
        $this->optionalFieldsDto->standardRestrictionCode = $value;
    }
    /**
    * <p>
        * DCP, Text that explains the jurisdiction-specific code(s) for classifications of vehicles
        * cardholder is authorized to drive, DL, V50ANS
        * </p>
    */
    public function getVehClassDescription() : string
    {
        return $this->optionalFieldsDto->vehClassDescription;
    }
    /**
    * <p>
        * DCP, Text that explains the jurisdiction-specific code(s) for classifications of vehicles
        * cardholder is authorized to drive, DL, V50ANS
        * </p>
    */
    public function setVehClassDescription(string $value) : void
    {
        $this->optionalFieldsDto->vehClassDescription = $value;
    }
    /**
    * <p>
        * DCQ, Text that explains the jurisdiction-specific code(s) that indicates additional driving
        * privileges granted to the cardholder beyond the vehicle class, DL, V50ANS
        * </p>
    */
    public function getEndorsementCodeDescription() : string
    {
        return $this->optionalFieldsDto->endorsementCodeDescription;
    }
    /**
    * <p>
        * DCQ, Text that explains the jurisdiction-specific code(s) that indicates additional driving
        * privileges granted to the cardholder beyond the vehicle class, DL, V50ANS
        * </p>
    */
    public function setEndorsementCodeDescription(string $value) : void
    {
        $this->optionalFieldsDto->endorsementCodeDescription = $value;
    }
    /**
    * <p>
        * DCR, Text describing the jurisdiction-specific
        * restriction code(s) that curtail driving privileges, DL, V50ANS
        * </p>
    */
    public function getRestrictionCodeDescription() : string
    {
        return $this->optionalFieldsDto->restrictionCodeDescription;
    }

    /**
    * <p>
        * DCR, Text describing the jurisdiction-specific
        * restriction code(s) that curtail driving privileges, DL, V50ANS
        * </p>
    */
    public function setRestrictionCodeDescription(string $value) : void
    {
        $this->optionalFieldsDto->restrictionCodeDescription = $value;
    }
    /**
    * <p>
        * DDA, DHS required field that indicates compliance:
        * “F” = compliant; and, “N” = non-compliant, DL/ID, F1A
        * </p>
    */
    public function getComplianceType() : string
    {
        return $this->optionalFieldsDto->complianceType;
    }
    /**
    * <p>
        * DDA, DHS required field that indicates compliance:
        * “F” = compliant; and, “N” = non-compliant, DL/ID, F1A
        * </p>
    */
    public function setComplianceType(string $value) : void
    {
    $this->optionalFieldsDto->complianceType = $value;
    }
    /**
    * <p>
        * DDB, DHS required field that indicates date of the most recent version change or modification
        * to the visible format of the DL/ID. (MMDDCCYY for U.S., CCYYMMDD for Canada), DL/ID, F8N
        * </p>
    */
    public function getCardRevisionDate() : \DateTimeImmutable
    {
        return new \DateTimeImmutable($this->optionalFieldsDto->cardRevisionDate);
    }
    /**
    * <p>
        * DDB, DHS required field that indicates date of the most recent version change or modification
        * to the visible format of the DL/ID. (MMDDCCYY for U.S., CCYYMMDD for Canada), DL/ID, F8N
        * </p>
    */
    public function setCardRevisionDate(\DateTimeImmutable $value) : void
    {
        $this->optionalFieldsDto->cardRevisionDate = $value->format("yyyy-MM-dd");
    }
    /**
    * <p>
        * DDC, Date on which the hazardous material endorsement granted by the document
        * is no longer valid.  (MMDDCCYY for U.S., CCYYMMDD for Canada), DL, F8N
        * </p>
    */
    public function getHAZMATEndorsementExpDate() : \DateTimeImmutable
    {
        return \DateTimeImmutable($this->optionalFieldsDto->hazmatEndorsementExpDate());
    }
    /**
    * <p>
        * DDD, DHS required field that indicates that the cardholder has
        * temporary lawful status = “1”, DL/ID, F1N
        * </p>
    */
    public function getLimitedDurationDocIndicator() : string
    {
        return $this->optionalFieldsDto->limitedDurationDocIndicator;
    }
    /**
    * <p>
        * DDD, DHS required field that indicates that the cardholder has
        * temporary lawful status = “1”, DL/ID, F1N
        * </p>
    */
    public function setLimitedDurationDocIndicator(string $value) : void
    {
        $this->optionalFieldsDto->limitedDurationDocIndicator = $value;
    }
    /**
    * <p>
        * DAW, Cardholder weight in pounds, Ex. 185 lb = “185”, DL/ID, F3N
        * </p>
    */
    public function getWeightPounds()
    {
        return $this->optionalFieldsDto->weightPounds;
    }
    /**
    * <p>
        * DAW, Cardholder weight in pounds, Ex. 185 lb = “185”, DL/ID, F3N
        * </p>
    */
    public function setWeightPounds(int $value) : void
    {
        $this->optionalFieldsDto->weightPounds = $value;
    }
    /**
    * <p>
        * DAX, Cardholder weight in kilograms, Ex. 84 kg = “084”, DL/ID, F3N
        * </p>
    */
    public function getWeightKilograms()
    {
        return $this->optionalFieldsDto->weightKilograms;
    }
    /**
    * <p>
        * DAX, Cardholder weight in kilograms, Ex. 84 kg = “084”, DL/ID, F3N
        * </p>
    */
    public function setWeightKilograms(int $value) : void
    {
        $this->optionalFieldsDto->weightKilograms = $value;
    }

    /**
    * <p>
        * DDI, Date on which the cardholder turns 19 years old. (MMDDCCYY for U.S., CCYYMMDD for Canada), DL/ID, F8N
        * </p>
    */
    public function setUnder18Until(\DateTimeImmutable $value) : void
    {
        $this->optionalFieldsDto->under18Until = $value->format("yyyy-MM-dd");
    }

    /**
    * <p>
        * DDH, Date on which the cardholder turns 18 years old. (MMDDCCYY for U.S., CCYYMMDD for Canada), DL/ID, F8N
        * </p>
    */
    public function getUnder18Until(): \DateTimeImmutable
    {
        return \DateTimeImmutable($this->optionalFieldsDto->under18Until);
    }

    /**
    * <p>
        * DDI, Date on which the cardholder turns 19 years old. (MMDDCCYY for U.S., CCYYMMDD for Canada), DL/ID, F8N
        * </p>
    */
    public function setUnder19Until(\DateTimeImmutable $value) : void
    {
        $this->optionalFieldsDto->under19Until = $value->format("yyyy-MM-dd");
    }
    /**
    * <p>
        * DDJ, Date on which the cardholder turns 21 years old. (MMDDCCYY for U.S., CCYYMMDD for Canada), DL/ID, F8N
        * </p>
    */
    public function getUnder21Until()
    {
        return $this->optionalFieldsDto->under21Until;
    }
    /**
    * <p>
        * DDJ, Date on which the cardholder turns 21 years old. (MMDDCCYY for U.S., CCYYMMDD for Canada), DL/ID, F8N
        * </p>
    */
    public function setUnder21Until(\DateTimeImmutable $value) : void
    {
        $this->optionalFieldsDto->under21Until = $value->format("yyyy-MM-dd");
    }
    /**
    * <p>
        * DDK, Field that indicates that the cardholder is an organ donor = “1”, DL/ID, F1N
        * </p>
    */
    public function getOrganDonorIndicator() : string
    {
        return $this->optionalFieldsDto->organDonorIndicator;
    }
    /**
    * <p>
        * DDK, Field that indicates that the cardholder is an organ donor = “1”, DL/ID, F1N
        * </p>
    */
    public function setOrganDonorIndicator(string $value) : void
    {
        $this->optionalFieldsDto->organDonorIndicator = $value;
    }
    /**
    * <p>
        * DDL, Field that indicates that the cardholder is a veteran = “1”, DL/ID, F1N
        * </p>
    */
    public function getVeteranIndicator(): string
    {
        return $this->optionalFieldsDto->veteranIndicator;
    }
    /**
    * <p>
        * DDL, Field that indicates that the cardholder is a veteran = “1”, DL/ID, F1N
        * </p>
    */
    public function setVeteranIndicator(string $value) : void
    {
        $this->optionalFieldsDto->veteranIndicator = $value;
    }
}