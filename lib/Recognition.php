<?php
namespace Aspose\Barcode;

use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\CommonUtility;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\License;
use Aspose\Barcode\Internal\Point;
use Aspose\Barcode\Internal\Rectangle;
use Aspose\Barcode\Internal\ThriftConnection;
use DateTime;
use Exception;

use Aspose\Barcode\Bridge\QuadrangleDTO;
use Aspose\Barcode\Bridge\CodabarExtendedParametersDTO;
use Aspose\Barcode\Bridge\DataMatrixExtendedParametersDTO;
use Aspose\Barcode\Bridge\Code128DataPortionDTO;
use Aspose\Barcode\Bridge\AustraliaPostSettingsDTO;
use Aspose\Barcode\Bridge\GS1CompositeBarExtendedParametersDTO;
use Aspose\Barcode\Bridge\AztecExtendedParametersDTO;
use Aspose\Barcode\Bridge\DotCodeExtendedParametersDTO;
use Aspose\Barcode\Bridge\MaxiCodeExtendedParametersDTO;
use Aspose\Barcode\Bridge\DataBarExtendedParametersDTO;
use Aspose\Barcode\Bridge\Pdf417ExtendedParametersDTO;
use Aspose\Barcode\Bridge\QRExtendedParametersDTO;
use Aspose\Barcode\Bridge\Code128ExtendedParametersDTO;
use Aspose\Barcode\Bridge\OneDExtendedParametersDTO;
use Aspose\Barcode\Bridge\BarCodeExtendedParametersDTO;
use Aspose\Barcode\Bridge\BarCodeRegionParametersDTO;
use Aspose\Barcode\Bridge\BarCodeResultDTO;
use Aspose\Barcode\Bridge\QualitySettingsDTO;
use Aspose\Barcode\Bridge\BarcodeSettingsDTO;
use Aspose\Barcode\Bridge\BarcodeReaderDTO;
use InvalidArgumentException;
use TypeError;


/**
 * BarCodeReader encapsulates an image which may contain one or several barcodes, it then can perform ReadBarCodes operation to detect barcodes.
 *
 * This sample shows how to detect Code39 and Code128 barcodes.
 * @code
 * $reader = new BarCodeReader("test.png", DecodeType::CODE_39_STANDARD, DecodeType::CODE_128);
 * foreach($reader->readBarCodes() as $result)
 * {
 *    print("BarCode Type: ".$result->getCodeTypeName());
 *    print("BarCode CodeText: ".$result->getCodeText());
 * }
 * @endcode
 */
class BarCodeReader implements Communicator
{
    private $barCodeReaderDto;

    private function getBarCodeReaderDto(): BarcodeReaderDTO
    {
        return $this->barCodeReaderDto;
    }

    private function setBarCodeReaderDto(BarcodeReaderDTO $barCodeReaderDto): void
    {
        $this->barCodeReaderDto = $barCodeReaderDto;
//        $this->initFieldsFromDto();
    }

    private QualitySettings $qualitySettings;
    private BarcodeSettings $barcodeSettings;
    private $imageResource;
    private $areas;
    private $decodeTypes;

    function __construct($imageResource, $areas, $decodeTypes)
    {
        $this->imageResource = $imageResource;
        $this->areas = $areas;
        $this->decodeTypes = $decodeTypes;
        $this->setBarCodeReaderDto($this->obtainDto()); //TODO redundant ?
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args): BarcodeReaderDTO
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $barcodeReaderDTO = $client->BarcodeReader_ctor();
        $thriftConnection->closeConnection();
        return $barcodeReaderDTO;
    }

    public function initFieldsFromDto()
    {
        $this->qualitySettings = new QualitySettings($this->barCodeReaderDto->qualitySettings);
        $this->barcodeSettings = new BarcodeSettings($this->barCodeReaderDto->barcodeSettings);

        if ($this->imageResource !== null) {
            $this->initializeImageRelatedFields();
            $this->processDecodeTypes();
        } else {
            $this->validateNullState();
        }
    }

    /**
     * Process Image Related Parameters
     */
    private function initializeImageRelatedFields(): void
    {
        $this->barCodeReaderDto->base64Image = CommonUtility::convertImageResourceToBase64($this->imageResource);
        $this->barCodeReaderDto->areas = CommonUtility::convertAreasToStringFormattedAreas($this->areas);
    }

    /**
     * Detect Decode Types
     */
    private function processDecodeTypes(): void
    {
        $decodeTypes = $this->decodeTypes;
        if (is_null($decodeTypes)) {
            $decodeTypes = [DecodeType::ALL_SUPPORTED_TYPES];
        } elseif (is_int($decodeTypes)) {
            $decodeTypes = [$decodeTypes];
            $this->decodeTypes = $decodeTypes;
        } elseif (!is_array($decodeTypes)) {
            throw new InvalidArgumentException("Invalid type for decodeTypes. Expected int, array, or null, got " . gettype($decodeTypes));
        }

        if (CommonUtility::isClassContainsConstantValueFromArray(DecodeType::class, $decodeTypes)) {
            $this->barCodeReaderDto->barCodeDecodeTypes = $decodeTypes;
        }
    }

    /**
     * Ensures that when an image is missing, other parameters are also absent.
     *
     * @throws BarcodeException
     */
    private function validateNullState(): void
    {
        if ($this->areas !== null || $this->decodeTypes !== null) {
            throw new BarcodeException('Illegal arguments. If $imageResource = null then $areas and $decodeTypes should be null');
        }
    }


    /**
     * Determines whether any of the given decode types is included into
     * @param array $decodeTypes Types to verify.
     * @return bool Value is a true if any types are included into.
     */
    public function containsAny(...$decodeTypes): bool
    {
        try {
            foreach ($decodeTypes as $decodeType) {
                if (DecodeType::containsAny($decodeType, $this->getBarCodeReaderDto()->barCodeDecodeTypes))
                    return true;
            }
            return false;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }


    protected function init(): void
    {
        $this->qualitySettings = new QualitySettings($this->barCodeReaderDto->qualitySettings);
        $this->barcodeSettings = new BarcodeSettings($this->barCodeReaderDto->qualitySettings);
    }

    /**
     * Reads BarCodeResult from the image.
     *
     * @code
     * This sample shows how to read barcodes with BarCodeReader
     * $reader = new BarCodeReader("test.png", null, array(DecodeType::CODE_39, DecodeType::CODE_128));
     * foreach($reader->readBarCodes() as $result)
     *    print("BarCode CodeText: ".$result->getCodeText());
     * $reader = new BarCodeReader("test.png", null, array(DecodeType::CODE_39, DecodeType::CODE_128));
     * $reader->readBarCodes();
     * for($i = 0; $reader->getFoundCount() > $i; ++$i)
     *    print("BarCode CodeText: ".$reader->getFoundBarCodes()[i]->getCodeText());
     *
     * @return array of recognized {@code BarCodeResult}s on the image. If nothing is recognized, zero array is returned.
     * @throws BarcodeException
     */
    public function readBarCodes(bool $passLicense = false): array
    {
        try {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            // Deciding if the license should be used
            $licenseContent = $passLicense ? License::getLicenseContent() : null;
            // Passing the license or null
            $barcodeReaderDTO = $client->BarcodeReader_readBarCodes($this->barCodeReaderDto, $licenseContent);
            $this->setBarCodeReaderDto($barcodeReaderDTO);
            $thriftConnection->closeConnection();
        } catch (Exception $exc) {
            CommonUtility::println($exc->getMessage());
            CommonUtility::println("Stack trace: " . $exc->getTraceAsString());
            //TODO BARCODEPHP-919 Make fixes and improvements in exception handling on the Java and PHP sides
            throw CommonUtility::convertBarcodeExceptionDto($exc);
        }
        return $this->getFoundBarCodes();
    }

    /**
     * Gets recognized BarCodeResult array
     *
     * This sample shows how to read barcodes with BarCodeReader
     * @code
     * $reader = new BarCodeReader("test.png", DecodeType::CODE_39, DecodeType::CODE_128);
     * $reader->readBarCodes();
     * for($i = 0; $reader->getFoundCount() > $i; ++$i)
     * {
     *    print("BarCode CodeText: ". $reader->getFoundBarCodes()[$i]->getCodeText());
     * }
     * @endcode
     * Value: The recognized BarCodeResult array
     */
    function getFoundBarCodes(): array
    {
        // TODO Implement not recognized behavior
        $recognizedResults = array();
        $dtoRef = $this->barCodeReaderDto;
        foreach ($dtoRef->foundBarCodes as $foundBarcode) {
            $recognizedResults[] = new BarCodeResult($foundBarcode);
        }

        return $recognizedResults;
    }

    /**
     * Gets the timeout of recognition process in milliseconds.
     *
     * @code
     * $reader = new BarCodeReader("test.png");
     * $reader->setTimeout(5000);
     * foreach($reader->readBarCodes() as $result)
     *    print("BarCode CodeText: ".$result->getCodeText());
     * @endcode
     * @return int timeout.
     */
    public function getTimeout(): int
    {
        return $this->barCodeReaderDto->timeout;
    }

    /**
     * Sets the timeout of recognition process in milliseconds.
     *
     * @code
     * $reader = new BarCodeReader("test.png");
     * $reader->setTimeout(5000);
     * foreach($reader->readBarCodes() as $result)
     *    print("BarCode CodeText: ".$result->getCodeText());
     * @endcode
     * @param int $value The timeout.
     */
    public function setTimeout(int $value): void
    {
        $this->barCodeReaderDto->timeout = $value;
    }

    /**
     * Gets recognized barcodes count
     *
     * This sample shows how to read barcodes with BarCodeReader
     * @code
     * $reader = new BarCodeReader("test.png", null, DecodeType::CODE_39, DecodeType::CODE_128);
     * $reader->readBarCodes();
     * for($i = 0; $reader->getFoundCount() > $i; ++$i)
     *    print("BarCode CodeText: ".$reader->getFoundBarCodes()[i]->getCodeText());
     * @endcode
     * Value: The recognized barcodes count
     */
    public function getFoundCount(): int
    {
        return sizeof($this->getFoundBarCodes());
    }

    /**
     * QualitySettings allows to configure recognition quality and speed manually.
     * You can quickly set up QualitySettings by embedded presets: HighPerformance, NormalQuality,
     * HighQuality, MaxBarCodes or you can manually configure separate options.
     * Default value of QualitySettings is NormalQuality.
     * @code
     * This sample shows how to use QualitySettings with BarCodeReader
     *
     * $reader = new BarCodeReader("test.png");
     *  //set high performance mode
     * $reader->setQualitySettings(QualitySettings::getHighPerformance());
     * foreach($reader->readBarCodes() as $result)
     *   print("BarCode CodeText: ".$result->getCodeText());
     * $reader = new BarCodeReader("test.png", null, array(DecodeType::CODE_39, DecodeType::CODE_128));
     * //normal quality mode is set by default
     * foreach($reader->readBarCodes() as $result)
     *   print("BarCode CodeText: ".$result->getCodeText());
     * $reader = new BarCodeReader("test.png", null, array(DecodeType::CODE_39, DecodeType::CODE_128));
     * //set high performance mode
     * $reader->setQualitySettings(QualitySettings::getHighPerformance());
     * //set separate options
     * $reader->getQualitySettings()->setAllowMedianSmoothing(true);
     * $reader->getQualitySettings()->setMedianSmoothingWindowSize(5);
     * foreach($reader->readBarCodes() as $result)
     *   print("BarCode CodeText: ".$result->getCodeText());
     *
     * @return QualitySettings to configure recognition quality and speed.
     */
    public final function getQualitySettings(): QualitySettings
    {
        return $this->qualitySettings;
    }

    /**
     * QualitySettings allows to configure recognition quality and speed manually.
     * You can quickly set up QualitySettings by embedded presets: HighPerformance, NormalQuality,
     * HighQuality, MaxBarCodes or you can manually configure separate options.
     * Default value of QualitySettings is NormalQuality.
     * @code
     * This sample shows how to use QualitySettings with BarCodeReader
     *
     * $reader = new BarCodeReader("test.png");
     *  //set high performance mode
     * $reader->setQualitySettings(QualitySettings::getHighPerformance());
     * foreach($reader->readBarCodes() as $result)
     *   print("BarCode CodeText: ".$result->getCodeText());
     * $reader = new BarCodeReader("test.png", null, array(DecodeType::CODE_39, DecodeType::CODE_128));
     * //normal quality mode is set by default
     * foreach($reader->readBarCodes() as $result)
     *   print("BarCode CodeText: ".$result->getCodeText());
     * $reader = new BarCodeReader("test.png", null, array(DecodeType::CODE_39, DecodeType::CODE_128));
     * //set high performance mode
     * $reader->setQualitySettings(QualitySettings::getHighPerformance());
     * //set separate options
     * $reader->getQualitySettings()->setAllowMedianSmoothing(true);
     * $reader->getQualitySettings()->setMedianSmoothingWindowSize(5);
     * foreach($reader->readBarCodes() as $result)
     *   print("BarCode CodeText: ".$result->getCodeText());
     *
     * @param QualitySettings $qualitySettings
     */
    public function setQualitySettings(QualitySettings $qualitySettings): void
    {
        $this->barCodeReaderDto->qualitySettings = $qualitySettings->getQualitySettingsDTO();
        $this->qualitySettings = new QualitySettings($this->barCodeReaderDto->qualitySettings);
    }

    /**
     * The main BarCode decoding parameters. Contains parameters which make influence on recognized data.
     * @return BarcodeSettings  BarCode decoding parameters
     */
    public function getBarcodeSettings(): BarcodeSettings
    {
        return $this->barcodeSettings;
    }

    /**
     * Sets bitmap image and areas for recognition.
     * Must be called before ReadBarCodes() method.
     *
     * This sample shows how to detect Code39 and Code128 barcodes.
     * @code
     * $bmp = "test.png";
     * $reader = new BarCodeReader();
     * $reader->setBarCodeReadType(array(DecodeType::CODE_39, DecodeType::CODE_128));
     * $width, $height;
     * list($width, $height) = getimagesize('path_to_image')
     * $reader->setBarCodeImage($bmp, new Rectangle[] { new Rectangle(0, 0, $width, $height) });
     * foreach($reader->readBarCodes() as $result)
     * {
     *    print("BarCode Type: ".$result->getCodeTypeName());
     *    print("BarCode CodeText: ".$result->getCodeText());
     * }
     * @endcode
     * @param $imageResource
     * @param Rectangle|null ...$areas areas list for recognition
     * @throws BarcodeException
     */
    public final function setBarCodeImage($imageResource, ?Rectangle ...$areas): void
    {
        try {
            $this->barCodeReaderDto->base64Image = CommonUtility::convertImageResourceToBase64($imageResource);
            $this->barCodeReaderDto->areas = CommonUtility::convertImageResourceToBase64($areas);
            if(is_null($this->barCodeReaderDto->barCodeDecodeTypes) || sizeof($this->barCodeReaderDto->barCodeDecodeTypes) == 0)
                $this->barCodeReaderDto->barCodeDecodeTypes = array(DecodeType::ALL_SUPPORTED_TYPES);
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets SingleDecodeType type array for recognition.
     * Must be called before readBarCodes() method.
     *
     * This sample shows how to detect Code39 and Code128 barcodes.
     *
     * @code
     * $reader = new BarCodeReader();
     * $reader->setBarCodeReadType(DecodeType::CODE_39_STANDARD, DecodeType::CODE_128);
     * $reader->setBarCodeImage("test.png");
     * foreach($reader->readBarCodes() as $result)
     * {
     *     print("BarCode Type: ".$result->getCodeTypeName());
     *     print("BarCode CodeText: ".$result->getCodeText());
     * }
     * @endcode
     *
     * @param array $types The SingleDecodeType type array to read.
     */
    public function setBarCodeReadType(int ...$types): void
    {
        foreach ($types as $type)
            if (!is_int($type)) {
                throw new TypeError("Argument 1 passed to BarCodeReader::setBarCodeReadType() must be of the type int");
            }
        $this->barCodeReaderDto->barCodeDecodeTypes = $types;
    }

    public function getBarCodeDecodeType() : array
    {
        return $this->decodeTypes;
    }

    /**
     * Exports BarCode properties to the xml-file specified
     * @param string $xmlFile The path to xml file
     * @return bool Whether or not export completed successfully.
     * Returns True in case of success; False Otherwise
     */
    public function exportToXml(string $xmlFile): bool
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            //TODO BARCODEPHP-677 Implement the passing of license file content from PHP to Java
            $xmlData = $client->BarcodeReader_exportToXml($this->barCodeReaderDto);
            $thriftConnection->closeConnection();
            $isContentExported = $xmlData != null;
            if ($isContentExported)
            {
                file_put_contents($xmlFile, $xmlData);
            }
            return $isContentExported;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Import BarCode properties from xml file
     * @param string $resource The name of the xml file or path to http resource
     * @return BarCodeReader
     * @throws BarcodeException
     */
    public static function importFromXml(string $resource): BarCodeReader
    {
        try
        {
            if (CommonUtility::isPath($resource))
            {
                $resource = fopen($resource, "r");
            }
            $xmlData = (stream_get_contents($resource));
            $offset = 6;
            $xmlData = substr($xmlData, $offset, strlen($xmlData) - $offset);
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();

            $barCodeReaderDto = $client->BarcodeReader_importFromXml($xmlData);
            $thriftConnection->closeConnection();

            return BarCodeReader::construct($barCodeReaderDto);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    private static function construct(BarcodeReaderDTO $barCodeReaderDto): BarCodeReader
    {
        $barcodeReader = new BarCodeReader(null, null, null);
        $barcodeReader->setBarCodeReaderDto($barCodeReaderDto);
        return $barcodeReader;
    }
}


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

/**
 * QualitySettings allows to configure recognition quality and speed manually.
 * You can quickly set up QualitySettings by embedded presets: HighPerformance, NormalQuality,
 * HighQuality, MaxBarCodes or you can manually configure separate options.
 * Default value of QualitySettings is NormalQuality.
 *
 * This sample shows how to use QualitySettings with BarCodeReader
 * @code
 * $reader = new BarCodeReader("test.png", null, array(DecodeType::CODE_39, DecodeType::CODE_128));
 * //set high performance mode
 * $reader->setQualitySettings(QualitySettings::getHighPerformance());
 * foreach($reader->readBarCodes() as $result)
 *    print("BarCode CodeText: ".$result->getCodeText());
 * $reader = new BarCodeReader("test.png",  null, array(DecodeType::CODE_39, DecodeType::CODE_128));
 * //normal quality mode is set by default
 * foreach($reader->readBarCodes() as $result)
 *   print("BarCode CodeText: ".$result->getCodeText());
 * $reader = new BarCodeReader("test.png",  null, array(DecodeType::CODE_39, DecodeType::CODE_128));
 * //set high quality mode with low speed recognition
 * $reader->setQualitySettings(QualitySettings::getHighQuality());
 * foreach($reader->readBarCodes() as $result)
 *   print("BarCode CodeText: ".$result->getCodeText());
 * $reader = new BarCodeReader("test.png",  null, array(DecodeType::CODE_39, DecodeType::CODE_128));
 * //set max barcodes mode, which tries to find all possible barcodes, even incorrect. The slowest recognition mode
 * $reader->setQualitySettings(QualitySettings::getMaxBarCodes());
 * foreach($reader->readBarCodes() as $result)
 *   print("BarCode CodeText: ".$result->getCodeText());
 * $reader = new BarCodeReader("test.png",  null, array(DecodeType::CODE_39, DecodeType::CODE_128));
 * //set high performance mode
 * $reader->setQualitySettings(QualitySettings::getHighPerformance());
 * //set separate options
 * $reader->getQualitySettings()->setAllowMedianSmoothing(true);
 * $reader->getQualitySettings()->setMedianSmoothingWindowSize(5);
 * foreach($reader->readBarCodes() as $result)
 *       print("BarCode CodeText: ".$result->getCodeText());
 * $reader = new BarCodeReader("test.png",  null, array(DecodeType::CODE_39, DecodeType::CODE_128));
 * //default mode is NormalQuality
 * //set separate options
 * $reader->getQualitySettings()->setAllowMedianSmoothing(true);
 * $reader->getQualitySettings()->setMedianSmoothingWindowSize(5);
 * foreach($reader->readBarCodes() as $result)
 *   print("BarCode CodeText: ".$result->getCodeText());
 * @endcode
 */
final class QualitySettings implements Communicator
{
    private QualitySettingsDTO $qualitySettingsDTO;

    /**
     * @return QualitySettingsDTO instance
     */
    function getQualitySettingsDTO() : QualitySettingsDTO
    {
        return $this->qualitySettingsDTO;
    }

    /**
     * @param $qualitySettingsDTO QualitySettingsDTO instance
     */
    private function setQualitySettingsDTO(QualitySettingsDTO $qualitySettingsDTO): void
    {
        $this->qualitySettingsDTO = $qualitySettingsDTO;
        $this->initFieldsFromDto();
    }

    function __construct(QualitySettingsDTO $qualitySettingsDTO)
    {
        $this->qualitySettingsDTO = $qualitySettingsDTO;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
    }

    public function initFieldsFromDto()
    {
    }

    /**
     * HighPerformance recognition quality preset. High quality barcodes are recognized well in this mode.
     *
     * @code
     * $reader = new BarCodeReader("test.png");
     * $reader->setQualitySettings(QualitySettings::getHighPerformance());
     * @return QualitySettings HighPerformance recognition quality preset.
     * @endcode
     * @throws BarcodeException
     */
    public static function getHighPerformance(): QualitySettings
    {
        try {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $qualitySettingsDTO = $client->QualitySettings_getHighPerformance();
            $thriftConnection->closeConnection();
            return new QualitySettings($qualitySettingsDTO);
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * NormalQuality recognition quality preset. Suitable for the most of barcodes
     *
     * @code
     * $reader = new BarCodeReader("test.png");
     * $reader->setQualitySettings(QualitySettings::getNormalQuality());
     * @endcode
     *
     * @return QualitySettings NormalQuality recognition quality preset.
     * @throws BarcodeException
     */
    public static function getNormalQuality(): QualitySettings
    {
        try {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $qualitySettingsDTO = $client->QualitySettings_getNormalQuality();
            $thriftConnection->closeConnection();
            return new QualitySettings($qualitySettingsDTO);
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * HighQuality recognition quality preset. This preset is developed for low quality barcodes.
     *
     * @code
     * $reader = new BarCodeReader("test.png");
     * $reader->setQualitySettings(QualitySettings::getHighQuality());
     * @endcode
     * @return QualitySettings HighQuality recognition quality preset.
     * @throws BarcodeException
     */
    public static function getHighQuality(): QualitySettings
    {
        try {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $qualitySettingsDTO = $client->QualitySettings_getHighQuality();
            $thriftConnection->closeConnection();
            return new QualitySettings($qualitySettingsDTO);
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>
     *  MaxQuality recognition quality preset. This preset is developed to recognize all possible barcodes, even incorrect barcodes.
     *  </p><p><hr><blockquote><pre>
     *  This sample shows how to use MaxQuality mode
     *  <pre>
     *
     *  $reader = new BarCodeReader("test.png"null, null, array(DecodeType::CODE_39_FULL_ASCII, DecodeType::CODE_128));
     *  {
     *      $reader->setQualitySettings(QualitySettings::getMaxQuality());
     *      foreach($reader->readBarCodes() as $result)
     *          echo ($result->getCodeText());
     *  }
     * 	</pre>
     *  </pre></blockquote></hr></p>Value:
     *  MaxQuality recognition quality preset.
     *
     */
    public static function getMaxQuality(): QualitySettings
    {
        try {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $qualitySettingsDTO = $client->QualitySettings_getMaxQuality();
            $thriftConnection->closeConnection();
            return new QualitySettings($qualitySettingsDTO);
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Recognition mode which sets size (from 1 to infinity) of barcode minimal element: matrix cell or bar.
     * @return int : size (from 1 to infinity) of barcode minimal element: matrix cell or bar.
     */
    public function getXDimension(): int
    {
        return $this->qualitySettingsDTO->xDimension;
    }

    /**
     * Recognition mode which sets size (from 1 to infinity) of barcode minimal element: matrix cell or bar.
     * @param int : size (from 1 to infinity) of barcode minimal element: matrix cell or bar.
     */
    public function setXDimension(int $value): void
    {
        $this->qualitySettingsDTO->xDimension = $value;
    }

    /**
     * Minimal size of XDimension in pixels which is used with UseMinimalXDimension.
     * @return float : Minimal size of XDimension in pixels which is used with UseMinimalXDimension.
     */
    public function getMinimalXDimension(): float
    {
        return $this->qualitySettingsDTO->minimalXDimension;
    }

    /**
     * Minimal size of XDimension in pixels which is used with UseMinimalXDimension.
     * @param $value : Minimal size of XDimension in pixels which is used with UseMinimalXDimension.
     */
    public function setMinimalXDimension(float $value): void
    {
        $this->qualitySettingsDTO->minimalXDimension = $value;
    }

    /**
     * <p>
     * Mode which enables methods to recognize barcode elements with the selected quality. Barcode element with lower quality requires more hard methods which slows the recognition.
     * @return int : Mode which enables methods to recognize barcode elements with the selected quality.
     */
    public function getBarcodeQuality(): int
    {
        return $this->qualitySettingsDTO->barcodeQuality;
    }

    /**
     * Mode which enables methods to recognize barcode elements with the selected quality. Barcode element with lower quality requires more hard methods which slows the recognition.
     * @param $value : Mode which enables methods to recognize barcode elements with the selected quality.
     */
    public function setBarcodeQuality(int $value): void
    {
        $this->qualitySettingsDTO->barcodeQuality = $value;
    }

    /**
     * <p>
     * Deconvolution (image restorations) mode which defines level of image degradation. Originally deconvolution is a function which can restore image degraded
     * (convoluted) by any natural function like blur, during obtaining image by camera. Because we cannot detect image function which corrupt the image,
     * we have to check most well know functions like sharp or mathematical morphology.
     * @return int : Deconvolution mode which defines level of image degradation.
     */
    public function getDeconvolution(): int
    {
        return $this->qualitySettingsDTO->deconvolution;
    }

    /**
     * Deconvolution (image restorations) mode which defines level of image degradation. Originally deconvolution is a function which can restore image degraded
     * (convoluted) by any natural function like blur, during obtaining image by camera. Because we cannot detect image function which corrupt the image,
     * we have to check most well know functions like sharp or mathematical morphology.
     * @param $value : Deconvolution mode which defines level of image degradation.
     */
    public function setDeconvolution(int $value): void
    {
        $this->qualitySettingsDTO->deconvolution = $value;
    }

    /**
     * Mode which enables or disables additional recognition of barcodes on images with inverted colors (luminance).
     * @return int : Additional recognition of barcodes on images with inverse colors
     */
    public function getInverseImage(): int
    {
        return $this->qualitySettingsDTO->inverseImage;
    }

    /**
     * Mode which enables or disables additional recognition of barcodes on images with inverted colors (luminance).
     * @param $value : Additional recognition of barcodes on images with inverse colors
     */
    public function setInverseImage(int $value): void
    {
        $this->qualitySettingsDTO->inverseImage = $value;
    }

    /**
     * <p>
     * Mode which enables or disables additional recognition of color barcodes on color images.
     * @return int : Additional recognition of color barcodes on color images.
     */
    public function getComplexBackground(): int
    {
        return $this->qualitySettingsDTO->complexBackground;
    }

    /**
     * Mode which enables or disables additional recognition of color barcodes on color images.
     * @param $value : Additional recognition of color barcodes on color images.
     */
    public function setComplexBackground(int $value): void
    {
        $this->qualitySettingsDTO->complexBackground = $value;
    }

    /**
     * Allows engine to recognize barcodes which has incorrect checksumm or incorrect values. Mode can be used to recognize damaged barcodes with incorrect text.
     * @return bool : Allows engine to recognize incorrect barcodes.
     */
    public function getAllowIncorrectBarcodes(): bool
    {
        return $this->qualitySettingsDTO->allowIncorrectBarcodes;
    }

    /**
     * Allows engine to recognize barcodes which has incorrect checksumm or incorrect values. Mode can be used to recognize damaged barcodes with incorrect text.
     * @param $value : Allows engine to recognize incorrect barcodes.
     */
    public function setAllowIncorrectBarcodes(bool $value): void
    {
        $this->qualitySettingsDTO->allowIncorrectBarcodes = $value;
    }
}


/**
 * Stores recognized barcode data like SingleDecodeType type, {string} codetext,
 * BarCodeRegionParameters region and other parameters
 *
 * This sample shows how to obtain BarCodeResult.
 * @code
 * $generator = new BarcodeGenerator(EncodeTypes::Code128, "12345");
 * $generator->save("test.png");
 * $reader = new BarCodeReader("test.png", DecodeType::CODE_39, DecodeType::CODE_128);
 * foreach($reader->readBarCodes() as $result)
 * {
 *     print("BarCode Type: ".$result->getCodeTypeName());
 *     print("BarCode CodeText: ".$result->getCodeText());
 *     print("BarCode Confidence: ".$result->getConfidence());
 *     print("BarCode ReadingQuality: ".$result->getReadingQuality());
 *     print("BarCode Angle: ".$result->getRegion()->getAngle());
 * }
 * @endcode
 */
class BarCodeResult implements Communicator
{
    private BarCodeRegionParameters $region;
    private BarCodeExtendedParameters $extended;
    private BarCodeResultDTO $barCodeResultDTO;

    /**
     * @return BarCodeResultDTO instance
     */
    private function getBarCodeResultDTO() : BarCodeResultDTO
    {
        return $this->barCodeResultDTO;
    }

    /**
     * @param $barCodeResultDTO
     */
    private function setBarCodeResultDTO($barCodeResultDTO): void
    {
        $this->barCodeResultDTO = $barCodeResultDTO;
    }

    function __construct(BarCodeResultDTO $barCodeResultDTO)
    {
        $this->barCodeResultDTO = $barCodeResultDTO;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
        // TODO: Implement obtainDto() method.
    }

    public function initFieldsFromDto(): void
    {
        $this->region = new BarCodeRegionParameters($this->getBarCodeResultDTO()->region);
        $this->extended = new BarCodeExtendedParameters($this->getBarCodeResultDTO()->extended);
    }

    /**
     * @return float Gets the reading quality. Works for 1D and postal barcodes. Value: The reading quality percent
     * @throws BarcodeException
     */
    public function getReadingQuality(): float
    {
        try {
            return $this->getBarCodeResultDTO()->readingQuality;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
    
    /**
     * <p>
     *  Gets the code text with encoding.
     *  </p><p><hr><blockquote><pre>
     *  <p>This example shows how to use {@code GetCodeText}:</p>
     *  <pre>
     *  $gen = new BarcodeGenerator(EncodeTypes::DATA_MATRIX, null);
     * 	$gen->setCodeText("車種名", "932");
     * 	$gen->save("barcode.png", BarCodeImageFormat::PNG);
     *
     * 	$reader = new BarCodeReader("barcode.png", null, DecodeType::DATA_MATRIX);
     *  $results = $reader->readBarCodes();
     *  for($i = 0; i < sizeof($results); $i++)
     *  {
     *      $result = $results[$i];
     *      echo("BarCode CodeText: " . $result->getCodeText("932"));
     *  }
     * 	</pre>
     *  </pre></blockquote></hr></p>
     * @return A string containing recognized code text.
     * @param encoding The encoding for codetext.
     */
    function getCodeText(?string $encoding) : string
    {
        if($encoding == null || $encoding == "")
        {
            return $this->getBarCodeResultDTO()->codeText;
        }
        else
        {
            try
            {
                $thriftConnection = new ThriftConnection();
                $client = $thriftConnection->openConnection();
                $codeText = $client->BarcodeResult_getCodeTextWithEncoding($this->getBarCodeResultDTO()->codeBytes, $encoding);
                $thriftConnection->closeConnection();
                return $codeText;
            } catch (Exception $ex) {
                throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
            }
        }
    }

    function getCodeType()
    {
        return $this->getBarCodeResultDTO()->codeType;
    }

    function getCodeBytes()
    {
        return explode(",", $this->getBarCodeResultDTO()->codeBytes);
    }

    function getCodeTypeName()
    {
        return $this->getBarCodeResultDTO()->codeTypeName;
    }

    function getConfidence()
    {
        return $this->getBarCodeResultDTO()->confidence;
    }

    function getExtended(): BarCodeExtendedParameters
    {
        return $this->extended;
    }

    function getRegion(): BarCodeRegionParameters
    {
        return $this->region;
    }
}

/**
 * Represents the recognized barcode's region and barcode angle
 *
 * This sample shows how to get barcode Angle and bounding quadrangle values
 * @code
 * $generator = new BarcodeGenerator(EncodeTypes::Code128, "12345");
 * $generator->save("test.png");
 * $reader = new BarCodeReader("test.png", null, array( DecodeType::CODE_39, DecodeType::CODE_128));
 * foreach($reader->readBarCodes() as $result)
 * {
 *    print("BarCode CodeText: ".$result->getCodeText());
 *    print("BarCode Angle: ".$result->getRegion()->getAngle());
 *    print("BarCode Quadrangle: ".$result->getRegion()->getQuadrangle());
 * }
 * @endcode
 */
final class BarCodeRegionParameters implements Communicator
{
    private $quad;
    private $rect;
    private array $points;
    private BarCodeRegionParametersDTO $barCodeRegionParametersDTO;

    /**
     * @return BarCodeRegionParametersDTO instance
     */
    private function getBarCodeRegionParametersDTO() : BarCodeRegionParametersDTO
    {
        return $this->barCodeRegionParametersDTO;
    }

    /**
     * @param $barCodeRegionParametersDTO
     */
    private function setBarCodeRegionParametersDTO($barCodeRegionParametersDTO): void
    {
        $this->barCodeRegionParametersDTO = $barCodeRegionParametersDTO;
    }

    function __construct(BarCodeRegionParametersDTO $barCodeRegionParametersDTO)
    {
        $this->barCodeRegionParametersDTO = $barCodeRegionParametersDTO;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
        // TODO: Implement obtainDto() method.
    }

    public function initFieldsFromDto(): void
    {
        try {
            $this->quad = Quadrangle::construct($this->getBarCodeRegionParametersDTO()->quad);
            $this->rect = Rectangle::construct($this->getBarCodeRegionParametersDTO()->rectangle);
            $this->points = self::convertJavaPoints($this->getBarCodeRegionParametersDTO()->points);
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    private static function convertJavaPoints($javaPoints): array
    {
        $points = array();
        for ($i = 0; $i < sizeof($javaPoints); $i++) {
            $points[$i] = Point::construct($javaPoints[$i]);
        }

        return $points;
    }

    /**
     * @return Quadrangle Gets Quadrangle bounding barcode region Value: Returns Quadrangle bounding barcode region
     */
    public function getQuadrangle(): Quadrangle
    {
        return $this->quad;
    }

    /**
     * @return float Gets the angle of the barcode (0-360). Value: The angle for barcode (0-360).
     * @throws BarcodeException
     */
    public function getAngle(): float
    {
        try {
            return $this->getBarCodeRegionParametersDTO()->angle;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     *
     */
    /**
     * @return array Gets Points array bounding barcode region Value: Returns Points array bounding barcode region
     */
    public function getPoints(): array
    {
        return $this->points;
    }

    /**
     * @return Rectangle Gets Rectangle bounding barcode region Value: Returns Rectangle bounding barcode region
     */
    public function getRectangle(): Rectangle
    {
        return $this->rect;
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified BarCodeRegionParameters value.
     *
     * @param BarCodeRegionParameters $obj An System.Object value to compare to this instance.
     * @return bool true if obj has the same value as this instance; otherwise, false.
     */
    public function equals(BarCodeRegionParameters $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->BarCodeRegionParameters_equals($this->getBarCodeRegionParametersDTO(), $obj->getBarCodeRegionParametersDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }

    /**
     * Returns a human-readable string representation of this BarCodeRegionParameters.
     *
     * @return string A string that represents this BarCodeRegionParameters.
     */
    public function toString(): string
    {
        try {
            return $this->getBarCodeRegionParametersDTO()->toString;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}


/**
 *
 * Stores a set of four Points that represent a Quadrangle region.
 *
 */
class Quadrangle implements Communicator
{
    private Point $leftTop;
    private Point $rightTop;
    private Point $rightBottom;
    private Point $leftBottom;
    private QuadrangleDTO $quadrangleDTO;

    /**
     * @return QuadrangleDTO instance
     */
    private function getQuadrangleDTO() : QuadrangleDTO
    {
        return $this->quadrangleDTO;
    }

    /**
     * @param QuadrangleDTO $quadrangleDTO
     */
    private function setQuadrangleDTO(QuadrangleDTO $quadrangleDTO): void
    {
        $this->quadrangleDTO = $quadrangleDTO;
    }

    /**
     * Represents a Quadrangle structure with its properties left uninitialized.Value: Quadrangle
     */
    public static function EMPTY(): Quadrangle
    {
        return new Quadrangle(new Point(0, 0), new Point(0, 0), new Point(0, 0), new Point(0, 0));
    }

    static function construct(QuadrangleDTO $quadrangleDTO): Quadrangle
    {
        $quadrangle = Quadrangle::EMPTY();
        $quadrangle->setQuadrangleDTO($quadrangleDTO);
        $quadrangle->initFieldsFromDto();
        return $quadrangle;
    }

    /**
     * Initializes a new instance of the Quadrangle structure with the describing points.
     *
     * @param Point $leftTop A Point that represents the left-top corner of the Quadrangle.
     * @param Point $rightTop A Point that represents the right-top corner of the Quadrangle.
     * @param Point $rightBottom A Point that represents the right-bottom corner of the Quadrangle.
     * @param Point $leftBottom A Point that represents the left-bottom corner of the Quadrangle.
     */
    public function __construct(Point $leftTop, Point $rightTop, Point $rightBottom, Point $leftBottom)
    {
        $this->quadrangleDTO = new QuadrangleDTO();
        $this->getQuadrangleDTO()->leftTop = $leftTop->getPointDTO();
        $this->getQuadrangleDTO()->rightTop = $rightTop->getPointDTO();
        $this->getQuadrangleDTO()->rightBottom = $rightBottom->getPointDTO();
        $this->getQuadrangleDTO()->leftBottom = $leftBottom->getPointDTO();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
        // TODO: Implement obtainDto() method.
    }

    public function initFieldsFromDto(): void
    {
        $this->leftTop = Point::construct($this->getQuadrangleDTO()->leftTop);
        $this->rightTop = Point::construct($this->getQuadrangleDTO()->rightTop);
        $this->rightBottom = Point::construct($this->getQuadrangleDTO()->rightBottom);
        $this->leftBottom = Point::construct($this->getQuadrangleDTO()->leftBottom);
    }

    /**
     * Gets left-top corner Point of Quadrangle regionValue: A left-top corner Point of Quadrangle region
     */
    public function getLeftTop(): Point
    {
        return $this->leftTop;
    }

    /**
     * Gets left-top corner Point of Quadrangle regionValue: A left-top corner Point of Quadrangle region
     */
    public function setLeftTop(Point $value): void
    {
        try {
            $this->leftTop = $value;
            $this->getQuadrangleDTO()->leftTop = $value->getPointDTO();
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets right-top corner Point of Quadrangle regionValue: A right-top corner Point of Quadrangle region
     */
    public function getRightTop(): Point
    {
        return $this->rightTop;
    }

    /**
     * Gets right-top corner Point of Quadrangle regionValue: A right-top corner Point of Quadrangle region
     */
    public function setRightTop(Point $value): void
    {
        try {
            $this->rightTop = $value;
            $this->getQuadrangleDTO()->rightTop = $value->getPointDTO();
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets right-bottom corner Point of Quadrangle regionValue: A right-bottom corner Point of Quadrangle region
     */
    public function getRightBottom(): Point
    {
        return $this->rightBottom;
    }

    /**
     * Gets right-bottom corner Point of Quadrangle regionValue: A right-bottom corner Point of Quadrangle region
     */
    public function setRightBottom(Point $value): void
    {
        try {
            $this->rightBottom = $value;
            $this->getQuadrangleDTO()->rightBottom = $value->getPointDTO();
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets left-bottom corner Point of Quadrangle regionValue: A left-bottom corner Point of Quadrangle region
     */
    public function getLeftBottom(): Point
    {
        return $this->leftBottom;
    }

    /**
     * Gets left-bottom corner Point of Quadrangle regionValue: A left-bottom corner Point of Quadrangle region
     */
    public function setLeftBottom(Point $value): void
    {
        try {
            $this->leftBottom = $value;
            $this->getQuadrangleDTO()->leftBottom = $value->getPointDTO();
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Tests whether all Points of this Quadrangle have values of zero.Value: Returns true if all Points of this Quadrangle have values of zero; otherwise, false.
     */
    public function isEmpty(): bool
    {
        return $this->equals(Quadrangle::EMPTY());
    }

    /**
     * Determines if the specified Point is contained within this Quadrangle structure.
     *
     * @param Point $pt
     * @return bool Returns true if Point is contained within this Quadrangle structure; otherwise, false.
     * @throws BarcodeException
     */
    public function containsPoint(Point $pt): bool
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $containsPointResponse = $client->Quadrangle_containsPoint($this->getQuadrangleDTO(), $pt->getPointDTO());
            $thriftConnection->closeConnection();
            return $containsPointResponse;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Determines if the specified point is contained within this Quadrangle structure.
     *
     * @param int $x The x point cordinate.
     * @param int $y The y point cordinate.
     * @return bool Returns true if point is contained within this Quadrangle structure; otherwise, false.
     */
    public function containsCoordinates(int $x, int $y): bool
    {
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $containsPointResponse = $client->Quadrangle_containsCoordinates($this->getQuadrangleDTO(), $x, $y);
            $thriftConnection->closeConnection();
            return $containsPointResponse;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Determines if the specified Quadrangle is contained or intersect this Quadrangle structure.
     *
     * @param Quadrangle The Quadrangle to test.
     * @return bool Returns true if Quadrangle is contained or intersect this Quadrangle structure; otherwise, false.
     */
    public function containsQuadrangle(Quadrangle $quad): bool
    {
        try {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $containsPointResponse = $client->Quadrangle_containsQuadrangle($this->getQuadrangleDTO(), $quad->getQuadrangleDTO());
            $thriftConnection->closeConnection();
            return $containsPointResponse;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Determines if the specified Rectangle is contained or intersect this Quadrangle structure.
     *
     * @param Rectangle $rect
     * @return bool Returns true if Rectangle is contained or intersect this Quadrangle structure; otherwise, false.
     * @throws BarcodeException
     */
    public function containsRectangle(Rectangle $rect): bool
    {
        try {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $containsPointResponse = $client->Quadrangle_containsRectangle($this->getQuadrangleDTO(), $rect->getRectangleDto());
            $thriftConnection->closeConnection();
            return $containsPointResponse;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified Quadrangle value.
     *
     * @param Quadrangle $obj
     * @return bool true if obj has the same value as this instance; otherwise, false.
     */
    public function equals(Quadrangle $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->Quadrangle_equals($this->getQuadrangleDTO(), $obj->getQuadrangleDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }

    /**
     * Returns a human-readable string representation of this Quadrangle.
     *
     * @return string A string that represents this Quadrangle.
     */
    public function toString(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $str = $client->Quadrangle_toString($this->getQuadrangleDTO());
        $thriftConnection->closeConnection();

        return $str;
    }

    /**
     * Creates Rectangle bounding this Quadrangle
     *
     * @return Rectangle returns Rectangle bounding this Quadrangle
     */
    public function getBoundingRectangle(): Rectangle
    {
        try {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $boundingRectangleDTO = $client->Quadrangle_getBoundingRectangle($this->getQuadrangleDTO());
            $thriftConnection->closeConnection();
            return Rectangle::construct($boundingRectangleDTO);
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 * <p>
 * Stores extended parameters of recognized barcode
 * </p>
 */
class BarCodeExtendedParameters implements Communicator
{
    private $_oneDParameters;
    private $_code128Parameters;
    private $_qrParameters;
    private $_pdf417Parameters;
    private $_dataBarParameters;
    private $_maxiCodeParameters;
    private $_dotCodeExtendedParameters;
    private $_dataMatrixExtendedParameters;
    private $_aztecExtendedParameters;
    private $_gs1CompositeBarExtendedParameters;
    private BarCodeExtendedParametersDTO $barCodeExtendedParametersDTO;
    private $_codabarExtendedParameters;

    /**
     * @return BarCodeExtendedParametersDTO instance
     */
    private function getBarCodeExtendedParametersDTO() : BarCodeExtendedParametersDTO
    {
        return $this->barCodeExtendedParametersDTO;
    }

    /**
     * @param BarCodeExtendedParametersDTO $barCodeExtendedParametersDTO
     */
    private function setBarCodeExtendedParametersDTO(BarCodeExtendedParametersDTO $barCodeExtendedParametersDTO): void
    {
        $this->barCodeExtendedParametersDTO = $barCodeExtendedParametersDTO;
    }

    function __construct(BarCodeExtendedParametersDTO $barCodeExtendedParametersDTO)
    {
        $this->barCodeExtendedParametersDTO = $barCodeExtendedParametersDTO;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
        // TODO: Implement obtainDto() method.
    }

    public function initFieldsFromDto(): void
    {
        try {
            $this->_oneDParameters = new OneDExtendedParameters($this->getBarCodeExtendedParametersDTO()->oneDParameters);
            $this->_code128Parameters = new Code128ExtendedParameters($this->getBarCodeExtendedParametersDTO()->code128Parameters);
            $this->_qrParameters = new QRExtendedParameters($this->getBarCodeExtendedParametersDTO()->qrParameters);
            $this->_pdf417Parameters = new Pdf417ExtendedParameters($this->getBarCodeExtendedParametersDTO()->pdf417Parameters);
            $this->_dataBarParameters = new DataBarExtendedParameters($this->getBarCodeExtendedParametersDTO()->dataBarParameters);
            $this->_maxiCodeParameters = new MaxiCodeExtendedParameters($this->getBarCodeExtendedParametersDTO()->maxiCodeParameters);
            $this->_dotCodeExtendedParameters = new DotCodeExtendedParameters($this->getBarCodeExtendedParametersDTO()->dotCodeExtendedParameters);
            $this->_dataMatrixExtendedParameters = new DataMatrixExtendedParameters($this->getBarCodeExtendedParametersDTO()->dataMatrixExtendedParameters);
            $this->_aztecExtendedParameters = new AztecExtendedParameters($this->getBarCodeExtendedParametersDTO()->aztecExtendedParameters);
            $this->_gs1CompositeBarExtendedParameters = new GS1CompositeBarExtendedParameters($this->getBarCodeExtendedParametersDTO()->gs1CompositeBarExtendedParameters);
            $this->_codabarExtendedParameters = new CodabarExtendedParameters($this->getBarCodeExtendedParametersDTO()->codabarExtendedParameters);
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /** Gets a DataBar additional information DataBarExtendedParameters of recognized barcode
     * @return DataBarExtendedParameters A DataBar additional information DataBarExtendedParameters of recognized barcode
     */
    public function getDataBar(): DataBarExtendedParameters
    {
        return $this->_dataBarParameters;
    }

    /**
     * Gets a MaxiCode additional information<see cref="MaxiCodeExtendedParameters"/> of recognized barcode
     *
     * @return MaxiCodeExtendedParameters A MaxiCode additional information<see cref="MaxiCodeExtendedParameters"/> of recognized barcode
     */
    public function getMaxiCode(): MaxiCodeExtendedParameters
    {
        return $this->_maxiCodeParameters;
    }

    /**
     * <p>Gets a DotCode additional information{@code DotCodeExtendedParameters} of recognized barcode</p>Value: A DotCode additional information{@code DotCodeExtendedParameters} of recognized barcode
     */
    public function getDotCode(): DotCodeExtendedParameters
    {
        return $this->_dotCodeExtendedParameters;
    }

    /**
     * <p>Gets a DotCode additional information{@code DotCodeExtendedParameters} of recognized barcode</p>Value: A DotCode additional information{@code DotCodeExtendedParameters} of recognized barcode
     */
    public function getDataMatrix(): DataMatrixExtendedParameters
    {
        return $this->_dataMatrixExtendedParameters;
    }

    /**
     * <p>Gets a Aztec additional information{@code AztecExtendedParameters} of recognized barcode</p>Value: A Aztec additional information{@code AztecExtendedParameters} of recognized barcode
     */
    public function getAztec(): AztecExtendedParameters
    {
        return $this->_aztecExtendedParameters;
    }

    /**
     * <p>Gets a GS1CompositeBar additional information{@code GS1CompositeBarExtendedParameters} of recognized barcode</p>Value: A GS1CompositeBar additional information{@code GS1CompositeBarExtendedParameters} of recognized barcode
     */
    public function getGS1CompositeBar(): GS1CompositeBarExtendedParameters
    {
        return $this->_gs1CompositeBarExtendedParameters;
    }

    /**
     * Gets a Codabar additional information{@code CodabarExtendedParameters} of recognized barcode
     * @return CodabarExtendedParameters additional information
     */
    public  function getCodabar() : CodabarExtendedParameters
    {
        return $this->_codabarExtendedParameters;
    }

    /**
     * @return OneDExtendedParameters Gets a special data OneDExtendedParameters of 1D recognized barcode Value: A special data OneDExtendedParameters of 1D recognized barcode
     */
    public function getOneD(): OneDExtendedParameters
    {
        return $this->_oneDParameters;
    }

    /**
     * @return Code128ExtendedParameters Gets a special data Code128ExtendedParameters of Code128 recognized barcode Value: A special data Code128ExtendedParameters of Code128 recognized barcode
     */
    public function getCode128(): Code128ExtendedParameters
    {
        return $this->_code128Parameters;
    }

    /**
     * @return QRExtendedParameters Gets a QR Structured Append information QRExtendedParameters of recognized barcode Value: A QR Structured Append information QRExtendedParameters of recognized barcode
     */
    public function getQR(): QRExtendedParameters
    {
        return $this->_qrParameters;
    }

    /**
     * @return Pdf417ExtendedParameters Gets a MacroPdf417 metadata information Pdf417ExtendedParameters of recognized barcode Value: A MacroPdf417 metadata information Pdf417ExtendedParameters of recognized barcode
     */
    public function getPdf417(): Pdf417ExtendedParameters
    {
        return $this->_pdf417Parameters;
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified BarCodeExtendedParameters value.
     *
     * @param BarCodeExtendedParameters $obj An System.Object value to compare to this instance.
     * @return bool true if obj has the same value as this instance; otherwise, false.
     */
    public function equals(BarCodeExtendedParameters $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->BarCodeExtendedParameters_equals($this->getBarCodeExtendedParametersDTO(), $obj->getBarCodeExtendedParametersDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }

    /**
     * Returns a human-readable string representation of this BarCodeExtendedParameters.
     *
     * @return string A string that represents this BarCodeExtendedParameters.
     */
    public function toString(): string
    {
        try {
            return $this->getBarCodeExtendedParametersDTO()->toString; // TODO need to implement
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}


/**
 *
 * Stores special data of 1D recognized barcode like separate codetext and checksum
 *
 * This sample shows how to get 1D barcode value and checksum
 * @code
 * $generator = new BarcodeGenerator(EncodeTypes::EAN_13, "1234567890128");
 * $generator->save("test.png");
 * $reader = new BarCodeReader("test.png", DecodeType::EAN_13);
 * foreach($reader->readBarCodes() as $result)
 * {
 *    print("BarCode Type: ".$result->getCodeTypeName());
 *    print("BarCode CodeText: ".$result->getCodeText());
 *    print("BarCode Value: ".$result->getExtended()->getOneD()->getValue());
 *    print("BarCode Checksum: ".$result->getExtended()->getOneD()->getCheckSum());
 * }
 * @endcode
 */
final class OneDExtendedParameters implements Communicator
{
    private OneDExtendedParametersDTO $oneDExtendedParametersDTO;

    /**
     * @return OneDExtendedParametersDTO instance
     */
    private function getOneDExtendedParametersDTO() : OneDExtendedParametersDTO
    {
        return $this->oneDExtendedParametersDTO;
    }

    /**
     * @param $oneDExtendedParametersDTO
     */
    private function setOneDExtendedParametersDTO($oneDExtendedParametersDTO): void
    {
        $this->oneDExtendedParametersDTO = $oneDExtendedParametersDTO;
    }

    function __construct(OneDExtendedParametersDTO $oneDExtendedParametersDTO)
    {
        $this->oneDExtendedParametersDTO = $oneDExtendedParametersDTO;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
        // TODO: Implement obtainDto() method.
    }

    public function initFieldsFromDto(): void
    {
    }

    /**
     * Gets the codetext of 1D barcodes without checksum. Value: The codetext of 1D barcodes without checksum.
     */
    public function getValue(): string
    {
        try {
            return $this->getOneDExtendedParametersDTO()->value;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the checksum for 1D barcodes. Value: The checksum for 1D barcode.
     */
    public function getCheckSum(): string
    {
        try {
            return $this->getOneDExtendedParametersDTO()->checkSum;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Tests whether all parameters has only default values
     * @return bool Returns { <b>true</b>} if all parameters has only default values; otherwise, { <b>false</b>}.
     * @throws BarcodeException
     */
    public function isEmpty(): bool
    {
        try {
            return $this->getOneDExtendedParametersDTO()->empty;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified OneDExtendedParameters value.
     *
     * @param OneDExtendedParameters obj An System.Object value to compare to this instance.
     * @return bool true if obj has the same value as this instance; otherwise, false.
     */
    public function equals(OneDExtendedParameters $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->OneDExtendedParameters_equals($this->getOneDExtendedParametersDTO(), $obj->getOneDExtendedParametersDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }

    /**
     * Returns a human-readable string representation of this OneDExtendedParameters.
     *
     * @return string A string that represents this OneDExtendedParameters.
     */
    public function toString(): string
    {
        try {
            return $this->getOneDExtendedParametersDTO()->toString;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 *
 * Stores special data of Code128 recognized barcode
 * Represents the recognized barcode's region and barcode angle
 *
 * This sample shows how to get code128 raw values
 * @code
 * $generator = new BarcodeGenerator(EncodeTypes::CODE_128, "12345");
 * $generator->save("test.png");
 * $reader = new BarCodeReader("test.png", DecodeType::CODE_128);
 * foreach($reader->readBarCodes() as $result)
 * {
 *    print("BarCode Type: ".$result->getCodeTypeName());
 *    print("BarCode CodeText: ".$result->getCodeText());
 *    print("Code128 Data Portions: ".$result->getExtended()->getCode128());
 * }
 * @endcode
 */
final class Code128ExtendedParameters implements Communicator
{
    private array $code128DataPortions;
    private Code128ExtendedParametersDTO $code128ExtendedParametersDTO;

    /**
     * @return Code128ExtendedParametersDTO instance
     */
    private function getCode128ExtendedParametersDTO() : Code128ExtendedParametersDTO
    {
        return $this->code128ExtendedParametersDTO;
    }

    /**
     * @param Code128ExtendedParametersDTO $code128ExtendedParametersDTO
     */
    private function setCode128ExtendedParametersDTO(Code128ExtendedParametersDTO $code128ExtendedParametersDTO): void
    {
        $this->code128ExtendedParametersDTO = $code128ExtendedParametersDTO;
    }

    function __construct(Code128ExtendedParametersDTO $code128ExtendedParametersDTO)
    {
        $this->code128ExtendedParametersDTO = $code128ExtendedParametersDTO;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
        // TODO: Implement obtainDto() method.
    }

    public function initFieldsFromDto(): void
    {
        try {
            $this->code128DataPortions = self::convertCode128DataPortions($this->getCode128ExtendedParametersDTO()->code128DataPortions);
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    private static function convertCode128DataPortions($javaCode128DataPortions): array
    {
        $code128DataPortions = array();
        for ($i = 0; $i < sizeof($javaCode128DataPortions); $i++) {
            $code128DataPortions[] = new Code128DataPortion($javaCode128DataPortions[$i]);
        }
        return $code128DataPortions;
    }

    /**
     *  Gets Code128DataPortion array of recognized Code128 barcode Value: Array of the Code128DataPortion.
     */
    public function getCode128DataPortions(): array
    {
            return $this->code128DataPortions;
    }

    public function isEmpty(): bool
    {
        try {
            return $this->getCode128ExtendedParametersDTO()->empty;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified Code128ExtendedParameters value.
     *
     * @param Code128ExtendedParameters obj An System.Object value to compare to this instance.
     * @return bool true if obj has the same value as this instance; otherwise, false.
     */
    public function equals(Code128ExtendedParameters $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->Code128ExtendedParameters_equals($this->getCode128ExtendedParametersDTO(), $obj->getCode128ExtendedParametersDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }

    /**
     * Returns a human-readable string representation of this Code128ExtendedParameters.
     *
     * @return string A string that represents this Code128ExtendedParameters.
     */
    public function toString(): string
    {
        try {
            return $this->getCode128ExtendedParametersDTO()->toString;// TODO need to implement
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}


/**
 *
 * Stores a QR Structured Append information of recognized barcode
 *
 * This sample shows how to get QR Structured Append data
 * @code
 * $reader = new BarCodeReader("test.png", DecodeType::QR);
 * foreach($reader->readBarCodes() as $result)
 * {
 *    print("BarCode Type: ".$result->getCodeTypeName());
 *    print("BarCode CodeText: ".$result->getCodeText());
 *    print("QR Structured Append Quantity: ".$result->getExtended()->getQR()->getQRStructuredAppendModeBarCodesQuantity());
 *    print("QR Structured Append Index: ".$result->getExtended()->getQR()->getQRStructuredAppendModeBarCodeIndex());
 *    print("QR Structured Append ParityData: ".$result->getExtended()->getQR()->getQRStructuredAppendModeParityData());
 * }
 * @endcode
 */
final class QRExtendedParameters implements Communicator
{
    private QRExtendedParametersDTO $qrExtendedParametersDTO;

    /**
     * @return QRExtendedParametersDTO instance
     */
    private function getQRExtendedParametersDTO() : QRExtendedParametersDTO
    {
        return $this->qrExtendedParametersDTO;
    }

    /**
     * @param $qrExtendedParametersDTO
     */
    private function setQRExtendedParametersDTO($qrExtendedParametersDTO): void
    {
        $this->qrExtendedParametersDTO = $qrExtendedParametersDTO;
    }

    function __construct(QRExtendedParametersDTO $qrExtendedParametersDTO)
    {
        $this->qrExtendedParametersDTO = $qrExtendedParametersDTO;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
        // TODO: Implement obtainDto() method.
    }

    public function initFieldsFromDto(): void
    {
        // TODO: Implement init() method.
    }

    /**
     * Gets the QR structured append mode barcodes quantity. Default value is -1.Value: The quantity of the QR structured append mode barcode.
     */
    public function getQRStructuredAppendModeBarCodesQuantity(): int
    {
        try {
            return $this->getQRExtendedParametersDTO()->qRStructuredAppendModeBarCodesQuantity;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the index of the QR structured append mode barcode. Index starts from 0. Default value is -1.Value: The quantity of the QR structured append mode barcode.
     */
    public function getQRStructuredAppendModeBarCodeIndex(): int
    {
        try {
            return $this->getQRExtendedParametersDTO()->qRStructuredAppendModeBarCodeIndex;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Version of recognized QR Code. From Version1 to Version40.
     * return recognized QR Code
     */
    public function getQRVersion() : int
    {
        return $this->getQRExtendedParametersDTO()->qrVersion;
    }

    /**
     * Version of recognized MicroQR Code. From M1 to M4.
     * return recognized MicroQR Code. From M1 to M4.
     */
    public function getMicroQRVersion() : int
    {
        return $this->getQRExtendedParametersDTO()->microQRVersion;
    }

    /**
     * Version of recognized RectMicroQR Code. From R7x43 to R17x139.
     * @return int of recognized RectMicroQR Code
     */
    public function getRectMicroQRVersion() : int
    {
        return $this->getQRExtendedParametersDTO()->rectMicroQRVersion;
    }

    /**
     * Reed-Solomon error correction level of recognized barcode. From low to high: LevelL, LevelM, LevelQ, LevelH.
     * @return int error correction level of recognized barcode.
     */
    public function getQRErrorLevel() : int
    {
        return $this->getQRExtendedParametersDTO()->qrErrorLevel;
    }


    /**
     * Gets the QR structured append mode parity data. Default value is -1.Value: The index of the QR structured append mode barcode.
     */
    public function getQRStructuredAppendModeParityData(): int
    {
        try {
            return $this->getQRExtendedParametersDTO()->qRStructuredAppendModeParityData;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    public function isEmpty(): bool
    {
        try {
            return $this->getQRExtendedParametersDTO()->empty;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified QRExtendedParameters value.
     *
     * @param QRExtendedParameters $obj An object value to compare to this instance.
     * @return bool true if obj has the same value as this instance; otherwise, false.
     */
    public function equals(QRExtendedParameters $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->QRExtendedParameters_equals($this->getQRExtendedParametersDTO(), $obj->getQRExtendedParametersDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }

    /**
     * Returns a human-readable string representation of this QRExtendedParameters.
     *
     * @return string A string that represents this QRExtendedParameters.
     */
    public function toString(): string
    {
        try {
            return $this->getQRExtendedParametersDTO()->toString;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 *
 * Stores a MacroPdf417 metadata information of recognized barcode
 *
 * This sample shows how to get Macro Pdf417 metadata
 * @code
 * $generator = new BarcodeGenerator(EncodeTypes::MacroPdf417, "12345");
 * $generator->getParameters()->getBarcode()->getPdf417()->setPdf417MacroFileID(10);
 * $generator->getParameters()->getBarcode()->getPdf417()->setPdf417MacroSegmentsCount(2);
 * $generator->getParameters()->getBarcode()->getPdf417()->setPdf417MacroSegmentID(1);
 * $generator->save("test.png");
 * $reader = new BarCodeReader("test.png", DecodeType::MACRO_PDF_417);
 * foreach($reader->readBarCodes() as $result)
 * {
 *     print("BarCode Type: ".$result->getCodeTypeName());
 *     print("BarCode CodeText: ".$result->getCodeText());
 *     print("Macro Pdf417 FileID: ".$result->getExtended()->getPdf417()->getMacroPdf417FileID());
 *     print("Macro Pdf417 Segments: ".$result->getExtended()->getPdf417()->getMacroPdf417SegmentsCount());
 *     print("Macro Pdf417 SegmentID: ".$result->getExtended()->getPdf417()->getMacroPdf417SegmentID());
 * }
 * @endcode
 */
final class Pdf417ExtendedParameters implements Communicator
{
    private Pdf417ExtendedParametersDTO $pdf417ExtendedParametersDTO;

    /**
     * @return Pdf417ExtendedParametersDTO instance
     */
    private function getPdf417ExtendedParametersDTO() : Pdf417ExtendedParametersDTO
    {
        return $this->pdf417ExtendedParametersDTO;
    }

    /**
     * @param $pdf417ExtendedParametersDTO
     */
    private function setQRExtendedParametersDTO($pdf417ExtendedParametersDTO): void
    {
        $this->pdf417ExtendedParametersDTO = $pdf417ExtendedParametersDTO;
    }

    function __construct(Pdf417ExtendedParametersDTO $pdf417ExtendedParametersDTO)
    {
        $this->pdf417ExtendedParametersDTO = $pdf417ExtendedParametersDTO;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
        // TODO: Implement obtainDto() method.
    }

    public function initFieldsFromDto(): void
    {
        // TODO: Implement init() method.
    }

    /**
     * Gets the file ID of the barcode, only available with MacroPdf417.Value: The file ID for MacroPdf417
     */
    public function getMacroPdf417FileID(): string
    {
        try {
            return $this->getPdf417ExtendedParametersDTO()->macroPdf417FileID;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the segment ID of the barcode,only available with MacroPdf417.Value: The segment ID of the barcode.
     */
    public function getMacroPdf417SegmentID(): int
    {
        try {
            return $this->getPdf417ExtendedParametersDTO()->macroPdf417SegmentID;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets macro pdf417 barcode segments count. Default value is -1.Value: Segments count.
     */
    public function getMacroPdf417SegmentsCount(): int
    {
        try {
            return $this->getPdf417ExtendedParametersDTO()->macroPdf417SegmentsCount;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Macro PDF417 file name (optional).
     * @return string File name.
     */
    public function getMacroPdf417FileName(): string
    {
        try {
            return $this->getPdf417ExtendedParametersDTO()->macroPdf417FileName;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Macro PDF417 file size (optional).
     * @return int File size.
     */
    public function getMacroPdf417FileSize(): int
    {
        try {
            return $this->getPdf417ExtendedParametersDTO()->macroPdf417FileSize;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Macro PDF417 sender name (optional).
     * @return string Sender name
     */
    public function getMacroPdf417Sender(): string
    {
        try {
            return $this->getPdf417ExtendedParametersDTO()->macroPdf417Sender;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Macro PDF417 addressee name (optional).
     * @return string Addressee name.
     */
    public function getMacroPdf417Addressee(): string
    {
        try {
            return $this->getPdf417ExtendedParametersDTO()->macroPdf417Addressee;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Macro PDF417 time stamp (optional).
     * @return DateTime Time stamp.
     */
    public function getMacroPdf417TimeStamp(): DateTime
    {
        try {
            return new DateTime('@' . $this->getPdf417ExtendedParametersDTO()->macroPdf417TimeStamp);
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Macro PDF417 checksum (optional).
     * @return int Checksum.
     */
    public function getMacroPdf417Checksum(): int
    {
        try {
            return $this->getPdf417ExtendedParametersDTO()->macroPdf417Checksum;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Indicates whether the segment is the last segment of a Macro PDF417 file.
     */
    public function getMacroPdf417Terminator(): bool
    {
        try {
            return $this->getPdf417ExtendedParametersDTO()->macroPdf417Terminator;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>Used to instruct the reader to interpret the data contained within the symbol as programming for reader initialization.</p>Value: Reader initialization flag
     */
    public function isReaderInitialization(): bool
    {
        return $this->getPdf417ExtendedParametersDTO()->isReaderInitialization;
    }

    /**
     * <p>Flag that indicates that the barcode must be linked to 1D barcode.</p>Value: Linkage flag
     */
    public function isLinked(): bool
    {
        return $this->getPdf417ExtendedParametersDTO()->isLinked;
    }

    /**
     * Flag that indicates that the MicroPdf417 barcode encoded with 908, 909, 910 or 911 Code 128 emulation codewords.
     * @return bool 128 emulation flag
     */
    public function isCode128Emulation(): bool
    {
        return $this->getPdf417ExtendedParametersDTO()->isCode128Emulation;
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified Pdf417ExtendedParameters value.
     *
     * @param Pdf417ExtendedParameters $obj An System.Object value to compare to this instance.
     * @return bool true if obj has the same value as this instance; otherwise, false.
     */
    public function equals(Pdf417ExtendedParameters $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->Pdf417ExtendedParameters_equals($this->getPdf417ExtendedParametersDTO(), $obj->getPdf417ExtendedParametersDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }

    /**
     * Returns a human-readable string representation of this Pdf417ExtendedParameters.
     * @return string A string that represents this Pdf417ExtendedParameters.
     * @throws BarcodeException
     */
    public function toString(): string
    {
        try {
            return $this->getPdf417ExtendedParametersDTO()->toString;// TODO implement
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}


/**
 * Stores a DataBar additional information of recognized barcode
 *
 * @code
 * $reader = new BarCodeReader("test.png", DecodeType::DATABAR_OMNI_DIRECTIONAL);
 *
 * foreach($reader->readBarCodes() as $result)
 * {
 *    print("BarCode Type: ".result->getCodeTypeName());
 *    print("BarCode CodeText: ".result->getCodeText());
 *    print("QR Structured Append Quantity: ".result->getExtended()->getQR()->getQRStructuredAppendModeBarCodesQuantity());
 * }
 * @endcode
 */
class DataBarExtendedParameters implements Communicator
{
    private DataBarExtendedParametersDTO $dataBarExtendedParametersDTO;

    /**
     * @return DataBarExtendedParametersDTO instance
     */
    private function getDataBarExtendedParametersDTO() : DataBarExtendedParametersDTO
    {
        return $this->dataBarExtendedParametersDTO;
    }

    /**
     * @param $dataBarExtendedParametersDTO
     */
    private function setQRExtendedParametersDTO($dataBarExtendedParametersDTO): void
    {
        $this->dataBarExtendedParametersDTO = $dataBarExtendedParametersDTO;
    }

    function __construct(DataBarExtendedParametersDTO $dataBarExtendedParametersDTO)
    {
        $this->dataBarExtendedParametersDTO = $dataBarExtendedParametersDTO;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
        // TODO: Implement obtainDto() method.
    }

    public function initFieldsFromDto(): void
    {
        // TODO: Implement init() method.
    }

    /**
     * Gets the DataBar 2D composite component flag. Default value is false.
     * @return bool The DataBar 2D composite component flag.
     */
    public function is2DCompositeComponent(): bool
    {
        try {
            return $this->getDataBarExtendedParametersDTO()->is2DCompositeComponent;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified DataBarExtendedParameters value.
     * @param DataBarExtendedParameters $obj An System.Object value to compare to this instance.
     * @return bool true if obj has the same value as this instance; otherwise, <b>false</b>.
     */
    public function equals(DataBarExtendedParameters $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->DataBarExtendedParameters_equals($this->getDataBarExtendedParametersDTO(), $obj->getDataBarExtendedParametersDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }

    /**
     * Returns a human-readable string representation of this DataBarExtendedParameters.
     * @return string A string that represents this DataBarExtendedParameters.
     */
    public function toString(): string
    {
        try {
            return $this->getDataBarExtendedParametersDTO()->toString;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}


/**
 * Stores a MaxiCode additional information of recognized barcode
 */
class MaxiCodeExtendedParameters implements Communicator
{
    private MaxiCodeExtendedParametersDTO $maxiCodeExtendedParametersDTO;

    /**
     * @return MaxiCodeExtendedParametersDTO instance
     */
    private function getMaxiCodeExtendedParametersDTO() : MaxiCodeExtendedParametersDTO
    {
        return $this->maxiCodeExtendedParametersDTO;
    }

    /**
     * @param $maxiCodeExtendedParametersDTO
     */
    private function setMaxiCodeExtendedParametersDTO($maxiCodeExtendedParametersDTO): void
    {
        $this->maxiCodeExtendedParametersDTO = $maxiCodeExtendedParametersDTO;
    }

    function __construct(MaxiCodeExtendedParametersDTO $maxiCodeExtendedParametersDTO)
    {
        $this->maxiCodeExtendedParametersDTO = $maxiCodeExtendedParametersDTO;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
        // TODO: Implement obtainDto() method.
    }

    public function initFieldsFromDto(): void
    {
        // TODO: Implement init() method.
    }

    /**
     * Gets a MaxiCode encode mode.
     *  Default value: Mode4
     */
    public function getMaxiCodeMode(): int
    {
        return $this->getMaxiCodeExtendedParametersDTO()->maxiCodeMode;
    }

    /**
     * Sets a MaxiCode encode mode.
     *  Default value: Mode4
     */
    public function setMaxiCodeMode(int $maxiCodeMode): void
    {
        $this->getMaxiCodeExtendedParametersDTO()->maxiCodeMode = $maxiCodeMode;
    }

    /**
     * Gets a MaxiCode barcode id in structured append mode.
     * Default value: 0
     */
    public function getMaxiCodeStructuredAppendModeBarcodeId(): int
    {
        return $this->getMaxiCodeExtendedParametersDTO()->maxiCodeStructuredAppendModeBarcodeId;
    }

    /**
     * Sets a MaxiCode barcode id in structured append mode.
     * Default value: 0
     */
    public function setMaxiCodeStructuredAppendModeBarcodeId(int $value): void
    {
        $this->getMaxiCodeExtendedParametersDTO()->maxiCodeStructuredAppendModeBarcodeId = $value;
    }

    /**
     * Gets a MaxiCode barcodes count in structured append mode.
     * Default value: -1
     */
    public function getMaxiCodeStructuredAppendModeBarcodesCount(): int
    {
        return $this->getMaxiCodeExtendedParametersDTO()->maxiCodeStructuredAppendModeBarcodesCount;
    }

    /**
     * Sets a MaxiCode barcodes count in structured append mode.
     * Default value: -1
     */
    public function setMaxiCodeStructuredAppendModeBarcodesCount(int $value): void
    {
        $this->getMaxiCodeExtendedParametersDTO()->maxiCodeStructuredAppendModeBarcodesCount = $value;
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified MaxiCodeExtendedParameters value.
     * @param MaxiCodeExtendedParameters $obj An System.Object value to compare to this instance.
     * @return bool <b>true</b> if obj has the same value as this instance; otherwise, <b>false</b>.
     */
    public function equals(MaxiCodeExtendedParameters $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->MaxiCodeExtendedParameters_equals($this->getMaxiCodeExtendedParametersDTO(), $obj->getMaxiCodeExtendedParametersDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }

    /**
     * Returns a human-readable string representation of this MaxiCodeExtendedParameters.
     * @return string A string that represents this MaxiCodeExtendedParameters.
     */
    public function toString(): string
    {
        return $this->getMaxiCodeExtendedParametersDTO()->toString;
    }
}

/**
 * <p>
 * Stores special data of DotCode recognized barcode
 * </p><p><hr><blockquote><pre>
 * This sample shows how to get DotCode raw values
 * <pre>
 *
 * $generator = new BarcodeGenerator(EncodeTypes::DOT_CODE, "12345");
 * {
 *     $generator->save("c:\\test.png", BarCodeImageFormat::PNG);
 * }
 * $reader = new BarCodeReader("c:\\test.png", null, DecodeType::DOT_CODE);
 * {
 *     foreach($reader->readBarCodes() as $result)
 *     {
 *         print("BarCode type: " . $result->getCodeTypeName());
 *         print("BarCode codetext: " . $result->getCodeText());
 *         print("DotCode barcode ID: " . $result->getExtended()->getDotCode()->getDotCodeStructuredAppendModeBarcodeId());
 *         print("DotCode barcodes count: " . $result->getExtended()->getDotCode()->getDotCodeStructuredAppendModeBarcodesCount());
 *     }
 * }
 * </pre>
 * </pre></blockquote></hr></p>
 */
class DotCodeExtendedParameters implements Communicator
{
    private DotCodeExtendedParametersDTO $dotCodeExtendedParametersDTO;

    /**
     * @return DotCodeExtendedParametersDTO instance
     */
    private function getDotCodeExtendedParametersDTO() : DotCodeExtendedParametersDTO
    {
        return $this->dotCodeExtendedParametersDTO;
    }

    /**
     * @param $dotCodeExtendedParametersDTO
     */
    private function setDotCodeExtendedParametersDTO($dotCodeExtendedParametersDTO): void
    {
        $this->dotCodeExtendedParametersDTO = $dotCodeExtendedParametersDTO;
    }

    function __construct(DotCodeExtendedParametersDTO $dotCodeExtendedParametersDTO)
    {
        $this->dotCodeExtendedParametersDTO = $dotCodeExtendedParametersDTO;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
        // TODO: Implement obtainDto() method.
    }

    public function initFieldsFromDto(): void
    {
        // TODO: Implement init() method.
    }

    /**
     * <p>Gets the DotCode structured append mode barcodes count. Default value is -1. Count must be a value from 1 to 35.</p>Value: The count of the DotCode structured append mode barcode.
     */
    public function getDotCodeStructuredAppendModeBarcodesCount(): int
    {
        return $this->getDotCodeExtendedParametersDTO()->dotCodeStructuredAppendModeBarcodesCount;
    }

    /**
     * <p>Gets the ID of the DotCode structured append mode barcode. ID starts from 1 and must be less or equal to barcodes count. Default value is -1.</p>Value: The ID of the DotCode structured append mode barcode.
     */
    public function getDotCodeStructuredAppendModeBarcodeId(): int
    {
        return $this->getDotCodeExtendedParametersDTO()->dotCodeStructuredAppendModeBarcodeId;
    }

    /**
     * <p>
     * Indicates whether code is used for instruct reader to interpret the following data as instructions for initialization or reprogramming of the bar code reader.
     * Default value is false.
     * </p>
     */
    public function getDotCodeIsReaderInitialization(): bool
    {
        return $this->getDotCodeExtendedParametersDTO()->dotCodeIsReaderInitialization;
    }

    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code DotCodeExtendedParameters} value.
     * </p>
     * @param DotCodeExtendedParameters $obj
     * @return bool ```php
     */
    public function equals(DotCodeExtendedParameters $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->DotCodeExtendedParameters_equals($this->getDotCodeExtendedParametersDTO(), $obj->getDotCodeExtendedParametersDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }

    /**
     * <p>
     * Returns a human-readable string representation of this {@code DotCodeExtendedParameters}.
     * </p>
     * @return string that represents this {@code DotCodeExtendedParameters}.
     */
    public function toString(): string
    {
        return $this->getDotCodeExtendedParametersDTO()->toString;
    }
}

/**
 * <p>
 * Stores special data of DataMatrix recognized barcode
 * </p><p><hr><blockquote><pre>
 * This sample shows how to get DataMatrix raw values
 * <pre>
 * $generator = new BarcodeGenerator(EncodeTypes.DATA_MATRIX, "12345"))
 * $generator->save("c:\\test.png", BarcodeImageFormat::PNG);
 *
 * $reader = new BarCodeReader("c:\\test.png", null, DecodeType::DATA_MATRIX))
 * foreach($reader->readBarCodes() as $result)
 * {
 *    echo("BarCode type: " . $result->getCodeTypeName());
 *    echo("BarCode codetext: " . $result->getCodeText());
 *    echo("DataMatrix barcode ID: " . $result->getExtended()->getDataMatrix()->getStructuredAppendBarcodeId());
 *    echo("DataMatrix barcodes count: " . $result->getExtended()->getDataMatrix()->getStructuredAppendBarcodesCount());
 *    echo("DataMatrix file ID: " . $result->getExtended()->getDataMatrix()->getStructuredAppendFileId());
 *    echo("DataMatrix is reader programming: " . $result->getExtended()->getDataMatrix()->isReaderProgramming());
 * }
 * </pre>
 * </pre></blockquote></hr></p>
 */
class DataMatrixExtendedParameters implements Communicator
{
    private DataMatrixExtendedParametersDTO $dataMatrixExtendedParametersDTO;

    /**
     * @return DataMatrixExtendedParametersDTO instance
     */
    private function getDataMatrixExtendedParametersDTO() : DataMatrixExtendedParametersDTO
    {
        return $this->dataMatrixExtendedParametersDTO;
    }

    /**
     * @param $dataMatrixExtendedParametersDTO
     */
    private function setDataMatrixExtendedParametersDTO($dataMatrixExtendedParametersDTO): void
    {
        $this->dataMatrixExtendedParametersDTO = $dataMatrixExtendedParametersDTO;
    }

    function __construct(DataMatrixExtendedParametersDTO $dataMatrixExtendedParametersDTO)
    {
        $this->dataMatrixExtendedParametersDTO = $dataMatrixExtendedParametersDTO;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
        // TODO: Implement obtainDto() method.
    }

    public function initFieldsFromDto(): void
    {
        // TODO: Implement init() method.
    }

    /**
     * <p>Gets the DataMatrix structured append mode barcodes count. Default value is -1. Count must be a value from 1 to 35.</p>Value: The count of the DataMatrix structured append mode barcode.
     */
    public function getStructuredAppendBarcodesCount(): int
    {
        return $this->getDataMatrixExtendedParametersDTO()->structuredAppendBarcodesCount;
    }

    /**
     * <p>Gets the ID of the DataMatrix structured append mode barcode. ID starts from 1 and must be less or equal to barcodes count. Default value is -1.</p>Value: The ID of the DataMatrix structured append mode barcode.
     */
    public function getStructuredAppendBarcodeId(): int
    {
        return $this->getDataMatrixExtendedParametersDTO()->structuredAppendBarcodeId;
    }

    /**
     * <p>Gets the ID of the DataMatrix structured append mode barcode. ID starts from 1 and must be less or equal to barcodes count. Default value is -1.</p>Value: The ID of the DataMatrix structured append mode barcode.
     */
    public function getStructuredAppendFileId(): int
    {
        return $this->getDataMatrixExtendedParametersDTO()->structuredAppendFileId;
    }

    /**
     * <p>
     * Indicates whether code is used for instruct reader to interpret the following data as instructions for initialization or reprogramming of the bar code reader.
     * Default value is false.
     * </p>
     */
    public function isReaderProgramming(): bool
    {
        return $this->getDataMatrixExtendedParametersDTO()->readerProgramming;
    }

    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code DataMatrixExtendedParameters} value.
     * </p>
     * @param DataMatrixExtendedParameters $obj
     * @return bool ```php
     */
    public function equals(DataMatrixExtendedParameters $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->DataMatrixExtendedParameters_equals($this->getDataMatrixExtendedParametersDTO(), $obj->getDataMatrixExtendedParametersDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }

    /**
     * <p>
     * Returns a human-readable string representation of this {@code DataMatrixExtendedParameters}.
     * </p>
     * @return string that represents this {@code DataMatrixExtendedParameters}.
     */
    public function toString(): string
    {
        return $this->getDataMatrixExtendedParametersDTO()->toString;
    }
}


/**
 * Stores special data of Aztec recognized barcode *
 * This sample shows how to get Aztec raw values
 *
 * @code
 * $generator = new BarcodeGenerator(EncodeTypes::AZTEC, "12345");
 * $generator->save("test.png", BarcodeImageFormat::PNG);
 *
 * $reader = new BarCodeReader("test.png", null, DecodeType::AZTEC);
 * foreach($reader->readBarCodes() as $result)
 * {
 *     echo("BarCode type: " . $result->getCodeTypeName());
 *     echo("BarCode codetext: " . $result->getCodeText());
 *     echo("Aztec barcode ID: " . $result->getExtended()->getAztec()->getStructuredAppendBarcodeId());
 *     echo("Aztec barcodes count: " . $result->getExtended()->getAztec()->getStructuredAppendBarcodesCount());
 *     echo("Aztec file ID: " . $result->getExtended()->getAztec()->getStructuredAppendFileId());
 *     echo("Aztec is reader initialization: " . $result->getExtended()->getAztec()->isReaderInitialization());
 * }
 * @endcode
 */
class AztecExtendedParameters implements Communicator
{
    private AztecExtendedParametersDTO $aztecExtendedParametersDTO;

    /**
     * @return AztecExtendedParametersDTO instance
     */
    private function getAztecExtendedParametersDTO() : AztecExtendedParametersDTO
    {
        return $this->aztecExtendedParametersDTO;
    }

    /**
     * @param $aztecExtendedParametersDTO
     */
    private function setAztecExtendedParametersDTO($aztecExtendedParametersDTO): void
    {
        $this->aztecExtendedParametersDTO = $aztecExtendedParametersDTO;
    }

    function __construct(AztecExtendedParametersDTO $aztecExtendedParametersDTO)
    {
        $this->aztecExtendedParametersDTO = $aztecExtendedParametersDTO;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
        // TODO: Implement obtainDto() method.
    }

    public function initFieldsFromDto(): void
    {
        // TODO: Implement init() method.
    }

    /**
     * <p>Gets the Aztec structured append mode barcodes count. Default value is 0. Count must be a value from 1 to 26.</p>Value: The barcodes count of the Aztec structured append mode.
     */
    public function getStructuredAppendBarcodesCount(): int
    {
        return $this->getAztecExtendedParametersDTO()->structuredAppendBarcodesCount;
    }

    /**
     * <p>Gets the ID of the Aztec structured append mode barcode. ID starts from 1 and must be less or equal to barcodes count. Default value is 0.</p>Value: The barcode ID of the Aztec structured append mode.
     */
    public function getStructuredAppendBarcodeId(): int
    {
        return $this->getAztecExtendedParametersDTO()->structuredAppendBarcodeId;
    }

    /**
     * <p>Gets the File ID of the Aztec structured append mode. Default value is empty string</p>Value: The File ID of the Aztec structured append mode.
     */
    public function getStructuredAppendFileId(): string
    {
        return $this->getAztecExtendedParametersDTO()->structuredAppendFileId;
    }

    /**
     * <p>
     * Indicates whether code is used for instruct reader to interpret the following data as instructions for initialization or reprogramming of the bar code reader.
     * Default value is false.
     * </p>
     */
    public function isReaderInitialization(): bool
    {
        return $this->getAztecExtendedParametersDTO()->readerInitialization;
    }

    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code AztecExtendedParameters} value.
     * </p>
     * @param AztecExtendedParameters $obj
     * @return bool ```php
     */
    public function equals(AztecExtendedParameters $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->AztecExtendedParameters_equals($this->getAztecExtendedParametersDTO(), $obj->getAztecExtendedParametersDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }

    /**
     * <p>
     * Returns a human-readable string representation of this {@code AztecExtendedParameters}.
     * </p>
     * @return string that represents this {@code AztecExtendedParameters}.
     */
    public function toString(): string
    {
        return $this->getAztecExtendedParametersDTO()->toString;
    }
}

/**
 * <p>
 * Stores a Codabar additional information of recognized barcode
 * </p>
 */
class CodabarExtendedParameters implements Communicator
{
    private CodabarExtendedParametersDTO $codabarExtendedParametersDTO;

    /**
     * @return CodabarExtendedParametersDTO instance
     */
    private function getCodabarExtendedParametersDTO() : CodabarExtendedParametersDTO
    {
        return $this->codabarExtendedParametersDTO;
    }

    /**
     * @param $codabarExtendedParametersDTO
     */
    private function setCodabarExtendedParametersDTO($codabarExtendedParametersDTO): void
    {
        $this->codabarExtendedParametersDTO = $codabarExtendedParametersDTO;
    }

    function __construct(CodabarExtendedParametersDTO $codabarExtendedParametersDTO)
    {
        $this->codabarExtendedParametersDTO = $codabarExtendedParametersDTO;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
        // TODO: Implement obtainDto() method.
    }

    public function initFieldsFromDto(): void
    {
        // TODO: Implement init() method.
    }

    /**
     * <p>
     * Gets or sets a Codabar start symbol.
     * Default value: CodabarSymbol.A
     * </p>
     */
    public function getCodabarStartSymbol() :int
    {
        return $this->getCodabarExtendedParametersDTO()->codabarStartSymbol;
    }

    /**
     * <p>
     * Gets or sets a Codabar start symbol.
     * Default value: CodabarSymbol.A
     * </p>
     */
    public function setCodabarStartSymbol(int $value) : void
    {
        $this->getCodabarExtendedParametersDTO()->codabarStartSymbol = $value;
    }

    /**
     * <p>
     * Gets or sets a Codabar stop symbol.
     * Default value: CodabarSymbol.A
     * </p>
     */
    public function getCodabarStopSymbol() : int
    {
        return $this->getCodabarExtendedParametersDTO()->codabarStopSymbol;
    }

    /**
     * <p>
     * Gets or sets a Codabar stop symbol.
     * Default value: CodabarSymbol.A
     * </p>
     */
    public function setCodabarStopSymbol(int $value) : void
    {
        $this->getCodabarExtendedParametersDTO()->codabarStopSymbol = $value;
    }

    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code AztecExtendedParameters} value.
     * </p>
     * @param CodabarExtendedParameters $obj
     * @return bool ```php
     */
    public function equals(CodabarExtendedParameters $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->CodabarExtendedParameters_equals($this->getCodabarExtendedParametersDTO(), $obj->getCodabarExtendedParametersDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }

    /**
     * <p>
     * Returns a human-readable string representation of this {@code AztecExtendedParameters}.
     * </p>
     * @return string that represents this {@code AztecExtendedParameters}.
     */
    public function toString(): string
    {
        return $this->getCodabarExtendedParametersDTO()->toString;
    }
}


/**
 * <p>
 * Stores special data of {@code <b>GS1 Composite Bar</b>} recognized barcode
 * </p>
 */
class GS1CompositeBarExtendedParameters implements Communicator
{
    private GS1CompositeBarExtendedParametersDTO $gs1CompositeBarExtendedParameters;

    /**
     * @return GS1CompositeBarExtendedParametersDTO instance
     */
    private function getGS1CompositeBarExtendedParametersDTO() : GS1CompositeBarExtendedParametersDTO
    {
        return $this->gs1CompositeBarExtendedParameters;
    }

    /**
     * @param $gs1CompositeBarExtendedParameters
     */
    private function setGS1CompositeBarExtendedParametersDTO($gs1CompositeBarExtendedParameters): void
    {
        $this->gs1CompositeBarExtendedParameters = $gs1CompositeBarExtendedParameters;
    }

    function __construct(GS1CompositeBarExtendedParametersDTO $gs1CompositeBarExtendedParameters)
    {
        $this->gs1CompositeBarExtendedParameters = $gs1CompositeBarExtendedParameters;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
        // TODO: Implement obtainDto() method.
    }

    public function initFieldsFromDto(): void
    {
        // TODO: Implement init() method.
    }

    /**
     * <p>Gets the 1D (linear) barcode type of GS1 Composite</p>Value: 2D barcode type
     */
    public function getOneDType(): int
    {
        return $this->getGS1CompositeBarExtendedParametersDTO()->oneDType;
    }

    /**
     * <p>Gets the 1D (linear) barcode value of GS1 Composite</p>Value: 1D barcode value
     */
    public function getOneDCodeText(): string
    {
        return $this->getGS1CompositeBarExtendedParametersDTO()->oneDCodeText;
    }

    /**
     * <p>Gets the 2D barcode type of GS1 Composite</p>Value: 2D barcode type
     */
    public function getTwoDType(): int
    {
        return $this->getGS1CompositeBarExtendedParametersDTO()->twoDType;
    }

    /**
     * <p>Gets the 2D barcode value of GS1 Composite</p>Value: 2D barcode value
     */
    public function getTwoDCodeText(): string
    {
        return $this->getGS1CompositeBarExtendedParametersDTO()->twoDCodeText;
    }

    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code GS1CompositeBarExtendedParameters} value.
     * </p>
     * @param GS1CompositeBarExtendedParameters $obj
     * @return bool ```php
     */
    public function equals(GS1CompositeBarExtendedParameters $obj): bool
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $isEquals = $client->GS1CompositeBarExtendedParameters_equals($this->getGS1CompositeBarExtendedParametersDTO(), $obj->getGS1CompositeBarExtendedParametersDTO());
        $thriftConnection->closeConnection();

        return $isEquals;
    }

    /**
     * <p>
     * Returns a human-readable string representation of this {@code GS1CompositeBarExtendedParameters}.
     * </p>
     * @return string that represents this {@code GS1CompositeBarExtendedParameters}.
     */
    public function toString(): string
    {
        return $this->getGS1CompositeBarExtendedParametersDTO()->toString;
    }
}


/**
 * Contains the data of subtype for Code128 type barcode
 */
class Code128DataPortion implements Communicator
{
    private Code128DataPortionDTO $code128DataPortionDTO;

    /**
     * @return Code128DataPortionDTO instance
     */
    private function getCode128DataPortionDTO() : Code128DataPortionDTO
    {
        return $this->code128DataPortionDTO;
    }

    /**
     * @param $code128DataPortionDTO
     */
    private function setCode128DataPortionDTO($code128DataPortionDTO): void
    {
        $this->code128DataPortionDTO = $code128DataPortionDTO;
    }

    function __construct(Code128DataPortionDTO $code128DataPortionDTO)
    {
        $this->code128DataPortionDTO = $code128DataPortionDTO;
        $this->obtainDto();
        $this->initFieldsFromDto();
    }

    public function obtainDto(...$args)
    {
        // TODO: Implement obtainDto() method.
    }

    public function initFieldsFromDto(): void
    {
        // TODO: Implement init() method.
    }

    /**
     * Gets the part of code text related to subtype.
     *
     * @return string The part of code text related to subtype
     */
    public final function getData(): string
    {
        try {
            return $this->getCode128DataPortionDTO()->data;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the type of Code128 subset
     *
     * @return int The type of Code128 subset
     */
    public final function getCode128SubType(): int
    {
        try {
            return $this->getCode128DataPortionDTO()->code128SubType;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this {Code128DataPortion}.
     * @return string A string that represents this {Code128DataPortion}.
     */
    public function toString(): string
    {
        $thriftConnection = new ThriftConnection();
        $client = $thriftConnection->openConnection();
        $str = $client->Code128DataPortion_toString($this->getCode128DataPortionDTO());
        $thriftConnection->closeConnection();

        return $str;
    }
}

class RecognitionAbortedException extends Exception
{
    private ?int $executionTime;

    /**
     * Gets the execution time of current recognition session
     * @return int The execution time of current recognition session
     */
    public function getExecutionTime(): int
    {
        return $this->executionTime;
    }

    /**
     * Sets the execution time of current recognition session
     * @param int $value The execution time of current recognition session
     */
    public function setExecutionTime(int $value): void
    {
        $this->executionTime = $value;
    }

    /**
     * Initializes a new instance of the <see cref="RecognitionAbortedException" /> class with specified recognition abort message.
     * @param $message null|string The error message of the exception.
     * @param $executionTime null|int The execution time of current recognition session.
     */
    public function __construct(?string $message, ?int $executionTime)
    {
        parent::__construct($message);
        $this->executionTime = $executionTime;
    }
}

/**
 * Specify the type of barcode to read.
 *
 * This sample shows how to detect Code39 and Code128 barcodes.
 * @code
 * $reader = new BarCodeReader("test.png", null, array(DecodeType::CODE_39, DecodeType::CODE_128));
 * foreach($reader->readBarCodes() as $result)
 * {
 *    print("BarCode Type: ".$result->getCodeTypeName());
 *    print("BarCode CodeText: ".$result->getCodeText());
 * }
 * @endcode
 */
class DecodeType
{
    /**
     * Unspecified decode type.
     */
    const NONE = -1;

    /**
     * Specifies that the data should be decoded with { <b>CODABAR</b>} barcode specification
     */
    const CODABAR = 0;

    /**
     * Specifies that the data should be decoded with { <b>CODE 11</b>} barcode specification
     */
    const CODE_11 = 1;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>Code 39</b>} basic charset barcode specification: ISO/IEC 16388
     * </p>
     */
    const CODE_39 = 2;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>Code 39</b>} full ASCII charset barcode specification: ISO/IEC 16388
     * </p>
     */
    const CODE_39_FULL_ASCII = 3;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>CODE 93</b>} barcode specification
     * </p>
     */
    const CODE_93 = 5;

    /**
     * Specifies that the data should be decoded with { <b>CODE 128</b>} barcode specification
     */
    const CODE_128 = 6;

    /**
     * Specifies that the data should be decoded with { <b>GS1 CODE 128</b>} barcode specification
     */
    const GS_1_CODE_128 = 7;

    /**
     * Specifies that the data should be decoded with { <b>EAN-8</b>} barcode specification
     */
    const EAN_8 = 8;

    /**
     * Specifies that the data should be decoded with { <b>EAN-13</b>} barcode specification
     */
    const EAN_13 = 9;

    /**
     * Specifies that the data should be decoded with { <b>EAN14</b>} barcode specification
     */
    const EAN_14 = 10;

    /**
     * Specifies that the data should be decoded with { <b>SCC14</b>} barcode specification
     */
    const SCC_14 = 11;

    /**
     * Specifies that the data should be decoded with { <b>SSCC18</b>} barcode specification
     */
    const SSCC_18 = 12;

    /**
     * Specifies that the data should be decoded with { <b>UPC-A</b>} barcode specification
     */
    const UPCA = 13;

    /**
     * Specifies that the data should be decoded with { <b>UPC-E</b>} barcode specification
     */
    const UPCE = 14;

    /**
     * Specifies that the data should be decoded with { <b>ISBN</b>} barcode specification
     */
    const ISBN = 15;

    /**
     * Specifies that the data should be decoded with { <b>Standard 2 of 5</b>} barcode specification
     */
    const STANDARD_2_OF_5 = 16;

    /**
     * Specifies that the data should be decoded with { <b>INTERLEAVED 2 of 5</b>} barcode specification
     */
    const INTERLEAVED_2_OF_5 = 17;

    /**
     * Specifies that the data should be decoded with { <b>Matrix 2 of 5</b>} barcode specification
     */
    const MATRIX_2_OF_5 = 18;

    /**
     * Specifies that the data should be decoded with { <b>Italian Post 25</b>} barcode specification
     */
    const ITALIAN_POST_25 = 19;

    /**
     * Specifies that the data should be decoded with { <b>IATA 2 of 5</b>} barcode specification. IATA (International Air Transport Association) uses this barcode for the management of air cargo.
     */
    const IATA_2_OF_5 = 20;

    /**
     * Specifies that the data should be decoded with { <b>ITF14</b>} barcode specification
     */
    const ITF_14 = 21;

    /**
     * Specifies that the data should be decoded with { <b>ITF6</b>} barcode specification
     */
    const ITF_6 = 22;

    /**
     * Specifies that the data should be decoded with { <b>MSI Plessey</b>} barcode specification
     */
    const MSI = 23;

    /**
     * Specifies that the data should be decoded with { <b>VIN</b>} (Vehicle Identification Number) barcode specification
     */
    const VIN = 24;

    /**
     * Specifies that the data should be decoded with { <b>DeutschePost Ident code</b>} barcode specification
     */
    const DEUTSCHE_POST_IDENTCODE = 25;

    /**
     * Specifies that the data should be decoded with { <b>DeutschePost Leit code</b>} barcode specification
     */
    const DEUTSCHE_POST_LEITCODE = 26;

    /**
     * Specifies that the data should be decoded with { <b>OPC</b>} barcode specification
     */
    const OPC = 27;

    /**
     *  Specifies that the data should be decoded with { <b>PZN</b>} barcode specification. This symbology is also known as Pharma Zentral Nummer
     */
    const PZN = 28;

    /**
     * Specifies that the data should be decoded with { <b>Pharmacode</b>} barcode. This symbology is also known as Pharmaceutical BINARY Code
     */
    const PHARMACODE = 29;

    /**
     * Specifies that the data should be decoded with { <b>DataMatrix</b>} barcode symbology
     */
    const DATA_MATRIX = 30;

    /**
     * Specifies that the data should be decoded with { <b>GS1DataMatrix</b>} barcode symbology
     */
    const GS_1_DATA_MATRIX = 31;

    /**
     * Specifies that the data should be decoded with { <b>QR Code</b>} barcode specification
     */
    const QR = 32;

    /**
     * Specifies that the data should be decoded with { <b>Aztec</b>} barcode specification
     */
    const AZTEC = 33;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>GS1 Aztec</b>} barcode specification
     * </p>
     */
    const GS_1_AZTEC = 81;

    /**
     * Specifies that the data should be decoded with { <b>Pdf417</b>} barcode symbology
     */
    const PDF_417 = 34;

    /**
     * Specifies that the data should be decoded with { <b>MacroPdf417</b>} barcode specification
     */
    const MACRO_PDF_417 = 35;

    /**
     * Specifies that the data should be decoded with { <b>MicroPdf417</b>} barcode specification
     */
    const MICRO_PDF_417 = 36;

    /**
     * Specifies that the data should be decoded with <b>MicroPdf417</b> barcode specification
     */
    const GS_1_MICRO_PDF_417 = 82;

    /**
     * Specifies that the data should be decoded with { <b>CodablockF</b>} barcode specification
     */
    const CODABLOCK_F = 65;
    /**
     * Specifies that the data should be decoded with <b>Royal Mail Mailmark</b> barcode specification.
     */
    const MAILMARK = 66;

    /**
     * Specifies that the data should be decoded with { <b>Australia Post</b>} barcode specification
     */
    const AUSTRALIA_POST = 37;

    /**
     * Specifies that the data should be decoded with { <b>Postnet</b>} barcode specification
     */
    const POSTNET = 38;

    /**
     * Specifies that the data should be decoded with { <b>Planet</b>} barcode specification
     */
    const PLANET = 39;

    /**
     * Specifies that the data should be decoded with USPS { <b>OneCode</b>} barcode specification
     */
    const ONE_CODE = 40;

    /**
     * Specifies that the data should be decoded with { <b>RM4SCC</b>} barcode specification. RM4SCC (Royal Mail 4-state Customer Code) is used for automated mail sort process in UK.
     */
    const RM_4_SCC = 41;

    /**
     * Specifies that the data should be decoded with { <b>GS1 DATABAR omni-directional</b>} barcode specification
     */
    const DATABAR_OMNI_DIRECTIONAL = 42;

    /**
     * Specifies that the data should be decoded with { <b>GS1 DATABAR truncated</b>} barcode specification
     */
    const DATABAR_TRUNCATED = 43;

    /**
     * Specifies that the data should be decoded with { <b>GS1 DATABAR limited</b>} barcode specification
     */
    const DATABAR_LIMITED = 44;

    /**
     * Specifies that the data should be decoded with { <b>GS1 DATABAR expanded</b>} barcode specification
     */
    const DATABAR_EXPANDED = 45;

    /**
     * Specifies that the data should be decoded with { <b>GS1 DATABAR stacked omni-directional</b>} barcode specification
     */
    const DATABAR_STACKED_OMNI_DIRECTIONAL = 53;

    /**
     * Specifies that the data should be decoded with { <b>GS1 DATABAR stacked</b>} barcode specification
     */
    const DATABAR_STACKED = 54;

    /**
     * Specifies that the data should be decoded with { <b>GS1 DATABAR expanded stacked</b>} barcode specification
     */
    const DATABAR_EXPANDED_STACKED = 55;

    /**
     * Specifies that the data should be decoded with { <b>Patch code</b>} barcode specification. Barcode symbology is used for automated scanning
     */
    const PATCH_CODE = 46;

    /**
     * Specifies that the data should be decoded with { <b>ISSN</b>} barcode specification
     */
    const ISSN = 47;

    /**
     * Specifies that the data should be decoded with { <b>ISMN</b>} barcode specification
     */
    const ISMN = 48;

    /**
     * Specifies that the data should be decoded with { <b>Supplement(EAN2, EAN5)</b>} barcode specification
     */
    const SUPPLEMENT = 49;

    /**
     * Specifies that the data should be decoded with { <b>Australian Post Domestic eParcel Barcode</b>} barcode specification
     */
    const AUSTRALIAN_POSTE_PARCEL = 50;

    /**
     * Specifies that the data should be decoded with { <b>Swiss Post Parcel Barcode</b>} barcode specification
     */
    const SWISS_POST_PARCEL = 51;

    /**
     * Specifies that the data should be decoded with { <b>SCode16K</b>} barcode specification
     */
    const CODE_16_K = 52;

    /**
     * Specifies that the data should be decoded with { <b>MicroQR Code</b>} barcode specification
     */
    const MICRO_QR = 56;

    /**
     * Specifies that the data should be decoded with <b>RectMicroQR (rMQR) Code</b> barcode specification
     */
    const RECT_MICRO_QR = 83;

    /**
     * Specifies that the data should be decoded with { <b>CompactPdf417</b>} (Pdf417Truncated) barcode specification
     */
    const COMPACT_PDF_417 = 57;

    /**
     * Specifies that the data should be decoded with { <b>GS1 QR</b>} barcode specification
     */
    const GS_1_QR = 58;

    /**
     * Specifies that the data should be decoded with { <b>MaxiCode</b>} barcode specification
     */
    const MAXI_CODE = 59;

    /**
     * Specifies that the data should be decoded with { <b>MICR E-13B</b>} blank specification
     */
    const MICR_E_13_B = 60;

    /**
     * Specifies that the data should be decoded with { <b>Code32</b>} blank specification
     */
    const CODE_32 = 61;

    /**
     * Specifies that the data should be decoded with { <b>DataLogic 2 of 5</b>} blank specification
     */
    const DATA_LOGIC_2_OF_5 = 62;

    /**
     * Specifies that the data should be decoded with { <b>DotCode</b>} blank specification
     */
    const DOT_CODE = 63;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>GS1 DotCode</b>} blank specification
     * </p>
     */
    const GS_1_DOT_CODE = 77;

    /**
     * Specifies that the data should be decoded with { <b>DotCode</b>} blank specification
     */
    const DUTCH_KIX = 64;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>HIBC LIC Code39</b>} blank specification
     * </p>
     */
    const HIBC_CODE_39_LIC = 67;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>HIBC LIC Code128</b>} blank specification
     * </p>
     */
    const HIBC_CODE_128_LIC = 68;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>HIBC LIC Aztec</b>} blank specification
     * </p>
     */
    const HIBC_AZTEC_LIC = 69;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>HIBC LIC DataMatrix</b>} blank specification
     * </p>
     */
    const HIBC_DATA_MATRIX_LIC = 70;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>HIBC LIC QR</b>} blank specification
     * </p>
     */
    const HIBCQRLIC = 71;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>HIBC PAS Code39</b>} blank specification
     * </p>
     */
    const HIBC_CODE_39_PAS = 72;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>HIBC PAS Code128</b>} blank specification
     * </p>
     */
    const HIBC_CODE_128_PAS = 73;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>HIBC PAS Aztec</b>} blank specification
     * </p>
     */
    const HIBC_AZTEC_PAS = 74;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>HIBC PAS DataMatrix</b>} blank specification
     * </p>
     */
    const HIBC_DATA_MATRIX_PAS = 75;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>HIBC PAS QR</b>} blank specification
     * </p>
     */
    const HIBCQRPAS = 76;

    /**
     *  Specifies that the data should be decoded with <b>Han Xin Code</b> blank specification
     */
    const HAN_XIN = 78;

    /**
     * Specifies that the data should be decoded with <b>Han Xin Code</b> blank specification
     */
    const GS_1_HAN_XIN =  79;

    /**
     * <p>
     * Specifies that the data should be decoded with {@code <b>GS1 Composite Bar</b>} barcode specification
     * </p>
     */
    const GS_1_COMPOSITE_BAR = 80;

    /**
     * Specifies that data will be checked with all of  1D  barcode symbologies
     */
    const TYPES_1D = 97;

    /**
     * Specifies that data will be checked with all of  1.5D POSTAL  barcode symbologies, like  Planet, Postnet, AustraliaPost, OneCode, RM4SCC, DutchKIX
     */
    const POSTAL_TYPES = 95;

    /**
     * Specifies that data will be checked with most commonly used symbologies
     */
    const MOST_COMMON_TYPES = 96;

    /**
     * Specifies that data will be checked with all of <b>2D</b> barcode symbologies
     */
    const TYPES_2D = 98;

    /**
     * Specifies that data will be checked with all available symbologies
     */
    const ALL_SUPPORTED_TYPES = 99;

    /**
     * Determines if the specified BaseDecodeType contains any 1D barcode symbology
     * @param int $symbology barcode symbology
     * @return bool <b>true</b> if BaseDecodeType contains any 1D barcode symbology; otherwise, returns <b>false</b>.
     */
    public static function is1D(int $symbology): bool
    {
        try {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $isEquals = $client->DecodeType_is1D($symbology);
            $thriftConnection->closeConnection();
            return $isEquals;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Determines if the specified BaseDecodeType contains any Postal barcode symbology
     * @param int symbology The BaseDecodeType to test
     * @return bool Returns <b>true</b> if BaseDecodeType contains any Postal barcode symbology; otherwise, returns <b>false</b>.
     */
    public static function isPostal(int $symbology): bool
    {
        try {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $isEquals = $client->DecodeType_isPostal($symbology);
            $thriftConnection->closeConnection();
            return $isEquals;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Determines if the specified BaseDecodeType contains any 2D barcode symbology
     * @param int symbology The BaseDecodeType to test.
     * @return bool Returns <b>true</b> if BaseDecodeType contains any 2D barcode symbology; otherwise, returns <b>false</b>.
     */
    public static function is2D(int $symbology): bool
    {
        try {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            $isEquals = $client->DecodeType_is2D($symbology);
            $thriftConnection->closeConnection();
            return $isEquals;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Determines if the BaseDecodeType array contains specified barcode symbology
     * @param int $expectedDecodeType
     * @param array $decodeTypes the BaseDecodeType array
     * @return bool
     * @throws BarcodeException
     */
    public static function containsAny(int $expectedDecodeType, array $decodeTypes): bool
    {
        try {
            if (in_array($expectedDecodeType, $decodeTypes, true)) {
                return true;
            }
            return false;
        } catch (Exception $ex) {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}


/**
 * Contains types of Code128 subset
 */
class Code128SubType
{
    /**
     * ASCII characters 00 to 95 (0–9, A–Z and control codes), special characters, and FNC 1–4 ///
     */
    const CODE_SET_A = 1;

    /**
     * ASCII characters 32 to 127 (0–9, A–Z, a–z), special characters, and FNC 1–4 ///
     */
    const CODE_SET_B = 2;

    /**
     * 00–99 (encodes two digits with a single code point) and FNC1 ///
     */
    const CODE_SET_C = 3;
}

/**
 * Defines the interpreting type(C_TABLE or N_TABLE) of customer information for AustralianPost BarCode.
 */
class  CustomerInformationInterpretingType
{

    /**
     * Use C_TABLE to interpret the customer information. Allows A..Z, a..z, 1..9, space and # sing.
     *
     * @code
     * $generator = new BarcodeGenerator(EncodeTypes::AUSTRALIA_POST, "5912345678ABCde");
     * $generator->getParameters()->getBarcode()->getAustralianPost()->setAustralianPostEncodingTable(CustomerInformationInterpretingType::C_TABLE);
     * $image = $generator->generateBarcodeImage(BarcodeImageFormat::PNG);
     * $reader = new BarCodeReader($image, DecodeType::AUSTRALIA_POST);
     * $reader->setCustomerInformationInterpretingType(CustomerInformationInterpretingType::C_TABLE);
     * foreach($reader->readBarCodes() as $result)
     * {
     *     print("BarCode Type: ".$result->getCodeType());
     *     print("BarCode CodeText: ".$result->getCodeText());
     * }
     * @endcode
     */
    const C_TABLE = 0;

    /**
     * Use N_TABLE to interpret the customer information. Allows digits.
     *
     * @code
     *  $generator = new BarcodeGenerator(EncodeTypes::AUSTRALIA_POST, "59123456781234567");
     *  $generator->getParameters()->getBarcode()->getAustralianPost()->setAustralianPostEncodingTable(CustomerInformationInterpretingType::N_TABLE);
     *  $image = $generator->generateBarcodeImage(BarcodeImageFormat::PNG);
     *  $reader = new BarCodeReader($image, DecodeType::AUSTRALIA_POST);
     *  $reader->setCustomerInformationInterpretingType(CustomerInformationInterpretingType::N_TABLE);
     *  foreach($reader->readBarCodes() as $result)
     *  {
     *     print("BarCode Type: ".$result->getCodeType());
     *     print("BarCode CodeText: ".$result->getCodeText());
     *  }
     * @endcode
     */
    const N_TABLE = 1;

    /**
     * Do not interpret the customer information. Allows 0, 1, 2 or 3 symbol only.
     *
     * @code
     * $generator = new BarcodeGenerator(EncodeTypes::AUSTRALIA_POST, "59123456780123012301230123");
     * $generator->getParameters()->getBarcode()->getAustralianPost()->setAustralianPostEncodingTable(CustomerInformationInterpretingType::OTHER);
     * $image = $generator->generateBarcodeImage(BarcodeImageFormat::PNG);
     * $reader = new BarCodeReader($image, DecodeType::AUSTRALIA_POST);
     * $reader->setCustomerInformationInterpretingType(CustomerInformationInterpretingType::OTHER));
     * foreach($reader->readBarCodes() as $result)
     * {
     *    print("BarCode Type: ".$result->getCodeType());
     *    print("BarCode CodeText: ".$result->getCodeText());
     * }
     * @endcode
     */
    const OTHER = 2;
}

/**
 * Contains recognition confidence level
 *
 * This sample shows how BarCodeConfidence changed, depending on barcode type
 *
 * Moderate confidence
 * @code
 * $generator = new BarcodeGenerator(EncodeTypes::CODE_128, "12345");
 * $generator->save("test.png");
 * $reader = new BarCodeReader("test.png", null, array(DecodeType::CODE_39, DecodeType::CODE_128));
 * foreach($reader->readBarCodes() as $result)
 * {
 *    print("BarCode Type: ".$result->getCodeTypeName());
 *    print("BarCode CodeText: ".$result->getCodeText());
 *    print("BarCode Confidence: ".$result->getConfidence());
 *    print("BarCode ReadingQuality: ".$result->getReadingQuality());
 * }
 * @endcode
 *
 * Strong confidence
 * @code
 * $generator = new BarcodeGenerator(EncodeTypes::QR, "12345");
 * $generator->save("test.png");
 * $reader = new BarCodeReader("test.png", null, array(DecodeType::CODE_39, DecodeType::QR));
 * foreach($reader->readBarCodes() as $result)
 * {
 *     print("BarCode Type: ".$result->getCodeTypeName());
 *     print("BarCode CodeText: ".$result->getCodeText());
 *     print("BarCode Confidence: ".$result->getConfidence());
 *     print("BarCode ReadingQuality: ".$result->getReadingQuality());
 * }
 * @endcode
 */
class BarCodeConfidence
{
    /**
     * Recognition confidence of barcode where codetext was not recognized correctly or barcode was detected as posible fake
     *
     */
    const NONE = 0;

    /**
     * Recognition confidence of barcode (mostly 1D barcodes) with weak checksumm or even without it. Could contains some misrecognitions in codetext
     * or even fake recognitions if  is low
     *
     * @see BarCodeResult.ReadingQuality
     */
    const MODERATE = 80;

    /**
     * Recognition confidence which was confirmed with BCH codes like Reed–Solomon. There must not be errors in read codetext or fake recognitions
     */
    const STRONG = 100;
}

/**
 * <p>
 *  <p>
 *  Deconvolution (image restorations) mode which defines level of image degradation. Originally deconvolution is a function which can restore image degraded
 *  (convoluted) by any natural function like blur, during obtaining image by camera. Because we cannot detect image function which corrupt the image,
 *  we have to check most well know functions like sharp or mathematical morphology.
 *  </p>
 *  </p><p><hr><blockquote><pre>
 *  This sample shows how to use Deconvolution mode
 *  <pre>
 * @code
 *  $reader = new BarCodeReader("test.png", null, array(DecodeType::CODE_39_FULL_ASCII, DecodeType::CODE_128));
 *  $reader->getQualitySettings()->setDeconvolution(DeconvolutionMode::SLOW);
 *  foreach($reader->readBarCodes() as $result)
 *  {
 *     print("BarCode CodeText: " . $result->getCodeText());
 *  }
 * @endcode
 * 	</pre>
 *  </pre></blockquote></hr></p>
 */
class DeconvolutionMode
{
    /**
     * <p>Enables fast deconvolution methods for high quality images.</p>
     */
    const FAST = 0;
    /**
     * <p>Enables normal deconvolution methods for common images.</p>
     */
    const NORMAL = 1;
    /**
     * <p>Enables slow deconvolution methods for low quality images.</p>
     */
    const SLOW = 2;
}

/**
 * <p>
 * <p>
 * Mode which enables or disables additional recognition of barcodes on images with inverted colors (luminance).
 * </p>
 * </p><p><hr><blockquote><pre>
 *  This sample shows how to use InverseImage mode
 *  <pre>
 *
 * @code
 *  $reader = new BarCodeReader("test.png", null, array(DecodeType::CODE_39_FULL_ASCII, DecodeType::CODE_128));
 *  $reader->getQualitySettings()->setInverseImage(InverseImageMode::ENABLED);
 *  foreach($reader->readBarCodes() as $result)
 *  {
 *     print("BarCode CodeText: " . $result->getCodeText());
 *  }
 * @endcode
 * 	</pre>
 *  </pre></blockquote></hr></p>
 */
class InverseImageMode
{
    /**
     * <p>At this time the same as Disabled. Disables additional recognition of barcodes on inverse images.</p>
     */
    const AUTO = 0;
    /**
     * <p>Disables additional recognition of barcodes on inverse images.</p>
     */
    const DISABLED = 1;
    /**
     * <p>Enables additional recognition of barcodes on inverse images</p>
     */
    const ENABLED = 2;
}

/**
 * <p>
 *  <p>
 *  Recognition mode which sets size (from 1 to infinity) of barcode minimal element: matrix cell or bar.
 *  </p>
 *  </p><p><hr><blockquote><pre>
 *  This sample shows how to use XDimension mode
 *  <pre>
 * @code
 *  $reader = new BarCodeReader("test.png", null, array(DecodeType::CODE_39_FULL_ASCII, DecodeType::CODE_128));
 *  $reader->getQualitySettings()->setXDimension(XDimensionMode::SMALL);
 *  foreach($reader->readBarCodes() as $result)
 *  {
 *     print("BarCode CodeText: " . $result->getCodeText());
 *  }
 * @endcode
 * 	</pre>
 *  </pre></blockquote></hr></p>
 */
class XDimensionMode
{
    /**
     * <p>Value of XDimension is detected by AI (SVM). At this time the same as Normal</p>
     */
    const AUTO = 0;
    /**
     * <p>Detects barcodes with small XDimension in 1 pixel or more with quality from BarcodeQuality</p>
     */
    const SMALL = 1;
    /**
     * <p>Detects barcodes with classic XDimension in 2 pixels or more with quality from BarcodeQuality or high quality barcodes.</p>
     */
    const NORMAL = 2;
    /**
     * <p>Detects barcodes with large XDimension with quality from BarcodeQuality captured with high-resolution cameras.</p>
     */
    const LARGE = 3;
    /**
     * <p>Detects barcodes from size set in MinimalXDimension with quality from BarcodeQuality</p>
     */
    const USE_MINIMAL_X_DIMENSION = 4;
}

/**
 * <p>
 *  <p>
 *  Mode which enables or disables additional recognition of color barcodes on color images.
 *  </p>
 *  </p><p><hr><blockquote><pre>
 *  This sample shows how to use ComplexBackground mode
 *  <pre>
 * @code
 *  $reader = new BarCodeReader("test.png", null, array(DecodeType::CODE_39_FULL_ASCII, DecodeType::CODE_128));
 *  $reader->getQualitySettings()->setComplexBackground(ComplexBackgroundMode::ENABLED);
 *  foreach($reader->readBarCodes() as $result)
 *  {
 *     print("BarCode CodeText: " . $result->getCodeText());
 *  }
 * @endcode
 * 	</pre>
 *  </pre></blockquote></hr></p>
 */
class ComplexBackgroundMode
{
    /**
     * <p>At this time the same as Disabled. Disables additional recognition of color barcodes on color images.</p>
     */
    const AUTO = 0;
    /**
     * <p>Disables additional recognition of color barcodes on color images.</p>
     */
    const DISABLED = 1;
    /**
     * <p>Enables additional recognition of color barcodes on color images.</p>
     */
    const ENABLED = 2;

}

/**
 * <p>
 *  <p>
 *  Mode which enables methods to recognize barcode elements with the selected quality. Barcode element with lower quality requires more hard methods which slows the recognition.
 *  </p>
 *  </p><p><hr><blockquote><pre>
 *  This sample shows how to use BarcodeQuality mode
 *  <pre>
 * @code
 *  $reader = new BarCodeReader("test.png", null, array(DecodeType::CODE_39_FULL_ASCII, DecodeType::CODE_128));
 *  $reader->getQualitySettings()->setBarcodeQuality(BarcodeQualityMode::LOW);
 *  foreach($reader->readBarCodes() as $result)
 *  {
 *     print("BarCode CodeText: " . $result->getCodeText());
 *  }
 * @endcode
 * 	</pre>
 *  </pre></blockquote></hr></p>
 */
class BarcodeQualityMode
{
    /**
     * <p>Enables recognition methods for High quality barcodes.</p>
     */
    const HIGH = 0;
    /**
     * <p>Enables recognition methods for Common(Normal) quality barcodes.</p>
     */
    const NORMAL = 1;
    /**
     * <p>Enables recognition methods for Low quality barcodes.</p>
     */
    const LOW = 2;
}


/**
 * Enable checksum validation during recognition for 1D barcodes.
 * Default is treated as Yes for symbologies which must contain checksum, as No where checksum only possible.
 * Checksum never used: Codabar
 * Checksum is possible: Code39 Standard/Extended, Standard2of5, Interleaved2of5, Matrix2of5, ItalianPost25, DeutschePostIdentcode, DeutschePostLeitcode, VIN
 * Checksum always used: Rest symbologies
 *
 * This sample shows influence of ChecksumValidation on recognition quality and results
 * @code
 * $generator = new BarcodeGenerator(EncodeTypes::EAN_13, "1234567890128");
 * $generator->save("test.png", BarcodeImageFormat::PNG);
 * $reader = new BarCodeReader("test.png", null, DecodeType::EAN_13);
 * //checksum disabled
 * $reader->setChecksumValidation(ChecksumValidation::OFF);
 * foreach($reader->readBarCodes() as $result)
 * {
 *    print("BarCode CodeText: ".$result->getCodeText());
 *    print("BarCode Value: ".$result->getExtended()->getOneD()->getValue());
 *    print("BarCode Checksum: ".$result->getExtended()->getOneD()->getCheckSum());
 * }
 * $reader = new BarCodeReader("test.png", null, DecodeType::EAN_13);
 * //checksum enabled
 * $reader->setChecksumValidation(ChecksumValidation::ON);
 * foreach($reader->readBarCodes() as $result)
 * {
 *    print("BarCode CodeText: ".$result->getCodeText());
 *    print("BarCode Value: ".$result->getExtended()->getOneD()->getValue());
 *    print("BarCode Checksum: ".$result->getExtended()->getOneD()->getCheckSum());
 * }
 * @endcode
 */
class ChecksumValidation
{
    /**
     *    If checksum is required by the specification - it will be validated.
     */
    const DEFAULT = 0;

    /**
     *    Always validate checksum if possible.
     */
    const ON = 1;

    /**
     *    Do not validate checksum.
     */
    const OFF = 2;
}