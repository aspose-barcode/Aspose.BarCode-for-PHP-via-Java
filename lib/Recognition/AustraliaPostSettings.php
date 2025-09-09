<?php

namespace Aspose\Barcode\Recognition;

use Aspose\Barcode\Bridge\AustraliaPostSettingsDTO;
use Aspose\Barcode\Internal\Communicator;

/**
 * AustraliaPost decoding parameters. Contains parameters which make influence on recognized data of AustraliaPost symbology.
 */
class AustraliaPostSettings implements Communicator
{

    private AustraliaPostSettingsDTO $australiaPostSettingsDto;

    private function getAustraliaPostSettingsDto(): AustraliaPostSettingsDTO
    {
        return $this->australiaPostSettingsDto;
    }

    private function setAustraliaPostSettingsDto(AustraliaPostSettingsDTO $australiaPostSettingsDto): void
    {
        $this->australiaPostSettingsDto = $australiaPostSettingsDto;
    }

    /**
     * AustraliaPostSettings constructor
     */
    function __construct(AustraliaPostSettingsDTO $australiaPostSettingsDto)
    {
        $this->australiaPostSettingsDto = $australiaPostSettingsDto;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function initFieldsFromDto(): void
    {
    }

    public function obtainDto(...$args)
    {
    }

    /**
     * Gets or sets the Interpreting Type for the Customer Information of AustralianPost BarCode.DEFAULT is CustomerInformationInterpretingType.OTHER.
     * @return int The interpreting type (CTable, NTable or Other) of customer information for AustralianPost BarCode
     */
    public function getCustomerInformationInterpretingType(): int
    {
        return $this->getAustraliaPostSettingsDto()->customerInformationInterpretingType;
    }

    /**
     * Gets or sets the Interpreting Type for the Customer Information of AustralianPost BarCode.DEFAULT is CustomerInformationInterpretingType.OTHER.
     * @param int $value The interpreting type (CTable, NTable or Other) of customer information for AustralianPost BarCode
     */
    public function setCustomerInformationInterpretingType(int $value): void
    {
        $this->getAustraliaPostSettingsDto()->customerInformationInterpretingType = $value;
    }

    /**
     * The flag which force AustraliaPost decoder to ignore last filling patterns in Customer Information Field during decoding as CTable method.
     * CTable encoding method does not have any gaps in encoding table and sequnce "333" of filling paterns is decoded as letter "z".
     *
     * @code
     *
     * $generator = new BarcodeGenerator(EncodeTypes::AUSTRALIA_POST, "5912345678AB");
     * $generator->getParameters()->getBarcode()->getAustralianPost()->setAustralianPostEncodingTable(CustomerInformationInterpretingType::C_TABLE);
     * $image = generator->generateBarCodeImage(BarcodeImageFormat::PNG);
     * $reader = new BarCodeReader($image, null, DecodeType::AUSTRALIA_POST);
     * $reader->getBarcodeSettings()->getAustraliaPost()->setCustomerInformationInterpretingType(CustomerInformationInterpretingType::C_TABLE);
     * $reader->getBarcodeSettings()->getAustraliaPost()->setIgnoreEndingFillingPatternsForCTable(true);
     * foreach($reader->readBarCodes() as $result)
     *     echo("BarCode Type: ".$result->getCodeType());
     *     echo("BarCode CodeText: ".$result->getCodeText());
     * }
     * @endcode
     *
     * @return bool The flag which force AustraliaPost decoder to ignore last filling patterns during CTable method decoding
     */
    public function getIgnoreEndingFillingPatternsForCTable(): bool
    {
        return $this->getAustraliaPostSettingsDto()->ignoreEndingFillingPatternsForCTable;
    }

    /**
     * The flag which force AustraliaPost decoder to ignore last filling patterns in Customer Information Field during decoding as CTable method.
     * CTable encoding method does not have any gaps in encoding table and sequnce "333" of filling paterns is decoded as letter "z".
     *
     * @code
     *
     * $generator = new BarcodeGenerator(EncodeTypes::AUSTRALIA_POST, "5912345678AB");
     * $generator->getParameters()->getBarcode()->getAustralianPost()->setAustralianPostEncodingTable(CustomerInformationInterpretingType::C_TABLE);
     * $image = generator->generateBarCodeImage(BarcodeImageFormat::PNG);
     * $reader = new BarCodeReader($image, null, DecodeType::AUSTRALIA_POST);
     * $reader->getBarcodeSettings()->getAustraliaPost()->setCustomerInformationInterpretingType(CustomerInformationInterpretingType::C_TABLE);
     * $reader->getBarcodeSettings()->getAustraliaPost()->setIgnoreEndingFillingPatternsForCTable(true);
     * foreach($reader->readBarCodes() as $result)
     *     echo("BarCode Type: ".$result->getCodeType());
     *     echo("BarCode CodeText: ".$result->getCodeText());
     * }
     * @endcode
     *
     * @param bool $value The flag which force AustraliaPost decoder to ignore last filling patterns during CTable method decoding
     */
    public function setIgnoreEndingFillingPatternsForCTable(bool $value): void
    {
        $this->getAustraliaPostSettingsDto()->ignoreEndingFillingPatternsForCTable = $value;
    }
}