<?php

namespace Aspose\Barcode\Recognition;

use Aspose\Barcode\Bridge\BarcodeReaderDTO;
use Aspose\Barcode\Exception;
use Aspose\Barcode\Internal\BarcodeException;
use Aspose\Barcode\Internal\CommonUtility;
use Aspose\Barcode\Internal\Communicator;
use Aspose\Barcode\Internal\License;
use Aspose\Barcode\Internal\Rectangle;
use Aspose\Barcode\Internal\ThriftConnection;
use InvalidArgumentException;
use RuntimeException;
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

        if ($this->imageResource !== null)
        {
            $this->initializeImageRelatedFields();
            $this->processDecodeTypes();
        } else
        {
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
        if (is_null($decodeTypes))
        {
            $decodeTypes = [DecodeType::ALL_SUPPORTED_TYPES];
        } elseif (is_int($decodeTypes))
        {
            $decodeTypes = [$decodeTypes];
            $this->decodeTypes = $decodeTypes;
        } elseif (!is_array($decodeTypes))
        {
            throw new InvalidArgumentException("Invalid type for decodeTypes. Expected int, array, or null, got " . gettype($decodeTypes));
        }

        if (CommonUtility::isClassContainsConstantValueFromArray(DecodeType::class, $decodeTypes))
        {
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
        if ($this->areas !== null || $this->decodeTypes !== null)
        {
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
        try
        {
            foreach ($decodeTypes as $decodeType)
            {
                if (DecodeType::containsAny($decodeType, $this->getBarCodeReaderDto()->barCodeDecodeTypes))
                    return true;
            }
            return false;
        }
        catch (Exception $ex)
        {
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
        try
        {
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();
            // Deciding if the license should be used
            $licenseContent = $passLicense ? License::getLicenseContent() : null;
            // Passing the license or null
            $barcodeReaderDTO = $client->BarcodeReader_readBarCodes($this->barCodeReaderDto, $licenseContent);
            $this->setBarCodeReaderDto($barcodeReaderDTO);
            $thriftConnection->closeConnection();
        }
        catch (Exception $exc)
        {
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
        foreach ($dtoRef->foundBarCodes as $foundBarcode)
        {
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
        try
        {
            $this->barCodeReaderDto->base64Image = CommonUtility::convertImageResourceToBase64($imageResource);
            $this->barCodeReaderDto->areas = CommonUtility::convertAreasToStringFormattedAreas($areas);
            if (is_null($this->barCodeReaderDto->barCodeDecodeTypes) || sizeof($this->barCodeReaderDto->barCodeDecodeTypes) == 0)
                $this->barCodeReaderDto->barCodeDecodeTypes = array(DecodeType::ALL_SUPPORTED_TYPES);
        }
        catch (Exception $ex)
        {
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
            if (!is_int($type))
            {
                throw new TypeError("Argument 1 passed to BarCodeReader::setBarCodeReadType() must be of the type int");
            }
        $this->barCodeReaderDto->barCodeDecodeTypes = $types;
    }

    public function getBarCodeDecodeType(): array
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
            if (!$isContentExported + (file_put_contents($xmlFile, $xmlData) === false) )
            {
                throw new RuntimeException("Failed to write file: " . $xmlFile);
            }
            return $isContentExported;
        }
        catch (\RuntimeException $ex)
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
            $thriftConnection = new ThriftConnection();
            $client = $thriftConnection->openConnection();

            $barCodeReaderDto = $client->BarcodeReader_importFromXml($xmlData);
            $thriftConnection->closeConnection();

            return BarCodeReader::construct($barCodeReaderDto);
        }
        catch (\Throwable $ex)
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