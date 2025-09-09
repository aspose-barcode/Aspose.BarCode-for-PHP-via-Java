<?php

namespace Aspose\Barcode\Recognition;

use Aspose\Barcode\Recognition\AustraliaPostSettings;
use Aspose\Barcode\Bridge\BarcodeSettingsDTO;
use Aspose\Barcode\Internal\Communicator;

/**
 * The main BarCode decoding parameters. Contains parameters which make influence on recognized data.
 */
class BarcodeSettings implements Communicator
{

    private BarcodeSettingsDTO $barcodeSettingsDto;

    private function getBarcodeSettingsDto(): BarcodeSettingsDTO
    {
        return $this->barcodeSettingsDto;
    }

    private function setBarcodeSettingsDto(BarcodeSettingsDTO $barcodeSettingsDto): void
    {
        $this->barcodeSettingsDto = $barcodeSettingsDto;
        $this->initFieldsFromDto();
    }

    private AustraliaPostSettings $_australiaPost;

    /**
     * BarcodeSettings copy constructor
     * @param BarcodeSettingsDTO $barcodeSettingsDto
     */
    function __construct(BarcodeSettingsDTO $barcodeSettingsDto)
    {
        $this->barcodeSettingsDto = $barcodeSettingsDto;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
    }

    public function initFieldsFromDto(): void
    {
        $this->_australiaPost = new AustraliaPostSettings($this->getBarcodeSettingsDto()->australiaPost);
    }

    /**
     * Enable checksum validation during recognition for 1D and Postal barcodes.
     * Default is treated as Yes for symbologies which must contain checksum, as No where checksum only possible.
     * Checksum never used: Codabar, PatchCode, Pharmacode, DataLogic2of5
     * Checksum is possible: Code39 Standard/Extended, Standard2of5, Interleaved2of5, ItalianPost25, Matrix2of5, MSI, ItalianPost25, DeutschePostIdentcode, DeutschePostLeitcode, VIN
     * Checksum always used: Rest symbologies
     *
     * @code
     *
     * $generator = new BarcodeGenerator(EncodeTypes::EAN_13, "1234567890128");
     * $generator->save("c:/test.png", BarcodeImageFormat::PNG);
     * $reader = new BarCodeReader("c:/test.png", null, DecodeType::EAN_13);
     * //checksum disabled
     * $reader->getBarcodeSettings()->setChecksumValidation(ChecksumValidation::OFF);
     * foreach($reader->readBarCodes() as $result)
     * {
     *      echo ("BarCode CodeText: ".$result->getCodeText());
     *      echo ("BarCode Value: " . $result->getExtended()->getOneD()->getValue());
     *      echo ("BarCode Checksum: " . $result->getExtended()->getOneD()->getCheckSum());
     * }
     * $reader = new BarCodeReader("c:\\test.png", null, DecodeType::EAN_13);
     * //checksum enabled
     * $reader->getBarcodeSettings()->setChecksumValidation(ChecksumValidation::ON);
     * foreach($reader->readBarCodes() as $result)
     * {
     *      echo ("BarCode CodeText: " . $result->CodeText);
     *      echo ("BarCode Value: " . $result->getExtended()->getOneD()->getValue());
     *      echo ("BarCode Checksum: " . $result->getExtended()->getOneD()->getCheckSum());
     * }
     * @endcode
     * @return int Enable checksum validation during recognition for 1D and Postal barcodes.
     */
    public function getChecksumValidation(): int
    {
        return $this->getBarcodeSettingsDto()->checksumValidation;
    }

    /**
     * Enable checksum validation during recognition for 1D and Postal barcodes.
     * Default is treated as Yes for symbologies which must contain checksum, as No where checksum only possible.
     * Checksum never used: Codabar, PatchCode, Pharmacode, DataLogic2of5
     * Checksum is possible: Code39 Standard/Extended, Standard2of5, Interleaved2of5, ItalianPost25, Matrix2of5, MSI, ItalianPost25, DeutschePostIdentcode, DeutschePostLeitcode, VIN
     * Checksum always used: Rest symbologies
     *
     * @code
     *
     * $generator = new BarcodeGenerator(EncodeTypes::EAN_13, "1234567890128");
     * $generator->save("c:/test.png", BarcodeImageFormat::PNG);
     * $reader = new BarCodeReader("c:/test.png", DecodeType::EAN_13);
     * //checksum disabled
     * $reader->getBarcodeSettings()->setChecksumValidation(ChecksumValidation::OFF);
     * foreach($reader->readBarCodes() as $result)
     * {
     *      echo ("BarCode CodeText: ".$result->getCodeText());
     *      echo ("BarCode Value: " . $result->getExtended()->getOneD()->getValue());
     *      echo ("BarCode Checksum: " . $result->getExtended()->getOneD()->getCheckSum());
     * }
     * $reader = new BarCodeReader(@"c:\test.png", DecodeType::EAN_13);
     * //checksum enabled
     * $reader->getBarcodeSettings()->setChecksumValidation(ChecksumValidation::ON);
     * foreach($reader->readBarCodes() as $result)
     * {
     *      echo ("BarCode CodeText: " . $result->CodeText);
     *      echo ("BarCode Value: " . $result->getExtended()->getOneD()->getValue());
     *      echo ("BarCode Checksum: " . $result->getExtended()->getOneD()->getCheckSum());
     * }
     * @endcode
     * @param int $value Enable checksum validation during recognition for 1D and Postal barcodes.
     */
    public function setChecksumValidation(int $value): void
    {
        $this->getBarcodeSettingsDto()->checksumValidation = ($value);
    }

    /**
     * Strip FNC1, FNC2, FNC3 characters from codetext. Default value is false.
     *
     * @code
     *
     * $generator = new BarcodeGenerator(EncodeTypes::GS_1_CODE_128, "(02)04006664241007(37)1(400)7019590754");
     * $generator->save("c:/test.png", BarcodeImageFormat::PNG);
     * $reader = new BarCodeReader("c:/test.png", DecodeType::CODE_128);
     *
     * //StripFNC disabled
     * $reader->getBarcodeSettings()->setStripFNC(false);
     * foreach($reader->readBarCodes() as $result)
     * {
     *     echo ("BarCode CodeText: ".$result->getCodeText());
     * }
     *
     * $reader = new BarCodeReader("c:/test.png", DecodeType::CODE_128);
     *
     * //StripFNC enabled
     * $reader->getBarcodeSettings()->setStripFNC(true);
     * foreach($reader->readBarCodes() as $result)
     * {
     *     echo ("BarCode CodeText: ".$result->getCodeText());
     * }
     * @endcode
     *
     * @return bool Strip FNC1, FNC2, FNC3 characters from codetext. Default value is false.
     */
    public function getStripFNC(): bool
    {
        return $this->getBarcodeSettingsDto()->stripFNC;
    }

    /**
     * Strip FNC1, FNC2, FNC3 characters from codetext. Default value is false.
     *
     * @code
     *
     * $generator = new BarcodeGenerator(EncodeTypes::GS_1_CODE_128, "(02)04006664241007(37)1(400)7019590754");
     * $generator->save("c:/test.png", BarcodeImageFormat::PNG);
     * $reader = new BarCodeReader("c:/test.png", DecodeType::CODE_128);
     *
     * //StripFNC disabled
     * $reader->getBarcodeSettings()->setStripFNC(false);
     * foreach($reader->readBarCodes() as $result)
     * {
     *     echo ("BarCode CodeText: ".$result->getCodeText());
     * }
     *
     * $reader = new BarCodeReader("c:/test.png", DecodeType::CODE_128);
     *
     * //StripFNC enabled
     * $reader->getBarcodeSettings()->setStripFNC(true);
     * foreach($reader->readBarCodes() as $result)
     * {
     *     echo ("BarCode CodeText: ".$result->getCodeText());
     * }
     * @endcode
     *
     * @param bool $value Strip FNC1, FNC2, FNC3 characters from codetext. Default value is false.
     */
    public function setStripFNC(bool $value): void
    {
        $this->getBarcodeSettingsDto()->stripFNC = $value;
    }

    /**
     * The flag which force engine to detect codetext encoding for Unicode codesets. Default value is true.
     *
     * @code
     *
     * $generator = new BarcodeGenerator(EncodeTypes::QR, "Слово"))
     * $im = $generator->generateBarcodeImage(BarcodeImageFormat::PNG);
     *
     * //detects encoding for Unicode codesets is enabled
     * $reader = new BarCodeReader($im, DecodeType::QR);
     * $reader->getBarcodeSettings()->setDetectEncoding(true);
     * foreach($reader->readBarCodes() as $result)
     *     echo ("BarCode CodeText: ".$result->getCodeText());
     *
     * //detect encoding is disabled
     * $reader = new BarCodeReader($im, DecodeType::QR);
     * $reader->getBarcodeSettings()->setDetectEncoding(false);
     * foreach($reader->readBarCodes() as $result)
     *     echo ("BarCode CodeText: ".$result->getCodeText());
     * @endcode
     *
     * @return bool The flag which force engine to detect codetext encoding for Unicode codesets
     */
    public function getDetectEncoding(): bool
    {
        return $this->getBarcodeSettingsDto()->detectEncoding;
    }

    public function setDetectEncoding(bool $value): void
    {
        $this->getBarcodeSettingsDto()->detectEncoding = $value;
    }

    /**
     * Gets AustraliaPost decoding parameters
     * @return AustraliaPostSettings The AustraliaPost decoding parameters which make influence on recognized data of AustraliaPost symbology
     */
    public function getAustraliaPost(): AustraliaPostSettings
    {
        return $this->_australiaPost;
    }
}