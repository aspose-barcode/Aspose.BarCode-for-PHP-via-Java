<?php

require_once('assist.php');

/**
 * BarCodeReader encapsulates an image which may contain one or several barcodes, it then can perform ReadBarCodes operation to detect barcodes.
 * <hr><blockquote><pre>
 * This sample shows how to detect Code39 and Code128 barcodes.
 * $reader = new BarCodeReader("test.png", DecodeType::CODE_39_STANDARD, DecodeType::CODE_128);
 * foreach($reader->readBarCodes() as $result)
 * {
 *    print("BarCode Type: ".$result->getCodeTypeName());
 *    print("BarCode CodeText: ".$result->getCodeText());
 * }
 * </pre></blockquote></hr>
 */
class BarcodeReader extends BaseJavaClass
{
    private $qualitySettings;
    private $code128DataPortions;
    private $recognizedResults;

    private const JAVA_CLASS_NAME = "com.aspose.mw.barcode.recognition.MwBarcodeReader";


    /**
     * Initializes a new instance of the BarCodeReader
     * @param args can take following combinations of arguments:
     *    1) image encoded as base64 string
     *    2) image encoded as base64 string and the array of objects by type DecodeType
     *    3) image encoded as base64 string, array of object by type Rectangle and the array of objects by DecodeType
     * @throws PhpBarcodeException
     */
    public function __construct($image, $rectangles, $decodeTypes)
    {
        try
        {
            if(!is_null($rectangles) && !is_array($rectangles))
                $rectangles = array($rectangles);
            if(!is_null($decodeTypes) && !is_array($decodeTypes))
                $decodeTypes = array($decodeTypes);
            $java_class = new java(self::JAVA_CLASS_NAME, self::loadImage($image), $rectangles, $decodeTypes);
            parent::__construct($java_class);
        } catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Determines whether any of the given decode types is included into
     * @param mixed ...$decodeTypes Types to verify.
     * @return bool Value is a true if any types are included into.
     */
    public function containsAny(...$decodeTypes)
    {
        return java_cast($this->getJavaClass()->containsAny($decodeTypes), "boolean");
    }

    private static function loadImage($image)
    {
        $is_path_to_image = false;
        try
        {
            $is_path_to_image = file_exists($image);
        } catch (Exception $e)
        {
            print "Warning " . $e->getMessage();
        }

        try
        {
            if ($is_path_to_image)
            {
                $imagedata = file_get_contents($image);
                return base64_encode($imagedata);
            } else
            {
                return $image;
            }
        } catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    private static function convertToString($arg)
    {
        if (is_int($arg))
        {
            return strval($arg);
        } elseif ($arg instanceof Rectangle)
        {
            return "{[" . $arg->toString() . "]}";
        } elseif (is_array($arg))
        {
            $areasString = "{";

            for ($i = 0; $i < sizeof($arg); $i++)
            {
                $areasString .= "[" . $arg[$i]->toString() . "]";
            }

            $areasString .= "}";

            return $areasString;
        } else
        {
            return $arg;
        }
    }

    protected function init(): void
    {
        try
        {
            $this->qualitySettings = new QualitySettings($this->getJavaClass()->getQualitySettings());
        } catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Gets file name which was assigned by user
     *
     * @return file name
     */
    public function getFileName()
    {
        try
        {
            return java_cast($this->getJavaClass()->getFileName(), "string");
        } catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Gets the timeout of recognition process in milliseconds.
     *
     * $reader = new BarCodeReader("test.png");
     * $reader->setTimeout(5000);
     * foreach($reader->readBarCodes() as $result)
     *    print("BarCode CodeText: ".$result->getCodeText());
     *
     * @return The timeout.
     */
    public function getTimeout()
    {
        try
        {
            return java_cast($this->getJavaClass()->getTimeout(), "integer");
        } catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Sets the timeout of recognition process in milliseconds.
     *
     * $reader = new BarCodeReader("test.png");
     * $reader->setTimeout(5000);
     * foreach($reader->readBarCodes() as $result)
     *    print("BarCode CodeText: ".$result->getCodeText());
     *
     * @param value The timeout.
     */
    public function setTimeout($value)
    {
        try
        {
            $this->getJavaClass()->setTimeout($value);
        } catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Enable checksum validation during recognition for 1D barcodes.
     * Default is treated as Yes for symbologies which must contain checksum, as No where checksum only possible.
     * Checksum never used: Codabar
     * Checksum is possible: Code39 Standard/Extended, Standard2of5, Interleaved2of5, Matrix2of5, ItalianPost25, DeutschePostIdentcode, DeutschePostLeitcode, VIN
     * Checksum always used: Rest symbologies
     * This sample shows influence of ChecksumValidation on recognition quality and results
     *
     * $generator = new BarcodeGenerator(EncodeTypes::EAN_13, "1234567890128");
     * $generator->save("test.png");
     * $reader = new BarCodeReader("test.png", DecodeType::EAN_13);
     * //checksum disabled
     * $reader->setChecksumValidation(ChecksumValidation::OFF);
     * foreach($reader->readBarCodes() as $result)
     * {
     *     print("BarCode CodeText: ".$result->getCodeText());
     *     print("BarCode Value: ".$result->getExtended()->getOneD()->getValue());
     *     print("BarCode Checksum: ".$result->getExtended()->getOneD()->getCheckSum());
     *  }
     * $reader = new BarCodeReader("test.png", DecodeType::EAN_13);
     * //checksum enabled
     * $reader->setChecksumValidation(ChecksumValidation::ON);
     * foreach($reader->readBarCodes() as $result)
     * {
     *    print("BarCode CodeText: ".$result->getCodeText());
     *    print("BarCode Value: ".$result->getExtended()->getOneD()->getValue());
     *    print("BarCode Checksum: ".$result->getExtended()->getOneD()->getCheckSum());
     * }
     * The checksum validation flag.
     */
    public function getChecksumValidation()
    {
        try
        {
            return java_cast($this->getJavaClass()->getChecksumValidation(), "boolean");
        } catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     *
     * Enable checksum validation during recognition for 1D barcodes.
     * Default is treated as Yes for symbologies which must contain checksum, as No where checksum only possible.
     * Checksum never used: Codabar
     * Checksum is possible: Code39 Standard/Extended, Standard2of5, Interleaved2of5, Matrix2of5, ItalianPost25, DeutschePostIdentcode, DeutschePostLeitcode, VIN
     * Checksum always used: Rest symbologies
     *
     * This sample shows influence of ChecksumValidation on recognition quality and results
     *
     * $generator = new BarcodeGenerator(EncodeTypes::EAN_13, "1234567890128");
     * $generator->save("test.png");
     * $reader = new BarCodeReader("test.png", DecodeType::EAN_13);
     * //checksum disabled
     * $reader->setChecksumValidation(ChecksumValidation::OFF);
     * foreach($reader->readBarCodes() as $result)
     * {
     *    print("BarCode CodeText: ".$result->getCodeText());
     *    print("BarCode Value: ".$result->getExtended()->getOneD()->getValue());
     *    print("BarCode Checksum: ".$result->getExtended()->getOneD()->getCheckSum());
     * }
     * $reader = new BarCodeReader("test.png", DecodeType::EAN_13);
     * //checksum enabled
     * $reader->setChecksumValidation(ChecksumValidation::ON);
     * foreach($reader->readBarCodes() as $result)
     * {
     *    print("BarCode CodeText: ".$result->getCodeText());
     *    print("BarCode Value: ".$result->getExtended()->getOneD()->getValue());
     *    print("BarCode Checksum: ".$result->getExtended()->getOneD()->getCheckSum());
     * }
     * The checksum validation flag.
     */
    public function setChecksumValidation($value)
    {
        try
        {
            $this->getJavaClass()->setChecksumValidation($value);
        } catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Strip FNC1, FNC2, FNC3 characters from codetext. Default value is false.
     *
     * This sample shows how to strip FNC characters
     *
     * $generator = new BarcodeGenerator(EncodeTypes::GS1Code128, "(02)04006664241007(37)1(400)7019590754");
     * $generator->save("test.png");
     * $reader = new BarCodeReader("test.png", DecodeType::CODE_128);
     * //StripFNC disabled
     * $reader->setStripFNC(false);
     * foreach($reader->readBarCodes() as $result)
     * {
     *     print("BarCode CodeText: ".$result->getCodeText());
     * }
     * $reader = new BarCodeReader("test.png", DecodeType::CODE_128);
     * //StripFNC enabled
     * $reader->setStripFNC(true);
     * foreach($reader->readBarCodes() as $result)
     * {
     *    print("BarCode CodeText: ".$result->getCodeText());
     * }
     */
    public function getStripFNC()
    {
        try
        {
            return java_cast($this->getJavaClass()->getStripFNC(), "boolean");
        } catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Strip FNC1, FNC2, FNC3 characters from codetext. Default value is false.
     *
     * This sample shows how to strip FNC characters
     *
     * $generator = new BarcodeGenerator(EncodeTypes::GS1Code128, "(02)04006664241007(37)1(400)7019590754");
     * $generator->save("test.png");
     * $reader = new BarCodeReader("test.png", DecodeType::CODE_128);
     * //StripFNC disabled
     * $reader->setStripFNC(false);
     * foreach($reader->readBarCodes() as $result)
     * {
     *    print("BarCode CodeText: ".$result->getCodeText());
     * }
     * $reader = new BarCodeReader("test.png", DecodeType::CODE_128);
     * //StripFNC enabled
     * $reader->setStripFNC(true);
     * foreach($reader->readBarCodes() as $result)
     * {
     *    print("BarCode CodeText: ".$result->getCodeText());
     * }
     *
     */
    public function setStripFNC($value)
    {
        try
        {
            $this->getJavaClass()->setStripFNC($value);
        } catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Gets the Interpreting Type for the Customer Information of AustralianPost BarCode.Default is CustomerInformationInterpretingType::OTHER.
     */
    public function getCustomerInformationInterpretingType()
    {
        try
        {
            return java_cast($this->getJavaClass()->getCustomerInformationInterpretingType(), "integer");
        } catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Sets the Interpreting Type for the Customer Information of AustralianPost BarCode.Default is CustomerInformationInterpretingType::OTHER.
     */
    public function setCustomerInformationInterpretingType($value)
    {
        try
        {
            $this->getJavaClass()->setCustomerInformationInterpretingType($value);
        } catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    public function abort(): void
    {
        try
        {
            $this->getJavaClass()->abort();
        } catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Gets recognized BarCodeResult array
     * This sample shows how to read barcodes with BarCodeReader
     *
     * $reader = new BarCodeReader("test.png", DecodeType::CODE_39_STANDARD, DecodeType::CODE_128);
     * $reader->readBarCodes();
     * for($i = 0; $reader->getFoundCount() > $i; ++$i)
     *    print("BarCode CodeText: ". $reader->getFoundBarCodes()[i]->getCodeText());
     *
     * Value: The recognized BarCodeResult array
     */
    public function getFoundBarCodes(): array
    {
        return $this->recognizedResults;
    }

    /**
     * Gets recognized barcodes count<hr><blockquote>
     * This sample shows how to read barcodes with BarCodeReader
     * $reader = new BarCodeReader("test.png", DecodeType::CODE_39_STANDARD, DecodeType::CODE_128);
     * $reader->readBarCodes();
     * for($i = 0; $reader->getFoundCount() > $i; ++$i)
     *    print("BarCode CodeText: ".$reader->getFoundBarCodes()[i]->getCodeText());
     * Value: The recognized barcodes count
     */
    public function getFoundCount(): int
    {
        return java_cast($this->getJavaClass()->getFoundCount(), "integer");
    }

    /**
     * Reads BarCodeResult from the image.
     * This sample shows how to read barcodes with BarCodeReader
     * $reader = new BarCodeReader("test.png", DecodeType::CODE_39_STANDARD, DecodeType::CODE_128);
     * foreach($reader->readBarCodes() as $result)
     *    print("BarCode CodeText: ".$result->getCodeText());
     * $reader = new BarCodeReader("test.png", DecodeType::CODE_39_STANDARD, DecodeType::CODE_128);
     * $reader->readBarCodes();
     * for($i = 0; $reader->getFoundCount() > $i; ++$i)
     *    print("BarCode CodeText: ".$reader->getFoundBarCodes()[i]->getCodeText());
     * @return Returns array of recognized {@code BarCodeResult}s on the image. If nothing is recognized, zero array is returned.
     */
    public function readBarCodes(): array
    {
        $this->recognizedResults = array();
        $javaReadBarcodes = java_values($this->getJavaClass()->readBarCodes());
        for ($i = 0; $i < sizeof($javaReadBarcodes); $i++)
            $this->recognizedResults[$i] = new BarCodeResult($javaReadBarcodes[$i]);
        return $this->recognizedResults;
    }

    /**
     * QualitySettings allows to configure recognition quality and speed manually.
     * You can quickly set up QualitySettings by embedded presets: HighPerformance, NormalQuality,
     * HighQuality, MaxBarCodes or you can manually configure separate options.
     * Default value of QualitySettings is NormalQuality.
     *
     * This sample shows how to use QualitySettings with BarCodeReader
     *
     * $reader = new BarCodeReader("test.png");
     *  //set high performance mode
     * $reader->setQualitySettings(QualitySettings::getHighPerformance());
     * foreach($reader->readBarCodes() as $result)
     *   print("BarCode CodeText: ".$result->getCodeText());
     * $reader = new BarCodeReader("test.png", DecodeType::CODE_39_STANDARD, DecodeType::CODE_128);
     * //normal quality mode is set by default
     * foreach($reader->readBarCodes() as $result)
     *   print("BarCode CodeText: ".$result->getCodeText());
     * $reader = new BarCodeReader("test.png", DecodeType::CODE_39_STANDARD, DecodeType::CODE_128);
     * //set high performance mode
     * $reader->setQualitySettings(QualitySettings::getHighPerformance());
     * //set separate options
     * $reader->getQualitySettings()->setAllowMedianSmoothing(true);
     * $reader->getQualitySettings()->setMedianSmoothingWindowSize(5);
     * foreach($reader->readBarCodes() as $result)
     *   print("BarCode CodeText: ".$result->getCodeText());
     * QualitySettings to configure recognition quality and speed.
     */
    public final function getQualitySettings(): QualitySettings
    {
        try
        {
            return $this->qualitySettings;
        } catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * QualitySettings allows to configure recognition quality and speed manually.
     * You can quickly set up QualitySettings by embedded presets: HighPerformance, NormalQuality,
     * HighQuality, MaxBarCodes or you can manually configure separate options.
     * Default value of QualitySettings is NormalQuality.
     *
     * This sample shows how to use QualitySettings with BarCodeReader
     * $reader = new BarCodeReader("test.png", DecodeType::CODE_39_STANDARD, DecodeType::CODE_128);
     * //set high performance mode
     * $reader->setQualitySettings(QualitySettings::getHighPerformance());
     * foreach($reader->readBarCodes() as $result)
     *   print("BarCode CodeText: ".$result->getCodeText());
     * $reader = new BarCodeReader("test.png", DecodeType::CODE_39_STANDARD, DecodeType::CODE_128);
     * //normal quality mode is set by default
     * foreach($reader->readBarCodes() as $result)
     *   print("BarCode CodeText: ".$result->getCodeText());
     * $reader = new BarCodeReader("test.png", DecodeType::CODE_39_STANDARD, DecodeType::CODE_128);
     *  //set high performance mode
     * $reader->setQualitySettings(QualitySettings::getHighPerformance());
     * //set separate options
     * $reader->getQualitySettings()->setAllowMedianSmoothing(true);
     * $reader->getQualitySettings()->setMedianSmoothingWindowSize(5);
     * foreach($reader->readBarCodes() as $result)
     *   print("BarCode CodeText: ".$result->getCodeText());
     * QualitySettings to configure recognition quality and speed.
     */
    public function setQualitySettings(QualitySettings $value)
    {
        try
        {
            $this->getJavaClass()->setQualitySettings($value->getJavaClass());
            //$this->qualitySettings = new QualitySettings($this->getJavaClass()->getQualitySettings());
        } catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * A flag which force engine to detect codetext encoding for Unicode codesets.
     * This sample shows how to detect text encoding on the fly if DetectEncoding is enabled
     * $image = "image.png";
     * $generator = new BarcodeGenerator(EncodeTypes::QR, "пїЅпїЅпїЅпїЅпїЅ"))
     * $generator->getParameters().getBarcode()->getQR()->setCodeTextEncoding("UTF-8");
     * $generator->save($image, BarCodeImageFormat.getPng());
     *     //detects encoding for Unicode codesets is enabled
     * $reader = new BarCodeReader($image, DecodeType::QR);
     * $reader->setDetectEncoding(true);
     * foreach($reader->readBarCodes() as $result)
     *    print("BarCode CodeText: ".$result->getCodeText());
     *     //detect encoding is disabled
     * $reader = new BarCodeReader($image, DecodeType::QR);
     * $reader->setDetectEncoding(false);
     * foreach($reader->readBarCodes() as $result)
     *    print("BarCode CodeText: ".$result->getCodeText());
     */
    public function getDetectEncoding()
    {
        try
        {
            return java_cast($this->getJavaClass()->getDetectEncoding(), "boolean");
        } catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * A flag which force engine to detect codetext encoding for Unicode codesets.
     * This sample shows how to detect text encoding on the fly if DetectEncoding is enabled
     * $image = "image.png";
     * $generator = new BarcodeGenerator(EncodeTypes::QR, "пїЅпїЅпїЅпїЅпїЅ");
     * $generator->getParameters().getBarcode()->getQR()->setCodeTextEncoding("UTF-8");
     * $generator->save($image, BarCodeImageFormat.getPng());
     * //detects encoding for Unicode codesets is enabled
     * $reader = new BarCodeReader($image, DecodeType::QR);
     * $reader->setDetectEncoding(true);
     * foreach($reader->readBarCodes() as $result)
     *    print("BarCode CodeText: ".$result->getCodeText());
     * //detect encoding is disabled
     * $reader = new BarCodeReader($image, DecodeType::QR);
     * $reader->setDetectEncoding(true);
     * foreach($reader->readBarCodes() as $result)
     *    print("BarCode CodeText: ".$result->getCodeText());
     */
    public function setDetectEncoding($value)
    {
        try
        {
            $this->getJavaClass()->setDetectEncoding($value);
        } catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Sets bitmap image and areas for recognition.
     * Must be called before ReadBarCodes() method.
     * This sample shows how to detect Code39 and Code128 barcodes.
     * $bmp = "test.png";
     * $reader = new BarCodeReader();
     * $reader->setBarCodeReadType(DecodeType::CODE_39_STANDARD, DecodeType::CODE_128);
     * $width, $height;
     * list($width, $height) = getimagesize('path_to_image')
     * $reader->setBarCodeImage($bmp, new Rectangle[] { new Rectangle(0, 0, $width, $height) });
     * foreach($reader->readBarCodes() as $result)
     * {
     *    print("BarCode Type: ".$result->getCodeTypeName());
     *    print("BarCode CodeText: ".$result->getCodeText());
     * }
     * @param value The bitmap image for recognition.
     * @param areas areas list for recognition
     * @throws BarcodeException
     */
    public final function setBarCodeImage($image, ...$areas)
    {
        try
        {
            $image = self::loadImage($image);
            $stringAreas = array();
            $isAllRectanglesNotNull = false;
            if(!is_null($areas) && sizeof($areas) > 0)
            {
                for ($i = 0; $i < sizeof($areas); $i++)
                {
                    if (!is_null($areas[$i]))
                    {
                        $isAllRectanglesNotNull |= true;
                        $stringAreas[$i] = $areas[$i]->toString();
                    }
                }
                if(!$isAllRectanglesNotNull)
                {
                    $stringAreas = null;
                }
            }
            $this->getJavaClass()->setBarCodeImage($image, $stringAreas);
        }
        catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
        }
    }

    /**
     * Sets SingleDecodeType type array for recognition.
     * Must be called before readBarCodes() method.
     * This sample shows how to detect Code39 and Code128 barcodes.
     * $reader = new BarCodeReader();
     * $reader->setBarCodeReadType(DecodeType::CODE_39_STANDARD, DecodeType::CODE_128);
     * $reader->setBarCodeImage("test.png");
     * foreach($reader->readBarCodes() as $result)
     * {
     *     print("BarCode Type: ".$result->getCodeTypeName());
     *     print("BarCode CodeText: ".$result->getCodeText());
     * }
     * @param barcodeTypes The SingleDecodeType type array to read.
     */
    public function setBarCodeReadType(...$types)
    {
        try
        {
            $this->getJavaClass()->setBarcodeReadType($types);
        } catch (Exception $e)
        {
            throw new BarcodeException($e);
        }
    }

    public function getBarCodeDecodeType()
    {
        try
        {
            return java_cast($this->getJavaClass()->getBarCodeDecodeType(), "integer");
        } catch (Exception $ex)
        {
            throw new BarcodeException($ex);
        }
    }

    /**
     * Exports BarCode properties to the xml-file specified
     * @param xmlFile The name for the file
     * @return Whether or not export completed successfully.
     * Returns True in case of success; False Otherwise
     */
    public function exportToXml($xmlFile)
    {
        try
        {
            return $this->getJavaClass()->exportToXml($xmlFile);
        } catch (Exception $ex)
        {
            $barcode_exception = new BarcodeException($ex);
            throw $barcode_exception;
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

    static function construct(...$args):Quadrangle
    {
        $quadrangle = self::EMPTY();
        $quadrangle->setJavaClass($args[0]);
        return $quadrangle;
    }


    /**
     * Initializes a new instance of the Quadrangle structure with the describing points.
     *
     * @param leftTop A Point that represents the left-top corner of the Quadrangle.
     * @param rightTop A Point that represents the right-top corner of the Quadrangle.
     * @param rightBottom A Point that represents the right-bottom corner of the Quadrangle.
     * @param leftBottom A Point that represents the left-bottom corner of the Quadrangle.
     */
    public function __construct(Point $leftTop, Point $rightTop, Point $rightBottom, Point $leftBottom)
    {
        parent::__construct(new java(self::javaClassName,$leftTop->toString(), $rightTop->toString(), $rightBottom->toString(), $leftBottom->toString()));
    }

    protected function init(): void
    {
        $this->leftTop = new Point(java_cast($this->getJavaClass()->getLeftTop()->getX(), "integer"), java_cast($this->getJavaClass()->getLeftTop()->getY(), "integer"));
        $this->rightTop = new Point(java_cast($this->getJavaClass()->getRightTop()->getX(), "integer"), java_cast($this->getJavaClass()->getRightTop()->getY(), "integer"));
        $this->rightBottom = new Point(java_cast($this->getJavaClass()->getRightBottom()->getX(), "integer"), java_cast($this->getJavaClass()->getRightBottom()->getY(), "integer"));
        $this->leftBottom = new Point(java_cast($this->getJavaClass()->getLeftBottom()->getX(), "integer"), java_cast($this->getJavaClass()->getLeftBottom()->getY(), "integer"));
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
        $this->leftTop = $value;
        $this->getJavaClass()->setLeftTop($value);
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
        $this->rightTop = $value;
        $this->getJavaClass()->setRightTop($value);
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
        $this->rightBottom = $value;
        $this->getJavaClass()->setRightBottom($value);
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
        $this->leftBottom = $value;
        $this->getJavaClass()->setLeftBottom($value);
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
     * @param pt The Point to test.
     * @return Returns true if Point is contained within this Quadrangle structure; otherwise, false.
     */
    public function contains(Point $pt): bool
    {
        return java_cast($this->getJavaClass()->contains($pt), "boolean");
    }

    /**
     * Determines if the specified point is contained within this Quadrangle structure.
     *
     * @param x The x point cordinate.
     * @param y The y point cordinate.
     * @return Returns true if point is contained within this Quadrangle structure; otherwise, false.
     */
    public function containsPoint($x, $y): bool
    {
        return java_cast($this->getJavaClass()->contains($x, $y), "boolean");
    }

    /**
     * Determines if the specified Quadrangle is contained or intersect this Quadrangle structure.
     *
     * @param quad The Quadrangle to test.
     * @return Returns true if Quadrangle is contained or intersect this Quadrangle structure; otherwise, false.
     */
    public function containsQuadrangle(Quadrangle $quad): bool
    {
        return java_cast($this->getJavaClass()->contains($quad), "boolean");
    }

    /**
     * Determines if the specified Rectangle is contained or intersect this Quadrangle structure.
     *
     * @param rect The Rectangle to test.
     * @return Returns true if Rectangle is contained or intersect this Quadrangle structure; otherwise, false.
     */
    public function containsRectangle(Rectangle $rect): bool
    {
        return java_cast($this->getJavaClass()->contains($rect), "boolean");
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified Quadrangle value.
     *
     * @param $other An Quadrangle value to compare to this instance.
     * @return true if obj has the same value as this instance; otherwise, false.
     */
    public function equals(Quadrangle $other): bool
    {
        return java_cast($this->getJavaClass()->equals($other), "boolean");
    }

    /**
     * Returns a value indicating whether the first Quadrangle value is equal to the second.
     *
     * @param first A first compared value
     * @param second A second compared value
     * @return true if first has the same value as second; otherwise, false.
     */
    public static function op_Equality(Quadrangle $first, Quadrangle $second): bool
    {
        return java_cast(self::isEqual($first, $second), "boolean");
    }

    /**
     * Returns a value indicating if the first Quadrangle value is different from the second.
     *
     * @param first A first compared value
     * @param second A second compared value
     * @return true if first has the different value from second; otherwise, false.
     */
    public static function op_Inequality(Quadrangle $first, Quadrangle $second): bool
    {
        return !java_cast(self::isEqual($first, $second), "boolean");
    }

    /**
     * Returns the hash code for this instance.
     *
     * @return A 32-bit signed integer hash code.
     */
    public function hashCode(): int
    {
        return java_cast($this->getJavaClass()->hashCode(), "integer");
    }

    /**
     * Returns a human-readable string representation of this Quadrangle.
     *
     * @return A string that represents this Quadrangle.
     */
    public function toString(): string
    {
        return java_cast($this->toString(), "string");
    }

    /**
     * Creates Rectangle bounding this Quadrangle
     *
     * @return returns Rectangle bounding this Quadrangle
     */
    public function getBoundingRectangle(): Rectangle
    {
        return new Rectangle(java_cast($this->getJavaClass()->getBoundingRectangle()->getX(), "integer"),
            java_cast($this->getJavaClass()->getBoundingRectangle()->getY(), "integer"),
            java_cast($this->getJavaClass()->getBoundingRectangle()->getWidth(), "integer"),
            java_cast($this->getJavaClass()->getBoundingRectangle()->getHeight(), "integer"));
    }

    private static function isEqual(Quadrangle $first, Quadrangle $second): bool
    {
        return java_cast($first->equals($second), "boolean");
    }
}

/**
 *
 * Stores a QR Structured Append information of recognized barcode
 * This sample shows how to get QR Structured Append data
 *
 * $reader = new BarCodeReader("test.png", DecodeType::QR);
 * foreach($reader->readBarCodes() as $result)
 * {
 *    print("BarCode Type: ".$result->getCodeTypeName());
 *    print("BarCode CodeText: ".$result->getCodeText());
 *    print("QR Structured Append Quantity: ".$result->getExtended()->getQR()->getQRStructuredAppendModeBarCodesQuantity());
 *    print("QR Structured Append Index: ".$result->getExtended()->getQR()->getQRStructuredAppendModeBarCodeIndex());
 *    print("QR Structured Append ParityData: ".$result->getExtended()->getQR()->getQRStructuredAppendModeParityData());
 * }
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
        return java_cast($this->getJavaClass()->getQRStructuredAppendModeBarCodesQuantity(), "integer");
    }

    /**
     * Gets the index of the QR structured append mode barcode. Index starts from 0. Default value is -1.Value: The quantity of the QR structured append mode barcode.
     */
    public function getQRStructuredAppendModeBarCodeIndex(): int
    {
        return java_cast($this->getJavaClass()->getQRStructuredAppendModeBarCodeIndex(), "integer");
    }

    /**
     * Gets the QR structured append mode parity data. Default value is -1.Value: The index of the QR structured append mode barcode.
     */
    public function getQRStructuredAppendModeParityData(): int
    {
        return java_cast($this->getJavaClass()->getQRStructuredAppendModeParityData(), "integer");
    }

    public function isEmpty(): bool
    {
        return java_cast($this->getJavaClass()->isEmpty(), "boolean");
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified QRExtendedParameters value.
     *
     * @param obj An object value to compare to this instance.
     * @return true if obj has the same value as this instance; otherwise, false.
     */
    public function equals($obj): bool
    {
        return java_cast($this->getJavaClass()->equals($obj), "boolean");
    }

    /**
     * Returns a value indicating whether the first QRExtendedParameters value is equal to the second.
     *
     * @param first A first compared value
     * @param second A second compared value
     * @return true if first has the same value as second; otherwise, false.
     */
    public static function op_Equality(QRExtendedParameters $first, QRExtendedParameters $second): bool
    {
        return java_cast(self::isEqual($first, $second), "boolean");
    }

    /**
     * Returns a value indicating if the first QRExtendedParameters value is different from the second.
     *
     * @param first A first compared value
     * @param second A second compared value
     * @return true if first has the different value from second; otherwise, false.
     */
    public static function op_Inequality(QRExtendedParameters $first, QRExtendedParameters $second): bool
    {
        return !java_cast(self::isEqual($first, $second), "boolean");
    }

    private static function isEqual(QRExtendedParameters $first, QRExtendedParameters $second): bool
    {
        return java_cast($first->equals($second), "boolean");
    }

    /**
     * Returns the hash code for this instance.
     *
     * @return A 32-bit signed integer hash code.
     */
    public function hashCode(): int
    {
        return java_cast($this->getJavaClass()->hashCode(), "integer");
    }

    /**
     * Returns a human-readable string representation of this QRExtendedParameters.
     *
     * @return A string that represents this QRExtendedParameters.
     */
    public function toString(): string
    {
        return java_cast($this->getJavaClass()->toString(), "string");
    }
}

/**
 *
 * Stores a MacroPdf417 metadata information of recognized barcode
 * This sample shows how to get Macro Pdf417 metadata
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
    public function getMacroPdf417FileID(): int
    {
        return java_cast($this->getJavaClass()->getMacroPdf417FileID(), "integer");
    }

    /**
     * Gets the segment ID of the barcode,only available with MacroPdf417.Value: The segment ID of the barcode.
     */
    public function getMacroPdf417SegmentID(): int
    {
        return java_cast($this->getJavaClass()->getMacroPdf417SegmentID(), "integer");
    }

    /**
     * Gets macro pdf417 barcode segments count. Default value is -1.Value: Segments count.
     */
    public function getMacroPdf417SegmentsCount(): int
    {
        return java_cast($this->getJavaClass()->getMacroPdf417SegmentsCount(), "integer");
    }

    /**
     * Tests whether all parameters has only default values
     * Value: Returns {@code <b>true</b>} if all parameters has only default values; otherwise, {@code <b>false</b>}.
     */
    public function isEmpty(): bool
    {
        return java_cast($this->getJavaClass()->isEmpty(), "boolean");
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified Pdf417ExtendedParameters value.
     *
     * @param obj An System.Object value to compare to this instance.
     * @return true if obj has the same value as this instance; otherwise, false.
     */
    public /*override*/ function equals($obj): bool
    {
        return java_cast($this->getJavaClass()->equals($obj), "boolean");
    }

    /**
     * Returns a value indicating whether the first Pdf417ExtendedParameters value is equal to the second.
     *
     * @param first A first compared value
     * @param second A second compared value
     * @return true if first has the same value as second; otherwise, false.
     */
    public static function op_Equality(Pdf417ExtendedParameters $first, Pdf417ExtendedParameters $second): bool
    {
        return java_cast(self::isEqual($first, $second), "boolean");
    }

    /**
     * Returns a value indicating if the first Pdf417ExtendedParameters value is different from the second.
     *
     * @param first A first compared value
     * @param second A second compared value
     * @return true if first has the different value from second; otherwise, false.
     */
    public static function op_Inequality(Pdf417ExtendedParameters $first, Pdf417ExtendedParameters $second): bool
    {
        return !java_cast(self::isEqual($first, $second), "boolean");
    }

    /**
     * Returns the hash code for this instance.
     *
     * @return A 32-bit signed integer hash code.
     */
    public function hashCode(): int
    {
        return java_cast($this->getJavaClass()->hashCode(), "integer");
    }

    /**
     * Returns a human-readable string representation of this Pdf417ExtendedParameters.
     *
     * @return A string that represents this Pdf417ExtendedParameters.
     */
    public function toString(): string
    {
        return java_cast($this->getJavaClass()->toString(), "string");
    }

    /**
     * Returns a value indicating whether the first value is equal to the second
     *
     * @param first A first compared value
     * @param second A second compared value
     * @return true if first has the same value as second; otherwise, false.
     */
    private static function isEqual(Pdf417ExtendedParameters $first, Pdf417ExtendedParameters $second): bool
    {
        return java_cast($first->equals($second), "boolean");
    }
}

/**
 *
 * Stores special data of 1D recognized barcode like separate codetext and checksum
 * This sample shows how to get 1D barcode value and checksum
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
    public function getValue()
    {
        return java_cast($this->getJavaClass()->getValue(), "string");
    }

    /**
     * Gets the checksum for 1D barcodes. Value: The checksum for 1D barcode.
     */
    public function getCheckSum()
    {
        return java_cast($this->getJavaClass()->getCheckSum(), "string");
    }

    /**
     * Tests whether all parameters has only default values
     * Value: Returns {@code <b>true</b>} if all parameters has only default values; otherwise, {@code <b>false</b>}.
     */
    public function isEmpty(): bool
    {
        return java_cast($this->getJavaClass()->isEmpty(), "boolean");
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified OneDExtendedParameters value.
     *
     * @param obj An System.Object value to compare to this instance.
     * @return true if obj has the same value as this instance; otherwise, false.
     */
    public /*override*/ function equals($obj): bool
    {
        return java_cast($this->getJavaClass()->equals($obj), "boolean");
    }

    /**
     * Returns a value indicating whether the first OneDExtendedParameters value is equal to the second.
     *
     * @param first A first compared value
     * @param second A second compared value
     * @return true if first has the same value as second; otherwise, false.
     */
    public static function op_Equality(OneDExtendedParameters $first, OneDExtendedParameters $second): bool
    {
        return java_cast(self::isEqual($first, $second), "boolean");
    }

    /**
     * Returns a value indicating if the first OneDExtendedParameters value is different from the second.
     *
     * @param first A first compared value
     * @param second A second compared value
     * @return true if first has the different value from second; otherwise, false.
     */
    public static function op_Inequality(OneDExtendedParameters $first, OneDExtendedParameters $second): bool
    {
        return !java_cast(self::isEqual($first, $second), "boolean");
    }

    /**
     * Returns the hash code for this instance.
     *
     * @return A 32-bit signed integer hash code.
     */
    public function hashCode(): int
    {
        return java_cast($this->getJavaClass()->hashCode(), "integer");
    }

    /**
     * Returns a human-readable string representation of this OneDExtendedParameters.
     *
     * @return A string that represents this OneDExtendedParameters.
     */
    public function toString(): string
    {
        return java_cast($this->getJavaClass()->toString(), "string");
    }

    /**
     * Returns a value indicating whether the first value is equal to the second
     *
     * @param first A first compared value
     * @param second A second compared value
     * @return true if first has the same value as second; otherwise, false.
     */
    private static function isEqual(OneDExtendedParameters $first, OneDExtendedParameters $second): bool
    {
        return java_cast($first->equals($second), "boolean");
    }
}

/**
 *
 * Stores special data of Code128 recognized barcode
 * Represents the recognized barcode's region and barcode angle
 * This sample shows how to get code128 raw values
 * $generator = new BarcodeGenerator(EncodeTypes::Code128, "12345");
 * $generator->save("test.png");
 * $reader = new BarCodeReader("test.png", DecodeType::CODE_128);
 * foreach($reader->readBarCodes() as $result)
 * {
 *    print("BarCode Type: ".$result->getCodeTypeName());
 *    print("BarCode CodeText: ".$result->getCodeText());
 *    print("Code128 Data Portions: ".$result->getExtended()->getCode128());
 * }
 */
final class Code128ExtendedParameters extends BaseJavaClass
{
    private $code128DataPortions;


    protected function init(): void
    {
        $this->code128DataPortions = self::convertCode128DataPortions($this->getJavaClass()->getCode128DataPortions());
    }

    private static function convertCode128DataPortions($javaCode128DataPortions)
    {
        $code128DataPortionsValues = java_values($javaCode128DataPortions);
        $code128DataPortions = array();
        for ($i = 0; $i < sizeof($code128DataPortionsValues); $i++)
        {
            $code128DataPortions[$i] = Code128DataPortion::construct($code128DataPortionsValues[$i]);
        }
        return $code128DataPortions;
    }

    /**
     *  Gets Code128DataPortion array of recognized Code128 barcode Value: Array of the Code128DataPortion.
     */
    public function getCode128DataPortions()
    {
        return $this->code128DataPortions;
    }

    public function isEmpty(): bool
    {
        return java_cast($this->getJavaClass()->isEmpty(), "boolean");
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified Code128ExtendedParameters value.
     *
     * @param obj An System.Object value to compare to this instance.
     * @return true if obj has the same value as this instance; otherwise, false.
     */
    public function equals($obj): bool
    {
        return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
    }

    /**
     * Returns a value indicating whether the first Code128ExtendedParameters value is equal to the second.
     *
     * @param first A first compared value
     * @param second A second compared value
     * @return true if first has the same value as second; otherwise, false.
     */
    public static function op_Equality(Code128ExtendedParameters $first, Code128ExtendedParameters $second): bool
    {
        return java_cast($first->equals($second), "boolean");
    }

    /**
     * Returns a value indicating if the first Code128ExtendedParameters value is different from the second.
     *
     * @param first A first compared value
     * @param second A second compared value
     * @return true if first has the different value from second; otherwise, false.
     */
    public static function op_Inequality(Code128ExtendedParameters $first, Code128ExtendedParameters $second): bool
    {
        return !java_cast(self::isEqual($first, $second), "boolean");
    }

    /**
     * Returns the hash code for this instance.
     *
     * @return A 32-bit signed integer hash code.
     */
    public function hashCode(): int
    {
        return java_cast($this->getJavaClass()->hashCode(), "integer");
    }

    /**
     * Returns a human-readable string representation of this Code128ExtendedParameters.
     *
     * @return A string that represents this Code128ExtendedParameters.
     */
    public function toString(): string
    {
        return java_cast($this->getJavaClass()->toString(), "string");
    }

    private static function isEqual(OneDExtendedParameters $first, OneDExtendedParameters $second): bool
    {
        return java_cast($first->equals($second), "boolean");
    }
}

/**
 *
 * Barcode detector settings.
 *
 */
final class BarcodeSvmDetectorSettings extends BaseJavaClass
{
    private const javaClassName = "com.aspose.mw.barcode.recognition.MwBarcodeSvmDetectorSettings";
    private const HighPerformance = 0;
    private const NormalQuality = 1;
    private const HighQuality = 2;
    private const MaxQuality = 3;
    private $scanWindowSizes;

    protected function init(): void
    {
        $this->scanWindowSizes = self::convertScanWindowSizes($this->getJavaClass()->getScanWindowSizes());
        // TODO: Implement init() method.
    }

    private static function convertScanWindowSizes($javaScanWindowSizes)
    {
        $scanWindowSizes = array();
        for ($i = 0; $i < java_cast($javaScanWindowSizes->size(), "integer"); $i++)
        {
            $scanWindowSizes[$i] = java_cast($javaScanWindowSizes->get($i), "integer");
        }
        return $scanWindowSizes;
    }

    /**
     * Scan window sizes in pixels.
     *
     * Allowed sizes are 10, 15, 20, 25, 30.
     * Scanning with small window size takes more time and provides more accuracy but may fail in detecting very big barcodes.
     * Combining of several window sizes can improve detection quality.
     */
    public function getScanWindowSizes()
    {
        return $this->getJavaClass()->getScanWindowSizes();
    }
    /**
     * Scan window sizes in pixels.
     *
     * Allowed sizes are 10, 15, 20, 25, 30.
     * Scanning with small window size takes more time and provides more accuracy but may fail in detecting very big barcodes.
     * Combining of several window sizes can improve detection quality.
     */
    //@XmlSerialization (type = XmlSerializationType.Element)
    public function setScanWindowSizes($value)
    {
        $this->scanWindowSizes = $value;
        $this->getJavaClass()->setScanWindowSizes($value);
    }

    /**
     * Similarity coefficient depends on how homogeneous barcodes are.
     *
     * Use high value for for clear barcodes.
     * Use low values to detect barcodes that ara partly damaged or not lighten evenly.
     * Similarity coefficient must be between [0.5, 0.9]
     */
    public function getSimilarityCoef()
    {
        return java_cast($this->getJavaClass()->getSimilarityCoef(), "integer");
    }

    /**
     * Similarity coefficient depends on how homogeneous barcodes are.
     *
     * Use high value for for clear barcodes.
     * Use low values to detect barcodes that ara partly damaged or not lighten evenly.
     * Similarity coefficient must be between [0.5, 0.9]
     */
    public function setSimilarityCoef($value)
    {
        $this->getJavaClass()->setSimilarityCoef($value);
    }

    /**
     * Sets threshold for detected regions that may contain barcodes.
     *
     * Value 0.7 means that bottom 70% of possible regions are filtered out and not processed further.
     * Region likelihood threshold must be between [0.05, 0.9]
     * Use high values for clear images with few barcodes.
     * Use low values for images with many barcodes or for noisy images.
     * Low value may lead to a bigger recognition time.
     */
    public function getRegionLikelihoodThresholdPercent()
    {
        return java_cast($this->getJavaClass()->getRegionLikelihoodThresholdPercent(), "integer");
    }

    /**
     * Sets threshold for detected regions that may contain barcodes.
     *
     * Value 0.7 means that bottom 70% of possible regions are filtered out and not processed further.
     * Region likelihood threshold must be between [0.05, 0.9]
     * Use high values for clear images with few barcodes.
     * Use low values for images with many barcodes or for noisy images.
     * Low value may lead to a bigger recognition time.
     */
    public function setRegionLikelihoodThresholdPercent($value)
    {
        $this->getJavaClass()->setRegionLikelihoodThresholdPercent($value);
    }

    /**
     * Allows detector to skip search for diagonal barcodes.
     *
     * Setting it to false will increase detection time but allow to find diagonal barcodes that can be missed otherwise.
     * Enabling of diagonal search leads to a bigger detection time.
     */
    public function getSkipDiagonalSearch()
    {
        return java_cast($this->getJavaClass()->getSkipDiagonalSearch(), "boolean");
    }

    /**
     *
     * Allows detector to skip search for diagonal barcodes.
     *
     * Setting it to false will increase detection time but allow to find diagonal barcodes that can be missed otherwise.
     * Enabling of diagonal search leads to a bigger detection time.
     */
    public function setSkipDiagonalSearch($value)
    {
        $this->getJavaClass()->setSkipDiagonalSearch($value);
    }

    /**
     * Window size for median smoothing.
     *
     * Typical values are 3 or 4. 0 means no median smoothing.
     * Default value is 0.
     * Median filter window size must be between [0, 10]
     */
    public function getMedianFilterWindowSize()
    {
        return java_cast($this->getJavaClass()->getMedianFilterWindowSize(), "integer");
    }

    /**
     * Window size for median smoothing.
     *
     * Typical values are 3 or 4. 0 means no median smoothing.
     * Default value is 0.
     * Median filter window size must be between [0, 10]
     */
    public function setMedianFilterWindowSize($value)
    {
        $this->getJavaClass()->setMedianFilterWindowSize($value);
    }

    /**
     * High performance detection preset.
     *
     * Default for QualitySettings.PresetType.HighPerformance
     */
    public static function getHighPerformance()
    {
        return new BarcodeSvmDetectorSettings(self::HighPerformance);
    }

    /**
     * Normal quality detection preset.
     *
     * Default for QualitySettings::PresetType::NormalQuality
     */
    public static function getNormalQuality()
    {
        return new BarcodeSvmDetectorSettings(self::NormalQuality);
    }

    /**
     * High quality detection preset.
     *
     * Default for QualitySettings.PresetType.HighQualityDetection and QualitySettings.PresetType.HighQuality
     */
    public static function getHighQuality()
    {
        return new BarcodeSvmDetectorSettings(self::HighQuality);
    }

    /**
     * Max quality detection preset.
     *
     * Default for QualitySettings.PresetType.MaxQualityDetection and QualitySettings.PresetType.MaxBarCodes
     */
    public static function getMaxQuality()
    {
        return new BarcodeSvmDetectorSettings(self::MaxQuality);
    }
}

/**
 * Stores recognized barcode data like SingleDecodeType type, {@code string} codetext,
 * BarCodeRegionParameters region and other parameters
 * This sample shows how to obtain BarCodeResult.
 * $generator = new BarcodeGenerator(EncodeTypes::Code128, "12345");
 * $generator->save("test.png");
 * $reader = new BarCodeReader("test.png", DecodeType::CODE_39_STANDARD, DecodeType::CODE_128);
 * foreach($reader->readBarCodes() as $result)
 * {
 *     print("BarCode Type: ".$result->getCodeTypeName());
 *     print("BarCode CodeText: ".$result->getCodeText());
 *     print("BarCode Confidence: ".$result->getConfidence());
 *     print("BarCode ReadingQuality: ".$result->getReadingQuality());
 *     print("BarCode Angle: ".$result->getRegion()->getAngle());
 * }
 */
final class BarCodeResult extends BaseJavaClass
{
    private $region;
    private $extended;

    protected function init(): void
    {
        $this->region = new BarCodeRegionParameters($this->getJavaClass()->getRegion());
        $this->extended = new BarCodeExtendedParameters($this->getJavaClass()->getExtended());
    }

    /**
     *  Gets the reading quality. Works for 1D and postal barcodes. Value: The reading quality percent
     */
    public function getReadingQuality()
    {
        return java_cast($this->getJavaClass()->getReadingQuality(), "integer");
    }

    /**
     *  Gets recognition confidence level of the recognized barcode Value: BarCodeConfidence.Strong does not have fakes or misrecognitions, BarCodeConfidence.Moderate
     * could sometimes have fakes or incorrect codetext because this confidence level for barcodews with weak cheksum or even without it,
     * BarCodeConfidence.None always has incorrect codetext and could be fake recognitions
     */
    public function getConfidence()
    {
        return java_cast($this->getJavaClass()->getConfidence(), "integer");
    }

    /**
     *  Gets the code text Value: The code text of the barcode
     */
    public function getCodeText()
    {
        return java_cast($this->getJavaClass()->getCodeText(), "string");
    }

    /**
     *  Gets the encoded code bytes Value: The code bytes of the barcode
     */
    public function getCodeBytes()
    {
        return explode(",", $this->getJavaClass()->getCodeBytes());
    }

    /**
     *  Gets the barcode type Value: The type information of the recognized barcode
     */
    public function getCodeType()
    {
        return java_cast($this->getJavaClass()->getCodeType(), "integer");
    }

    /**
     *  Gets the name of the barcode type Value: The type name of the recognized barcode
     */
    public function getCodeTypeName()
    {
        return java_cast($this->getJavaClass()->getCodeTypeName(), "string");
    }

    /**
     *  Gets the barcode region Value: The region of the recognized barcode
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     *  Gets extended parameters of recognized barcode Value: The extended parameters of recognized barcode
     */
    public function getExtended()
    {
        return $this->extended;
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified BarCodeResult value.
     *
     * @param other An BarCodeResult value to compare to this instance.
     * @return true if obj has the same value as this instance; otherwise, false.
     */
    public function equals(BarCodeResult $other): bool
    {
        return java_cast($this->getJavaClass()->equals($other), "boolean");
    }

    /**
     * Returns a value indicating whether the first BarCodeResult value is equal to the second.
     *
     * @param $first A first compared value
     * @param $second A second compared value
     * @return true if first has the same value as second; otherwise, false.
     */
    public static function op_Equality(BarCodeResult $first, BarCodeResult $second): bool
    {
        return java_cast(self::isEqual($first, $second), "boolean");
    }

    /**
     * Returns a value indicating if the first BarCodeResult value is different from the second.
     *
     * @param first A first compared value
     * @param second A second compared value
     * @return true if first has the different value from second; otherwise, false.
     */
    public static function op_Inequality(BarCodeResult $first, BarCodeResult $second): bool
    {
        return !java_cast(self::isEqual($first, $second), "boolean");
    }

    /**
     * Returns the hash code for this instance.
     *
     * @return A 32-bit signed integer hash code.
     */
    public function hashCode()
    {
        return java_cast($this->getJavaClass()->hashCode(), "integer");
    }

    /**
     * Returns a human-readable string representation of this BarCodeResult.
     *
     * @return A string that represents this BarCodeResult.
     */
    public function toString()
    {
        return java_cast($this->getJavaClass()->toString(), "string");
    }

    /**
     * Creates a copy of BarCodeResult class.
     *
     * @return Returns copy of BarCodeResult class.
     */
    public function deepClone()
    {
        return new BarCodeResult($this);
    }

    /**
     * Creates a a copy of the BarCodeResult class.
     *
     * @param result An copy BarCodeResult instance.
     */
    public function __construct($javaClass)
    {
        parent::__construct($javaClass);
    }


}

/**
 * Represents the recognized barcode's region and barcode angle
 * This sample shows how to get barcode Angle and bounding quadrangle values
 * $generator = new BarcodeGenerator(EncodeTypes::Code128, "12345");
 * $generator->save("test.png");
 * $reader = new BarCodeReader("test.png", DecodeType::CODE_39_STANDARD, DecodeType::CODE_128);
 * foreach($reader->readBarCodes() as $result)
 * {
 *    print("BarCode CodeText: ".$result->getCodeText());
 *    print("BarCode Angle: ".$result->getRegion()->getAngle());
 *    print("BarCode Quadrangle: ".$result->getRegion()->getQuadrangle());
 * }
 */
final class BarCodeRegionParameters extends BaseJavaClass
{
    private $quad;
    private $rect;
    private $points;

    protected function init(): void
    {
        $this->quad = Quadrangle::construct($this->getJavaClass()->getQuadrangle());
        $this->rect = new Rectangle(java_cast($this->getJavaClass()->getRectangle()->getX(), "integer"),
            java_cast($this->getJavaClass()->getRectangle()->getY(), "integer"),
            java_cast($this->getJavaClass()->getRectangle()->getWidth(), "integer"),
            java_cast($this->getJavaClass()->getRectangle()->getHeight(), "integer"));
        $this->points = self::convertJavaPoints($this->getJavaClass()->getPoints());
        // TODO: Implement init() method.
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
     *  Gets Quadrangle bounding barcode region Value: Returns Quadrangle bounding barcode region
     */
    public function getQuadrangle()
    {
        return $this->quad;
    }

    /**
     *  Gets the angle of the barcode (0-360). Value: The angle for barcode (0-360).
     */
    public function getAngle()
    {
        return java_cast($this->getJavaClass()->getAngle(), "float");
    }

    /**
     *  Gets Points array bounding barcode region Value: Returns Points array bounding barcode region
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     *  Gets Rectangle bounding barcode region Value: Returns Rectangle bounding barcode region
     */
    public function getRectangle()
    {
        return $this->rect;
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified BarCodeRegionParameters value.
     *
     * @param obj An System.Object value to compare to this instance.
     * @return true if obj has the same value as this instance; otherwise, false.
     */
    public function equals($obj): bool
    {
        return java_cast($this->getJavaClass()->equals($obj), "boolean");
    }

    /**
     * Returns a value indicating whether the first BarCodeRegionParameters value is equal to the second.
     *
     * @param first A first compared value
     * @param second A second compared value
     * @return true if first has the same value as second; otherwise, false.
     */
    public static function op_Equality(BarCodeRegionParameters $first, BarCodeRegionParameters $second): bool
    {
        return java_cast(self::isEqual($first, $second), "boolean");
    }

    /**
     * Returns a value indicating if the first BarCodeRegionParameters value is different from the second.
     *
     * @param first A first compared value
     * @param second A second compared value
     * @return true if first has the different value from second; otherwise, false.
     */
    public static function op_Inequality(BarCodeRegionParameters $first, BarCodeRegionParameters $second): bool
    {
        return !java_cast(self::isEqual($first, $second), "boolean");
    }

    /**
     * Returns the hash code for this instance.
     *
     * @return A 32-bit signed integer hash code.
     */
    public function hashCode()
    {
        return java_cast($this->getJavaClass()->hashCode(), "integer");
    }

    /**
     * Returns a human-readable string representation of this BarCodeRegionParameters.
     *
     * @return A string that represents this BarCodeRegionParameters.
     */
    public function toString()
    {
        return java_cast($this->getJavaClass()->toString(), "string");
    }
}

class BarCodeExtendedParameters extends BaseJavaClass
{
    private $_oneDParameters;
    private $_code128Parameters;
    private $_qrParameters;
    private $_pdf417Parameters;

    protected function init(): void
    {
        $this->_oneDParameters = new OneDExtendedParameters($this->getJavaClass()->getOneD());
        $this->_code128Parameters = new Code128ExtendedParameters($this->getJavaClass()->getCode128());
        $this->_qrParameters = new QRExtendedParameters($this->getJavaClass()->getQR());
        $this->_pdf417Parameters = new Pdf417ExtendedParameters($this->getJavaClass()->getPdf417());
    }

    public function __construct($javaClass)
    {
        parent::__construct($javaClass);
    }

    /**
     *  Gets a special data OneDExtendedParameters of 1D recognized barcode Value: A special data OneDExtendedParameters of 1D recognized barcode
     */
    public function getOneD(): OneDExtendedParameters
    {
        return $this->_oneDParameters;
    }

    /**
     *  Gets a special data Code128ExtendedParameters of Code128 recognized barcode Value: A special data Code128ExtendedParameters of Code128 recognized barcode
     */
    public function getCode128(): Code128ExtendedParameters
    {
        return $this->_code128Parameters;
    }

    /**
     *  Gets a QR Structured Append information QRExtendedParameters of recognized barcode Value: A QR Structured Append information QRExtendedParameters of recognized barcode
     */
    public function getQR(): QRExtendedParameters
    {
        return $this->_qrParameters;
    }

    /**
     *  Gets a MacroPdf417 metadata information Pdf417ExtendedParameters of recognized barcode Value: A MacroPdf417 metadata information Pdf417ExtendedParameters of recognized barcode
     */
    public function getPdf417(): Pdf417ExtendedParameters
    {
        return $this->_pdf417Parameters;
    }

    /**
     * Returns a value indicating whether this instance is equal to a specified BarCodeExtendedParameters value.
     *
     * @param obj An System.Object value to compare to this instance.
     * @return true if obj has the same value as this instance; otherwise, false.
     */
    public function equals(BarCodeExtendedParameters $obj): bool
    {
        return java_cast($this->getJavaClass()->equals($obj->getJavaClass()), "boolean");
    }

    /**
     * Returns a value indicating whether the first BarCodeExtendedParameters value is equal to the second.
     *
     * @param first A first compared value
     * @param second A second compared value
     * @return true if first has the same value as second; otherwise, false.
     */
    public static function op_Equality(BarCodeExtendedParameters $first, BarCodeExtendedParameters $second): bool
    {
        return java_cast($first->getJavaClass()->equals($second->getJavaClass()), "boolean");
    }

    /**
     * Returns a value indicating if the first BarCodeExtendedParameters value is different from the second.
     *
     * @param first A first compared value
     * @param second A second compared value
     * @return true if first has the different value from second; otherwise, false.
     */
    public static function op_Inequality(BarCodeExtendedParameters $first, BarCodeExtendedParameters $second): bool
    {
        return !java_cast($first->getJavaClass()->equals($second->getJavaClass()), "boolean");
    }

    /**
     * Returns the hash code for this instance.
     *
     * @return A 32-bit signed integer hash code.
     */
    public function hashCode(): bool
    {
        return java_cast($this->getJavaClass()->hashCode(), "boolean");
    }

    /**
     * Returns a human-readable string representation of this BarCodeExtendedParameters.
     *
     * @return A string that represents this BarCodeExtendedParameters.
     */
    public function toString(): string
    {
        return java_cast($this->getJavaClass()->toString(), "string");
    }
}

/**
 * QualitySettings allows to configure recognition quality and speed manually.
 * You can quickly set up QualitySettings by embedded presets: HighPerformance, NormalQuality,
 * HighQuality, MaxBarCodes or you can manually configure separate options.
 * Default value of QualitySettings is NormalQuality.
 * This sample shows how to use QualitySettings with BarCodeReader
 * $reader = new BarCodeReader("test.png", DecodeType::CODE_39_STANDARD, DecodeType::CODE_128);
 * //set high performance mode
 * $reader->setQualitySettings(QualitySettings::getHighPerformance());
 * foreach($reader->readBarCodes() as $result)
 *    print("BarCode CodeText: ".$result->getCodeText());
 * $reader = new BarCodeReader("test.png", DecodeType::CODE_39_STANDARD, DecodeType::CODE_128);
 * //normal quality mode is set by default
 * foreach($reader->readBarCodes() as $result)
 *   print("BarCode CodeText: ".$result->getCodeText());
 * $reader = new BarCodeReader("test.png", DecodeType::CODE_39_STANDARD, DecodeType::CODE_128);
 * //set high quality mode with low speed recognition
 * $reader->setQualitySettings(QualitySettings::getHighQuality());
 * foreach($reader->readBarCodes() as $result)
 *   print("BarCode CodeText: ".$result->getCodeText());
 * $reader = new BarCodeReader("test.png", DecodeType::CODE_39_STANDARD, DecodeType::CODE_128);
 * //set max barcodes mode, which tries to find all possible barcodes, even incorrect. The slowest recognition mode
 * $reader->setQualitySettings(QualitySettings::getMaxBarCodes());
 * foreach($reader->readBarCodes() as $result)
 *   print("BarCode CodeText: ".$result->getCodeText());
 * $reader = new BarCodeReader("test.png", DecodeType::CODE_39_STANDARD, DecodeType::CODE_128);
 * //set high performance mode
 * $reader->setQualitySettings(QualitySettings::getHighPerformance());
 * //set separate options
 * $reader->getQualitySettings()->setAllowMedianSmoothing(true);
 * $reader->getQualitySettings()->setMedianSmoothingWindowSize(5);
 * foreach($reader->readBarCodes() as $result)
 *       print("BarCode CodeText: ".$result->getCodeText());
 * $reader = new BarCodeReader("test.png", DecodeType::CODE_39_STANDARD, DecodeType::CODE_128);
 * //default mode is NormalQuality
 * //set separate options
 * $reader->getQualitySettings()->setAllowMedianSmoothing(true);
 * $reader->getQualitySettings()->setMedianSmoothingWindowSize(5);
 * foreach($reader->readBarCodes() as $result)
 *   print("BarCode CodeText: ".$result->getCodeText());
 */
final class QualitySettings extends BaseJavaClass
{
    private $detectorSettings;

    function __construct($qualitySettings)
    {
        parent::__construct(self::initQualitySettings($qualitySettings));
        if ($qualitySettings instanceof QualitySettings)
        {
            $this->applyAll($qualitySettings);
        }
    }

    private static function initQualitySettings($qualitySettings)
    {
        $javaClassName = "com.aspose.mw.barcode.recognition.MwQualitySettings";
        if ($qualitySettings instanceof QualitySettings || is_null($qualitySettings))
        {
            return new java($javaClassName);
        } else
        {
            return $qualitySettings;
        }
    }

    protected function init(): void
    {
        $this->detectorSettings = new BarcodeSvmDetectorSettings($this->getJavaClass()->getDetectorSettings());
    }

    /**
     * HighPerformance recognition quality preset. High quality barcodes are recognized well in this mode.
     *
     * $reader = new BarCodeReader("test.png");
     * $reader->setQualitySettings(QualitySettings::getHighPerformance());
     *
     *  Value:
     * HighPerformance recognition quality preset.
     */
    public static function getHighPerformance(): QualitySettings
    {
        $qualitySettings = new QualitySettings(null);
        return new QualitySettings($qualitySettings->getJavaClass()->getHighPerformance());
    }

    /**
     * NormalQuality recognition quality preset. Suitable for the most of barcodes
     *
     * $reader = new BarCodeReader("test.png");
     * $reader->setQualitySettings(QualitySettings::getNormalQuality());
     *
     *  Value:
     * NormalQuality recognition quality preset.
     */
    public static function getNormalQuality(): QualitySettings
    {
        $qualitySettings = new QualitySettings(null);
        return new QualitySettings($qualitySettings->getJavaClass()->getNormalQuality());
    }

    /**
     * HighQualityDetection recognition quality preset. Same as NormalQuality but with high quality DetectorSettings
     *
     * $reader = new BarCodeReader("test.png");
     * $reader->setQualitySettings(QualitySettings::getHighQualityDetection());     *
     *
     *  Value:
     * HighQualityDetection recognition quality preset.
     */
    public static function getHighQualityDetection()
    {
        $qualitySettings = new QualitySettings(null);
        return new QualitySettings($qualitySettings->getJavaClass()->getHighQualityDetection());
    }

    /**
     * MaxQualityDetection recognition quality preset. Same as NormalQuality but with highest quality DetectorSettings.
     * Allows to detect diagonal and damaged barcodes.
     *
     * $reader = new BarCodeReader("test.png");
     * $reader->setQualitySettings(QualitySettings::getMaxQualityDetection());
     *
     *  Value:
     * MaxQualityDetection recognition quality preset.
     */
    public static function getMaxQualityDetection()
    {
        $qualitySettings = new QualitySettings(null);
        return new QualitySettings($qualitySettings->getJavaClass()->getMaxQualityDetection());
    }

    /**
     * HighQuality recognition quality preset. This preset is developed for low quality barcodes.
     *
     * $reader = new BarCodeReader("test.png");
     * $reader->setQualitySettings(QualitySettings::getHighQuality());
     *
     *  Value:
     * HighQuality recognition quality preset.
     */
    public static function getHighQuality(): QualitySettings
    {
        $qualitySettings = new QualitySettings(null);
        return new QualitySettings($qualitySettings->getJavaClass()->getHighQuality());
    }

    /**
     * MaxBarCodes recognition quality preset. This preset is developed to recognize all possible barcodes, even incorrect barcodes.
     *
     * $reader = new BarCodeReader("test.png");
     * $reader->setQualitySettings(QualitySettings::getMaxBarCodes());
     *
     *  Value:
     * MaxBarCodes recognition quality preset.
     */
    public static function getMaxBarCodes(): QualitySettings
    {
        $qualitySettings = new QualitySettings(null);
        return new QualitySettings($qualitySettings->getJavaClass()->getMaxBarCodes());
    }


    /**
     * Allows engine to recognize inverse color image as additional scan. Mode can be used when barcode is white on black background.
     *  Value:
     * Allows engine to recognize inverse color image.
     */
    public final function getAllowInvertImage()
    {
        return java_cast($this->getJavaClass()->getAllowInvertImage(), "boolean");
    }

    /**
     * Allows engine to recognize inverse color image as additional scan. Mode can be used when barcode is white on black background.
     *  Value:
     * Allows engine to recognize inverse color image.
     */
    public final function setAllowInvertImage($value)
    {
        $this->getJavaClass()->setAllowInvertImage($value);
    }

    /**
     * Allows engine to recognize barcodes which has incorrect checksumm or incorrect values.
     * Mode can be used to recognize damaged barcodes with incorrect text.
     *  Value:
     * Allows engine to recognize incorrect barcodes.
     */
    public final function getAllowIncorrectBarcodes()
    {
        return java_cast($this->getJavaClass()->getAllowIncorrectBarcodes(), "boolean");
    }

    /**
     * Allows engine to recognize barcodes which has incorrect checksumm or incorrect values.
     * Mode can be used to recognize damaged barcodes with incorrect text.
     *  Value:
     * Allows engine to recognize incorrect barcodes.
     */
    public final function setAllowIncorrectBarcodes($value)
    {
        $this->getJavaClass()->setAllowIncorrectBarcodes($value);
    }

    /**
     *  Allows engine to recognize tiny barcodes on large images. Ignored if <see cref="AllowIncorrectBarcodes"/> is set to True. Default value: False.
     * @return If True, allows engine to recognize tiny barcodes on large images.
     */
    public function getReadTinyBarcodes()
    {
        return java_cast($this->getJavaClass()->getReadTinyBarcodes(), "boolean");
    }

    /**
     * Allows engine to recognize tiny barcodes on large images. Ignored if <see cref="AllowIncorrectBarcodes"/> is set to True. Default value: False.
     * @param value If True, allows engine to recognize tiny barcodes on large images.
     */
    public function setReadTinyBarcodes($value)
    {
        getNativeObject()->setReadTinyBarcodes($value);
    }

    /**
     * Allows engine to recognize color barcodes on color background as additional scan. Extremely slow mode.
     *  Value:
     * Allows engine to recognize color barcodes on color background.
     */
    public final function getAllowComplexBackground()
    {
        return java_cast($this->getJavaClass()->getAllowComplexBackground(), "boolean");
    }

    /**
     * Allows engine to recognize color barcodes on color background as additional scan. Extremely slow mode.
     *  Value:v
     * Allows engine to recognize color barcodes on color background.
     */
    public final function setAllowComplexBackground($value)
    {
        $this->getJavaClass()->setAllowComplexBackground($value);
    }

    /**
     * Allows engine to enable median smoothing as additional scan. Mode helps to recognize noised barcodes.
     *  Value:
     * Allows engine to enable median smoothing.
     */
    public final function getAllowMedianSmoothing()
    {
        return java_cast($this->getJavaClass()->getAllowMedianSmoothing(), "boolean");
    }

    /**
     * Allows engine to enable median smoothing as additional scan. Mode helps to recognize noised barcodes.
     *  Value:
     * Allows engine to enable median smoothing.
     */
    public final function setAllowMedianSmoothing($value)
    {
        $this->getJavaClass()->setAllowMedianSmoothing($value);
    }

    /**
     * Window size for median smoothing. Typical values are 3 or 4. Default value is 3. AllowMedianSmoothing must be set.
     *  Value:
     * Window size for median smoothing.
     */
    public final function getMedianSmoothingWindowSize()
    {
        return java_cast($this->getJavaClass()->getMedianSmoothingWindowSize(), "integer");
    }

    /**
     * Window size for median smoothing. Typical values are 3 or 4. Default value is 3. AllowMedianSmoothing must be set.
     *  Value:
     * Window size for median smoothing.
     */
    public final function setMedianSmoothingWindowSize($value)
    {
        $this->getJavaClass()->setMedianSmoothingWindowSize($value);
    }

    /**
     * Allows engine to recognize regular image without any restorations as main scan. Mode to recognize image as is.
     *  Value:
     * Allows to recognize regular image without any restorations.
     */

    public final function getAllowRegularImage()
    {
        return java_cast($this->getJavaClass()->getAllowRegularImage(), "boolean");
    }

    /**
     * Allows engine to recognize regular image without any restorations as main scan. Mode to recognize image as is.
     *  Value:
     * Allows to recognize regular image without any restorations.
     */

    public final function setAllowRegularImage($value)
    {
        $this->getJavaClass()->setAllowRegularImage($value);
    }

    /**
     * Allows engine to recognize decreased image as additional scan. Size for decreasing is selected by internal engine algorithms.
     * Mode helps to recognize barcodes which are noised and blurred but captured with high resolution.
     *  Value:
     * Allows engine to recognize decreased image
     */
    public final function getAllowDecreasedImage()
    {
        return java_cast($this->getJavaClass()->getAllowDecreasedImage(), "boolean");
    }

    /**
     * Allows engine to recognize decreased image as additional scan. Size for decreasing is selected by internal engine algorithms.
     * Mode helps to recognize barcodes which are noised and blurred but captured with high resolution.
     *  Value:
     * Allows engine to recognize decreased image
     */
    public final function setAllowDecreasedImage($value)
    {
        $this->getJavaClass()->setAllowDecreasedImage($value);
    }

    /**
     * Allows engine to recognize image without small white spots as additional scan. Mode helps to recognize noised image as well as median smoothing filtering.
     *  Value:
     * Allows engine to recognize image without small white spots.
     */

    public final function getAllowWhiteSpotsRemoving()
    {
        return java_cast($this->getJavaClass()->getAllowWhiteSpotsRemoving(), "boolean");
    }

    /**
     * Allows engine to recognize image without small white spots as additional scan. Mode helps to recognize noised image as well as median smoothing filtering.
     *  Value:
     * Allows engine to recognize image without small white spots.
     */
    public function setAllowWhiteSpotsRemoving($value)
    {
        $this->getJavaClass()->setAllowWhiteSpotsRemoving($value);
    }

    /**
     * Allows engine for 1D barcodes to recognize regular image with different params as additional scan. Mode helps to recongize low height 1D barcodes.
     *  Value:
     * Allows engine for 1D barcodes to run additional scan.
     */
    public final function getAllowOneDAdditionalScan()
    {
        return java_cast($this->getJavaClass()->getAllowOneDAdditionalScan(), "boolean");
    }

    /**
     * Allows engine for 1D barcodes to recognize regular image with different params as additional scan. Mode helps to recongize low height 1D barcodes.
     *  Value:
     * Allows engine for 1D barcodes to run additional scan.
     */
    public final function setAllowOneDAdditionalScan($value)
    {
        $this->getJavaClass()->setAllowOneDAdditionalScan($value);
    }

    /**
     * Allows engine for 1D barcodes to quickly recognize high quality barcodes which fill almost whole image.
     * Mode helps to quickly recognize generated barcodes from Internet.
     *  Value:
     * Allows engine for 1D barcodes to quickly recognize high quality barcodes.
     */
    public final function getAllowOneDFastBarcodesDetector()
    {
        return java_cast($this->getJavaClass()->getAllowOneDFastBarcodesDetector(), "boolean");
    }

    /**
     * Allows engine for 1D barcodes to quickly recognize high quality barcodes which fill almost whole image.
     * Mode helps to quickly recognize generated barcodes from Internet.
     *  Value:
     * Allows engine for 1D barcodes to quickly recognize high quality barcodes.
     */
    public final function setAllowOneDFastBarcodesDetector($value)
    {
        $this->getJavaClass()->setAllowOneDFastBarcodesDetector($value);
    }

    /**
     * Allows engine for Postal barcodes to recognize slightly noised images. Mode helps to recognize sligtly damaged Postal barcodes.
     *  Value:
     * Allows engine for Postal barcodes to recognize slightly noised images.
     */
    public final function getAllowMicroWhiteSpotsRemoving()
    {
        return java_cast($this->getJavaClass()->getAllowMicroWhiteSpotsRemoving(), "boolean");
    }

    /**
     * Allows engine for Postal barcodes to recognize slightly noised images. Mode helps to recognize sligtly damaged Postal barcodes.
     *  Value:
     * Allows engine for Postal barcodes to recognize slightly noised images.
     */
    public final function setAllowMicroWhiteSpotsRemoving($value)
    {
        $this->getJavaClass()->setAllowMicroWhiteSpotsRemoving($value);
    }

    //OneD uses, PDF417 and QR can use

    /**
     * Allows engine to recognize barcodes with salt and paper noise type. Mode can remove small noise with white and black dots.
     *  Value:
     * Allows engine to recognize barcodes with salt and paper noise type.
     */
    public final function getAllowSaltAndPaperFiltering()
    {
        return java_cast($this->getJavaClass()->getAllowSaltAndPaperFiltering(), "boolean");
    }
    //OneD uses, PDF417 and QR can use

    /**
     * Allows engine to recognize barcodes with salt and paper noise type. Mode can remove small noise with white and black dots.
     *  Value:
     * Allows engine to recognize barcodes with salt and paper noise type.
     */
    public final function setAllowSaltAndPaperFiltering($value)
    {
        $this->getJavaClass()->setAllowSaltAndPaperFiltering($value);
    }

    //OneD curently uses

    /**
     * Allows engine to use gap between scans to increase recognition speed. Mode can make recognition problems with low height barcodes.
     *  Value:
     * Allows engine to use gap between scans to increase recognition speed.
     */
    public final function getAllowDetectScanGap()
    {
        return java_cast($this->getJavaClass()->getAllowDetectScanGap(), "boolean");
    }
    //OneD curently uses

    /**
     * Allows engine to use gap between scans to increase recognition speed. Mode can make recognition problems with low height barcodes.
     *  Value:
     * Allows engine to use gap between scans to increase recognition speed.
     */
    public final function setAllowDetectScanGap($value)
    {
        $this->getJavaClass()->setAllowDetectScanGap($value);
    }

    /**
     * Allows engine for Datamatrix to recognize dashed industrial Datamatrix barcodes.
     * Slow mode which helps only for dashed barcodes which consist from spots.
     *  Value:
     * Allows engine for Datamatrix to recognize dashed industrial barcodes.
     */
    public final function getAllowDatamatrixIndustrialBarcodes()
    {
        return java_cast($this->getJavaClass()->getAllowDatamatrixIndustrialBarcodes(), "boolean");
    }

    /**
     * Allows engine for Datamatrix to recognize dashed industrial Datamatrix barcodes.
     * Slow mode which helps only for dashed barcodes which consist from spots.
     *  Value:
     * Allows engine for Datamatrix to recognize dashed industrial barcodes.
     */
    public final function setAllowDatamatrixIndustrialBarcodes($value)
    {
        $this->getJavaClass()->setAllowDatamatrixIndustrialBarcodes($value);
    }

    /**
     * Allows engine for QR/MicroQR to recognize damaged MicroQR barcodes.
     *  Value:
     * Allows engine for QR/MicroQR to recognize damaged MicroQR barcodes.
     */
    public final function getAllowQRMicroQrRestoration()
    {
        return java_cast($this->getJavaClass()->getAllowQRMicroQrRestoration(), "boolean");
    }

    /**
     * Allows engine for QR/MicroQR to recognize damaged MicroQR barcodes.
     *  Value:
     * Allows engine for QR/MicroQR to recognize damaged MicroQR barcodes.
     */
    public final function setAllowQRMicroQrRestoration($value)
    {
        $this->getJavaClass()->setAllowQRMicroQrRestoration($value);
    }

    /**
     * Allows engine for 1D barcodes to recognize barcodes with single wiped/glued bars in pattern.
     *  Value:
     * Allows engine for 1D barcodes to recognize barcodes with single wiped/glued bars in pattern.
     */
    public function getAllowOneDWipedBarsRestoration()
    {
        return java_cast($this->getJavaClass()->getAllowOneDWipedBarsRestoration(), "boolean");
    }

    /**
     * Allows engine for 1D barcodes to recognize barcodes with single wiped/glued bars in pattern.
     *  Value:
     * Allows engine for 1D barcodes to recognize barcodes with single wiped/glued bars in pattern.
     */
    public function setAllowOneDWipedBarsRestoration($value)
    {
        $this->getJavaClass()->setAllowOneDWipedBarsRestoration($value);
    }

    /**
     * Barcode detector settings.
     */
    public function getDetectorSettings()
    {
        return $this->detectorSettings;
    }

    /**
     * Barcode detector settings.
     *
     */
    public function setDetectorSettings(BarcodeSvmDetectorSettings $value)
    {
        $this->getJavaClass()->setDetectorSettings($value);
        $this->detectorSettings = $value;
    }

    /**
     * Function apply all values from Src setting to this
     * @param Src source settings
     */
    public function applyAll(QualitySettings $Src)
    {
        $this->setAllowInvertImage($Src->getAllowInvertImage());
        $this->setAllowIncorrectBarcodes($Src->getAllowIncorrectBarcodes());
        $this->setAllowComplexBackground($Src->getAllowComplexBackground());
        $this->setAllowMedianSmoothing($Src->getAllowMedianSmoothing());
        $this->setMedianSmoothingWindowSize($Src->getMedianSmoothingWindowSize());
        $this->setAllowRegularImage($Src->getAllowRegularImage());
        $this->setAllowDecreasedImage($Src->getAllowDecreasedImage());
        $this->setAllowWhiteSpotsRemoving($Src->getAllowWhiteSpotsRemoving());
        $this->setAllowOneDAdditionalScan($Src->getAllowOneDAdditionalScan());
        $this->setAllowOneDFastBarcodesDetector($Src->getAllowOneDFastBarcodesDetector());
        $this->setAllowMicroWhiteSpotsRemoving($Src->getAllowMicroWhiteSpotsRemoving());
        $this->setAllowSaltAndPaperFiltering($Src->getAllowSaltAndPaperFiltering());
        $this->setAllowDetectScanGap($Src->getAllowDetectScanGap());
    }
}

/**
 * Contains the data of subtype for Code128 type barcode
 */
class Code128DataPortion extends BaseJavaClass
{
    private const javaClassName = "com.aspose.mw.barcode.recognition.MwCode128DataPortion";

    /**
     * <p>
     * Creates a new instance of the {@code Code128DataPortion} class with start code symbol and decoded codetext.
     * </p>
     * @param code128SubType A start encoding symbol
     * @param data A partial codetext
     */
    public function __construct($code128SubType, $data)
    {
        parent::__construct(new java(self::javaClassName,$code128SubType, $data));
    }

    static function construct($javaClass):Code128DataPortion
    {
        $code128DataPortion = new Code128DataPortion(0, "");
        $code128DataPortion->setJavaClass($javaClass);
        return $code128DataPortion;
    }

    /**
     * Gets the part of code text related to subtype.
     *
     * @return The part of code text related to subtype
     */
    public final function getData()
    {
        return java_cast($this->getJavaClass()->getData(), "string");
    }

    /**
     * Gets the part of code text related to subtype.
     *
     * @return The part of code text related to subtype
     */
    public final function setData($value)
    {
        $this->getJavaClass()->setData($value);
    }

    /**
     * Gets the type of Code128 subset
     *
     * @return The type of Code128 subset
     */
    public final function getCode128SubType()
    {
        return java_cast($this->getJavaClass()->getCode128SubType(), "integer");
    }

    /**
     * Gets the type of Code128 subset
     *
     * @return The type of Code128 subset
     */
    public final function setCode128SubType($value)
    {
        $this->getJavaClass()->setCode128SubType($value);
    }

    protected function init(): void
    {
    }

    /**
     * Returns a human-readable string representation of this {@code Code128DataPortion}.
     * @return A string that represents this {@code Code128DataPortion}.
     */
    public function toString()
    {
        return java_cast($this->getJavaClass()->toString(), "string");
    }
}

/**
 * Specify the type of barcode to read.
 * This sample shows how to detect Code39 and Code128 barcodes.
 * $reader = new BarCodeReader("test.png", DecodeType::CODE_39_STANDARD, DecodeType::CODE_128);
 * foreach($reader->readBarCodes() as $result)
 * {
 *    print("BarCode Type: ".$result->getCodeTypeName());
 *    print("BarCode CodeText: ".$result->getCodeText());
 * }
 */
class DecodeType
{
    /**
     * Unspecified decode type.
     */
    const NONE = -1;

    /**
     * Specifies that the data should be decoded with {@code <b>CODABAR</b>} barcode specification
     */
    const CODABAR = 0;

    /**
     * Specifies that the data should be decoded with {@code <b>CODE 11</b>} barcode specification
     */
    const CODE_11 = 1;

    /**
     * Specifies that the data should be decoded with {@code <b>Standard CODE 39</b>} barcode specification
     */
    const CODE_39_STANDARD = 2;

    /**
     * Specifies that the data should be decoded with {@code <b>Extended CODE 39</b>} barcode specification
     */
    const CODE_39_EXTENDED = 3;

    /**
     * Specifies that the data should be decoded with {@code <b>Standard CODE 93</b>} barcode specification
     */
    const CODE_93_STANDARD = 4;

    /**
     * Specifies that the data should be decoded with {@code <b>Extended CODE 93</b>} barcode specification
     */
    const CODE_93_EXTENDED = 5;

    /**
     * Specifies that the data should be decoded with {@code <b>CODE 128</b>} barcode specification
     */
    const CODE_128 = 6;

    /**
     * Specifies that the data should be decoded with {@code <b>GS1 CODE 128</b>} barcode specification
     */
    const GS_1_CODE_128 = 7;

    /**
     * Specifies that the data should be decoded with {@code <b>EAN-8</b>} barcode specification
     */
    const EAN_8 = 8;

    /**
     * Specifies that the data should be decoded with {@code <b>EAN-13</b>} barcode specification
     */
    const EAN_13 = 9;

    /**
     * Specifies that the data should be decoded with {@code <b>EAN14</b>} barcode specification
     */
    const EAN_14 = 10;

    /**
     * Specifies that the data should be decoded with {@code <b>SCC14</b>} barcode specification
     */
    const SCC_14 = 11;

    /**
     * Specifies that the data should be decoded with {@code <b>SSCC18</b>} barcode specification
     */
    const SSCC_18 = 12;

    /**
     * Specifies that the data should be decoded with {@code <b>UPC-A</b>} barcode specification
     */
    const UPCA = 13;

    /**
     * Specifies that the data should be decoded with {@code <b>UPC-E</b>} barcode specification
     */
    const UPCE = 14;

    /**
     * Specifies that the data should be decoded with {@code <b>ISBN</b>} barcode specification
     */
    const ISBN = 15;

    /**
     * Specifies that the data should be decoded with {@code <b>Standard 2 of 5</b>} barcode specification
     */
    const STANDARD_2_OF_5 = 16;

    /**
     * Specifies that the data should be decoded with {@code <b>INTERLEAVED 2 of 5</b>} barcode specification
     */
    const INTERLEAVED_2_OF_5 = 17;

    /**
     * Specifies that the data should be decoded with {@code <b>Matrix 2 of 5</b>} barcode specification
     */
    const MATRIX_2_OF_5 = 18;

    /**
     * Specifies that the data should be decoded with {@code <b>Italian Post 25</b>} barcode specification
     */
    const ITALIAN_POST_25 = 19;

    /**
     * Specifies that the data should be decoded with {@code <b>IATA 2 of 5</b>} barcode specification. IATA (International Air Transport Association) uses this barcode for the management of air cargo.
     */
    const IATA_2_OF_5 = 20;

    /**
     * Specifies that the data should be decoded with {@code <b>ITF14</b>} barcode specification
     */
    const ITF_14 = 21;

    /**
     * Specifies that the data should be decoded with {@code <b>ITF6</b>} barcode specification
     */
    const ITF_6 = 22;

    /**
     * Specifies that the data should be decoded with {@code <b>MSI Plessey</b>} barcode specification
     */
    const MSI = 23;

    /**
     * Specifies that the data should be decoded with {@code <b>VIN</b>} (Vehicle Identification Number) barcode specification
     */
    const VIN = 24;

    /**
     * Specifies that the data should be decoded with {@code <b>DeutschePost Ident code</b>} barcode specification
     */
    const DEUTSCHE_POST_IDENTCODE = 25;

    /**
     * Specifies that the data should be decoded with {@code <b>DeutschePost Leit code</b>} barcode specification
     */
    const DEUTSCHE_POST_LEITCODE = 26;

    /**
     * Specifies that the data should be decoded with {@code <b>OPC</b>} barcode specification
     */
    const OPC = 27;

    /**
     *  Specifies that the data should be decoded with {@code <b>PZN</b>} barcode specification. This symbology is also known as Pharma Zentral Nummer
     */
    const PZN = 28;

    /**
     * Specifies that the data should be decoded with {@code <b>Pharmacode</b>} barcode. This symbology is also known as Pharmaceutical BINARY Code
     */
    const PHARMACODE = 29;

    /**
     * Specifies that the data should be decoded with {@code <b>DataMatrix</b>} barcode symbology
     */
    const DATA_MATRIX = 30;

    /**
     * Specifies that the data should be decoded with {@code <b>GS1DataMatrix</b>} barcode symbology
     */
    const GS_1_DATA_MATRIX = 31;

    /**
     * Specifies that the data should be decoded with {@code <b>QR Code</b>} barcode specification
     */
    const QR = 32;

    /**
     * Specifies that the data should be decoded with {@code <b>Aztec</b>} barcode specification
     */
    const AZTEC = 33;

    /**
     * Specifies that the data should be decoded with {@code <b>Pdf417</b>} barcode symbology
     */
    const PDF_417 = 34;

    /**
     * Specifies that the data should be decoded with {@code <b>MacroPdf417</b>} barcode specification
     */
    const MACRO_PDF_417 = 35;

    /**
     * Specifies that the data should be decoded with {@code <b>MicroPdf417</b>} barcode specification
     */
    const MICRO_PDF_417 = 36;

    /**
     * Specifies that the data should be decoded with {@code <b>CodablockF</b>} barcode specification
     */
    const CODABLOCK_F = 65;

    /**
     * Specifies that the data should be decoded with {@code <b>Australia Post</b>} barcode specification
     */
    const AUSTRALIA_POST = 37;

    /**
     * Specifies that the data should be decoded with {@code <b>Postnet</b>} barcode specification
     */
    const POSTNET = 38;

    /**
     * Specifies that the data should be decoded with {@code <b>Planet</b>} barcode specification
     */
    const PLANET = 39;

    /**
     * Specifies that the data should be decoded with USPS {@code <b>OneCode</b>} barcode specification
     */
    const ONE_CODE = 40;

    /**
     * Specifies that the data should be decoded with {@code <b>RM4SCC</b>} barcode specification. RM4SCC (Royal Mail 4-state Customer Code) is used for automated mail sort process in UK.
     */
    const RM_4_SCC = 41;

    /**
     * Specifies that the data should be decoded with {@code <b>GS1 DATABAR omni-directional</b>} barcode specification
     */
    const DATABAR_OMNI_DIRECTIONAL = 42;

    /**
     * Specifies that the data should be decoded with {@code <b>GS1 DATABAR truncated</b>} barcode specification
     */
    const DATABAR_TRUNCATED = 43;

    /**
     * Specifies that the data should be decoded with {@code <b>GS1 DATABAR limited</b>} barcode specification
     */
    const DATABAR_LIMITED = 44;

    /**
     * Specifies that the data should be decoded with {@code <b>GS1 DATABAR expanded</b>} barcode specification
     */
    const DATABAR_EXPANDED = 45;

    /**
     * Specifies that the data should be decoded with {@code <b>GS1 DATABAR stacked omni-directional</b>} barcode specification
     */
    const DATABAR_STACKED_OMNI_DIRECTIONAL = 53;

    /**
     * Specifies that the data should be decoded with {@code <b>GS1 DATABAR stacked</b>} barcode specification
     */
    const DATABAR_STACKED = 54;

    /**
     * Specifies that the data should be decoded with {@code <b>GS1 DATABAR expanded stacked</b>} barcode specification
     */
    const DATABAR_EXPANDED_STACKED = 55;

    /**
     * Specifies that the data should be decoded with {@code <b>Patch code</b>} barcode specification. Barcode symbology is used for automated scanning
     */
    const PATCH_CODE = 46;

    /**
     * Specifies that the data should be decoded with {@code <b>ISSN</b>} barcode specification
     */
    const ISSN = 47;

    /**
     * Specifies that the data should be decoded with {@code <b>ISMN</b>} barcode specification
     */
    const ISMN = 48;

    /**
     * Specifies that the data should be decoded with {@code <b>Supplement(EAN2, EAN5)</b>} barcode specification
     */
    const SUPPLEMENT = 49;

    /**
     * Specifies that the data should be decoded with {@code <b>Australian Post Domestic eParcel Barcode</b>} barcode specification
     */
    const AUSTRALIAN_POSTE_PARCEL = 50;

    /**
     * Specifies that the data should be decoded with {@code <b>Swiss Post Parcel Barcode</b>} barcode specification
     */
    const SWISS_POST_PARCEL = 51;

    /**
     * Specifies that the data should be decoded with {@code <b>SCode16K</b>} barcode specification
     */
    const CODE_16_K = 52;

    /**
     * Specifies that the data should be decoded with {@code <b>MicroQR Code</b>} barcode specification
     */
    const MICRO_QR = 56;

    /**
     * Specifies that the data should be decoded with {@code <b>CompactPdf417</b>} (Pdf417Truncated) barcode specification
     */
    const COMPACT_PDF_417 = 57;

    /**
     * Specifies that the data should be decoded with {@code <b>GS1 QR</b>} barcode specification
     */
    const GS_1_QR = 58;

    /**
     * Specifies that the data should be decoded with {@code <b>MaxiCode</b>} barcode specification
     */
    const MAXI_CODE = 59;

    /**
     * Specifies that the data should be decoded with {@code <b>MICR E-13B</b>} blank specification
     */
    const MICR_E_13_B = 60;

    /**
     * Specifies that the data should be decoded with {@code <b>Code32</b>} blank specification
     */
    const CODE_32 = 61;

    /**
     * Specifies that the data should be decoded with {@code <b>DataLogic 2 of 5</b>} blank specification
     */
    const DATA_LOGIC_2_OF_5 = 62;

    /**
     * Specifies that the data should be decoded with {@code <b>DotCode</b>} blank specification
     */
    const DOT_CODE = 63;

    /**
     * Specifies that the data should be decoded with {@code <b>DotCode</b>} blank specification
     */
    const DUTCH_KIX = 64;

    /**
     * Specifies that data will be checked with all available symbologies
     */
    const ALL_SUPPORTED_TYPES = 66;

    /**
     * Specifies that data will be checked with all of  1D  barcode symbologies
     */
    const TYPES_1D = 67;

    /**
     * Specifies that data will be checked with all of  1.5D POSTAL  barcode symbologies, like  Planet, Postnet, AustraliaPost, OneCode, RM4SCC, DutchKIX
     */
    const POSTAL_TYPES = 68;

    /**
     * Specifies that data will be checked with most commonly used symbologies
     */
    const MOST_COMMON_TYPES = 69;

    public static function containsAny(...$decodeTypes)
    {
        $javaClassName = "com.aspose.barcode.barcoderecognition.DecodeType";
        $javaClass = new java($javaClassName);
        return java_cast($javaClass->containsAny(...$decodeTypes), "boolean");
    }
}

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
     * $generator = new BarcodeGenerator(EncodeTypes::AustraliaPost, "5912345678ABCde");
     * $generator->getParameters()->getBarcode()->getAustralianPost()->setAustralianPostEncodingTable(CustomerInformationInterpretingType::C_TABLE);
     * $image = $generator->generateBarCodeImage();
     * $reader = new BarCodeReader(image, DecodeType::AUSTRALIA_POST);
     * $reader->setCustomerInformationInterpretingType(CustomerInformationInterpretingType::C_TABLE);
     * foreach($reader->readBarCodes() as $result)
     * {
     *     print("BarCode Type: ".$result->getCodeType());
     *     print("BarCode CodeText: ".$result->getCodeText());
     * }
     */
    const C_TABLE = 0;

    /**
     * Use N_TABLE to interpret the customer information. Allows digits.
     *  $generator = new BarcodeGenerator(EncodeTypes::AustraliaPost, "59123456781234567");
     *  $generator->getParameters()->getBarcode()->getAustralianPost()->setAustralianPostEncodingTable(CustomerInformationInterpretingType::N_TABLE);
     *  $image = $generator->generateBarCodeImage();
     *  $reader = new BarCodeReader(image, DecodeType::AUSTRALIA_POST);
     *  $reader->setCustomerInformationInterpretingType(CustomerInformationInterpretingType::N_TABLE);
     *  foreach($reader->readBarCodes() as $result)
     *  {
     *     print("BarCode Type: ".$result->getCodeType());
     *     print("BarCode CodeText: ".$result->getCodeText());
     *  }
     */
    const N_TABLE = 1;

    /**
     * Do not interpret the customer information. Allows 0, 1, 2 or 3 symbol only.
     * $generator = new BarcodeGenerator(EncodeTypes::AUSTRALIA_POST, "59123456780123012301230123");
     * $generator->getParameters()->getBarcode()->getAustralianPost()->setAustralianPostEncodingTable(CustomerInformationInterpretingType::OTHER);
     * $image = $generator->generateBarCodeImage();
     * $reader = new BarCodeReader(image, DecodeType::AUSTRALIA_POST);
     * $reader->CustomerInformationInterpretingType = CustomerInformationInterpretingType::OTHER);
     * foreach($reader->readBarCodes() as $result)
     * {
     *    print("BarCode Type: ".$result->getCodeType());
     *    print("BarCode CodeText: ".$result->getCodeText());
     * }
     */
    const OTHER = 2;
}

/**
 * Contains recognition confidence level
 * This sample shows how BarCodeConfidence changed, depending on barcode type
 * //Moderate confidence
 * $generator = new BarcodeGenerator(EncodeTypes::CODE_128, "12345");
 * $generator->save("test.png");
 * $reader = new BarCodeReader("test.png", DecodeType::CODE_39_STANDARD, DecodeType::CODE_128);
 * foreach($reader->readBarCodes() as $result)
 * {
 *    print("BarCode Type: ".$result->getCodeTypeName());
 *    print("BarCode CodeText: ".$result->getCodeText());
 *    print("BarCode Confidence: ".$result->getConfidence());
 *    print("BarCode ReadingQuality: ".$result->getReadingQuality());
 * }
 * //Strong confidence
 * $generator = new BarcodeGenerator(EncodeTypes::QR, "12345");
 * $generator->save("test.png");
 * $reader = new BarCodeReader("test.png", DecodeType::CODE_39_STANDARD, DecodeType::QR);
 * foreach($reader->readBarCodes() as $result)
 * {
 *     print("BarCode Type: ".$result->getCodeTypeName());
 *     print("BarCode CodeText: ".$result->getCodeText());
 *     print("BarCode Confidence: ".$result->getConfidence());
 *     print("BarCode ReadingQuality: ".$result->getReadingQuality());
 * }
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

?>