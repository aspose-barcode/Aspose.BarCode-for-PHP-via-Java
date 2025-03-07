<?php

require_once('Joint.php');

/**
 * BarCodeReader encapsulates an image which may contain one or several barcodes, it then can perform ReadBarCodes operation to detect barcodes.
 *
 * This sample shows how to detect Code39 and Code128 barcodes.
 * @code
 * $reader = new BarCodeReader("test.png", DecodeType::CODE_39, DecodeType::CODE_128);
 * foreach($reader->readBarCodes() as $result)
 * {
 *    print("BarCode Type: ".$result->getCodeTypeName());
 *    print("BarCode CodeText: ".$result->getCodeText());
 * }
 * @endcode
 */
class BarCodeReader extends BaseJavaClass
{
    private $qualitySettings;
    private $recognizedResults;
    private $barcodeSettings;

    private const JAVA_CLASS_NAME = "com.aspose.mw.barcode.recognition.MwBarCodeReader";

    /**
     * BarCodeReader constructor. Initializes a new instance of the BarCodeReader
     * @param string|GdImage $imageResource image encoded as GDImage, file resource, base64 string or path to image resource (located in the file system or via http)
     * @param Rectangle|array|null $areas array of object by type Rectangle
     * @param int|array|null $decodeTypes array of decode types
     * @throws BarcodeException
     */
    public function __construct($imageResource, $areas, $decodeTypes)
    {
        try
        {
            $stringFormattedAreas = convertAreasToStringFormattedAreas($areas);
            $decodeTypesArray = convertDecodeTypeToFormattedDecodeType($decodeTypes);

            $base64Image = convertImageResourceToBase64($imageResource);
            $java_class = new java(self::JAVA_CLASS_NAME, $base64Image, $stringFormattedAreas, $decodeTypesArray);
            parent::__construct($java_class);
        }
        catch (Exception $ex)
        {
            println($ex->getMessage());
            throw new BarcodeException("Incorrect arguments are passed to BarCodeReader constructor", __FILE__, __LINE__);
        }
    }

    private static function construct($javaClass): BarCodeReader
    {
        $barcodeReader = new BarCodeReader(null, null, null);
        $barcodeReader->setJavaClass($javaClass);
        return $barcodeReader;
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
            return java_cast($this->getJavaClass()->containsAny($decodeTypes), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    protected function init(): void
    {
        try
        {
            $this->qualitySettings = new QualitySettings($this->getJavaClass()->getQualitySettings());
            $this->barcodeSettings = new BarcodeSettings($this->getJavaClass()->getBarcodeSettings());
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
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
     * @return timeout.
     */
    public function getTimeout(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getTimeout(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
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
     * @param value The timeout.
     */
    public function setTimeout(int $value): void
    {
        try
        {
            $this->getJavaClass()->setTimeout($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    public function abort(): void
    {
        try
        {
            $this->getJavaClass()->abort();
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets recognized BarCodeResult array
     *
     * This sample shows how to read barcodes with BarCodeReader
     * @code
     * $reader = new BarCodeReader("test.png", null, array(DecodeType::CODE_39, DecodeType::CODE_128));
     * $reader->readBarCodes();
     * for($i = 0; $reader->getFoundCount() > $i; ++$i)
     * {
     *    print("BarCode CodeText: ". $reader->getFoundBarCodes()[$i]->getCodeText());
     * }
     * @endcode
     * Value: The recognized BarCodeResult array
     */
    public function getFoundBarCodes(): array
    {
        return $this->recognizedResults;
    }

    /**
     * Gets recognized barcodes count
     *
     * This sample shows how to read barcodes with BarCodeReader
     * @code
     * $reader = new BarCodeReader("test.png", null, array(DecodeType::CODE_39, DecodeType::CODE_128));
     * $reader->readBarCodes();
     * for($i = 0; $reader->getFoundCount() > $i; ++$i)
     *    print("BarCode CodeText: ".$reader->getFoundBarCodes()[i]->getCodeText());
     * @endcode
     * Value: The recognized barcodes count
     */
    public function getFoundCount(): int
    {
        return java_cast($this->getJavaClass()->getFoundCount(), "integer");
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
     * @throws RecognitionAbortedException
     */
    public function readBarCodes(): array
    {
        try
        {
            $this->recognizedResults = array();
            $javaReadBarcodes = java_values($this->getJavaClass()->readBarCodes());
            for ($i = 0; $i < sizeof($javaReadBarcodes); $i++)
            {
                $this->recognizedResults[$i] = new BarCodeResult($javaReadBarcodes[$i]);
            }
            return $this->recognizedResults;
        }
        catch (Exception $e)
        {
            if (strpos($e->getMessage(), "RecognitionAbortedException"))
            {
                throw new RecognitionAbortedException($e->getMessage(), null);
            }
            throw $e;
        }
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
     * @throws BarcodeException
     */
    public final function getQualitySettings(): QualitySettings
    {
        try
        {
            return $this->qualitySettings;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
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
     * @param QualitySettings $value QualitySettings to configure recognition quality and speed.
     * @throws BarcodeException
     */
    public function setQualitySettings(QualitySettings $value): void
    {
        try
        {
            $this->getJavaClass()->setQualitySettings($value->getJavaClass());
            //$this->qualitySettings = new QualitySettings($this->getJavaClass()->getQualitySettings());
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
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
     * @param string $resource image encoded as base64 string or path to image resource located in the file system or via http
     * @param Rectangle|null $areas areas list for recognition
     * @throws BarcodeException
     */
    public final function setBarCodeImage($imageResource, ?Rectangle ...$areas): void
    {
        try
        {
            $base64Image = convertImageResourceToBase64($imageResource);
            $stringFormattedAreas = convertAreasToStringFormattedAreas($areas);
            $this->getJavaClass()->setBarCodeImage($base64Image, $stringFormattedAreas);
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
     * $reader->setBarCodeReadType(DecodeType::CODE_39, DecodeType::CODE_128);
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
        foreach($types as $type)
            if(!is_int($type))
            {
                throw new TypeError("Argument 1 passed to BarCodeReader::setBarCodeReadType() must be of the type int, string given");
            }
        $this->getJavaClass()->setBarcodeReadType($types);
    }

    public function getBarCodeDecodeType(): array
    {
        try
        {
            $barcodeTypesArray = array();
            foreach($this->getJavaClass()->getBarCodeDecodeType() as $javaInteger)
                array_push($barcodeTypesArray, java_cast($javaInteger, "integer"));
            return $barcodeTypesArray;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex);
        }
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
            $xmlData = str_replace("п»ї", "", preg_replace('/^\xEF\xBB\xBF/', '',java_cast($this->getJavaClass()->exportToXml(), "string")));
            $isSaved = $xmlData != null;
            if ($isSaved)
            {
                if(!file_put_contents($xmlFile, $xmlData))
                    throw new Exception("No such file or directory");
            }
            return $isSaved;
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
    public static function importFromXml($resource): BarCodeReader
    {
        try
        {
            if (isPath($resource))
            {
                $resource = fopen($resource, "r");
            }
            $xmlData = str_replace("ï»¿", "", str_replace("п»ї", "", preg_replace('/^\xEF\xBB\xBF/', '',(stream_get_contents($resource)))));
            if(!$xmlData)
                throw new Exception("No such file or directory");
            return self::construct(java(self::JAVA_CLASS_NAME)->importFromXml($xmlData));
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 *
 * Stores a set of four Points that represent a Quadrangle region.
 *
 */
class Quadrangle extends BaseJavaClass
{
    private const javaClassName = "com.aspose.mw.barcode.recognition.MwQuadrangle";
    private $leftTop;
    private $rightTop;
    private $rightBottom;
    private $leftBottom;

    /**
     * Represents a Quadrangle structure with its properties left uninitialized.Value: Quadrangle
     */
    public static function EMPTY(): Quadrangle
    {
        return new Quadrangle(new Point(0, 0), new Point(0, 0), new Point(0, 0), new Point(0, 0));
    }

    static function construct(...$args): Quadrangle
    {
        $quadrangle = self::EMPTY();
        $quadrangle->setJavaClass($args[0]);
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
        parent::__construct(new java(self::javaClassName, $leftTop->getJavaClass(), $rightTop->getJavaClass(), $rightBottom->getJavaClass(), $leftBottom->getJavaClass()));
    }

    protected function init(): void
    {
        $this->leftTop = Point::construct($this->getJavaClass()->getLeftTop());
        $this->rightTop = Point::construct($this->getJavaClass()->getRightTop());
        $this->rightBottom = Point::construct($this->getJavaClass()->getRightBottom());
        $this->leftBottom = Point::construct($this->getJavaClass()->getLeftBottom());
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
        try
        {
            $this->leftTop = $value;
            $this->getJavaClass()->setLeftTop($value->getJavaClass());
        }
        catch (Exception $ex)
        {
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
        try
        {
            $this->rightTop = $value;
            $this->getJavaClass()->setRightTop($value->getJavaClass());
        }
        catch (Exception $ex)
        {
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
        try
        {
            $this->rightBottom = $value;
            $this->getJavaClass()->setRightBottom($value->getJavaClass());
        }
        catch (Exception $ex)
        {
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
        try
        {
            $this->leftBottom = $value;
            $this->getJavaClass()->setLeftBottom($value->getJavaClass());
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Tests whether all Points of this Quadrangle have values of zero.Value: Returns true if all Points of this Quadrangle have values of zero; otherwise, false.
     */
    public function isEmpty(): bool
    {
        return java_cast($this->getJavaClass()->isEmpty(), "boolean");
    }

    /**
     * Determines if the specified Point is contained within this Quadrangle structure.
     *
     * @param Point pt The Point to test.
     * @return bool Returns true if Point is contained within this Quadrangle structure; otherwise, false.
     */
    public function contains(Point $pt): bool
    {
        try
        {
            return java_cast($this->getJavaClass()->contains($pt->getJavaClass()), "boolean");
        }
        catch (Exception $ex)
        {
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
    public function containsPoint(int $x, int $y): bool
    {
        try
        {
            return java_cast($this->getJavaClass()->contains($x, $y), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Determines if the specified Quadrangle is contained or intersect this Quadrangle structure.
     *
     * @param Quadrangle quad The Quadrangle to test.
     * @return bool Returns true if Quadrangle is contained or intersect this Quadrangle structure; otherwise, false.
     */
    public function containsQuadrangle(Quadrangle $quad): bool
    {
        try
        {
            return java_cast($this->getJavaClass()->contains($quad->getJavaClass()), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Determines if the specified Rectangle is contained or intersect this Quadrangle structure.
     *
     * @param Rectangle rect The Rectangle to test.
     * @return bool Returns true if Rectangle is contained or intersect this Quadrangle structure; otherwise, false.
     */
    public function containsRectangle(Rectangle $rect): bool
    {
        try
        {
            return java_cast($this->getJavaClass()->contains($rect), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified Quadrangle value.
     *
     * @param Quadrangle $other An Quadrangle value to compare to this instance.
     * @return bool true if obj has the same value as this instance; otherwise, false.
     */
    public function equals(Quadrangle $obj): bool
    {
        try
        {
            return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns the hash code for this instance.
     *
     * @return int A 32-bit signed integer hash code.
     */
    public function hashCode(): int
    {
        return java_cast($this->getJavaClass()->hashCode(), "integer");
    }

    /**
     * Returns a human-readable string representation of this Quadrangle.
     *
     * @return string A string that represents this Quadrangle.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Creates Rectangle bounding this Quadrangle
     *
     * @return Rectangle returns Rectangle bounding this Quadrangle
     */
    public function getBoundingRectangle(): Rectangle
    {
        try
        {
            return Rectangle::construct($this->getJavaClass()->getBoundingRectangle());
        }
        catch (Exception $ex)
        {
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
final class QRExtendedParameters extends BaseJavaClass
{

    protected function init(): void
    {
        // TODO: Implement init() method.
    }

    /**
     * Gets the QR structured append mode barcodes quantity. Default value is -1.Value: The quantity of the QR structured append mode barcode.
     */
    public function getQRStructuredAppendModeBarCodesQuantity(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getQRStructuredAppendModeBarCodesQuantity(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the index of the QR structured append mode barcode. Index starts from 0. Default value is -1.Value: The quantity of the QR structured append mode barcode.
     */
    public function getQRStructuredAppendModeBarCodeIndex(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getQRStructuredAppendModeBarCodeIndex(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the QR structured append mode parity data. Default value is -1.Value: The index of the QR structured append mode barcode.
     */
    public function getQRStructuredAppendModeParityData(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getQRStructuredAppendModeParityData(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Version of recognized QR Code. From Version1 to Version40.
     * @return Version of recognized QR Code
     */
    public function getQRVersion() : int   { return java_cast($this->getJavaClass()->getQRVersion(), "integer"); }

    /**
     * Version of recognized MicroQR Code. From M1 to M4.
     * @return Version of recognized MicroQR Code. From M1 to M4.
     */
    public function getMicroQRVersion() : int  { return java_cast($this->getJavaClass()->getMicroQRVersion(), "integer"); }

    /**
     * Version of recognized RectMicroQR Code. From R7x43 to R17x139.
     * @return Version of recognized RectMicroQR Code
     */
    public function getRectMicroQRVersion() : int  { return java_cast($this->getJavaClass()->getRectMicroQRVersion(), "integer"); }

    /**
     * Reed-Solomon error correction level of recognized barcode. From low to high: LevelL, LevelM, LevelQ, LevelH.
     * @return Reed-Solomon error correction level of recognized barcode.
     */
    public function getQRErrorLevel() : int  { return java_cast($this->getJavaClass()->getQRErrorLevel(), "integer"); }


    public function isEmpty(): bool
    {
        try
        {
            return java_cast($this->getJavaClass()->isEmpty(), "boolean");
        }
        catch (Exception $ex)
        {
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
        try
        {
            return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns the hash code for this instance.
     *
     * @return int A 32-bit signed integer hash code.
     */
    public function hashCode(): int
    {
        return java_cast($this->getJavaClass()->hashCode(), "integer");
    }

    /**
     * Returns a human-readable string representation of this QRExtendedParameters.
     *
     * @return string A string that represents this QRExtendedParameters.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
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
final class Pdf417ExtendedParameters extends BaseJavaClass
{
    protected function init(): void
    {
        // TODO: Implement init() method.
    }

    /**
     * Gets the file ID of the barcode, only available with MacroPdf417.Value: The file ID for MacroPdf417
     */
    public function getMacroPdf417FileID(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getMacroPdf417FileID(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the segment ID of the barcode,only available with MacroPdf417.Value: The segment ID of the barcode.
     */
    public function getMacroPdf417SegmentID(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getMacroPdf417SegmentID(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets macro pdf417 barcode segments count. Default value is -1.Value: Segments count.
     */
    public function getMacroPdf417SegmentsCount(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getMacroPdf417SegmentsCount(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Macro PDF417 file name (optional).
     * @return string File name.
     */
    public function getMacroPdf417FileName(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getMacroPdf417FileName(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Macro PDF417 file size (optional).
     * @return int File size.
     */
    public function getMacroPdf417FileSize(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getMacroPdf417FileSize(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Macro PDF417 sender name (optional).
     * @return string Sender name
     */
    public function getMacroPdf417Sender(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getMacroPdf417Sender(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Macro PDF417 addressee name (optional).
     * @return string Addressee name.
     */
    public function getMacroPdf417Addressee(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getMacroPdf417Addressee(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Macro PDF417 time stamp (optional).
     * @return DateTime Time stamp.
     */
    public function getMacroPdf417TimeStamp(): DateTime
    {
        try
        {
            return new DateTime('@' . java_cast($this->getJavaClass()->getMacroPdf417TimeStamp(), "string"));
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Macro PDF417 checksum (optional).
     * @return int Checksum.
     */
    public function getMacroPdf417Checksum(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getMacroPdf417Checksum(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Indicates whether the segment is the last segment of a Macro PDF417 file.
     * @return Terminator.
     */
    public function getMacroPdf417Terminator() : bool
    {
        try
        {
            return java_cast($this->getJavaClass()->getMacroPdf417Terminator(), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * <p>Used to instruct the reader to interpret the data contained within the symbol as programming for reader initialization.</p>Value: Reader initialization flag
     */
    public function isReaderInitialization() : bool
    {
        return java_cast($this->getJavaClass()->isReaderInitialization(), "boolean");
    }

    /**
     * <p>Flag that indicates that the barcode must be linked to 1D barcode.</p>Value: Linkage flag
     */
    public function isLinked() : bool
    {
        return java_cast($this->getJavaClass()->isLinked(), "boolean");
    }

    /**
     * Flag that indicates that the MicroPdf417 barcode encoded with 908, 909, 910 or 911 Code 128 emulation codewords.
     * @return Code 128 emulation flag
     */
    public function isCode128Emulation() : bool
    {
        return java_cast($this->getJavaClass()->isCode128Emulation(), "boolean");
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified Pdf417ExtendedParameters value.
     *
     * @param Pdf417ExtendedParameters $obj An System.Object value to compare to this instance.
     * @return bool true if obj has the same value as this instance; otherwise, false.
     */
    public function equals(Pdf417ExtendedParameters $obj): bool
    {
        try
        {
            return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns the hash code for this instance.
     * @return int A 32-bit signed integer hash code.
     */
    public function hashCode(): int
    {
        return java_cast($this->getJavaClass()->hashCode(), "integer");
    }

    /**
     * Returns a human-readable string representation of this Pdf417ExtendedParameters.
     * @return int A string that represents this Pdf417ExtendedParameters.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
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
final class OneDExtendedParameters extends BaseJavaClass
{
    protected function init(): void
    {
        // TODO: Implement init() method.
    }

    /**
     * Gets the codetext of 1D barcodes without checksum. Value: The codetext of 1D barcodes without checksum.
     */
    public function getValue(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getValue(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets the checksum for 1D barcodes. Value: The checksum for 1D barcode.
     */
    public function getCheckSum(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getCheckSum(), "string");
        }
        catch (Exception $ex)
        {
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
        try
        {
            return java_cast($this->getJavaClass()->isEmpty(), "boolean");
        }
        catch (Exception $ex)
        {
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
        try
        {
            return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns the hash code for this instance.
     *
     * @return int A 32-bit signed integer hash code.
     */
    public function hashCode(): int
    {
        return java_cast($this->getJavaClass()->hashCode(), "integer");
    }

    /**
     * Returns a human-readable string representation of this OneDExtendedParameters.
     *
     * @return string A string that represents this OneDExtendedParameters.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
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
final class Code128ExtendedParameters extends BaseJavaClass
{
    private $code128DataPortions;

    protected function init(): void
    {
        try
        {
            $this->code128DataPortions = self::convertCode128DataPortions($this->getJavaClass()->getCode128DataPortions());
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    private static function convertCode128DataPortions($javaCode128DataPortions)
    {
        $code128DataPortionsValues = java_values($javaCode128DataPortions);
        $code128DataPortions = array();
        for ($i = 0; $i < sizeof($code128DataPortionsValues); $i++)
        {
            array_push($code128DataPortions, new Code128DataPortion($code128DataPortionsValues[$i]));
        }
        return $code128DataPortions;
    }

    /**
     *  Gets Code128DataPortion array of recognized Code128 barcode Value: Array of the Code128DataPortion.
     */
    public function getCode128DataPortions(): array
    {
        try
        {
            return $this->code128DataPortions;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    public function isEmpty(): bool
    {
        try
        {
            return java_cast($this->getJavaClass()->isEmpty(), "boolean");
        }
        catch (Exception $ex)
        {
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
        try
        {
            return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns the hash code for this instance.
     *
     * @return int A 32-bit signed integer hash code.
     */
    public function hashCode(): int
    {
        return java_cast($this->getJavaClass()->hashCode(), "integer");
    }

    /**
     * Returns a human-readable string representation of this Code128ExtendedParameters.
     *
     * @return string A string that represents this Code128ExtendedParameters.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
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
final class BarCodeResult extends BaseJavaClass
{
    private $region;
    private $extended;

    protected function init(): void
    {
        try
        {
            $this->region = new BarCodeRegionParameters($this->getJavaClass()->getRegion());
            $this->extended = new BarCodeExtendedParameters($this->getJavaClass()->getExtended());
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * @return float Gets the reading quality. Works for 1D and postal barcodes. Value: The reading quality percent
     * @throws BarcodeException
     */
    public function getReadingQuality(): float
    {
        try
        {
            return java_cast($this->getJavaClass()->getReadingQuality(), "double");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * @return int Gets recognition confidence level of the recognized barcode Value: BarCodeConfidence.Strong does not have fakes or misrecognitions, BarCodeConfidence.Moderate
     * could sometimes have fakes or incorrect codetext because this confidence level for barcodews with weak cheksum or even without it,
     * BarCodeConfidence.None always has incorrect codetext and could be fake recognitions
     * @throws BarcodeException
     */
    public function getConfidence(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getConfidence(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * @return string Gets the code text Value: The code text of the barcode
     * @throws BarcodeException
     */
    public function getCodeText(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getCodeText(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * @return array Gets the encoded code bytes Value: The code bytes of the barcode
     * @throws BarcodeException
     */
    public function getCodeBytes(): array
    {
        try
        {
            return explode(",", $this->getJavaClass()->getCodeBytes());
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * @return int Gets the barcode type Value: The type information of the recognized barcode
     * @throws BarcodeException
     */
    public function getCodeType(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getCodeType(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * @return string Gets the name of the barcode type Value: The type name of the recognized barcode
     * @throws BarcodeException
     */
    public function getCodeTypeName(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getCodeTypeName(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * @return BarCodeRegionParameters Gets the barcode region Value: The region of the recognized barcode
     * @throws BarcodeException
     */
    public function getRegion(): BarCodeRegionParameters
    {
        try
        {
            return $this->region;
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * @return BarCodeExtendedParameters Gets extended parameters of recognized barcode Value: The extended parameters of recognized barcode
     */
    public function getExtended(): BarCodeExtendedParameters
    {
        return $this->extended;
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified BarCodeResult value.
     * @param BarCodeResult $other An BarCodeResult value to compare to this instance.
     * @return bool true if obj has the same value as this instance; otherwise, false.
     * @throws BarcodeException
     */
    public function equals(BarCodeResult $other): bool
    {
        try
        {
            return java_cast($this->getJavaClass()->equals($other->getJavaClass()), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns the hash code for this instance.
     *
     * @return int A 32-bit signed integer hash code.
     */
    public function hashCode(): int
    {
        return java_cast($this->getJavaClass()->hashCode(), "integer");
    }

    /**
     * Returns a human-readable string representation of this BarCodeResult.
     *
     * @return string A string that represents this BarCodeResult.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Creates a copy of BarCodeResult class.
     *
     * @return BarCodeResult Returns copy of BarCodeResult class.
     */
    public function deepClone(): BarCodeResult
    {
        return new BarCodeResult($this);
    }

    function __construct($javaClass)
    {
        try
        {
            parent::__construct($javaClass);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
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
final class BarCodeRegionParameters extends BaseJavaClass
{
    private $quad;
    private $rect;
    private $points;

    protected function init(): void
    {
        try
        {
            $this->quad = Quadrangle::construct($this->getJavaClass()->getQuadrangle());
            $this->rect = Rectangle::construct($this->getJavaClass()->getRectangle());
            $this->points = self::convertJavaPoints($this->getJavaClass()->getPoints());
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    private static function convertJavaPoints($javaPoints)
    {
        $points = array();
        for ($i = 0; $i < sizeof(java_values($javaPoints)); $i++)
        {
            $points[$i] = new Point(java_cast($javaPoints[$i]->getX(), "integer"), java_cast($javaPoints[$i]->getY(), "integer"));
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
        try
        {
            return java_cast($this->getJavaClass()->getAngle(), "float");
        }
        catch (Exception $ex)
        {
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
        try
        {
            return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns the hash code for this instance.
     *
     * @return int A 32-bit signed integer hash code.
     */
    public function hashCode(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->hashCode(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this BarCodeRegionParameters.
     *
     * @return string A string that represents this BarCodeRegionParameters.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 * <p>
 * Stores extended parameters of recognized barcode
 * </p>
 */
class BarCodeExtendedParameters extends BaseJavaClass
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
    private $_codabarExtendedParameters;

    protected function init(): void
    {
        try
        {
            $this->_oneDParameters = new OneDExtendedParameters($this->getJavaClass()->getOneD());
            $this->_code128Parameters = new Code128ExtendedParameters($this->getJavaClass()->getCode128());
            $this->_qrParameters = new QRExtendedParameters($this->getJavaClass()->getQR());
            $this->_pdf417Parameters = new Pdf417ExtendedParameters($this->getJavaClass()->getPdf417());
            $this->_dataBarParameters = new DataBarExtendedParameters($this->getJavaClass()->getDataBar());
            $this->_maxiCodeParameters = new MaxiCodeExtendedParameters($this->getJavaClass()->getMaxiCode());
            $this->_dotCodeExtendedParameters = new DotCodeExtendedParameters($this->getJavaClass()->getDotCode());
            $this->_dataMatrixExtendedParameters = new DataMatrixExtendedParameters($this->getJavaClass()->getDataMatrix());
            $this->_aztecExtendedParameters = new AztecExtendedParameters($this->getJavaClass()->getAztec());
            $this->_gs1CompositeBarExtendedParameters = new GS1CompositeBarExtendedParameters($this->getJavaClass()->getGS1CompositeBar());
            $this->_codabarExtendedParameters = new CodabarExtendedParameters($this->getJavaClass()->getCodabar());
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    function __construct($javaClass)
    {
        try
        {
            parent::__construct($javaClass);
        }
        catch (Exception $ex)
        {
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
    public function getMaxiCode() : MaxiCodeExtendedParameters
    {
        return $this->_maxiCodeParameters;
    }

    /**
     * <p>Gets a DotCode additional information{@code DotCodeExtendedParameters} of recognized barcode</p>Value: A DotCode additional information{@code DotCodeExtendedParameters} of recognized barcode
     */
    public function getDotCode() : DotCodeExtendedParameters
    {
        return $this->_dotCodeExtendedParameters;
    }

    /**
     * <p>Gets a DotCode additional information{@code DotCodeExtendedParameters} of recognized barcode</p>Value: A DotCode additional information{@code DotCodeExtendedParameters} of recognized barcode
     */
    public function getDataMatrix() : DataMatrixExtendedParameters
    {
        return $this->_dataMatrixExtendedParameters;
    }

    /**
     * <p>Gets a Aztec additional information{@code AztecExtendedParameters} of recognized barcode</p>Value: A Aztec additional information{@code AztecExtendedParameters} of recognized barcode
     */
    public function getAztec() : AztecExtendedParameters
    {
        return $this->_aztecExtendedParameters;
    }
    
    /**
     * <p>Gets a GS1CompositeBar additional information{@code GS1CompositeBarExtendedParameters} of recognized barcode</p>Value: A GS1CompositeBar additional information{@code GS1CompositeBarExtendedParameters} of recognized barcode
     */
    public function getGS1CompositeBar() : GS1CompositeBarExtendedParameters
    {
        return $this->_gs1CompositeBarExtendedParameters;
    }

    /**
     * Gets a Codabar additional information{@code CodabarExtendedParameters} of recognized barcode
     * @return A Codabar additional information{@code CodabarExtendedParameters} of recognized barcode
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
        try
        {
            return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns the hash code for this instance.
     *
     * @return bool A 32-bit signed integer hash code.
     */
    public function hashCode(): bool
    {
        try
        {
            return java_cast($this->getJavaClass()->hashCode(), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this BarCodeExtendedParameters.
     *
     * @return string A string that represents this BarCodeExtendedParameters.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
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
final class QualitySettings extends BaseJavaClass
{

    function __construct($javaClass)
    {
        try
        {
            parent::__construct($javaClass);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    private static function initQualitySettings()
    {
        $javaClassName = "com.aspose.mw.barcode.recognition.MwQualitySettings";
            return new java($javaClassName);
        }

    protected function init(): void
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
        try
        {
            $javaQualitySettings = QualitySettings::initQualitySettings();
            return new QualitySettings($javaQualitySettings->getHighPerformance());
        }
        catch (Exception $ex)
        {
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
        try
        {
            $javaQualitySettings = QualitySettings::initQualitySettings();
            return new QualitySettings($javaQualitySettings->getNormalQuality());
        }
        catch (Exception $ex)
        {
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
        try
        {
            $javaQualitySettings = QualitySettings::initQualitySettings();
            return new QualitySettings($javaQualitySettings->getHighQuality());
        }
        catch (Exception $ex)
        {
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
        try
        {
            $javaQualitySettings = QualitySettings::initQualitySettings();
            return new QualitySettings($javaQualitySettings->getMaxQuality());
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Recognition mode which sets size (from 1 to infinity) of barcode minimal element: matrix cell or bar.
     * @return: size (from 1 to infinity) of barcode minimal element: matrix cell or bar.
     */
    public function getXDimension() : float
    {
        return java_cast($this->getJavaClass()->getXDimension(), "float");
    }
    /**
     * Recognition mode which sets size (from 1 to infinity) of barcode minimal element: matrix cell or bar.
     * @param $value: size (from 1 to infinity) of barcode minimal element: matrix cell or bar.
     */
    public function setXDimension(float $value) : void
    {
        $this->getJavaClass()->setXDimension($value);
    }

    /**
     * Minimal size of XDimension in pixels which is used with UseMinimalXDimension.
     * @return: Minimal size of XDimension in pixels which is used with UseMinimalXDimension.
     */
    public function getMinimalXDimension() : float
    {
        return java_cast($this->getJavaClass()->getMinimalXDimension(), "float");
    }
    /**
     * Minimal size of XDimension in pixels which is used with UseMinimalXDimension.
     * @param $value: Minimal size of XDimension in pixels which is used with UseMinimalXDimension.
     */
    public function setMinimalXDimension(float $value) : void
    {
        $this->getJavaClass()->setMinimalXDimension($value);
    }

    /**
     * <p>
     * Mode which enables methods to recognize barcode elements with the selected quality. Barcode element with lower quality requires more hard methods which slows the recognition.
     * @return: Mode which enables methods to recognize barcode elements with the selected quality.
     */
    public function getBarcodeQuality() : int
    {
        return java_cast($this->getJavaClass()->getBarcodeQuality(), "integer");
    }
    /**
     * Mode which enables methods to recognize barcode elements with the selected quality. Barcode element with lower quality requires more hard methods which slows the recognition.
     * @param $value: Mode which enables methods to recognize barcode elements with the selected quality.
     */
    public function setBarcodeQuality(int $value) : void
    {
        $this->getJavaClass()->setBarcodeQuality($value);
    }

    /**
     * <p>
     * Deconvolution (image restorations) mode which defines level of image degradation. Originally deconvolution is a function which can restore image degraded
     * (convoluted) by any natural function like blur, during obtaining image by camera. Because we cannot detect image function which corrupt the image,
     * we have to check most well know functions like sharp or mathematical morphology.
     * @return: Deconvolution mode which defines level of image degradation.
     */
    public function getDeconvolution() : int
    {
        return java_cast($this->getJavaClass()->getDeconvolution(), "integer");
    }
    /**
     * Deconvolution (image restorations) mode which defines level of image degradation. Originally deconvolution is a function which can restore image degraded
     * (convoluted) by any natural function like blur, during obtaining image by camera. Because we cannot detect image function which corrupt the image,
     * we have to check most well know functions like sharp or mathematical morphology.
     * @param $value: Deconvolution mode which defines level of image degradation.
     */
    public function setDeconvolution(int $value) : void
    {
        $this->getJavaClass()->setDeconvolution($value);
    }

    /**
     * Mode which enables or disables additional recognition of barcodes on images with inverted colors (luminance).
     * @return: Additional recognition of barcodes on images with inverse colors
     */
    public function getInverseImage() : int
    {
        return java_cast($this->getJavaClass()->getInverseImage(),"integer");
    }
    /**
     * Mode which enables or disables additional recognition of barcodes on images with inverted colors (luminance).
     * @param $value: Additional recognition of barcodes on images with inverse colors
     */
    public function setInverseImage(int $value) : void
    {
        $this->getJavaClass()->setInverseImage($value);
    }

    /**
     * <p>
     * Mode which enables or disables additional recognition of color barcodes on color images.
     * @return: Additional recognition of color barcodes on color images.
     */
    public function getComplexBackground() : int
    {
        return java_cast($this->getJavaClass()->getComplexBackground(), "integer");
    }
    /**
     * Mode which enables or disables additional recognition of color barcodes on color images.
     * @param $value: Additional recognition of color barcodes on color images.
     */
    public function setComplexBackground(int $value) : void
    {
        $this->getJavaClass()->setComplexBackground($value);
    }

    /**
     * Allows engine to recognize barcodes which has incorrect checksumm or incorrect values. Mode can be used to recognize damaged barcodes with incorrect text.
     * @return: Allows engine to recognize incorrect barcodes.
     */
    public function getAllowIncorrectBarcodes() : bool
    {
        return java_cast($this->getJavaClass()->getAllowIncorrectBarcodes(), "boolean");
    }

    /**
     * Allows engine to recognize barcodes which has incorrect checksumm or incorrect values. Mode can be used to recognize damaged barcodes with incorrect text.
     * @param $value: Allows engine to recognize incorrect barcodes.
     */
    public function setAllowIncorrectBarcodes(bool $value) : void
    {
        $this->getJavaClass()->setAllowIncorrectBarcodes($value);
    }
}

/**
 * Contains the data of subtype for Code128 type barcode
 */
class Code128DataPortion extends BaseJavaClass
{
    function __construct($javaClass)
    {
        try
        {
            parent::__construct($javaClass);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    protected function init(): void
        {
    }

    /**
     * Gets the part of code text related to subtype.
     *
     * @return string The part of code text related to subtype
     */
    public final function getData(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->getData(), "string");
        }
        catch (Exception $ex)
        {
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
        try
        {
            return java_cast($this->getJavaClass()->getCode128SubType(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this {Code128DataPortion}.
     * @return string A string that represents this {Code128DataPortion}.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
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
class DataBarExtendedParameters extends BaseJavaClass
{

    protected function init(): void
    {
        // TODO: Implement init() method.
    }

    /**
     * Gets the DataBar 2D composite component flag. Default value is false.
     * @return bool The DataBar 2D composite component flag.
     */
    public function is2DCompositeComponent(): bool
    {
        try
        {
            return java_cast($this->getJavaClass()->is2DCompositeComponent(), "boolean");
        }
        catch (Exception $ex)
        {
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
        try
        {
            return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns the hash code for this instance.
     * @return int A 32-bit signed integer hash code.
     */
    public function hashcode(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->hashcode(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Returns a human-readable string representation of this DataBarExtendedParameters.
     * @return string A string that represents this DataBarExtendedParameters.
     */
    public function toString(): string
    {
        try
        {
            return java_cast($this->getJavaClass()->toString(), "string");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 * AustraliaPost decoding parameters. Contains parameters which make influence on recognized data of AustraliaPost symbology.
 */
class AustraliaPostSettings extends BaseJavaClass
{
    /**
     * AustraliaPostSettings constructor
     */
    public function __construct($javaClass)
    {
        try
        {
            parent::__construct($javaClass);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    protected function init(): void
    {
    }

    /**
     * Gets or sets the Interpreting Type for the Customer Information of AustralianPost BarCode.DEFAULT is CustomerInformationInterpretingType.OTHER.
     * @return int The interpreting type (CTable, NTable or Other) of customer information for AustralianPost BarCode
     */
    public function getCustomerInformationInterpretingType(): int
    {
        try
        {
            return java_cast($this->getJavaClass()->getCustomerInformationInterpretingType(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Gets or sets the Interpreting Type for the Customer Information of AustralianPost BarCode.DEFAULT is CustomerInformationInterpretingType.OTHER.
     * @param int $value The interpreting type (CTable, NTable or Other) of customer information for AustralianPost BarCode
     */
    public function setCustomerInformationInterpretingType(int $value): void
    {
        try
        {
            $this->getJavaClass()->setCustomerInformationInterpretingType($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
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
        try
        {
            return java_cast($this->getJavaClass()->getIgnoreEndingFillingPatternsForCTable(), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
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
     * @throws BarcodeException
     */
    public function setIgnoreEndingFillingPatternsForCTable(bool $value): void
    {
        try
        {
            $this->getJavaClass()->setIgnoreEndingFillingPatternsForCTable($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }
}

/**
 * The main BarCode decoding parameters. Contains parameters which make influence on recognized data.
 */
class BarcodeSettings extends BaseJavaClass
{
    private $_australiaPost;

    /**
     * BarcodeSettings copy constructor
     * @param BarcodeSettings|null $settings The source of the data
     * @throws BarcodeException
     */
    function __construct($javaClass)
    {
        parent::__construct($javaClass);
    }

    protected function init(): void
    {
        try
        {
            $this->_australiaPost = new AustraliaPostSettings($this->getJavaClass()->getAustraliaPost());
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
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
        try
        {
            return java_cast($this->getJavaClass()->getChecksumValidation(), "int");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
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
        try
        {
            $this->getJavaClass()->setChecksumValidation($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
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
        try
        {
            return java_cast($this->getJavaClass()->getStripFNC(), "bool");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
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
        try
        {
            $this->getJavaClass()->setStripFNC($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
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
        try
        {
            return java_cast($this->getJavaClass()->getDetectEncoding(), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    public function setDetectEncoding(bool $value): void
    {
        $this->getJavaClass()->setDetectEncoding($value);
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

class RecognitionAbortedException extends Exception
{
    private const javaClassName = "com.aspose.mw.barcode.recognition.MwRecognitionAbortedException";
    private $javaClass;

    /**
     * Gets the execution time of current recognition session
     * @return int The execution time of current recognition session
     */
    public function getExecutionTime(): int
    {
        try
        {
            return java_cast($this->javaClass->getExecutionTime(), "integer");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Sets the execution time of current recognition session
     * @param int $value The execution time of current recognition session
     */
    public function setExecutionTime(int $value): void
    {
        try
        {
            $this->javaClass->setExecutionTime($value);
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Initializes a new instance of the <see cref="RecognitionAbortedException" /> class with specified recognition abort message.
     * @param $message null|string The error message of the exception.
     * @param $executionTime null|int The execution time of current recognition session.
     */
    public function __construct(?string $message, ?int $executionTime)
    {
        try
        {
            parent::__construct($message);
            if ($message != null && $executionTime != null)
            {
                $this->javaClass = new java(self::javaClassName, $message, $executionTime);
            }
            elseif ($executionTime != null)
            {
                $this->javaClass = new java(self::javaClassName, $executionTime);
            }
            else
            {
                $this->javaClass = new java(self::javaClassName);
            }
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    static function construct($javaClass): RecognitionAbortedException
    {
        $exception = new RecognitionAbortedException(null, null);
        $exception->javaClass = $javaClass;
        return $exception;
    }

    protected function init(): void
    {
    }

    /**
     * Returns a human-readable string representation of this <see cref="MaxiCodeExtendedParameters"/>.
     * @return string A string that represents this <see cref="MaxiCodeExtendedParameters"/>.
     */
    public function toString() : string
    {
        return java_cast($this->javaClass->toString(), "string");
    }
}

/**
 * Stores a MaxiCode additional information of recognized barcode
 */
class MaxiCodeExtendedParameters extends BaseJavaClass
{

    function __construct($javaClass)
    {
        parent::__construct($javaClass);
    }

    protected function init() : void
    {
    }

    /**
     * Gets a MaxiCode encode mode.
     *  Default value: Mode4
     */
    public function getMaxiCodeMode(): int
    {
        return java_cast($this->getJavaClass()->getMaxiCodeMode(), "integer");
    }

    /**
     * Gets a MaxiCode barcode id in structured append mode.
     * Default value: 0
     */
    public function getMaxiCodeStructuredAppendModeBarcodeId() : int
    {
        return java_cast($this->getJavaClass()->getMaxiCodeStructuredAppendModeBarcodeId(), "integer");
    }

    /**
     * Gets a MaxiCode barcodes count in structured append mode.
     * Default value: -1
     */
    public function getMaxiCodeStructuredAppendModeBarcodesCount() : int
    {
        return java_cast($this->getJavaClass()->getMaxiCodeStructuredAppendModeBarcodesCount(), "integer");
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified <see cref="MaxiCodeExtendedParameters"/> value.
     * @param object $obj An System.Object value to compare to this instance.
     * @return bool <b>true</b> if obj has the same value as this instance; otherwise, <b>false</b>.
     */
    public function equals(MaxiCodeExtendedParameters $obj) : bool
    {
        return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "integer");
    }

    /**
     * Returns the hash code for this instance.
     * @return int A 32-bit signed integer hash code.
     */
    public function getHashCode() : int
    {
        return java_cast($this->getJavaClass()->getHashCode(), "integer");
    }

    /**
     * Returns a human-readable string representation of this <see cref="MaxiCodeExtendedParameters"/>.
     * @return string A string that represents this <see cref="MaxiCodeExtendedParameters"/>.
     */
    public function toString() : string
    {
        return java_cast($this->getJavaClass()->toString(), "string");
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
class DotCodeExtendedParameters extends BaseJavaClass
{
    public function construct($javaClass)
    {
        parent::__construct($javaClass);
    }

    /**
     * <p>Gets the DotCode structured append mode barcodes count. Default value is -1. Count must be a value from 1 to 35.</p>Value: The count of the DotCode structured append mode barcode.
     */
    public function getDotCodeStructuredAppendModeBarcodesCount() : int
    { return java_cast($this->getJavaClass()->getDotCodeStructuredAppendModeBarcodesCount(), "integer"); }

    /**
     * <p>Gets the ID of the DotCode structured append mode barcode. ID starts from 1 and must be less or equal to barcodes count. Default value is -1.</p>Value: The ID of the DotCode structured append mode barcode.
     */
    public function getDotCodeStructuredAppendModeBarcodeId() : int
    { return java_cast($this->getJavaClass()->getDotCodeStructuredAppendModeBarcodeId(), "integer"); }

    /**
     * <p>
     * Indicates whether code is used for instruct reader to interpret the following data as instructions for initialization or reprogramming of the bar code reader.
     * Default value is false.
     * </p>
     */
    public function getDotCodeIsReaderInitialization() : bool
    { return java_cast($this->getJavaClass()->getDotCodeIsReaderInitialization(), "boolean"); }

    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code DotCodeExtendedParameters} value.
     * </p>
     * @return {@code <b>true</b>} if obj has the same value as this instance; otherwise, {@code <b>false</b>}.
     * @param obj An System.Object value to compare to this instance.
     */
    public function equals(DotCodeExtendedParameters $obj) : bool
    {
        return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
    }

    /**
     * <p>
     * Returns the hash code for this instance.
     * </p>
     * @return A 32-bit signed integer hash code.
     */
    public function hashCode() : int
    {
        return java_cast($this->getJavaClass()->hashCode(), "integer");
    }

    /**
     * <p>
     * Returns a human-readable string representation of this {@code DotCodeExtendedParameters}.
     * </p>
     * @return A string that represents this {@code DotCodeExtendedParameters}.
     */
    public function toString() : string
    {
        return java_cast($this->getJavaClass()->toString(), "string");
    }

    protected function init() : void
    {
        // TODO: Implement init() method.
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
class DataMatrixExtendedParameters extends BaseJavaClass
{
    function __construct($javaClass)
    {
        parent::__construct($javaClass);
    }

    protected function init() : void
    {
    }

    /**
     * <p>Gets the DataMatrix structured append mode barcodes count. Default value is -1. Count must be a value from 1 to 35.</p>Value: The count of the DataMatrix structured append mode barcode.
     */
    public function getStructuredAppendBarcodesCount() : int
    {
        return java_cast($this->getJavaClass()->getStructuredAppendBarcodesCount(), "integer");
    }

    /**
     * <p>Gets the ID of the DataMatrix structured append mode barcode. ID starts from 1 and must be less or equal to barcodes count. Default value is -1.</p>Value: The ID of the DataMatrix structured append mode barcode.
     */
    public function getStructuredAppendBarcodeId()  : int
    {
        return java_cast($this->getJavaClass()->getStructuredAppendBarcodeId(), "integer");
    }

    /**
     * <p>Gets the ID of the DataMatrix structured append mode barcode. ID starts from 1 and must be less or equal to barcodes count. Default value is -1.</p>Value: The ID of the DataMatrix structured append mode barcode.
     */
    public function getStructuredAppendFileId() : int
    {
        return java_cast($this->getJavaClass()->getStructuredAppendFileId(), "integer");
    }

    /**
     * <p>
     * Indicates whether code is used for instruct reader to interpret the following data as instructions for initialization or reprogramming of the bar code reader.
     * Default value is false.
     * </p>
     */
    public function isReaderProgramming() : bool
    {
        return java_cast($this->getJavaClass()->isReaderProgramming(), "boolean");
    }

    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code DataMatrixExtendedParameters} value.
     * </p>
     * @return {@code <b>true</b>} if obj has the same value as this instance; otherwise, {@code <b>false</b>}.
     * @param obj An System.Object value to compare to this instance.
     */
    public function equals(DataMatrixExtendedParameters $obj) : bool
    {
        return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
    }

    /**
     * <p>
     * Returns the hash code for this instance.
     * </p>
     * @return A 32-bit signed integer hash code.
     */
    public function hashCode() : int
    {
        return java_cast($this->getJavaClass()->hashCode(), "integer");
    }

    /**
     * <p>
     * Returns a human-readable string representation of this {@code DataMatrixExtendedParameters}.
     * </p>
     * @return A string that represents this {@code DataMatrixExtendedParameters}.
     */
    public /*override*/ function toString() : String
    {
        return java_cast($this->getJavaClass()->toString(), "String");
    }
}

/**
 * <p>
 * Stores special data of {@code <b>GS1 Composite Bar</b>} recognized barcode
 * </p>
 */
class GS1CompositeBarExtendedParameters extends BaseJavaClass
{
    function __construct($javaClass)
    {
        parent::__construct($javaClass);
    }

    protected function init() : void
    {
    }

    /**
     * <p>Gets the 1D (linear) barcode type of GS1 Composite</p>Value: 2D barcode type
     */
    public function getOneDType() : int
    {
        return java_cast($this->getJavaClass()->getOneDType(), "integer");
    }

    /**
     * <p>Gets the 1D (linear) barcode value of GS1 Composite</p>Value: 1D barcode value
     */
    public function getOneDCodeText() : string
    {
        return java_cast($this->getJavaClass()->getOneDCodeText(), "string");
    }

    /**
     * <p>Gets the 2D barcode type of GS1 Composite</p>Value: 2D barcode type
     */
    public function getTwoDType() : int
    {
        return java_cast($this->getJavaClass()->getTwoDType(), "integer");
    }

    /**
     * <p>Gets the 2D barcode value of GS1 Composite</p>Value: 2D barcode value
     */
    public function getTwoDCodeText() : string
    {
        return java_cast($this->getJavaClass()->getTwoDCodeText(), "string");
    }

    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code GS1CompositeBarExtendedParameters} value.
     * </p>
     * @return {@code <b>true</b>} if obj has the same value as this instance; otherwise, {@code <b>false</b>}.
     * @param obj An System.Object value to compare to this instance.
     */
    public function equals($obj) : bool
    {
        return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
    }

    /**
     * <p>
     * Returns the hash code for this instance.
     * </p>
     * @return A 32-bit signed integer hash code.
     */
    public function hashCode() : int
    {
        return java_cast($this->getJavaClass()->hashCode(), "integer");
    }

    /**
     * <p>
     * Returns a human-readable string representation of this {@code GS1CompositeBarExtendedParameters}.
     * </p>
     * @return A string that represents this {@code GS1CompositeBarExtendedParameters}.
     */
    public function toString() : string
    {
        return java_cast($this->getJavaClass()->toString(), "string");
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
class AztecExtendedParameters extends BaseJavaClass
{
    function __construct($javaClass)
    {
        parent::__construct($javaClass);
    }

    protected function init() : void
    {
    }
    /**
     * <p>Gets the Aztec structured append mode barcodes count. Default value is 0. Count must be a value from 1 to 26.</p>Value: The barcodes count of the Aztec structured append mode.
     */
    public function getStructuredAppendBarcodesCount() : int
    {
        return java_cast($this->getJavaClass()->getStructuredAppendBarcodesCount(), "integer");
    }

    /**
     * <p>Gets the ID of the Aztec structured append mode barcode. ID starts from 1 and must be less or equal to barcodes count. Default value is 0.</p>Value: The barcode ID of the Aztec structured append mode.
     */
    public function getStructuredAppendBarcodeId() : int
    {
        return java_cast($this->getJavaClass()->getStructuredAppendBarcodeId(), "integer");
    }

    /**
     * <p>Gets the File ID of the Aztec structured append mode. Default value is empty string</p>Value: The File ID of the Aztec structured append mode.
     */
    public function getStructuredAppendFileId() : int
    {
        return java_cast($this->getJavaClass()->getStructuredAppendFileId(), "integer");
    }

    /**
     * <p>
     * Indicates whether code is used for instruct reader to interpret the following data as instructions for initialization or reprogramming of the bar code reader.
     * Default value is false.
     * </p>
     */
    public function isReaderInitialization() : bool
    {
        return java_cast($this->getJavaClass()->isReaderInitialization(), "boolean");
    }

    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code AztecExtendedParameters} value.
     * </p>
     * @return {@code <b>true</b>} if obj has the same value as this instance; otherwise, {@code <b>false</b>}.
     * @param obj An System.Object value to compare to this instance.
     */
    public function equals($obj) : bool
    {
        return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
    }

    /**
     * <p>
     * Returns the hash code for this instance.
     * </p>
     * @return A 32-bit signed integer hash code.
     */
    public function hashCode() : int
    {
        return java_cast($this->getJavaClass()->hashCode(), "integer");
    }

    /**
     * <p>
     * Returns a human-readable string representation of this {@code AztecExtendedParameters}.
     * </p>
     * @return A string that represents this {@code AztecExtendedParameters}.
     */
    public function toString() : string
    {
        return java_cast($this->getJavaClass()->toString(), "string");
    }
}

/**
 * <p>
 * Stores a Codabar additional information of recognized barcode
 * </p>
 */
class CodabarExtendedParameters extends BaseJavaClass
{
    function __construct($javaClass)
    {
        parent::__construct($javaClass);
    }

    protected function init() : void
    {
    }

    /**
     * <p>
     * Gets or sets a Codabar start symbol.
     * Default value: CodabarSymbol.A
     * </p>
     */
    public function getCodabarStartSymbol() :int
    {
        return java_cast($this->getJavaClass()->getCodabarStartSymbol(), "integer");
    }

    /**
     * <p>
     * Gets or sets a Codabar start symbol.
     * Default value: CodabarSymbol.A
     * </p>
     */
    public function setCodabarStartSymbol(int $value) : void
    {
        $this->getJavaClass()->setCodabarStartSymbol($value);
    }

    /**
     * <p>
     * Gets or sets a Codabar stop symbol.
     * Default value: CodabarSymbol.A
     * </p>
     */
    public function getCodabarStopSymbol() : int
    {
        return java_cast($this->getJavaClass()->getCodabarStopSymbol(), "integer");
    }

    /**
     * <p>
     * Gets or sets a Codabar stop symbol.
     * Default value: CodabarSymbol.A
     * </p>
     */
    public function setCodabarStopSymbol(int $value) : void
    {
        $this->getJavaClass()->setCodabarStopSymbol($value);
    }


    /**
     * <p>
     * Returns a value indicating whether this instance is equal to a specified {@code CodabarExtendedParameters} value.
     * </p>
     * @return {@code <b>true</b>} if obj has the same value as this instance; otherwise, {@code <b>false</b>}.
     * @param obj An System.Object value to compare to this instance.
     */
    public function equals(Object $obj) : bool
    {
        return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
    }

    /**
     * <p>
     * Returns the hash code for this instance.
     * </p>
     * @return A 32-bit signed integer hash code.
     */
    public function hashCode(): int
    {
        return java_cast($this->getJavaClass()->hashCode(), "integer");
    }

    /**
     * <p>
     * Returns a human-readable string representation of this {@code CodabarExtendedParameters}.
     * </p>
     * @return A string that represents this {@code CodabarExtendedParameters}.
     */
    public function toString() : string
    {
        return java_cast($this->getJavaClass()->toString(), "string");
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

    private const javaClassName = "com.aspose.mw.barcode.recognition.MwDecodeTypeUtils";

    /**
     * Determines if the specified BaseDecodeType contains any 1D barcode symbology
     * @param int $symbology barcode symbology
     * @return bool <b>true</b> if BaseDecodeType contains any 1D barcode symbology; otherwise, returns <b>false</b>.
     */
    public static function is1D(int $symbology): bool
    {
        try
        {
            $javaClass = new java(DecodeType::javaClassName);
            return java_cast($javaClass->is1D($symbology), "boolean");
        }
        catch (Exception $ex)
        {
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
        try
        {
            $javaClass = new java(DecodeType::javaClassName);
            return java_cast($javaClass->isPostal($symbology), "boolean");
        }
        catch (Exception $ex)
        {
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
        try
        {
            $javaClass = new java(DecodeType::javaClassName);
            return java_cast($javaClass->is2D($symbology), "boolean");
        }
        catch (Exception $ex)
        {
            throw new BarcodeException($ex->getMessage(), __FILE__, __LINE__);
        }
    }

    /**
     * Determines if the BaseDecodeType array contains specified barcode symbology
     * @param int $decodeType specified barcode symbology
     * @param array $decodeTypes the BaseDecodeType array
     * @return bool
     * @throws BarcodeException
     */
    public static function containsAny(int $decodeType, array $decodeTypes): bool
    {
        try
        {
            $javaClass = new java(DecodeType::javaClassName);
            return java_cast($javaClass->containsAny($decodeType, $decodeTypes), "boolean");
        }
        catch (Exception $ex)
        {
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
};

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
?>