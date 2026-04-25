<?php

namespace Aspose\Barcode\Recognition;

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
     * Returns only barcode types explicitly specified for recognition.
     * When enabled, recognized barcodes of other compatible or equivalent types are filtered out.
     * Default value is false.
     *
     * <p>Example:</p>
     * <pre>
     * // generate EAN13 barcode
     * $generator = new BarcodeGenerator(EncodeTypes::EAN_13, "2383823482894");
     * $generator->save("c:\\test.png");
     *
     * // recognize only UPCA barcodes (no results, because source is EAN13)
     * $reader = new BarCodeReader("c:\\test.png", null, DecodeType::UPCA);
     * $reader->getBarcodeSettings()->setOnlyRequestedTypes(true);
     *
     * foreach ($reader->readBarCodes() as $result)
     * {
     *     echo "BarCode CodeText: " . $result->getCodeText() . PHP_EOL;
     * }
     *
     * // recognize compatible types: EAN13, UPCA, ISSN, ISMN, ISBN
     * // (EAN13 will be returned as UPCA-equivalent)
     * $reader2 = new BarCodeReader("c:\\test.png", null, DecodeType::UPCA);
     * $reader2->getBarcodeSettings()->setOnlyRequestedTypes(false);
     *
     * foreach ($reader2->readBarCodes() as $result)
     * {
     *     echo "BarCode CodeText: " . $result->getCodeText() . PHP_EOL;
     * }
     * </pre>
     *
     * @return true if only explicitly requested barcode types are returned; otherwise false
     */
    public function isOnlyRequestedTypes()
    {
        return $this->getBarcodeSettingsDto()->onlyRequestedTypes;
    }

    /**
     * Returns only barcode types explicitly specified for recognition.
     * When enabled, recognized barcodes of other compatible or equivalent types are filtered out.
     * Default value is false.
     *
     * <p>Example:</p>
     * <pre>
     *  // generate EAN13 barcode
     *  $generator = new BarcodeGenerator(EncodeTypes::EAN_13, "2383823482894");
     *  $generator->save("c:\\test.png");
     *
     *  // recognize only UPCA barcodes (no results, because source is EAN13)
     *  $reader = new BarCodeReader("c:\\test.png", null, DecodeType::UPCA);
     *  $reader->getBarcodeSettings()->setOnlyRequestedTypes(true);
     *
     *  foreach ($reader->readBarCodes() as $result)
     *  {
     *      echo "BarCode CodeText: " . $result->getCodeText() . PHP_EOL;
     *  }
     *
     *  // recognize compatible types: EAN13, UPCA, ISSN, ISMN, ISBN
     *  // (EAN13 will be returned as UPCA-equivalent)
     *  $reader2 = new BarCodeReader("c:\\test.png", null, DecodeType::UPCA);
     *  $reader2->getBarcodeSettings()->setOnlyRequestedTypes(false);
     *
     *  foreach ($reader2->readBarCodes() as $result)
     *  {
     *      echo "BarCode CodeText: " . $result->getCodeText() . PHP_EOL;
     *  }
     * </pre>
     *
     * @return true if only explicitly requested barcode types are returned; otherwise false
     */
    public function setOnlyRequestedTypes(bool $value) : void
    {
        $this->getBarcodeSettingsDto()->onlyRequestedTypes = $value;
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